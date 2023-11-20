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
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('transport_mode');
            $table->unsignedBigInteger('bus_route_id')->nullable()->constrained('bus_routes');
            $table->unsignedBigInteger('air_route_id')->nullable()->constrained('air_routes');
            $table->unsignedBigInteger('rail_route_id')->nullable()->constrained('rail_routes');
            $table->unsignedBigInteger('departure_airport_id')->nullable()->constrained('airports');
            $table->unsignedBigInteger('arrival_airport_id')->nullable()->constrained('airports');
            $table->unsignedBigInteger('departure_bus_stop_id')->nullable()->constrained('bus_stops');
            $table->unsignedBigInteger('arrival_bus_stop_id')->nullable()->constrained('bus_stops');
            $table->unsignedBigInteger('departure_railstation_id')->nullable()->constrained('railstations');
            $table->unsignedBigInteger('arrival_railstation_id')->nullable()->constrained('railstations');
            $table->unsignedBigInteger('bus_id')->nullable()->constrained('buses');
            $table->unsignedBigInteger('airplane_id')->nullable()->constrained('airplanes');
            $table->unsignedBigInteger('rail_id')->nullable()->constrained('rails');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->integer('available_seats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
