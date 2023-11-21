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
        Schema::create('air_routes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')->references('id')->on('airports');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('airports');
            $table->decimal('fare');
            $table->unique(['source_id', 'destination_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('air_routes');
    }
};
