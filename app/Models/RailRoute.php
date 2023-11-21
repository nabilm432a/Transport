<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RailRoute extends Model
{
    use HasFactory;

    protected $fillable = ['source_id', 'destination_id', 'fare'];

    public function sourceRailstation()
    {
        return $this->belongsTo(Railstation::class, 'source_id');
    }

    public function destinationRailstation()
    {
        return $this->belongsTo(Railstation::class, 'destination_id');
    }
}
