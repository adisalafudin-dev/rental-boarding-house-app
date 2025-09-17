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
        Schema::create('reviews_user_cabang', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_sewa")->constrained("sewa_order", "id")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("rating");
            $table->text("komentar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews_user_cabang');
    }
};
