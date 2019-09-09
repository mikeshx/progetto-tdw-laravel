@extends('layouts.header_3')
@section('content')
    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <ul class="horz-menu center-menu">
                    <li><span><a href="checkout">Billing & Shipping</a></span></li>
                    <li><span><a href="checkout">Order info</a></span></li>
                    <li class="active"><span><a>Payment info</a></span></li>
                    <li><span><a>Order completed</a></span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid white section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <header class="centred">
                        <h1>Enter</h1>
                        <h2>{{__('public_pages.payment_type')}}</h2>
                    </header>
                    <hr class="space-40" />

                    <form method="POST" action="{{lang_url('checkout_ord')}}" id="set-order">
                        {{ csrf_field() }}
                        <input type="hidden" name="first_name" value="{{$first_name}}">
                        <input type="hidden" name="last_name" value="{{$last_name}}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <input type="hidden" name="phone" value="{{$phone}}">
                        <input type="hidden" name="address" value="{{$address}}">
                        <input name="city" value="" type="hidden" value="{{$city}}">
                        <input name="post_code" value="" type="hidden" value="{{$post_code}}">
                        <textarea type="hidden" name="notes" value="{{$notes}}" ></textarea>
                        <input type="hidden" name="total_price" value="{{$total_price}}">
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
                        @endforeach
                        @php
                         }
                        @endphp

                        <div class="check-option">
                            <input type="checkbox" name="payment_type" value="cash_on_delivery" checked> <strong>{{__('public_pages.cash_on_delivery')}}</strong>
                            <blockquote>Cash payment upon delivery</blockquote>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 btn-wrap">
                                <a href="checkout" class="btn btn-grey"><span>Back</span></a> <button class="btn btn-default" type="submit">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection