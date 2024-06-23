<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Marker extends Model
{
    use HasFactory;

    protected $fillable = [
        'tempat',
        'keterangan',
        'address',
        'categories_id',
        'image',
        'longitude',
        'latitude',
        'price_start',
        'price_end',
        'youtube_link',
        'link',
        'navlink',
    ];
}
