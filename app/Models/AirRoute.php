<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirRoute extends Model
{
    use HasFactory;

    protected $fillable = ['source_id', 'destination_id', 'fare'];

    public function sourceAirport()
    {
        return $this->belongsTo(Airport::class, 'source_id');
    }

    public function destinationAirport()
    {
        return $this->belongsTo(Airport::class, 'destination_id');
    }
}
