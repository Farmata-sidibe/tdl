<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('liste_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('liste_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('title')->NotNullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->text('brand')->nullable();
            $table->string('size')->nullable();
            $table->string('img')->nullable();
            $table->text('link')->nullable();
            $table->boolean('reserved')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('liste_product');
    }
};
