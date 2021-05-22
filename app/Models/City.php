<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function voivodship()
    {
        return $this->belongsTo(Voivodship::class);
    }
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
