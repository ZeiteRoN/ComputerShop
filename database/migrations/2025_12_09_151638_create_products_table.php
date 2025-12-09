<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('category_id')->default(255)->unsigned();
            $table->tinyInteger('brand_id')->default(255)->unsigned();
            $table->string('description')->nullable();
            $table->float('price')->default(0);
            $table->tinyInteger('quantity')->default(0);
            $table->string('image_path')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
