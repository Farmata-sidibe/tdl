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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('paypal_email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('profile_image')->nullable()->default('default-profile.jpg');
            $table->string('cover_image')->nullable()->default('default-cover.jpg');
            $table->string('country')->nullable();
            $table->text('adress')->nullable();
            $table->integer('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
