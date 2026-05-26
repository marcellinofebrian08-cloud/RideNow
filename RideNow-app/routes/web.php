<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginPage']); //untuk menghubungkan ke loginpage

Route::get('/register', [AuthController::class, 'registerPage']); //untuk menghubungkan ke registerpage

Route::post('/login', [AuthController::class, 'login']); //untuk memproses data login