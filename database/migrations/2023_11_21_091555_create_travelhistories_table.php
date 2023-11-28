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
            $table->string('user_id')->constrained('users');
            $table->date('travel_id')->constrained('travels');
            $table->string('payment_status');
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
