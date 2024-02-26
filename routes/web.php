<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/manage_material', function () {
    return view('instructional_material.manage_material');
})->name('manage_material');

Route::get('/manage_batches', function () {
    return view('instructional_material.manage_batches');
})->name('manage_batches');

Route::get('/manage_author', function () {
    return view('instructional_material.manage_author');
})->name('manage_author');

Route::get('/manage_category', function () {
    return view('instructional_material.manage_category');
})->name('manage_category');