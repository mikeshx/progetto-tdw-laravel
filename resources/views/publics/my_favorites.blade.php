@extends('layouts.header_1')

@section('content')

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="horz-menu">
                        <li><span><a href="{{ lang_url('products') }}">All</a></span></li>
                        @if (Auth::check())
                            <li class="active"><span><a href="{{ lang_url('my_favorites') }}">My Favorites</a></span></li>
                        @endif
                        <li><span><a href="{{ lang_url('category') }}">Categories</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Section -->
    <div class="container-fluid light section no-padding">
        <div class="row">
            @forelse ($favorites as $favorite)
                <div class="col-sm-4 product-wrapper">
                    <div class="product">
                        <a href="{{ lang_url($favorite->url) }}">
                            <span>Select product</span>
                            <img src="{{asset('../storage/app/public/'.$favorite->image)}}" alt="{{ $favorite->name }}">
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-xs-12">
                    <div class="alert alert-danger">No Favorites</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection