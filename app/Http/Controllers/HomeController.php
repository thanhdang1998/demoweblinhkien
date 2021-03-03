<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function trangchu()
    {
        return view('frontend.trangchu.trangchu');
    }
}
