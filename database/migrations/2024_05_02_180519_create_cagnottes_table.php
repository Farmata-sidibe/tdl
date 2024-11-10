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
            $table->decimal('total_amount', 15, 2)->nullable()->default(0);
            $table->decimal('current_amount', 15, 2)->nullable()->default(0);
            $table->unsignedBigInteger('liste_id')->unique()->nullable();
            $table->foreign('liste_id')->references('id')->on('listes')->nullOnDelete();
            $table->boolean('is_active')->default(true);
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
