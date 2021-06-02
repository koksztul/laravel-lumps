<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type'
    ];
    use HasFactory;

    public function imageable()
    {
        return $this->morphTo();
    }
    public function getFormattedUrlAttribute()
    {
        return Str::startsWith($this->url, 'http') ? $this->url : Storage::url($this->url);
    }
}
