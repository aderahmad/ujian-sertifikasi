<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Authenticate;
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

Route::controller(LoginController::class)->name('login.')->prefix('login')->group(function() {
    Route::get('/', 'formLogin')->name('formLogin');
    Route::post('/processLogin', 'store')->name('processLogin');
});

Route::controller(RegisterController::class)->name('register.')->prefix('register')->group(function() {
    Route::get('/', 'formRegister')->name('formRegister');
    Route::post('/register', 'processRegister')->name('processRegister');
});

Route::controller(LogoutController::class)->name('logout.')->prefix('logout')->group(function() {
    Route::post('/', 'logout')->name('logout');
});

Route::controller(BerandaController::class)->name('beranda.')->middleware('auth')->prefix('beranda')->group(function() {
    Route::get('', 'beranda')->name('beranda');
});

Route::controller(ProdukController::class)->name('produk.')->prefix('produk')->group(function() {
    Route::get('/form-input', 'addProduct')->name('addProduct');
    Route::post('/', 'produk')->name('process');
    Route::get('/delete/{id}', 'deteleProduk')->name('deteleProduk');
    Route::get('edit-data/{id}', 'editProduct')->name('editProduct');
    Route::post('update/{id}', 'updateProduct')->name('updateProduk');
});

Route::controller(ForgotController::class)->name('forgot.')->prefix('forgot')->group(function() {
    Route::get('/', 'formLupaPw')->name('forgot');
    Route::post('/proses-forgot', 'prosesLupaPw')->name('proses-forgot');
    Route::get('/reset-password/{token}', 'resetPassword')->name('reset-password');
    Route::post('/proses-reset', 'prosesResetPassword')->name('proses-reset');
});
