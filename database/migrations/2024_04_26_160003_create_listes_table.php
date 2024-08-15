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
        Schema::create('listes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->notNullable();
            $table->uuid('uuid')->unique();
            $table->string('stripe_account_id')->nullable();
            $table->boolean('identity_verified')->default(false); 
            $table->text('description');
            $table->string('dateBirth')->notNullable();
            $table->string('partner')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listes');
    }
};
