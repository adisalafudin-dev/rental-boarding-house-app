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
        Schema::create('cabang', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_kota")->constrained("kota", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("id_kos")->constrained("brand_kost", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->string("nama", 255);
            $table->string("alamat", 255);
            $table->decimal("latitude", 10, 8);
            $table->decimal("longtitude", 11, 8);
            $table->integer("jumlah_kamar")->nullable();
            $table->text("deskripsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabang_kos');
    }
};
