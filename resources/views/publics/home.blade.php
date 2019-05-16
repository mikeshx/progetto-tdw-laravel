@extends('layouts.header_2')

<!-- Dynamic content of the website-->
@section('content')
    <!-- Hero -->
    <div id="hero" class="carousel slide carousel-fade section no-padding" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            @php
                $i=0;
            @endphp
            @foreach($carousel as $slide)
                <li data-target="#hero" data-slide-to="{{$i}}" class="{{ $i == 0 ? 'active' : ''}}"></li>
            @php
                 $i++;
            @endphp
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($carousel as $slide)
            <div class="item active" style="background-image: url({{asset('../storage/app/public/'.$slide->image)}})">
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
                    <a href="#" class="btn btn-default"><span>{{__('home_new.show_more')}}</span></a>
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

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 matchHeight">
                                <img src="http://placehold.it/555x355" alt="About our Brewery" class="alignMiddle" />
                            </div>
                            <div class="col-sm-5 col-sm-push-1 matchHeight">
                                <section class="alignMiddle mobile-center">
                                    <header>
                                        <h1>About our</h1>
                                        <h2>Brewery</h2>
                                    </header>
                                    <p>The 12-ounce bottle pours a pitch-black, topped with a creamy tan-colored head that leaves a healthy ringed lace as it settles, with a bit of stick on the glass.</p>
                                    <p>A touch of hop bitterness provides some citric edge and melds with the acridness of the brew for a perceived sourness. Smoky characters emerge as the beer warms, as do subtle drops of caramel.</p>
                                    <a href="#" class="btn btn-default"><span>Learn more</span></a>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 matchHeight">
                                <img src="http://placehold.it/555x355" alt="About our Brewery" class="alignMiddle" />
                            </div>
                            <div class="col-sm-5 col-sm-push-1 matchHeight">
                                <section class="alignMiddle mobile-center">
                                    <header>
                                        <h1>Made to share with</h1>
                                        <h2>Friends</h2>
                                    </header>
                                    <p>A blend of lambic beers brewed at 3 Fonteinen, with an addition of 30% whole fresh raspberries from the fabled Payottenland and 5% sour cherries. This unfiltered beer will enjoy a spontaneous refermentation in the bottle. No artificial colors or flavor enhancers are added. Lambic is brewed only from 60% barley malt, 40% unmalted wheat, hops and water.</p>
                                    <a href="#" class="btn btn-default"><span>Learn more</span></a>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

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
                        <a href="#" class="btn btn-default"><span>Show me more</span></a>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-push-1 matchHeight">
                    <div class="owl-carousel">
                        <!-- Products -->
                        @foreach ($mostSelledProducts as $mostSelledProduct)
                        <div class="product item">
                            <a href="{{ lang_url($mostSelledProduct->url) }}">
                                <span>Buy it</span>
                                <img src="{{asset('storage/'.$mostSelledProduct->image)}}" alt="{{$mostSelledProduct->name}}">
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
    <div class="container-fluid light section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 latest-post odd matchHeight">
                    <a href="#"></a>
                    <div class="row">
                        <div class="col-sm-10 col-sm-push-1">
                            <header>
                                <span class="date">21 December</span>
                                <h2>Oktoberfest</h2>
                            </header>
                            <p>Brewed with licorice; a proprietary, hand-smoked malt; and almost a pound of East Kent Goldings hops per barrel.</p>
                            <p>Opaque brown in color, with muddy brown edges and a cola-colored head that drops quickly to a ringed lace. Strong and dominating licorice aroma with an underlying robust molasses-ness and highly roasted malts. Thick-ish, deep blackstrap molasses character (sweet, tangy nectar), quite robust.</p>
                            <p><a href="#" class="underline">Read more</a></p>
                        </div>
                    </div>
                    <div class="background" style="background-image: url(http://placehold.it/750x535);"></div>
                </div>
                <div class="col-sm-6 latest-post even matchHeight">
                    <a href="#"></a>
                    <div class="row">
                        <div class="col-sm-10 col-sm-push-1">
                            <header>
                                <span class="date">14 December</span>
                                <h2>Now stocked in NYC</h2>
                            </header>
                            <p>Brewed with licorice; a proprietary, hand-smoked malt; and almost a pound of East Kent Goldings hops per barrel.</p>
                            <p>Opaque brown in color, with muddy brown edges and a cola-colored head that drops quickly to a ringed lace. Strong and dominating licorice aroma with an underlying robust molasses-ness and highly roasted malts. Thick-ish, deep blackstrap molasses character (sweet, tangy nectar), quite robust.</p>
                            <p><a href="#" class="underline">Read more</a></p>
                        </div>
                    </div>
                    <div class="background" style="background-image: url(http://placehold.it/750x535);"></div>
                </div>
            </div>
        </div>
    </div>

@endsection