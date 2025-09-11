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
          Schema::create('stores', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug');
    $table->string('logo')->nullable();
    $table->string('image')->nullable();
    $table->string('promo_text')->nullable();
    $table->integer('status')->default(0);
    $table->integer('trend')->default(0);
    $table->integer('feature')->default(0);
    $table->integer('recom')->default(0);
    $table->string('heading');
    $table->text('description')->nullable();
    $table->string('link')->nullable();
    $table->integer('relat_store')->default(0);
    $table->integer('relat_cate')->default(0);
    $table->integer('like_store')->default(0);
    $table->integer('view')->default(0);
    // active, inactive
    $table->timestamps();


    $table->unsignedBigInteger('store_region');
    $table->foreign('store_region')->references('id')->on('regions')->onDelete('cascade');
    $table->unsignedBigInteger('category_id');
    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
});



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
