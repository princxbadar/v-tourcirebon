<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function view3DTourManagement(): View {
        return view('admin.3d-tour-management');
    }
}
