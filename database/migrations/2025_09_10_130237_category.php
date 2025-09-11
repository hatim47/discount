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
       Schema::create('categories', function (Blueprint $table) {
    $table->id(); 
    $table->string('name'); 
    $table->string('slug'); 
    $table->integer('status')->default(0);
    $table->integer('trend')->default(0);
    $table->integer('feature')->default(0);
    $table->integer('recom')->default(0);
    $table->integer('relat')->default(0);
    $table->integer('like')->default(0);

    $table->unsignedBigInteger('cate_region');
    $table->foreign('cate_region')->references('id')->on('regions')->onDelete('cascade');

    $table->timestamps();
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
