<?php
namespace App\Http\Controllers;


// import model
use App\Models\Marker;
use App\Models\Category;
use Illuminate\View\View;


abstract class Controller
{
    public function index(): View {
        $markers = Marker::join('categories','categories.id', '=','markers.categories_id')->get();
        
        // ambil data kategori
        $data['categories'] = Category::all();

        
        // Return View
        return view('homepage',compact('markers'),$data);
    }
}
