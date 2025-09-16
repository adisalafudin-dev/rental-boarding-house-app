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
        Schema::create('tarif_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_cabang")->constrained("cabang", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("id_ukuran")->constrained("ukuran", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("id_jenis")->constrained("jenis", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->enum('tipe', ['harian', 'mingguan', 'bulanan']);
            $table->decimal('harga', 15, 2);
            $table->date('mulai_berlaku');
            $table->date('selesai_berlaku')->nullable();

            $table->timestamps();

            // Index unik sesuai kombinasi
            $table->unique(['id_cabang', 'id_jenis', 'id_ukuran', 'tipe'], 'tarif_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_kategori');
    }
};
