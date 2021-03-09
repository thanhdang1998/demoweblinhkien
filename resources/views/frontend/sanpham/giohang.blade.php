@extends('frontend.index')
@section('noidung')

 <!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <span>giohang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    {{csrf_field()}}
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th><i class="fa fa-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $c)
                                    <tr>
                                        <td class="cart-pic first-row"><img src="{{$c->attributes->image}}" height="170px" width="170px" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5>{{$c->name}}</h5>
                                        </td>
                                        <td class="p-price first-row">{{number_format($c->price,0)}} VND</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <input type="number" class="pro-qty qty" name="soluong" id="{{$c->id}}" style="text-align: center;" value="{{$c->quantity}}" min="1" max="100">
                                            </div>
                                        </td>
                                        <td class="total-price first-row">{{number_format($c->price * $c->quantity,0)}} VND</td>
                                        <td class="close-td first-row"><a href="{{route('xoasanpham',$c->id)}}"><i class="fa fa-close"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Mã giảm giá</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tạm tính <span>{{number_format(Cart::getSubtotal(),0)}} VND</span></li>
                                    <li class="cart-total">Tổng tiền <span>{{number_format(Cart::getTotal(),0)}} VND</span></li>
                                </ul>
                                <a href="{{URL('thanhtoan')}}" class="proceed-btn">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="public/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="public/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="public/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="public/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="public/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->
@endsection


@section('script')
<script>
    $(document).ready(function(){
        $(".qty").change(function(){
    		var id = $(this).attr('id');
    		var qty = $(this).val();
    		var _token = $('input[name="_token"]').val();
    		/* alert(id);
    		alert(qty);
    		alert(_token); */

            $.ajax({
    			type:'POST',
    			cache: false,
    			url:"{{ route('capnhatsoluong') }}",
    			data:{
    				id:id,_token:_token,qty:qty
    			},
    			success:function(data){
                    location.reload();
               }
    		});
    	});
    });
</script>
@endsection