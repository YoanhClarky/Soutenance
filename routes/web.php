<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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


Route::get('/api','App\Http\Controllers\AccueilController@api');
Route::get('/','App\Http\Controllers\AccueilController@index');
Route::get('/liste','App\Http\Controllers\AccueilController@liste');
Route::get('/stores','App\Http\Controllers\LocationController@index')->name('stores');
Route::post('/store','App\Http\Controllers\LocationController@store')->name('store');
Route::get('/cycles','App\Http\Controllers\CycleController@index');
Route::post('/cycles/save','App\Http\Controllers\CycleController@store');
Route::get('/cycles/{id}','App\Http\Controllers\CycleController@show');
Route::get('/cycles/delete/{id}','App\Http\Controllers\CycleController@delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
