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
        Schema::create('ukuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_brand_kos")->constrained("brand_kost", "id");
            $table->string("nama", 255)->unique();
            $table->decimal("panjang", 8, 2);
            $table->decimal("lebar", 8, 2);
            $table->decimal("tinggi", 8, 2)->nullable();
            $table->integer("kapasitas_penghuni")->default(1);
            $table->string("keterangan")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukuran');
    }
};
