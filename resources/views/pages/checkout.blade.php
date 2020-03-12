@extends('layouts.main')
@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(frontend/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <form action="{{route('checkout')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-page-heading mb-30">
                            <h5>Thông tin giao hàng</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Họ và tên <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" name="name" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Giới tính <span>*</span></label>
                                <input type="text" class="form-control" id="last_name" name="gender" value="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Địa chỉ <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="street_address" name="address" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Số điện thoại <span>*</span></label>
                                <input type="tel" class="form-control" id="phone_number" name="phone" value="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email <span>*</span></label>
                                <input type="email" class="form-control" id="email_address" name="email" value="">
                            </div>
                            <div class="col-12 mb-3">
                                    <label for="street_address">Ghi chú </label>
                                    <input type="text-area" class="form-control mb-3" id="note" name="note" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Đơn hàng của bạn</h5>
                        </div>
                        @if (Session::has('cart'))
                            @foreach ($cart->items as $product)
                                <ul class="order-details-form mb-4">
                                    <li><img src="/frontend/img/products/{{$product['item']['image']}}" alt=""></li>                        
                                    <li>Sản phảm: {{$product['item']['name']}}</li>
                                    <li>Số lượng: {{$product['quantity']}}</li>
                                    <li>Tổng giá: {{$product['price']}}</li>
                                </ul>
                            @endforeach
                        @endif
                        <h3><span>Total:</span> 
                        <span>
                            @if (Session::has('cart'))
                                {{Session('cart')->totalPrice}}
                            @endif
                        </span></h3>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                                        <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Được phép kiểm tra hàng trước khi thanh toán
                                        </div>						
                                    </li>

                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
                                        <label for="payment_method_cheque">Chuyển khoản </label>
                                        <div class="payment_box payment_method_cheque">
                                            Chuyển tiền đến tài khoản sau:
                                            <br>- Số tài khoản: 123 456 789
                                            <br>- Chủ TK: Nguyễn A
                                            <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                        </div>						
                                    </li>

                                </ul>
                            </div>
                        <br>
                        <button type="submit"class="btn essence-btn">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection