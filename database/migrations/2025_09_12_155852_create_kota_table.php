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
        Schema::create('kota', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 100);
            $table->string("provinsi", 100);
            $table->string("kode_pos", 100);
            $table->decimal("latitude", 10, 8);
            $table->decimal("longtitude", 11, 8);
            $table->enum("daerah", ["kota", "kabupaten"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};
