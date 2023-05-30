<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\PlacowkiController;
use App\Http\Controllers\UserController;


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


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/placowki', [PlacowkiController::class, 'index'])->name('placowki.index');
    Route::post('/placowki', [PlacowkiController::class, 'store'])->name('placowki.store');
    Route::put('/placowki/{placowka}', [PlacowkiController::class, 'update'])->name('placowki.update');
    Route::delete('/placowki/{placowka}', [PlacowkiController::class, 'destroy'])->name('placowki.destroy');

    Route::get('/pracownicy', [UserController::class, 'index'])->name('pracownicy.index');
    Route::get('/pracownicy/create', [UserController::class, 'create'])->name('pracownicy.create');
    Route::post('/pracownicy', [UserController::class, 'store'])->name('pracownicy.store');
    Route::get('/pracownicy/{user}/edit', [UserController::class, 'edit'])->name('pracownicy.edit');
    Route::put('/pracownicy/{id}', [UserController::class,'update'])->name('pracownicy.update');
    Route::put('/employees/{employee}',[UserController::class,'update'])->name('employees.update');
    Route::put('/employees/{employee}',[UserController::class,'update'])->name('employees.update');
    Route::put('/admins/{admin}', [UserController::class,'update'])->name('admins.update');
    Route::put('/clients/{id}', [UserController::class,'update'])->name('clients.update');


    Route::delete('/pracownicy/{user}', [UserController::class, 'destroy'])->name('pracownicy.destroy');
  
  	Route::get('/hulajnogi', [\App\Http\Controllers\HulajnogiController::class, 'index']);
	Route::post('/hulajnogi',[\App\Http\Controllers\HulajnogiController::class, 'store'])->name('hulajnogi.store');
	Route::delete('/hulajnogi/{id}', [\App\Http\Controllers\HulajnogiController::class, 'destroy'])->name('hulajnogi.destroy');
	Route::put('/hulajnogi/{hulajnoga}', [\App\Http\Controllers\HulajnogiController::class, 'update'])->name('hulajnogi.update');
  
	Route::get('/klienci', [\App\Http\Controllers\KlienciController::class, 'index']);
	Route::post('/klienci',[\App\Http\Controllers\KlienciController::class, 'store'])->name('klienci.store');
	Route::delete('/klienci/{id}', [\App\Http\Controllers\KlienciController::class, 'destroy'])->name('klienci.destroy');
	Route::put('/klienci/{klient}', [\App\Http\Controllers\KlienciController::class, 'update'])->name('klienci.update');
});