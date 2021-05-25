<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = [];

    protected $casts = [
        'cash' => 'boolean',
        'card' => 'boolean',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
