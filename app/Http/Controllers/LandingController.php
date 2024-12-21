<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    function index(){
        return view('frontpage.landingpage');
    }

    function formlogin(){
        return view('frontpage.formlogin');
    }

    function formdaftar(){
        return view('frontpage.formdaftar');
    }

    function Testing(){
        return view('frontpage.testing');
    }
}
