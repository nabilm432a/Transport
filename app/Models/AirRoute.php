<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirRoute extends Model
{
    use HasFactory;

    protected $fillable = ['source_id', 'destination_id'];
    public function source_location() {
        return $this->belongsTo(Location::class, 'source_id');
    }

    public function destination_location() {
        return $this->belongsTo(Location::class, 'destination_id');
    }

}
