<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ["culture", 'other_fields'];

        public function harvests()
    {
        return $this->hasMany(Harvest::class, 'culture_id');
    }
}
