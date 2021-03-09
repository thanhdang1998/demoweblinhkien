<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class TintucController extends Controller
{
    public function tintuc()
    {
        $tintucmoinhat = blog::limit(2)->latest()->get();
        $tintuc = blog::limit(6)->latest()->get();
        return view('frontend.tintuc.tintuc',['tintuc'=>$tintuc,'tintucmoinhat'=>$tintucmoinhat]);
    }

    public function chitiettintuc($id)
    {
        $tintuc = blog::where('id','=',$id)->first();
        return view('frontend.tintuc.chitiettintuc',['tintuc'=>$tintuc]);
    }
}
