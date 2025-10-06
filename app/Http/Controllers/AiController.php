<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AIController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:2000',
        ]);

        $prompt = $request->input('prompt');
        $apiKey = env('GOOGLE_AI_API_KEY');
        $model = env('GOOGLE_AI_MODEL', 'gemini-1.5-flash-latest');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API Key untuk Google AI tidak diatur.'
            ], 500);
        }

        $apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:streamGenerateContent?alt=sse&key={$apiKey}";

        // Instruksi sistem (dibuat agar jawaban ringkas tapi jelas)
        $systemInstruction = "Anda adalah Gemini, asisten AI yang ramah, jelas, dan terstruktur.
Selalu jawab dalam Bahasa Indonesia dengan format ringkas tapi tetap informatif.
Gunakan format Markdown:
- **teks tebal** untuk istilah penting
- `kode` untuk contoh teknis
- daftar berpoin (*) atau bernomor (1.) bila perlu
⚠️ Batasi jawaban maksimal 6-8 kalimat, jangan terlalu panjang.";

        $generationConfig = [
            'temperature' => 0.7,
            'maxOutputTokens' => 768, // cukup besar biar tidak terpotong, tapi tetap fokus
        ];

        $payload = json_encode([
            'system_instruction' => [
                'parts' => [['text' => $systemInstruction]]
            ],
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]],
            'generationConfig' => $generationConfig
        ]);

        return new StreamedResponse(function () use ($apiUrl, $payload) {
            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $apiUrl,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                ],
                CURLOPT_POSTFIELDS => $payload,
                CURLOPT_WRITEFUNCTION => function ($ch, $data) {
                    $lines = explode("\n", $data);
                    foreach ($lines as $line) {
                        $line = trim($line);
                        if (!str_starts_with($line, 'data:')) {
                            continue;
                        }

                        $json = substr($line, 5);
                        $parsed = json_decode($json, true);

                        // Jika model menghentikan karena alasan selain STOP
                        if (
                            isset($parsed['candidates'][0]['finishReason']) &&
                            $parsed['candidates'][0]['finishReason'] !== 'STOP'
                        ) {
                            echo "\n\n[⚠️ Respons dihentikan: " . $parsed['candidates'][0]['finishReason'] . "]";
                            ob_flush();
                            flush();
                            continue;
                        }

                        // Jika prompt diblokir
                        if (isset($parsed['promptFeedback']['blockReason'])) {
                            echo "\n\n[🚫 Konten diblokir: " . $parsed['promptFeedback']['blockReason'] . "]";
                            ob_flush();
                            flush();
                            continue;
                        }

                        // Ambil teks dari kandidat
                        if (isset($parsed['candidates'][0]['content']['parts'][0]['text'])) {
                            $text = $parsed['candidates'][0]['content']['parts'][0]['text'];
                            echo $text;
                            ob_flush();
                            flush();
                        }
                    }
                    return strlen($data);
                },
                CURLOPT_TIMEOUT => 0, // biar streaming tidak timeout
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_FAILONERROR => false,
            ]);

            curl_exec($ch);

            if (curl_errno($ch)) {
                $errorMessage = curl_error($ch);
                error_log('cURL error: ' . $errorMessage);
                echo "[❌ ERROR: Tidak bisa terhubung ke layanan AI. Detail: {$errorMessage}]";
                ob_flush();
                flush();
            }

            curl_close($ch);
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Connection' => 'keep-alive',
        ]);
    }
}
