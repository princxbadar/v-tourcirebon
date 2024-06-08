<?php

use App\Models\Marker;
use App\Models\Category;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [homepageController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// For all the admin accessible site
Route::middleware([isAdmin::class])->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('/markers',\App\Http\Controllers\adminController::class);
    Route::get('/tour-management', [adminController::class, 'view3DTourManagement'])->name('manage-tour');
    Route::get('/detail-marker', [adminController::class, 'detailMarker'])->name('detail-marker');
    Route::post('/create-marker', [adminController::class, 'createMarker'])->name('create-marker');
});

require __DIR__.'/auth.php';
