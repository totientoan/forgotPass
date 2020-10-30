<?php

use App\Http\Controllers\LoginWithGG;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/button', function () {
//     return view('dangnhap');
// });
// Route::get('/button', [LoginWithGG::class,'getGG']);
Route::get('/login', [LoginWithGG::class, 'getlogin']);
Route::get('/gg', [LoginWithGG::class, 'getgg']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::post('getForgotPassword', [ResetPasswordController::class, 'getForgotPassword']);

Route::post('/resetpassword', [ResetPasswordController::class, 'sendMail']);
Route::put('reset-password/{token}', [ResetPasswordController::class, 'reset']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
