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
       Schema::create('coupons', function (Blueprint $table) {
    $table->id();
    $table->string('code')->nullable();              
    $table->string('title');                      
    $table->text('description')->nullable();
    $table->string('link')->nullable();           
    $table->date('start_date')->nullable();
    $table->date('end_date')->nullable();
    $table->integer('trend')->default(0);
    $table->integer('feature')->default(0);
    $table->integer('recom')->default(0);
    $table->integer('deals')->default(0);
    $table->integer('verified')->default(0);
    $table->integer('exclusive')->default(0);
    $table->integer('show_top')->default(0);
    $table->string('image')->nullable();
    $table->string('trems')->nullable();  
    $table->integer('sort_store')->default(0);
    $table->integer('sort_cate')->default(0); 
    $table->string('view')->default('0'); 
    // Relations
    $table->unsignedBigInteger('copon_region')->nullable();
    $table->unsignedBigInteger('store_id')->nullable();
    $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
    $table->enum('status', ['active', 'inactive', 'expired'])->default('active');
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
