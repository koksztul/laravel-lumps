<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'name',
        'address',
        'website',
        'information',
        'contact',
        'open_hrs_mo',
        'open_hrs_tu',
        'open_hrs_we',
        'open_hrs_th',
        'open_hrs_fr',
        'open_hrs_sa',
        'open_hrs_sn',
        'type_of_purchase',
        'day_of_delivery',
        'cash',
        'card',
    ];

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
