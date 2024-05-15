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
        Schema::create('cagnottes', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_amount', 8, 2)->nullable();
            $table->decimal('current_amount', 8, 2)->nullable();
            $table->unsignedBigInteger('liste_id')->unique()->nullable();
            $table->foreign('liste_id')->references('id')->on('listes')->nullOnDelete();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cagnottes');
    }
};
