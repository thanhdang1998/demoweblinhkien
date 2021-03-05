<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloai;
use App\Models\sanpham;

class SanphamController extends Controller
{
    public function sanpham()
    {
        $theloai = theloai::all();
        $sanpham = sanpham::all();
        return view('frontend.sanpham.sanpham',['theloai'=>$theloai,'sanpham'=>$sanpham]);
    }
    
    public function chitietsanpham($id)
    {
        $theloai = theloai::all();
        $sanpham = sanpham::where('id','=',$id)->first();
        return view('frontend.sanpham.chitietsanpham',['theloai'=>$theloai,'sanpham'=>$sanpham]);
    }
}
