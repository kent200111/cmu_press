<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

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
Route::get('/manage_masterlist', function () {
    return view('instructional_materials.manage_masterlist');
})->name('manage_masterlist');
Route::get('/manage_batches', function () {
    return view('instructional_materials.manage_batches');
})->name('manage_batches');
Route::get('/manage_categories', function () {
    return view('instructional_materials.manage_categories');
})->name('manage_categories');
Route::get('/manage_employees', function () {
    return view('employee_management.manage_employees');
})->name('manage_employees');
Route::resource('authors', AuthorController::class);