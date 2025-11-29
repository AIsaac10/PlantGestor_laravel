<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_cost',
        'quantity_cost',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}