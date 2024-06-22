<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use Illuminate\Http\Request;
use App\Models\Marker;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class homepageController extends Controller
{
    public function index(): View {
        $markers = Marker::join('categories', 'categories.id', '=', 'markers.categories_id')
                 ->select('markers.id', 'markers.tempat', 'markers.keterangan', 'markers.latitude','markers.longitude',
                          'markers.categories_id', 'markers.image','markers.price_start','markers.price_end','markers.link','markers.navlink', 'categories.catName AS catName') // Alias for category name
                 ->get();

        // ambil data kategori
        $data['categories'] = Category::all();

        // Return View
        return view('homepage',compact('markers'),$data);
    }

    public function detail(): View {
       $id = Route::current()->parameter('id');
       $marker = Marker::join('categories', 'categories.id', '=', 'markers.categories_id')
                 ->select('markers.id', 'markers.tempat', 'markers.keterangan', 'markers.latitude','markers.longitude',
                          'markers.categories_id', 'markers.image','markers.price_start','markers.price_end','markers.link','markers.navlink', 'categories.catName AS catName') // Alias for category name
                 ->get();

       // ambil data kategori
       $data['categories'] = Category::all();
       $accomodations = Accomodation::join('markers', 'markers.id', '=', 'accomodations.markers_id')
       ->select('accomodations.id', 'accomodations.name', 'accomodations.markers_id', 'accomodations.start_price','accomodations.end_price','accomodations.thumb_img','accomodations.traveloka_link')
       ->get();
       $markers = Marker::findOrFail($id);

        dd($accomodations);
       return view('detail',compact('markers'),compact('marker'),$data);
    }
}
