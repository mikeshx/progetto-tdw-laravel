@extends('layouts.header_2')

<!-- Dynamic content of the website-->
@section('content')
    <!-- Hero -->
    <div id="hero" class="carousel slide carousel-fade section no-padding" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($carousel as $slide)
                <li data-target="#hero" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($carousel as $slide)
            <div class="item {{ $loop->first ? ' active' : '' }}" style="background-image: url({{asset('../storage/app/public/'.$slide->image)}})">
                <!-- Content -->
                <div class="container">
                    <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                        <div class="col-md-10 col-md-offset-1">
                            <h1>{{$slide->title1}}</h1>
                            <h2>{{$slide->title2}}</h2>
                            <a href="{{$slide->link}}" class="btn btn-default">
                                <span>{{__('home_new.explore')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="row">
            <div class="col-sm-6 matchHeight scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-75">
                <section class="alignMiddle padding-80 mobile-center">
                    <header>
                        <h1>{{__('home_new.how_create')}}</h1>
                        <h2>{{__('home_new.how_create2')}}</h2>
                    </header>
                    <p>{{__('home_new.how_create_text')}}</p>
                    <a href="our_beers" class="btn btn-default"><span>{{__('home_new.show_more')}}</span></a>
                </section>
            </div>
            <div class="col-sm-6 matchHeight" style="background-image: url(../public/img/block-bg.jpg);">
                <div class="row">
                    <div class="col-xs-6 icon-grid">
                        <img src="../public/img/Hops.svg" class="svg" alt="Quality Ingredients" />
                        <h4>{{__('home_new.Quality')}}</h4>
                        <p>{{__('home_new.Quality_text')}}</p>
                    </div>
                    <div class="col-xs-6 icon-grid">
                        <img src="../public/img/Sun.svg" class="svg" alt="Natural sunshine" />
                        <h4>{{__('home_new.Natural')}}</h4>
                        <p>{{__('home_new.Natural_text')}}</p>
                    </div>
                    <div class="col-xs-6 icon-grid">
                        <img src="../public/img/Barrel.svg" class="svg" alt="Fermentation" />
                        <h4>{{__('home_new.Fermentation')}}</h4>
                        <p>{{__('home_new.Fermentation_text')}}</p>
                    </div>
                    <div class="col-xs-6 icon-grid">
                        <img src="../public/img/BottleCrate.svg" class="svg" alt="Unrivalled taste" />
                        <h4>{{__('home_new.Unrivalled')}}</h4>
                        <p>{{__('home_new.Unrivalled_text')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid light section" style="background-image: url(../public/img/block-bg-2.jpg);">
        <div id="carousel-1" class="carousel slide carousel-fade bs-carousel" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($carouselInfo as $slide)
                    <li data-target="#carousel-1" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner" role="listbox">

            @foreach($carouselInfo as $slide)
                <!-- Slide 1 -->
                <div class="item {{ $loop->first ? 'active' : '' }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 matchHeight">
                                <img src="{{asset('../storage/app/public/'.$slide->image)}}" alt="About our Brewery" class="alignMiddle" />
                            </div>
                            <div class="col-sm-5 col-sm-push-1 matchHeight">
                                <section class="alignMiddle mobile-center">
                                    <header>
                                        <h1>{{$slide->title1}}</h1>
                                        <h2>{{$slide->title2}}</h2>
                                    </header>
                                    <p>{{$slide->text}}</p>
                                    <a href="{{$slide->link}}" class="btn btn-default"><span>{{__('home_new.learn')}}</span></a>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>

            <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#carousel-1" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid dark section" style="background-image: url(../public/img/block-bg-3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 matchHeight scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-75">
                    <div class="alignMiddle mobile-center">
                        <header>
                            <h1>Browse the</h1>
                            <h2>Beer aisle</h2>
                        </header>
                        <p>Smoky characters emerge as the beer warms, as do subtle drops of caramel. The overall dryness of the beer carries through to the finish, with a semi-burnt linger and bitter end.</p>
                        <a href="products" class="btn btn-default"><span>Show me more</span></a>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-push-1 matchHeight">
                    <div class="owl-carousel">
                        <!-- Products -->
                        @foreach ($mostSelledProducts as $mostSelledProduct)
                        <div class="product item">
                            <a href="{{ lang_url($mostSelledProduct->url) }}">
                                <span>Buy it</span>
                                <img src="{{asset('../storage/app/public/'.$mostSelledProduct->image)}}" alt="{{$mostSelledProduct->name}}">
                            </a>
                            <h3>{{$mostSelledProduct->name}}</h3>
                            <h4>&dollar;{{$mostSelledProduct->price}}</h4>
                        </div>
                        @endforeach
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
                        <span>{{ $info->flavours }}</span>
                        {{__('public_pages.flavours')}}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="../public/new_template/images/Sign.svg" class="svg" alt="" />
                        <span class="one">{{ $info->outlets }}</span>
                        {{__('public_pages.outlets')}}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="../public/new_template/images/Badge.svg" class="svg" alt="" />
                        <span>{{ $info->years }}</span>
                        {{__('public_pages.years_brewing')}}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="../public/new_template/images/BarrelSide.svg" class="svg" alt="" />
                        <span>{{ $info->day }}</span>
                        {{__('public_pages.days_ready')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection