@extends('layouts.header_3')
@section('content')
    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <span class="title">{{__('public_pages.product')}}t</span>
                </div>
                <div class="col-sm-3">
                    <span class="title">{{__('public_pages.quantity')}}</span>
                </div>
                <div class="col-sm-2">
                    <span class="title">{{__('public_pages.delete')}}</span>
                </div>
                <div class="col-sm-1">
                    <span class="title">{{__('public_pages.total')}}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid white section cart">
        <div class="container">
            <form method="POST" action="{{lang_url('checkout')}}" id="set-order">
             {{ csrf_field() }}
            @php
                $sum = $sum_total = 0;
                if(!empty($cartProducts)) {
                $sum = 0;
            @endphp
            <div class="products-for-checkout">
                @foreach($cartProducts as $cartProduct)
                    @php
                        $sum_total += $cartProduct->num_added * (float)$cartProduct->price;
                        $sum = $cartProduct->num_added * (float)$cartProduct->price;
                    @endphp
                    <div class="row item">

                        <input name="id[]" value="{{$cartProduct->id}}" type="hidden">

                        <div class="col-sm-2 matchHeight">
                            <img src="{{asset('../storage/app/public/'.$cartProduct->image)}}" alt="Beer can mockup" />
                        </div>
                        <div class="col-sm-4 matchHeight">
                            <header class="alignMiddle">
                                <h2>{{$cartProduct->name}}</h2>
                                <span></span>
                            </header>
                        </div>
                        <div class="col-sm-3 matchHeight">
                            <div class="quantity alignMiddle">
                                <i class="fa fa-chevron-down" onclick="removeQuantity({{$cartProduct->id}})" ></i>
                                <input name="quantity[]" value="{{$cartProduct->num_added}}" type="text">
                                <i class="fa fa-chevron-up" onclick="addProduct({{$cartProduct->id}})" ></i>
                            </div>
                        </div>
                        <div class="col-sm-2 matchHeight">
                            <a href="javascript:void(0);" onclick="removeProduct({{$cartProduct->id}})" class="removeProduct remove alignMiddle fa fa-remove"></a>
                        </div>
                        <div class="col-sm-1 matchHeight">
                            <span class="price alignMiddle">&dollar;{{$cartProduct->num_added}} x {{$cartProduct->price}} = {{$sum}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            @php
             }
            @endphp

            <div class="row">
                <div class="col-sm-6 promo">
                    <input type="text" value="Coupon" name="promo"> <a href="#" class="btn btn-default"><span>Apply</span></a>
                </div>

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
                <div class="col-sm-12 btn-wrap">
                    <a href="checkout-1.html" class="btn btn-default"><span>{{__('public_pages.continue_to_checkout')}}</span></a>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection