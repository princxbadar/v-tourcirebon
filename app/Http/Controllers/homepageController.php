<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class homepageController extends Controller
{
    public function index(): View {
        $markers = Marker::join('categories','categories.id', '=','markers.categories_id')->get();
        
        // ambil data kategori
        $data['categories'] = Category::all();

        
        // Return View
        return view('homepage',compact('markers'),$data);
    }
    public function detail(): View {
       $id = Route::current()->parameter('id');
       $markers = Marker::findOrFail($id);
       return view('detail',compact('markers'));
    }
}
