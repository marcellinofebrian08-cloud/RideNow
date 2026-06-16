<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RideOrderController;
use App\Http\Controllers\SendOrderController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DineInController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\FoodController;

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
    Route::get('/ride/ordering/{id}', [RideOrderController::class, 'orderTracking'])->name('order.tracking');
    Route::post('/ride/cancel/{id}', [RideOrderController::class, 'orderCancel'])->name('order.cancel');
    Route::post('/ride/complete/{id}', [RideOrderController::class, 'orderComplete'])->name('order.complete');

    // halaman order send
    Route::get('/send', [SendOrderController::class, 'sendCreate']);
    Route::post('/send', [SendOrderController::class, 'sendStore']);
    Route::get('/send/ordering/{id}', [SendOrderController::class, 'sendTracking'])->name('send.tracking');
    Route::post('/send/cancel/{id}', [SendOrderController::class, 'sendCancel'])->name('send.cancel');
    Route::post('/send/complete/{id}', [SendOrderController::class, 'sendComplete'])->name('send.complete');

    // halaman wallet
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/topup', [WalletController::class, 'topup'])->name('wallet.topup');
    
    // halaman dine in
    Route::get('/dinein', [DineInController::class, 'index']);
    
    //halam booking
    Route::get('/booking/{id}', [DineInController::class, 'bookingForm']);
    Route::post('/booking/store', [DineInController::class, 'bookingStore']);
    
    //fitur kategori
    Route::get('/dinein/category/{id}',[DineInController::class, 'category']);

    // Fitur History
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    });

    //Halaman Food
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/food/restaurant/{id}', [FoodController::class, 'show'])->name('food.show');
    Route::post('/food/add-to-cart/{id}', [FoodController::class, 'addToCart'])->name('food.addToCart');
    Route::get('/food/remove-item/{id}', [FoodController::class, 'removeItem'])->name('food.removeItem');
    Route::get('/food/receipt', [FoodController::class, 'showReceipt'])->name('food.showReceipt');
    Route::post('/food/checkout', [FoodController::class, 'checkout'])->name('food.checkout');
    Route::get('/food/history', [FoodController::class, 'history'])->name('food.history');
    Route::get('/food/clear-cart', [FoodController::class, 'clearCart'])->name('food.clearCart');

    //Halaman Mart
    Route::get('/mart', [MartController::class, 'index'])->name('mart.index');
    Route::get('/mart/category/{id}', [MartController::class, 'showCategory'])->name('mart.showCategory');
    Route::post('/mart/add-to-cart/{id}', [MartController::class, 'addToCart'])->name('mart.addToCart');
    Route::get('/mart/remove-item/{id}', [MartController::class, 'removeItem'])->name('mart.removeItem');
    Route::get('/mart/receipt', [MartController::class, 'showReceipt'])->name('mart.showReceipt');
    Route::post('/mart/checkout', [MartController::class, 'checkout'])->name('mart.checkout');
    Route::get('/mart/history', [MartController::class, 'history'])->name('mart.history');
    Route::get('/mart/clear-cart', [MartController::class, 'clearCart'])->name('mart.clearCart');