<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexPage()
    {
        return view('home.index');
    }

    public function contactPage()
    {
        return view('home.contact');
    }
}
