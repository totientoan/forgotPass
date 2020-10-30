<?php

namespace App\Http\Controllers;

use Laravel\Socialite\SocialiteServiceProvider;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    // use AuthenticatesUsers;
    /**
  * Redirect the user to the Google authentication page.
  *
  */
public function redirectToProvider()
{
    return Socialite::driver('google')->redirect();
}
}
