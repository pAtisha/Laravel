<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function contact()
    {
        return view('tickets.create');
    }
    public function about()
    {
        return view('about');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function login()
    {
        return view('auth.login');
    }

}
