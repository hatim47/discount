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
Schema::create('store_related', function (Blueprint $table) {
    $table->id();
    // Main store
    $table->unsignedBigInteger('store_id');
    $table->foreign('store_id')
          ->references('id')
          ->on('stores')
          ->onDelete('cascade');
    // Related store
    $table->unsignedBigInteger('related_store_id');
    $table->foreign('related_store_id')
          ->references('id')
          ->on('stores')
          ->onDelete('cascade');
    $table->timestamps();
    // Prevent duplicates (same relation twice)
    $table->unique(['store_id', 'related_store_id']);
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
