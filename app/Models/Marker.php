<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Category;

class Marker extends Model
{
    use HasFactory;

    protected $fillable =[
        'tempat',
        'keterangan',
        'categories_id',
        'latitude',
        'longitude',
        'link'
    ];
}
