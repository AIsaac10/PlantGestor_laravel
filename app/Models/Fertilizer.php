<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    protected $fillable = ['culture','fertilizer','time_fertilizer','weight_fertilizer'
    ];
}
