<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rail extends Model
{
    use HasFactory;

    protected $fillable = ['license_number', 'capacity'];
}
