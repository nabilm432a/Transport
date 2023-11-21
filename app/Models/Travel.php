<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';

    protected $fillable = [
        'transport_mode', 'bus_route_id', 'air_route_id', 'rail_route_id',
        'departure_airport_id', 'arrival_airport_id', 'departure_bus_stop_id',
        'arrival_bus_stop_id', 'departure_railstation_id', 'arrival_railstation_id',
        'bus_id', 'airplane_id', 'rail_id', 'departure_time', 'arrival_time', 'total_seats', 'booked_seats'
        ];
    public function busRoute()
    {
        return $this->belongsTo(BusRoute::class, 'bus_route_id');
    }
    public function airRoute()
    {
        return $this->belongsTo(AirRoute::class, 'air_route_id');
    }
    public function railRoute()
    {
        return $this->belongsTo(RailRoute::class, 'rail_route_id');
    }
    public function departureAirport()
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }
    public function arrivalAirport()
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }
    public function departureBusStop()
    {
        return $this->belongsTo(BusStop::class, 'departure_bus_stop_id');
    }
    public function arrivalBusStop()
    {
        return $this->belongsTo(BusStop::class, 'arrival_bus_stop_id');
    }
    public function departureRailstation()
    {
        return $this->belongsTo(Railstation::class, 'departure_railstation_id');
    }
    public function arrivalRailstation()
    {
        return $this->belongsTo(Railstation::class, 'arrival_railstation_id');
    }
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
    public function airplane()
    {
        return $this->belongsTo(Airplane::class, 'airplane_id');
    }
    public function rail()
    {
        return $this->belongsTo(Rail::class, 'rail_id');
    }
}
