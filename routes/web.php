<?php

use App\Models\Marker;
use App\Models\Category;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\IsSuperAdmin;
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
    // Route::resource('/markers',\App\Http\Controllers\adminController::class);
    Route::get('/tour-management', [adminController::class, 'view3DTourManagement'])->name('manage-tour');
    Route::get('/detail-marker', [adminController::class, 'detailMarker'])->name('detail-marker');
    Route::post('/create-marker', [adminController::class, 'createMarker'])->name('create-marker');
});

Route::middleware([IsSuperAdmin::class])->prefix('/manage')->name('manage.')->group(function () {
    Route::get('/categories',[SuperAdminController::class, 'showManageCategories'])->name('categories');
    Route::post('/create-categories',[SuperAdminController::class, 'createCategories'])->name('create-categories');
    Route::get('/accounts', [SuperAdminController::class, 'showManageAccount'])->name('accounts');
    Route::post('/create-user', [SuperAdminController::class, 'addUser'])->name('create-user');
});

require __DIR__.'/auth.php';
