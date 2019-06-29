@extends('layouts.header_3')
@section('content')

    <!-- Section -->
    <div class="container-fluid light section">
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
                                        <h1>Our very first</h1>
                                        <h2>First beer</h2>
                                    </header>
                                    <p>The 12-ounce bottle pours a pitch-black, topped with a creamy tan-colored head that leaves a healthy ringed lace as it settles, with a bit of stick on the glass.</p>
                                    <p>A touch of hop bitterness provides some citric edge and melds with the acridness of the brew for a perceived sourness. Smoky characters emerge as the beer warms, as do subtle drops of caramel.</p>
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
    <div class="container-fluid dark section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="history-logo">
                        <img src="images/logo.png" alt="Craft Beer HTML Template">
                    </div>
                    <div class="history">
                        <span class="date">1956</span>
                        <article class="scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0">
                            <header>
                                <span>30 December</span>
                                <h2>The plan was in action</h2>
                            </header>
                            <p>Brewed with licorice; a proprietary, hand-smoked malt; and almost a pound of East Kent Goldings hops per barrel.</p>
                        </article>
                        <article class="scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0">
                            <header>
                                <span>14 October</span>
                                <h2>It all started over a beer</h2>
                            </header>
                            <p>Complex aromas: soft and powdery on the nose, with aromas of malt, chocolate chip cookie dough and a deep-rooted fruitiness, notes of plum skins, spicy phenols and a soft bready yeast character.</p>
                        </article>
                        <span class="date">1957</span>
                        <article class="scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0">
                            <header>
                                <span>17 August</span>
                                <h2>Moving to London</h2>
                            </header>
                            <p>Naturally soured by farm valley winds blowing wild yeast into our oak casks. Finally, after a year and a half of patient coaxing Wisconsin dark malts whirl in a kaleidoscope of cedar, caramel and tart green plum exuberance.</p>
                        </article>
                        <article class="scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0">
                            <header>
                                <span>27 May</span>
                                <h2>Producing our first beer</h2>
                            </header>
                            <p>One of the most sought-after stouts in Bell's history, Black Note Stout blends the complex aromatics of Expedition Stout with the velvety smooth texture of Double Cream Stout and ages the combination in freshly retired oak bourbon barrels for months.</p>
                        </article>
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
                            <h1>Specially selected</h1>
                            <h2>Partners</h2>
                        </header>
                    </section>
                </div>
                <div class="col-sm-9 matchHeight">
                    <div class="owl-carousel" id="partners">
                        <div class="item">
                            <img src="images/partner-1.png" alt="The Craft Beer Shop" />
                        </div>
                        <div class="item">
                            <img src="images/partner-2.png" alt="The Craft Beer Shop" />
                        </div>
                        <div class="item">
                            <img src="images/partner-3.png" alt="The Craft Beer Shop" />
                        </div>
                        <div class="item">
                            <img src="images/partner-1.png" alt="The Craft Beer Shop" />
                        </div>
                        <div class="item">
                            <img src="images/partner-2.png" alt="The Craft Beer Shop" />
                        </div>
                        <div class="item">
                            <img src="images/partner-3.png" alt="The Craft Beer Shop" />
                        </div>
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
                        <img src="images/Can.svg" class="svg" alt="" />
                        <span>207</span>
                        Flavours
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="images/Sign.svg" class="svg" alt="" />
                        <span class="one">396</span>
                        Outlets
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="images/Badge.svg" class="svg" alt="" />
                        <span>60</span>
                        Years brewing
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter">
                        <img src="images/BarrelSide.svg" class="svg" alt="" />
                        <span>21</span>
                        Days til ready
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection