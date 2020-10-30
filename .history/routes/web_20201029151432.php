<?php

use App\Http\Controllers\LoginWithGG;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/button', function () {
//     return view('dangnhap');
// });
// Route::get('/button', [LoginWithGG::class,'getGG']);
Route::get('/login', [LoginWithGG::class, 'getlogin']);
Route::get('/admin/redirect', [LoginController::class], 'redirectToProvider');
Route::get('/admin/auth/callback', [LoginController::class], 'handleProviderCallback');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
