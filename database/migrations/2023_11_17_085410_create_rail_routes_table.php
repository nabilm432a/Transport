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
        Schema::create('rail_routes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')->references('id')->on('locations');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('locations');
            $table->decimal('fare');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rail_routes');
    }
};