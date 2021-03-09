<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloai;
use App\Models\sanpham;
use Redirect;
use Cart;

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

    public function themgiohang(Request $rq)
    {
        $id = $rq->idsanpham;
        $soluong = $rq->soluong;
        $sanpham = sanpham::where('id','=',$id)->first();
        $data['id'] = $id;
        $data['quantity'] = $soluong;
        $data['name'] = $sanpham->tensanpham;
        $data['price'] = (int)$sanpham->gia;
        $data['attributes']['image'] = $sanpham->hinhanh;

        Cart::add($data);
        //$content = Cart::getcontent();
        //dd($content);
        return redirect::to('giohang');
    }

    public function giohang()
    {
        $content = Cart::getContent();
        return view('frontend.sanpham.giohang',['content'=>$content]);
    }

    public function capnhatsoluong(Request $rq)
    {
        
        Cart::update($rq->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $rq->qty
                ),
              ));
    }

    public function xoasanpham($id)
    {
        Cart::remove($id);
        return redirect::to('giohang');
    }

    public function thanhtoan()
    {
        $content = Cart::getContent();
        return view('frontend.sanpham.thanhtoan',['content'=>$content]);
    }
}
