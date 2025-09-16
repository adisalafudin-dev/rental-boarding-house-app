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
        Schema::create('brand_kost', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_pemilik")->constrained("users", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->string("nama_brand", 255);
            $table->string("logo", 255)->nullable();
            $table->text("alamat");
            $table->string("dokumen_izin", 255)->nullable();
            $table->string("dokumen_ktp", 255)->nullable();
            $table->string("dokumen_npwp", 255)->nullable();
            $table->string("dokumen_lain", 255)->nullable();
            $table->enum("status_verifikasi", ["pending", "verified", "rejected"])->default("pending")->nullable();
            $table->timestamp("tanggal_verifikasi")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_kost');
    }
};
