<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travelhistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'travel_id','final_price', 'payment_status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function travel() {
        return $this->belongsTo(Travel::class, 'travel_id');
    }
}
