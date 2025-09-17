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
        Schema::create('tarif_khusus', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_kamar")->constrained("kamar", "id");
            $table->decimal("harga", 15, 2);
            $table->date("mulai_berlaku");
            $table->date("selesai_berlaku");
            $table->text("alasan");
            $table->enum('tipe', ['harian', 'mingguan', 'bulanan']);
            $table->enum("is_active", ["true", "false"])->default("false");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_khusus');
    }
};
