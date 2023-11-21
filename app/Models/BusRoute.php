<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $fillable = ['source_id', 'destination_id', 'fare'];

    public function sourceBusStop() {
        return $this->belongsTo(BusStop::class, 'source_id');
    }

    public function destinationBusStop() {
        return $this->belongsTo(BusStop::class, 'destination_id');
    }
}
