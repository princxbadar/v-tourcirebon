<?php

namespace App\Http\Controllers;
// import model

use App\Models\Accomodation;
use App\Models\Marker;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class adminController extends Controller
{
    public function viewDashboard(): View {
        // Get All Marker
        // $markers = Marker::latest()->paginate(10);
        $markers = Marker::join('categories', 'categories.id', '=', 'markers.categories_id')
                 ->select('markers.id', 'markers.tempat', 'markers.keterangan','markers.address', 'markers.latitude','markers.longitude',
                          'markers.categories_id', 'markers.image','markers.price_start','markers.price_end','markers.youtube_link','markers.link','markers.navlink', 'categories.catName AS catName') // Alias for category name
                 ->get();

        return view('dashboard', compact('markers'));
    }

    public function view3DTourManagement(): View {
        // Get All Marker
        // $markers = Marker::latest()->paginate(10);
        $markers = Marker::join('categories', 'categories.id', '=', 'markers.categories_id')
                 ->select('markers.id', 'markers.tempat', 'markers.keterangan','markers.address', 'markers.latitude','markers.longitude',
                          'markers.categories_id', 'markers.image','markers.price_start','markers.price_end','markers.youtube_link','markers.link','markers.navlink', 'categories.catName AS catName') // Alias for category name
                 ->get();


        // ambil data kategori
        $data['categories'] = Category::all();

        // Return View
        return view('admin.3d-tour-management', compact('markers'), $data);
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
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'categories_id'=>'required',
            'price_start'=> 'required|numeric',
            'price_end'=> 'required|numeric',
            'youtube_link'=> 'required',
            'link'=> 'required',
            'navlink' => 'required'
        ]);

        //Upload Gambar
        $image = $request->file('image');
        $image->storeAs('public/thumbnail', $image->hashName());

        Marker::create([
            'tempat' => $request->tempat,
            'address' => $request->address,
            'keterangan' => $request->keterangan,
            'categories_id' => $request->categories_id,
            'image'=> $image->hashName(),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'price_start' => $request->price_start,
            'price_end' => $request->price_end,
            'youtube_link' => $request->youtube_link,
            'link' => $request->link,
            'navlink' => $request->navlink
        ]);
        return redirect()->route('admin.manage-tour')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'tempat' => 'required',
            'keterangan' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'categories_id'=>'required',
            'price_start'=> 'required|numeric',
            'price_end'=> 'required|numeric',
            'youtube_link'=> 'required',
            'link'=> 'required',
            'navlink' => 'required'
        ]);
        // get data by ID

        $markers = Marker::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/thumbnail', $image->hashName());

            //delete old image
            Storage::delete('public/thumbnail/'.$markers->image);

            //update product with new image
            $markers->update([
                'tempat' => $request->tempat,
                'address' => $request->address,
                'keterangan' => $request->keterangan,
                'categories_id' => $request->categories_id,
                'image'=> $image->hashName(),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'price_start' => $request->price_start,
                'price_end' => $request->price_end,
                'youtube_link' => $request->youtube_link,
                'link' => $request->link,
                'navlink' => $request->navlink
            ]);

        } else {

            //update markers without image
            $markers->update([
                'tempat' => $request->tempat,
                'address' => $request->address,
                'keterangan' => $request->keterangan,
                'categories_id' => $request->categories_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'price_start' => $request->price_start,
                'price_end' => $request->price_end,
                'youtube_link' => $request->youtube_link,
                'link' => $request->link,
                'navlink' => $request->navlink
            ]);
        }
        return redirect()->route('admin.manage-tour')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function viewAccomodation(): View {
        // Get All Marker
        // $markers = Marker::latest()->paginate(10);
        $accomodations = Accomodation::join('markers', 'markers.id','=','accomodations.markers_id')
                        ->select('accomodations.id','accomodations.name','accomodations.accomodation_address','accomodations.start_price','accomodations.end_price','accomodations.traveloka_link','accomodations.thumb_img','markers.tempat AS tempat')->get();
        // ambil data markers
        $markers = Marker::all();

        // Return View
        return view('admin.accomodation-management',compact('accomodations', 'markers'));
    }
    public function createAccomodation(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'accomodation_address' => 'required',
            'markers_id' => 'required',
            'start_price' => 'required|numeric',
            'end_price' => 'required|numeric',
            'thumb_img' => 'required|image|mimes:jpeg,jpg,png',
            'traveloka_link'=> 'required'
        ]);

        //Upload Gambar
        $image = $request->file('thumb_img');
        $image->storeAs('public/thumbnail', $image->hashName());

        Accomodation::create([
            'name' => $request->name,
            'accomodation_address' => $request->accomodation_address,
            'markers_id' => $request->markers_id,
            'start_price' => $request->start_price,
            'end_price' => $request->end_price,
            'thumb_img'=> $image->hashName(),
            'traveloka_link' => $request->traveloka_link
        ]);
        return redirect()->route('admin.manage-accomodation')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function updateAccomodation(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'accomodation_address' => 'required',
            'markers_id' => 'required',
            'start_price' => 'required|numeric',
            'end_price' => 'required|numeric',
            'thumb_img' => 'image|mimes:jpeg,jpg,png',
            'traveloka_link'=> 'required'
        ]);
        // get data by ID

        $accomodations = Accomodation::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('thumb_img')) {

            //upload new image
            $image = $request->file('thumb_img');
            $image->storeAs('public/thumbnail', $image->hashName());

            //delete old image
            Storage::delete('public/thumbnail/'.$accomodations->thumb_image);

            //update product with new image
            $accomodations->update([
                'name' => $request->name,
                'accomodation_address' => $request->accomodation_address,
                'markers_id' => $request->markers_id,
                'start_price' => $request->start_price,
                'end_price' => $request->end_price,
                'thumb_img'=> $image->hashName(),
                'traveloka_link' => $request->traveloka_link
            ]);

        } else {

            //update accomodations without image
            $accomodations->update([
                'name' => $request->name,
                'accomodation_address' => $request->accomodation_address,
                'markers_id' => $request->markers_id,
                'start_price' => $request->start_price,
                'end_price' => $request->end_price,
                'traveloka_link' => $request->traveloka_link
            ]);
        }
        return redirect()->route('admin.manage-accomodation')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function destroyAccomodation($id)
    {
        $accomodations = Accomodation::findOrFail($id);

            //delete image
            Storage::delete('public/thumbnail/'. $accomodations->thumb_img);

            //delete
            $accomodations->delete();
        //redirect to index
        return redirect()->route('admin.manage-accomodation')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function destroyMarker($id)
    {
        $markers = Marker::findOrFail($id);

            //delete image
            Storage::delete('public/thumbnail/'. $markers->image);

            //delete
            $markers->delete();
        //redirect to index
        return redirect()->route('admin.manage-tour')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
