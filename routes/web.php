<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoorController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('frontpage.index');
});

Route::get('/globe', [CoorController::class, 'getCoor']);

Route::get('/maps', function (){
    return view('frontpage.maps');
});


// Route::get('/dashboard', function () {
//     return view('backpage.admin');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/admin', AdminController::class);
});

require __DIR__.'/auth.php';
