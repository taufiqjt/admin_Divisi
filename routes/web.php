<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    
// });

Route::get('/', ['middleware' => 'guest', function()
{
    return view('auth.login');
}]);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    //home route
    Route::get('/home', [HomeController::class, 'index']);

    //pelanggan route
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/search', [PelangganController::class, 'search']);
    Route::post('/pelanggan/insertpelanggan', [PelangganController::class, 'insert']);
    Route::post('/pelanggan/editpelanggan', [PelangganController::class, 'edit']);
    Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'delete']);

    //profile route
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/editnama', [ProfileController::class, 'editnama']);
    Route::post('/profile/editusername', [ProfileController::class, 'editusername']);
    Route::post('/profile/editpassword', [ProfileController::class, 'editpassword']);
}); 

Route::middleware('auth')->group(function () {
    
}); 
