@extends('layouts.header_1')

@section('content')
    <!-- Dynamic content of the website-->

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="row">
            <div class="col-sm-3 col-xs-6 icon-grid">
                <img src="images/Hops.svg" class="svg" alt="Quality Ingredients" />
                <h4>All natural</h4>
                <p>@isset($carousel) {{$carousel->text_container_1}} @endisset</p>
            </div>
            <div class="col-sm-3 col-xs-6 icon-grid">
                <img src="images/Mill.svg" class="svg" alt="Quality Ingredients" />
                <h4>MAde in the UK</h4>
                <p>@isset($carousel) {{$carousel->text_container_2}} @endisset</p>
            </div>
            <div class="col-sm-3 col-xs-6 icon-grid">
                <img src="images/3DSixPack.svg" class="svg" alt="Quality Ingredients" />
                <h4>Huge variety</h4>
                <p>@isset($carousel) {{$carousel->text_container_3}} @endisset</p>
            </div>
            <div class="col-sm-3 col-xs-6 icon-grid">
                <img src="images/Pint.svg" class="svg" alt="Quality Ingredients" />
                <h4>Stocked locally</h4>
                <p>@isset($carousel) {{$carousel->text_container_4}} @endisset</p>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid light section">
        <div class="row">
            <div id="carousel-1" class="carousel slide carousel-fade bs-carousel our-beers" data-ride="carousel">

                <div class="carousel-inner" role="listbox">

                @php
                    if(!$products->isEmpty()) {
                    $active = 1;
                @endphp

                    @foreach ($products as $product)
                    <!-- Slide 2 -->

                        @php if ($active == 1) { @endphp
                            <div class="item-active">
                        @php $active--; } else { @endphp
                                <div class="item">
                                    @php } @endphp
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5 matchHeight">
                                    <img src="../public/img/copertina_4.jpg" alt="About our Brewery" class="alignMiddle" />
                                </div>
                                <div class="col-sm-6 col-sm-push-1 matchHeight">
                                    <section class="alignMiddle mobile-center">
                                        <header>
                                            <h1>beer_type</h1>
                                            <h2>{{$product->name}}</h2>
                                        </header>
                                        <p>{{$product->description}}</p>
                                        <a href="{{$product->url}}" class="btn btn-default"><span>Go to shop</span></a>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @php
                    } else {
                    @endphp

                    <div class="col-xs-12">
                        <div class="alert alert-danger">{{__('public_pages.no_products')}}</div>
                    </div>
                    @php } @endphp


                </div>

                <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-1" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid dark section" style="background-image: url(../public/img/block-bg-3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 matchHeight scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-75">
                    <div class="alignMiddle mobile-center">
                        <header>
                            <h1>Check out more of our</h1>
                            <h2>Our stock</h2>
                        </header>
                        <p>@isset($carousel) {{$carousel->slider_1}} @endisset</p>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-push-1 matchHeight">
                    <div class="owl-carousel">

                    @php
                        if(!$products->isEmpty()) {
                    @endphp

                        @foreach ($products as $product)
                        <!-- Products -->
                        <div class="product item">
                            <a href="{{$product->url}}">
                                <span>Buy it</span>
                                <img src="{{asset('../storage/app/public/'.$product->image)}}" alt="Beer can mockup">
                            </a>
                            <h3>{{$product->name}}</h3>
                            <h4>{{$product->alchool}}%</h4>
                        </div>
                        @endforeach

                    @php
                        } else {
                    @endphp

                        <div class="col-xs-12">
                            <div class="alert alert-danger">{{__('public_pages.no_products')}}</div>
                        </div>

                    @php } @endphp



                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Section -->
        <div class="container-fluid light section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 matchHeight">
                        <section class="alignMiddle mobile-center">
                            <header>
                                <h1>Take a look at our</h1>
                                <h2>Numbers</h2>
                            </header>
                        </section>
                    </div>
                    <div class="col-sm-9 matchHeight">
                        <div class="owl-carousel" id="partners">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Section -->
    <div class="container-fluid super-dark section">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="../public/new_template/images/Can.svg" class="svg" alt="" />
                        <span>@isset($carousel) {{$carousel->counter_1}} @endisset</span>
                        Flavours
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="../public/new_template/images/Sign.svg" class="svg" alt="" />
                        <span class="one">@isset($carousel) {{$carousel->counter_2}} @endisset</span>
                        Outlets
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="../public/new_template/images/Badge.svg" class="svg" alt="" />
                        <span>@isset($carousel) {{$carousel->counter_3}} @endisset</span>
                        Years brewing
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="../public/new_template/images/BarrelSide.svg" class="svg" alt="" />
                        <span>@isset($carousel) {{$carousel->counter_4}} @endisset</span>
                        Days til ready
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
