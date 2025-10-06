<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_add_role_and_rw_to_users_table.php
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 'admin' untuk staf kelurahan, 'rw' untuk ketua RW
            $table->string('role')->default('rw')->after('email');
            // Kolom untuk menyimpan nomor RW, bisa null jika admin
            $table->unsignedTinyInteger('rw')->nullable()->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'rw']);
        });
    }
};
