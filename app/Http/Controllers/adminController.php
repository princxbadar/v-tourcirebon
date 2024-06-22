<?php

namespace App\Http\Controllers;
// import model
use App\Models\Marker;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class adminController extends Controller
{
    public function view3DTourManagement(): View {
        // Get All Marker
        // $markers = Marker::latest()->paginate(10);
        $markers = Marker::join('categories', 'categories.id', '=', 'markers.categories_id')
                 ->select('markers.id', 'markers.tempat', 'markers.keterangan', 
                          'markers.categories_id', 'markers.image','price','markers.link','markers.navlink', 'categories.catName AS catName') // Alias for category name
                 ->get();


        // ambil data kategori
        $data['categories'] = Category::all();
        
        // Return View
        return view('admin.3d-tour-management',compact('markers'),$data);
    }

       /**
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    public function createMarker(Request $request): RedirectResponse
    {
        $request->validate([
            'tempat' => 'required',
            'keterangan' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'categories_id'=>'required',
            'price'=> 'required|numeric',
            'link'=> 'required',
            'navlink' => 'required'
        ]);
            //Upload Gambar
            $image = $request->file('image');
            $image->storeAs('public/thumbnail', $image->hashName());

        Marker::create([
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
            'categories_id' => $request->categories_id,
            'image'=> $image->hashName(),
            'price' => $request->price,
            'link' => $request->link,
            'navlink' => $request->navlink
        ]);
        return redirect()->route('admin.manage-tour')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request,Marker $marker): RedirectResponse
    {
        $request->validate([
            'tempat' => 'required',
            'keterangan' => 'required',
            'image' => 'required|numeric',
            'price'=> 'required|numeric',
            'navlink' => 'required'
        ]);
        // get data by ID

        $marker->update([
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
            'image'=> $request->image,
            'price' => $request->price,
            'navlink' => $request->navlink
        ]);
        dd($marker);
        return redirect()->route('admin.manage-tour')->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
