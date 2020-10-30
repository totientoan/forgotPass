<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginWithGG extends Controller
{
    function getlogin(){
        return view('dangnhap');
    }
    function getgg(){
        return view('gg');
    }
}
