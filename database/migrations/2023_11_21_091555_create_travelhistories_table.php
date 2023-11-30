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
        Schema::create('travelhistories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->unsignedBigInteger('travel_id')->constrained('travels');
            $table->decimal('final_price');
            $table->string('payment_status')->default('Not Paid');
            $table->unique(['user_id', 'travel_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travelhistories');
    }
};
