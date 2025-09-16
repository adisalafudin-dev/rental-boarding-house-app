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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_cabang")->constrained("cabang", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("id_ukuran")->constrained("ukuran", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("id_jenis")->constrained("jenis", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("tarif_custom")->nullable();
            $table->text("keterangan")->nullable();
            $table->enum("status_keaktifan", ["aktif", "tidak"]);
            $table->integer("pax")->nullable()->min(1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
