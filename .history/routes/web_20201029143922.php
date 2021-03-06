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
//     return view('LoginWithGG');
// });
// Route::get('/button', [LoginWithGG::class,'getGG']);
Route::get('/login', 'LoginWithGG@getlogin');
Route::get('/redirect', 'LoginController@redirectToProvider');
Route::get('auth/callback', 'LoginController@handleProviderCallback');

