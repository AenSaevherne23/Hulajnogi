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

Route::get('/hulajnogi', [\App\Http\Controllers\HulajnogiController::class, 'index']);
Route::post('/hulajnogi',[\App\Http\Controllers\HulajnogiController::class, 'store'])->name('hulajnogi.store');
Route::delete('/hulajnogi/{id}', [\App\Http\Controllers\HulajnogiController::class, 'destroy'])->name('hulajnogi.destroy');

