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
    return view('auth.login');
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
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');
    Route::put('/employees/{employee}',[UserController::class,'update'])->name('employees.update');
    Route::put('/employees/{employee}',[UserController::class,'update'])->name('employees.update');

    Route::put('/admins/{admin}', [UserController::class,'update'])->name('admins.update');
    Route::put('/clients/{id}', [UserController::class,'update'])->name('clients.update');


    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/hulajnogi', [\App\Http\Controllers\HulajnogiController::class, 'index'])->name('hulajnogi.index');
	Route::post('/hulajnogi',[\App\Http\Controllers\HulajnogiController::class, 'store'])->name('hulajnogi.store');
	Route::delete('/hulajnogi/{id}', [\App\Http\Controllers\HulajnogiController::class, 'destroy'])->name('hulajnogi.destroy');
	Route::put('/hulajnogi/{hulajnoga}', [\App\Http\Controllers\HulajnogiController::class, 'update'])->name('hulajnogi.update');

    Route::get('/kierownicy', [\App\Http\Controllers\KlienciController::class, 'index'])->name('kierownicy.index');
    Route::post('/kierownicy',[\App\Http\Controllers\KlienciController::class, 'store'])->name('kierownicy.store');
    Route::delete('/kierownicy/{id}', [\App\Http\Controllers\KlienciController::class, 'destroy'])->name('kierownicy.destroy');
    Route::put('/kierownicy/{kierownicy}', [\App\Http\Controllers\KlienciController::class, 'update'])->name('kierownicy.update');

	Route::get('/klienci', [\App\Http\Controllers\KlienciController::class, 'index'])->name('klienci.index');
	Route::post('/klienci',[\App\Http\Controllers\KlienciController::class, 'store'])->name('klienci.store');
	Route::delete('/klienci/{id}', [\App\Http\Controllers\KlienciController::class, 'destroy'])->name('klienci.destroy');
	Route::put('/klienci/{klient}', [\App\Http\Controllers\KlienciController::class, 'update'])->name('klienci.update');


    Route::get('/rewizje', [\App\Http\Controllers\RewizjeController::class, 'index'])->name('rewizje.index');
    Route::post('/rewizje', [\App\Http\Controllers\RewizjeController::class, 'store'])->name('rewizje.store');
    Route::put('/rewizje/{rewizja}', [\App\Http\Controllers\RewizjeController::class, 'update'])->name('rewizje.update');
    Route::delete('/rewizje/{rewizja}', [\App\Http\Controllers\RewizjeController::class, 'destroy'])->name('rewizje.destroy');

    Route::get('/wypozyczenia', [\App\Http\Controllers\WypozyczeniaController::class, 'index'])->name('wypozyczenia.index');
    Route::post('/wypozyczenia', [\App\Http\Controllers\WypozyczeniaController::class, 'store'])->name('wypozyczenia.store');
    Route::put('/wypozyczenia/{wypozyczenia}', [\App\Http\Controllers\WypozyczeniaController::class, 'update'])->name('wypozyczenia.update');
    Route::delete('/wypozyczenia/{wypozyczenia}', [\App\Http\Controllers\WypozyczeniaController::class, 'destroy'])->name('wypozyczenia.destroy');
});
