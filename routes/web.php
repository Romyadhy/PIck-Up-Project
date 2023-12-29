<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\birjonTesControlller;
use App\Http\Controllers\CoorController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tescontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tes', function () {
    return view('welcome');
});

// Route::get('/brodihisril', function () {
//     return view('tes.landingtes');
// });

Route::get('/birjon', [tescontroller::class, 'index']);


Route::get('/', function () {
    return view('frontpage.landing');
});

Route::get('/tesCoor', [tescontroller::class, 'tesCoor']);
Route::get('/globe', [CoorController::class, 'getCoor']);

Route::get('/landing', [LandingController::class, 'index']);
Route::get('/detail/{id}', [LandingController::class, 'show'])->name('detil.show');


Route::get('/maps', function (){
    return view('frontpage.maps');
});


Route::resource('/birjonAdmin', birjonTesControlller::class);


Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('/admin', AdminController::class);
});

Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::resource('/admin', AdminController::class);
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    // Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    // Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    // Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');

   });

require __DIR__.'/auth.php';
