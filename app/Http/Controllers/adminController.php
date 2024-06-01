<?php

namespace App\Http\Controllers;
// import model
use App\Models\Marker;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class adminController extends Controller
{
    public function view3DTourManagement(): View {
        // Get All Marker
        $markers = Marker::latest()->paginate(10);
        // Return View
        return view('admin.3d-tour-management',compact('markers'));
    }
}
