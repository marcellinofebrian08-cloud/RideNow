<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RideOrderController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DineInController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginPage']); //untuk menghubungkan ke loginpage

Route::get('/register', [AuthController::class, 'registerPage']); //untuk menghubungkan ke registerpage

Route::post('/login', [AuthController::class, 'login']); //untuk memproses data login

Route::post('/register', [AuthController::class, 'register']); //untuk memproses data register

Route::get('/home', [AuthController::class, 'home']); // untuk menghubungkan ke home

Route::get('/ride', [RideOrderController::class, 'orderCreate']); //halaman untuk order bike/mobil

Route::post('/ride', [RideOrderController::class, 'orderStore']); //proses menyimpan data order bike/mobil ke dalam database

Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index'); //Untuk meenghubungkan ke Wallet

Route::post('/wallet/topup', [WalletController::class, 'topup'])->name('wallet.topup'); //Untuk Topup ke wallet

Route::get('/dinein', [DineInController::class, 'index']);//untuk menghubungkan ke dine in

Route::get('/booking/{id}', [DineInController::class, 'bookingForm']);//untuk menghubungkan booking di dinein

Route::post('/booking/store', [DineInController::class, 'bookingStore']);//menyimpan data booking ke database bookingStore

Route::get('/dinein/category/{id}',[DineInController::class, 'category']);//fitur kategori