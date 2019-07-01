@extends('layouts.header_3')
@section('content')

    <!-- Section -->
    <div class="container-fluid light section">
        <div id="carousel-1" class="carousel slide carousel-fade bs-carousel" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($slider as $slide)
                    <li data-target="#carousel-1" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner" role="listbox">

            @foreach($slider as $slide)
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
    <div class="container-fluid dark section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="history-logo">
                        <img src="../public/new_template/images/logo.png" alt="Craft Beer HTML Template">
                    </div>
                    <div class="history">
                    @foreach($years as $year)
                        <span class="date">{{ $year->year }}</span>
                        @foreach($story as $s)
                             @if($year->year ==  date('Y', strtotime($s->date)))
                                    <article class="scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0">
                                        <header>
                                            <span>{{ date('d-m', strtotime($s->date)) }}</span>
                                            <h2>{{ $s->title }}</h2>
                                        </header>
                                        <p>{{ $s->text }}</p>
                                    </article>
                             @endif
                        @endforeach
                    @endforeach
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
                            <h1>{{__('public_pages.specially')}}</h1>
                            <h2>{{__('public_pages.producers')}}</h2>
                        </header>
                    </section>
                </div>
                <div class="col-sm-9 matchHeight">
                    <div class="owl-carousel" id="partners">
                        @foreach($producers as $p)
                            <div class="item">
                                <a href={{$p->link}}> {{ $p->brewery }}  </a>
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
                        <img src=../public/new_template/images/Can.svg" class="svg" alt="" />
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