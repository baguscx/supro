<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable(); // Gunakan nullable() jika kolom ini boleh kosong
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('judul_inovasi')->nullable();
            $table->date('waktu_implementasi')->nullable();
            $table->string('kelompok_inovasi')->nullable();
            $table->string('kategori_inovasi')->nullable();
            $table->string('target_sdgs')->nullable();
            $table->string('video_inovasi')->nullable();
            $table->longText('sp_inovator')->nullable();
            $table->longText('sp_replikasi')->nullable();

            //sama2
            $table->longText('ringkasan')->nullable();
            $table->longText('adaptabilitas')->nullable();
            $table->longText('sumber_daya')->nullable();
            $table->longText('strategi_keberlanjutan')->nullable();
            $table->longText('ringkasan_khusus')->nullable();
            $table->longText('adaptabilitas_khusus')->nullable();
            $table->longText('sumber_daya_khusus')->nullable();
            $table->longText('strategi_keberlanjutan_khusus')->nullable();

            // umum
            $table->longText('latar_belakang')->nullable();
            $table->longText('kebaruan')->nullable();
            $table->longText('implementasi_inovasi')->nullable();
            $table->longText('signifikansi')->nullable();

            // khusus
            $table->longText('deskripsi_awal')->nullable();
            $table->longText('pembaruan')->nullable();
            $table->longText('dampak')->nullable();
            $table->longText('penguatan')->nullable();
            $table->longText('strategi_penguatan')->nullable();

            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_proposals');
    }
};
