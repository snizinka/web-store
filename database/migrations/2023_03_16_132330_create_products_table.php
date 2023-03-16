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
            $table->unsignedInteger('categoryid')->references('id')->on('categories')->onDelete('cascade');
            $table->string('color');
            $table->string('model');
            $table->string('thumbnail')->nullable();
            $table->unsignedSmallInteger('storage_gb');
            $table->unsignedInteger('amount');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
