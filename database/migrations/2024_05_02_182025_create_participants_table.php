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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->NotNullable();
            $table->string('email')->unique();
            $table->decimal('amount', 8, 2)->NotNullable();
            $table->string('date_contribution')->NotNullable();
            // $table->foreignId('cagnotte_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Product::class);
            $table->foreignIdFor(\App\Models\Cagnotte::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
