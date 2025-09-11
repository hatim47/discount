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
       Schema::create('events', function (Blueprint $table) {
    $table->id();
    $table->string('title');                    
    $table->string('slug')->unique();    
    $table->string('heading'); 
    $table->text('description')->nullable();     
    $table->string('banner')->nullable();       
    $table->dateTime('start_date');              
    $table->dateTime('end_date');
    $table->string('top_events')->nullable();  
    $table->integer('status')->default(0);
    $table->timestamps();

     $table->unsignedBigInteger('event_region');
    $table->foreign('event_region')->references('id')->on('regions')->onDelete('cascade');
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
