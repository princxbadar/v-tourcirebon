<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'markers_id',
        'start_price',
        'end_price',
        'traveloka_link',
        'thumb_img',
    ];
}
