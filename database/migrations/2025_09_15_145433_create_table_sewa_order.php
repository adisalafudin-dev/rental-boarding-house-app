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
        Schema::create('sewa_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_kamar")->constrained("kamar", "id")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users", "id")->onDelete("cascade");
            $table->timestamp("tanggal_pesan")->useCurrent();
            $table->timestamp("tanggal_masuk")->nullable();
            $table->timestamp("tanggal_selesai")->nullable();
            $table->decimal("total_bayar", 15, 2)->default(0);
            $table->text("jaminan")->nullable();
            $table->enum("status", ["order", "active", "checkout", "cancel"])->default("order");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa_order');
    }
};
