@extends('layouts.header_1')

<!-- Dynamic content of the website-->
@section('content')

    <!-- Section -->
    <div class="container-fluid dark section no-padding">
        <div class="row">
            <div class="col-sm-3 col-xs-6 icon-grid">
                <a href="{{$contacts->facebook_link}}"></a>
                <i class="fa fa-facebook"></i>
                <h4>Facebook</h4>
                <p>{{$contacts->facebook_desc}}</p>
            </div>
            <div class="col-sm-3 col-xs-6 icon-grid">
                <a href="{{$contacts->instagram_link}}"></a>
                <i class="fa fa-instagram"></i>
                <h4>Instagram</h4>
                <p>{{$contacts->instagram_desc}}</p>
            </div>
            <div class="col-sm-3 col-xs-6 icon-grid">
                <a href="{{$contacts->twitter_link}}"></a>
                <i class="fa fa-twitter"></i>
                <h4>Twitter</h4>
                <p>{{$contacts->twitter_desc}}</p>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid light no-padding section">
        <div class="row">
            <div class="col-sm-6 matchHeight">
                <div id="map"></div>
            </div>
            <div class="col-sm-6 matchHeight">
                <section class="alignMiddle padding-80 mobile-center">
                    <header>
                        <h1>Feel free to send</h1>
                        <h2>Us a message</h2>
                    </header>
                    <p>Hop presence is masked; however, there is some and it peaks with a tannin feel and semi-citric sharpness. Rough and long-lingering finish with molasses, and soft anise residuals sticking to the palate.</p>
                    <p>A tough one to drink. The use of molasses and licorice is simply overwhelming and without balance.</p>
                </section>
            </div>
        </div>
    </div>

    <!-- Section -->
    <div class="container-fluid section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 matchHeight">
                    <ul class="contact-list alignMiddle">
                        <li>
                            <i class="fa fa-location-arrow"></i>
                            <div>
                                Address
                                <span>{{$contacts->address}}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <div>
                                Email
                                <span>{{$contacts->email}}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <div>
                                Telephone
                                <span>{{$contacts->telephone}}</span>
                            </div>
                        </li>
                    </ul>
                    <div class="grey-background"></div>
                </div>
                <div class="col-sm-5 col-sm-push-1 matchHeight">
                    <section class="alignMiddle padding-80-0">
                        <form action="https://formspree.io/your@email.com"
                              method="POST"  class=" scrollme animateme" data-when="enter" data-from="1" data-to="0" data-opacity="0" data-scale="1.1">
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="_replyto" placeholder="Email">
                            <textarea name="message" placeholder="Message" rows="5"></textarea>
                            <input type="submit" value="Send" class="btn btn-default">
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection