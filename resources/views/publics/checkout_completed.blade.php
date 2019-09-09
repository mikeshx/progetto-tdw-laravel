@extends('layouts.header_3')
@section('content')
    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <ul class="horz-menu center-menu">
                    <li><span><a href="checkout">Billing & Shipping</a></span></li>
                    <li><span><a>Order info</a></span></li>
                    <li><span><a>Payment info</a></span></li>
                    <li class="active"><span><a>Order completed</a></span></li>
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
                        <h1>Order</h1>
                        <h2>Completed</h2>
                    </header>
                    <hr class="space-40" />
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Your order has been confirmed successfully, you can verify your orders <a href="my_orders"><span>HERE</span></a>.
                                If you need support, write <a href="support"><span>HERE</span>.
                                </a>Thank you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection