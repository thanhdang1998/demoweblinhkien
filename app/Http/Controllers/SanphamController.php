<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloai;

class SanphamController extends Controller
{
    public function sanpham()
    {
        $theloai = theloai::all();
        return view('frontend.sanpham.sanpham',['theloai'=>$theloai]);
    }
    
}
