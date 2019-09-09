@extends('layouts.header_3')
@section('content')
    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <ul class="horz-menu center-menu">
                    <li class="active"><span><a href="checkout">Billing & Shipping</a></span></li>
                    <li><span><a>Order info</a></span></li>
                    <li><span><a>Payment info</a></span></li>
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
                        <h1>Enter billing & shipping</h1>
                        <h2>Details</h2>
                    </header>
                    <hr class="space-40" />
                    <!-- Form start -->
                    <form method="POST" action="{{lang_url('checkout_order')}}" id="set-order">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="first_name" value="" placeholder="{{__('public_pages.name')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="last_name" value="" placeholder="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="email" value="" placeholder="{{__('public_pages.email_address')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="phone" value="" placeholder="{{__('public_pages.phone')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" name="address" placeholder="{{__('public_pages.address')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <input name="city" value="" type="text" placeholder="{{__('public_pages.city')}}">
                            </div>
                            <div class="col-sm-6">
                                <input name="post_code" value="" type="text" placeholder="{{__('public_pages.post_code')}}">
                            </div>
                        </div>
                        <textarea name="notes" placeholder="{{__('public_pages.notes')}}" rows="4"></textarea>
                        <div class="row">
                            <div class="col-sm-12 btn-wrap">
                                <a href="cart" class="btn btn-grey"><span>Back to cart</span></a> <button class="btn btn-default" type="submit">Next</button>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
            </div>
        </div>
    </div>
@endsection
