@extends('layouts.header_1')

<!-- Dynamic content of the website-->
@section('content')

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="horz-menu">
                        <li class="active"><span><a href="#">All</a></span></li>
                        <li><span><a href="#">Latest</a></span></li>
                        <li><span><a href="#">My Favorites</a></span></li>
                        <li><span><a href="#">Categories</a></span></li>
                        <li><span><a href="#">Sale</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="container-fluid light section no-padding">
        <div class="row">

            @php
                if(!$products->isEmpty()) {
            @endphp
            @foreach ($products as $product)

                <div class="col-sm-4 product-wrapper">
                    <div class="product">
                        <a href="{{ lang_url($product->url) }}">
                            <span>More info</span>
                            <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}" alt="Beer can mockup">
                        </a>
                        <h3>{{$product->name}}</h3>
                        <h4>&euro;{{$product->price}}</h4>

                        @php
                            if($product->link_to != null) {
                        @endphp
                        <a href="{{lang_url($product->url)}}" class="buy-now" title="{{$product->name}}">{{__('public_pages.buy')}}</a>
                        @php
                            } else {
                        @endphp
                        <a href="{{url('addFavorite/'.$product->id)}}" class="btn btn-primary" >Add/remove favorite</a>
                        <a href="javascript:void(0);" data-product-id="{{$product->id}}" class="buy-now to-cart">{{__('public_pages.buy')}}</a>
                        @php
                            }
                        @endphp

                    </div>
                </div>

            @endforeach
            @php
                } else {
            @endphp
            <div class="col-xs-12">
                <div class="alert alert-danger">{{__('public_pages.no_products')}}</div>
            </div>
            @php
                }
            @endphp

        </div>
    </div>
@endsection
