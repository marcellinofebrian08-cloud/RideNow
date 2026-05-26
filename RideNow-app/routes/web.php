<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RideOrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginPage']); //untuk menghubungkan ke loginpage

Route::get('/register', [AuthController::class, 'registerPage']); //untuk menghubungkan ke registerpage

Route::post('/login', [AuthController::class, 'login']); //untuk memproses data login

Route::get('/ride', [RideOrderController::class, 'orderCreate']); //halaman untuk order bike/mobil

Route::post('/ride', [RideOrderController::class, 'orderStore']); //proses menyimpan data order bike/mobil ke dalam database