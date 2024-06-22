<?php

use App\Models\Marker;
use App\Models\Category;
use App\Http\Controllers\adminController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\IsSuperAdmin;
use Illuminate\Support\Facades\Route;

// Route::get('/', [welcomeController::class, 'index']);


Route::get('/', function () {
    return view('index');
});
Route::get('/homepage', [homepageController::class, 'index'])->name('homepage');

Route::get('/detail-page/{id}', [homepageController::class, 'detail'])->name('detail');


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
    Route::patch('/update-marker/{id}', [adminController::class, 'update'])->name('update-marker');
    Route::delete('/delete-marker/{id}', [adminController::class, 'destroyMarker'])->name('delete-marker');
    Route::get('/accomodation-management', [adminController::class, 'viewAccomodation'])->name('manage-accomodation');
    Route::post('/create-accomodation', [adminController::class, 'createAccomodation'])->name('create-accomodation');
    Route::patch('/update-accomodation/{id}', [adminController::class, 'updateAccomodation'])->name('update-accomodation');
    Route::delete('/delete-accomodation/{id}', [adminController::class, 'destroyAccomodation'])->name('delete-accomodation');

});

Route::middleware([IsSuperAdmin::class])->prefix('/manage')->name('manage.')->group(function () {
    Route::get('/categories',[SuperAdminController::class, 'showManageCategories'])->name('categories');
    Route::post('/create-categories',[SuperAdminController::class, 'createCategories'])->name('create-categories');
    Route::patch('/update-categories/{id}', [SuperAdminController::class, 'updateCategory'])->name('update-categories');
    Route::delete('/delete-categories/{id}', [SuperAdminController::class, 'destroyCategories'])->name('delete-categories');
    Route::get('/accounts', [SuperAdminController::class, 'showManageAccount'])->name('accounts');
    Route::post('/create-user', [SuperAdminController::class, 'addUser'])->name('create-user');
    Route::delete('/delete-user/{id}', [SuperAdminController::class, 'destroyUser'])->name('delete-user');

});

require __DIR__.'/auth.php';
