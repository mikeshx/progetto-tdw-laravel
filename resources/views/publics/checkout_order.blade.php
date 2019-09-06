@extends('layouts.header_3')
@section('content')
    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <ul class="horz-menu center-menu">
                    <li><span><a href="checkout">Billing & Shipping</a></span></li>
                    <li class="active"><span><a href="">Order info</a></span></li>
                    <li><span><a href="">Payment info</a></span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid white section checkout">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <header class="centred">
                        <h1>Current</h1>
                        <h2>Order info</h2>
                    </header>
                    <hr class="space-40" />

                    <form method="POST" action="{{lang_url('checkout')}}" id="set-order">
                        {{ csrf_field() }}
                        @php
                            $sum = $sum_total = 0;
                            if(!empty($cartProducts)) {
                            $sum = 0;
                        @endphp
                        @foreach($cartProducts as $cartProduct)
                            @php
                                $sum_total += $cartProduct->num_added * (float)$cartProduct->price;
                                $sum = $cartProduct->num_added * (float)$cartProduct->price;
                            @endphp
                            <input name="id[]" value="{{$cartProduct->id}}" type="hidden">
                            <input name="quantity[]" value="{{$cartProduct->num_added}}" type="hidden">

                            <div class="row item">
                                <div class="col-sm-2 matchHeight">
                                    <img src="{{asset('../storage/app/public/'.$cartProduct->image)}}" alt="No IMG" />
                                </div>
                                <div class="col-sm-5 matchHeight">
                                    <header class="alignMiddle">
                                        <h2>{{$cartProduct->name}}</h2>
                                        <span></span>
                                    </header>
                                </div>
                                <div class="col-sm-4 matchHeight">
                                    <div class="quantity alignMiddle">
                                        <input disabled="" type="text" value="{{$cartProduct->num_added}}">
                                    </div>
                                </div>
                                <div class="col-sm-1 matchHeight">
                                    <span class="price alignMiddle">&dollar;{{$cartProduct->num_added}} x {{$cartProduct->price}} = {{$sum}}</span>
                                </div>
                            </div>
                        @endforeach
                        @php
                        }
                        @endphp

                    </form>


                    <div class="row">
                        @if(session()->has('discount_value'))
                            @php
                                $percentage_value = (session('discount_value') / 100) * $sum_total
                            @endphp
                            <div class="col-sm-6 total final-total">
                                <p>Coupon applied, discount value: - {{session('discount_value')}}%</p>
                                <p>{{__('public_pages.sum_for_pay_discount')}} <span>{{$sum_total - $percentage_value }}</span></p>
                            </div>
                            <input type="hidden" name="total_price" value="{{$sum_total - $percentage_value}}">
                        @else
                            <div class="col-sm-6 total final-total">
                                <p>{{__('public_pages.sum_for_pay')}} <span>{{ $sum_total }}</span></p>
                            </div>
                            <input type="hidden" name="total_price" value="{{$sum_total}}">
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-sm-6 promo">
                            <form action = "coupon.apply" method="POST">
                                {{ csrf_field() }}
                                <input type="text" placeholder="Coupon" name="coupon_string"> <button class="btn btn-default">Apply</button>
                            </form>
                        </div>

                        <div class="col-sm-12 btn-wrap">
                            <a href="checkout" class="btn btn-grey"><span>Back</span></a> <a href="checkout-5.html" class="btn btn-default"><span>Next</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection