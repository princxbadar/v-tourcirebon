<?php
namespace App\Http\Controllers;


// import model
use App\Models\Marker;
use Illuminate\View\View;


abstract class Controller
{
    public function index(){
        // Get All Marker
        $markers = Marker::latest()->paginate(10);
    }
}
