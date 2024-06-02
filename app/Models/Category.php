<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marker;

class Category extends Model
{

    use HasFactory;
    protected $fillable =[
        'catName'
    ];
    
    public function markers(){
        return $this->hasMany(Marker::class, 'categories_id', 'id');
    }
}
