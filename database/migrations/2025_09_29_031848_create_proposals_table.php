<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_proposals_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('judulProposal');
            $table->string('nomorSurat');
            $table->string('lampiran')->nullable();
            $table->string('perihal');
            $table->string('rw', 5);
            $table->string('jalan');
            $table->string('kodePos', 10);
            $table->date('tanggal');
            $table->string('namaBarang');
            $table->string('tempatPenggunaan');
            $table->string('jenisKegiatan');
            $table->text('perencanaan');
            $table->text('pengadaan');
            $table->text('rehab');
            $table->text('uji');
            $table->bigInteger('anggaran');
            $table->string('namaKetuaRW');
            $table->string('gambar1_path')->nullable();
            $table->string('gambar2_path')->nullable();
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
