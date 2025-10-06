<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gemini Chat Interface</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --background-color: #f0f2f5;
            --container-bg: #ffffff;
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --user-bubble-bg: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            --ai-bubble-bg: #e5e7eb;
            --text-primary: #111827;
            --text-secondary: #f9fafb;
            --border-color: #d1d5db;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: var(--text-primary);
        }

        .chat-container {
            width: 100%;
            max-width: 768px;
            height: 95vh;
            max-height: 800px;
            background: var(--container-bg);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        header {
            background: var(--container-bg);
            color: var(--text-primary);
            padding: 1rem 1.5rem;
            text-align: center;
            font-size: 1.25rem;
            font-weight: 600;
            border-bottom: 1px solid var(--border-color);
        }

        #chat-box {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        #chat-box::-webkit-scrollbar {
            width: 8px;
        }

        #chat-box::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        .bubble {
            max-width: 75%;
            padding: 0.8rem 1.2rem;
            border-radius: 18px;
            line-height: 1.5;
            word-wrap: break-word;
            animation: fadeIn 0.3s ease-out;
        }

        .user {
            align-self: flex-end;
            background: var(--user-bubble-bg);
            color: var(--text-secondary);
            border-bottom-right-radius: 4px;
        }

        .ai {
            align-self: flex-start;
            background: var(--ai-bubble-bg);
            color: var(--text-primary);
            border-bottom-left-radius: 4px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .typing-indicator {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0.8rem 1.2rem;
        }

        .typing-indicator span {
            width: 8px;
            height: 8px;
            background-color: #9ca3af;
            border-radius: 50%;
            animation: bounce 1.2s infinite;
        }

        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {

            0%,
            60%,
            100% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-6px);
            }
        }

        #input-area {
            display: flex;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            background: var(--container-bg);
            border-top: 1px solid var(--border-color);
            align-items: center;
        }

        #prompt {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            background: var(--background-color);
            border-radius: 12px;
            outline: none;
            font-size: 1rem;
            transition: box-shadow 0.2s;
        }

        #prompt:focus {
            box-shadow: 0 0 0 2px var(--primary-color);
        }

        #send-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border: none;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        #send-btn:hover {
            background: var(--primary-hover);
            transform: scale(1.05);
        }

        #send-btn:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }

        #send-btn svg {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <div class="chat-container">
        <header>AI Chat</header>
        <div id="chat-box"></div>
        <div id="input-area">
            <input id="prompt" type="text" placeholder="Tulis pesan Anda..." autocomplete="off" />
            <button id="send-btn" aria-label="Kirim">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.949a.75.75 0 00.95.54l3.853-1.445a.75.75 0 010 1.352L4.644 11.98a.75.75 0 00-.54.95l1.414 4.95a.75.75 0 00.95.826l12.255-4.14a.75.75 0 000-1.418L3.105 2.289z" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        const chatBox = document.getElementById("chat-box");
        const promptInput = document.getElementById("prompt");
        const sendBtn = document.getElementById("send-btn");

        // Parser sederhana untuk Markdown -> HTML
        function formatMarkdown(text) {
            text = text.replace(/\*\*(.*?)\*\*/g, "<b>$1</b>"); // bold
            text = text.replace(/\*(.*?)\*/g, "<i>$1</i>"); // italic
            text = text.replace(/\n/g, "<br>"); // newline
            return text;
        }

        function addMessage(content, sender, isHtml = false) {
            const bubble = document.createElement("div");
            bubble.className = `bubble ${sender}`;
            bubble.innerHTML = isHtml ? content : formatMarkdown(content);
            chatBox.appendChild(bubble);
            chatBox.scrollTop = chatBox.scrollHeight;
            return bubble;
        }

        function showTypingIndicator() {
            const typingHtml = `
                <div class="typing-indicator">
                    <span></span><span></span><span></span>
                </div>
            `;
            return addMessage(typingHtml, "ai", true);
        }

        async function sendPrompt() {
            const prompt = promptInput.value.trim();
            if (!prompt) return;

            promptInput.disabled = true;
            sendBtn.disabled = true;

            addMessage(prompt, "user");
            promptInput.value = "";

            const aiBubble = showTypingIndicator();

            try {
                const response = await fetch("/ai/chat", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "text/event-stream",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        prompt
                    })
                });

                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                const reader = response.body.getReader();
                const decoder = new TextDecoder();

                aiBubble.innerHTML = "";

                async function read() {
                    const {
                        done,
                        value
                    } = await reader.read();
                    if (done) {
                        promptInput.disabled = false;
                        sendBtn.disabled = false;
                        promptInput.focus();
                        return;
                    }

                    const chunk = decoder.decode(value, {
                        stream: true
                    });
                    aiBubble.innerHTML += formatMarkdown(chunk); // pakai parser markdown
                    chatBox.scrollTop = chatBox.scrollHeight;
                    read();
                }
                read();

            } catch (error) {
                console.error("Error fetching AI response:", error);
                aiBubble.textContent = "Maaf, terjadi kesalahan saat menyambungkan ke server.";
                promptInput.disabled = false;
                sendBtn.disabled = false;
                promptInput.focus();
            }
        }

        sendBtn.addEventListener("click", sendPrompt);
        promptInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter" && !e.shiftKey) {
                e.preventDefault();
                sendPrompt();
            }
        });
    </script>
</body>

</html>
