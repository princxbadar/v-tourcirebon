<?php

namespace App\Http\Controllers;
// import model
use App\Models\Marker;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class adminController extends Controller
{
    public function view3DTourManagement(): View {
        // Get All Marker
        // $markers = Marker::latest()->paginate(10);
        $markers = Marker::join('categories', 'categories.id', '=', 'markers.categories_id')
                 ->select('markers.id', 'markers.tempat', 'markers.keterangan', 
                          'markers.categories_id', 'markers.latitude', 'markers.longitude', 
                          'markers.link', 'categories.catName AS catName') // Alias for category name
                 ->get();
        
        // ambil data kategori
        $data['categories'] = Category::all();
        
        // Return View
        return view('admin.3d-tour-management',compact('markers'),$data);
    }

    
    public function create():View
    {
        // Get All Marker
        // $markers = Marker::latest()->paginate(10);
        $markers = Marker::join('categories','categories.id', '=','markers.categories_id')->get();
        // ambil data kategori
        $data['categories'] = Category::all();
        return view('admin.create-marker',compact('markers'),$data);
    }
       /**
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    public function createMarker(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'tempat' => 'required',
                'keterangan' => 'required',
                'price'=> 'required|numeric',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'link' => 'required',
                'navlink' => 'required'
            ]);
    
            // Data preparation
            $params = [
                'tempat' => $request->tempat,
                'keterangan' => $request->keterangan,
                'categories_id' => (int) $request->categories_id,
                'price' =>$request->price,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'link' => $request->link,
                'navlink' => $request->navlink
            ];
    
            // Marker creation
            $insert = Marker::create($params);
    
            // Redirection with success message
            return redirect()->route('admin.manage-tour')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (ValidationException $e) {
            dd($e->validator->errors());
            // Handle validation errors
            return back()->withErrors($e->validator->errors());
        }
    }

    public function detailMarker(string $id): View {

        $markers = Marker::findOrFail($id);
        return view('admin.3d-tour-management',compact('markers'));
    }
}
