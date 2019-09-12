@extends('layouts.header_1')

<!-- Dynamic content of the website-->
@section('content')

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="horz-menu">
                        <li><span><a href="{{ lang_url('products') }}">All</a></span></li>
                        <li><span><a href="#">My Favorites</a></span></li>
                        <li class="active"><span><a>Categories</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="container-fluid light section no-padding">
        <div class="row">
            @forelse ($category as $category)
                <div class="col-sm-4 product-wrapper">
                    <div class="product">
                        <a href="{{ lang_url('category/'.$category->url) }}">
                            <span>Select category</span>
                            <img src="" alt="{{$category->name}}" alt="Beer can mockup">
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-xs-12">
                    <div class="alert alert-danger">No Category</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection