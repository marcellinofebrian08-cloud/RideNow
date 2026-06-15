<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RideOrderController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DineInController;

// halaman awal langsung diarahkan ke login
Route::get('/', function () {
    return redirect('/login');
});
// halaman login
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// halaman register
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    //halaman home
    Route::get('/home', [AuthController::class, 'home']);

    //halaman edit profile
    Route::get('/edit-profile', [AuthController::class, 'editProfile']);
    Route::post('/edit-profile', [AuthController::class, 'updateProfile']);

    // halaman change password
    Route::get('/change-password', [AuthController::class, 'changePasswordPage']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);

    // halaman logout
    Route::get('/logout', [AuthController::class, 'logout']);

    // halaman order ride (motor/mobil)
    Route::get('/ride', [RideOrderController::class, 'orderCreate']);
    Route::post('/ride', [RideOrderController::class, 'orderStore']);

    // halaman wallet
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/topup', [WalletController::class, 'topup'])->name('wallet.topup');

    // halaman dine in
    Route::get('/dinein', [DineInController::class, 'index']);

    //halam booking
    Route::get('/booking/{id}', [DineInController::class, 'bookingForm']);
    Route::post('/booking/store', [DineInController::class, 'bookingStore']);

    //fitur kategori
    Route::get('/dinein/category/{id}', [DineInController::class, 'category']);

    //transit
    Route::get('/transit', [TransitController::class, 'index']);

    //booking transit
    Route::get('/transit/booking/{id}', [TransitController::class, 'bookingForm']);
    Route::post('/transit/booking/store', [TransitController::class, 'bookingStore']);
});
