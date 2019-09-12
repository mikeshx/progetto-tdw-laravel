<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Beerify</title>
    <link rel="icon" type="image/png" href="../public/img/wheat.png" />
    <link href="{{ asset('new_template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('new_template/css/fakeLoader.css')}}" rel="stylesheet">
    <link href="{{ asset('new_template/css/owl-carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('new_template/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:400,500,600,700,800%7CGrand+Hotel" rel="stylesheet">


    <!--[if IE 9]>
    <link href="{{ asset('new_template/css/ie9.css')}}" rel="stylesheet">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Fake page loading -->
<div id="fakeLoader"></div>

<!-- Wrapper -->
<div class="wrapper">

    <!-- Navigation -->
    <div class="navbar section no-padding" role="navigation">
        <!-- Heading -->
        <div class="heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 hidden-xs">
                        <ul class="social">
                            @foreach($social as $soc)
                                <li><a href="{{ $soc->instagram_link }}" class="fa fa-instagram"></a></li>
                                <li><a href="{{ $soc->facebook_link }}" class="fa fa-facebook-square"></a></li>
                                <li><a href="{{ $soc->twitter_link }}" class="fa fa-twitter-square"></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        @if(!Auth::user())
                            <div class="finder">
                                <a href="{{ lang_url('login') }}">
                                    <span class="fa"></span> {{__('home_new.login')}}
                                </a>
                            </div>
                        @else
                            <div class="finder">
                                <a href="{{ lang_url('my_account') }}">
                                    <span class="fa"></span> {{__('home_new.my_account')}}
                                </a>
                            </div>
                        @endif
                        <div class="finder">
                            <div class="dropdown">
                                <button class="btn-lang" type="button" data-toggle="dropdown">
                                    {{ app()->getLocale() }}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach(Config::get('app.locales') as $locale)
                                        <li><a href="{{url(getSameUrlInOtherLang($locale))}}">{{$locale}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="cart">
                            <a href="{{ lang_url('cart') }}">
                                <span class="fa fa-shopping-cart"></span> {{!empty($cartProducts) ? count($cartProducts): 0}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="navbar-header">
                <a href="{{ lang_url('/home') }}" class="logo" title="">
                    <img src="../public/img/logo.png" alt="Craft Beer HTML Template">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul id="menu-primary" class="nav navbar-nav">
                    <li class="{{ request()->is('home') ? 'active' : '' }}">
								<span>
									<a href="{{ lang_url('home') }}">Home</a>
								</span>
                    </li>
                    <li class="{{ request()->is('products') ? 'active' : '' }}">
								<span>
									<a href="{{ lang_url('products') }}">Shop</a>
								</span>
                    </li>
                    <li class="{{ request()->is('our_beers') ? 'active' : '' }}">
								<span>
									<a href="{{ lang_url('our_beers') }}">Our beer</a>
								</span>
                    </li>
                    <li class="{{ request()->is('story') ? 'active' : '' }}">
								<span>
									<a href="{{ lang_url('story') }}">Our story</a>
								</span>
                    </li>
                    <li class="{{ request()->is('contacts') ? 'active' : '' }}">
								<span>
									<a href="{{ lang_url('contacts') }}">Contact</a>
								</span>
                    </li>
                    <li class="{{ request()->is('blog') ? 'active' : '' }}">
								<span>
									<a href="{{ lang_url('/blog') }}">Blog</a>
								</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Hero -->
    <div id="hero" class="single-page section" style="background-image: url('images/copertina_4.jpg')">

        <!-- Content -->
        <div class="container">
            <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                <div class="col-md-10 col-md-offset-1">
                    <h1>{{__('public_pages.continue_to')}}</h1>
                    <h2>{{__('public_pages.login')}}</h2>
                </div>
            </div>
        </div>

    </div>


@yield('content')

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <h6>Useful</h6>
                <ul>
                    <li><a href="{{ lang_url('/home') }}">Home</a></li>
                    <li><a href="{{ lang_url('/products') }}">Shop</a></li>
                    <li><a href="{{ lang_url('/story') }}">Our story</a></li>
                    <li><a href="{{ lang_url('/blog') }}">Blog</a></li>
                    <li><a href="{{ lang_url('/login') }}">Login</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h6>Help</h6>
                <ul>
                    <li><a href="{{ lang_url('/support') }}">Customer service</a></li>
                    <li><a href="{{ lang_url('/our_beers') }}">Find our beer</a></li>
                    <li><a href="{{ lang_url('/my_orders') }}">Recent orders</a></li>
                    <li><a href="{{ lang_url('/contacts') }}">Contact</a></li>
                    <li><a href="#">Terms &amp; Privacy</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-5 col-sm-push-1">
                <h6>Our information</h6>
                @foreach($contact as $contact)
                    <p><i class="fa fa-map-marker"></i> {{$contact->address}} </p>
                    <p><i class="fa fa-envelope-o"></i> {{$contact->email}} </p>
                    <p><i class="fa fa-phone"></i> {{$contact->telephone}} </p>
                @endforeach
                <ul class="social">
                    @foreach($social as $soc)
                        <li><a href="{{ $soc->instagram_link }}" class="fa fa-instagram"></a></li>
                        <li><a href="{{ $soc->facebook_link }}" class="fa fa-facebook-square"></a></li>
                        <li><a href="{{ $soc->twitter_link }}" class="fa fa-twitter-square"></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>2019 &copy; Unnamed Group @ univaq  /  <a href="http://www.klevermedia.co.uk">Web design by Klever media</a></p>
        </div>
    </div>
</footer>

</div>

<!-- Modal After buy now button -->
<div class="modal fade" id="modalBuyBtn" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h4>{{__('public_pages.success_add_to_cart')}}</h4>
                <a href="{{lang_url('cart')}}" class="go-buy">{{__('public_pages.go_buy')}}</a>
                <hr>
                <div class="continue-shopping">
                    <a href="javascript:void(0);" data-dismiss="modal">
                        {{__('public_pages.continue_shopping')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var urls = {
        addProduct: "{{ url('addProduct') }}",
        removeProductQuantity: "{{ url('removeProductQuantity') }}",
        getProducts: "{{ url('getGartProducts') }}",
        getProductsForCheckoutPage: "{{ url('getProductsForCheckoutPage') }}",
        removeProduct: "{{url('removeProduct')}}"
    };
    var variables = {
        addressReq: "{{__('public_pages.address_field_req')}}",
        phoneReq: "{{__('public_pages.phone_field_req')}}",
        productsReq: "{{__('public_pages.productsReq')}}"
    };
</script>

<script src="{{ asset('new_template/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('new_template/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('new_template/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('new_template/js/headhesive.min.js')}}"></script>
<script src="{{ asset('new_template/js/matchHeight.min.js')}}"></script>
<script src="{{ asset('new_template/js/modernizr.custom.js')}}"></script>
<script src="{{ asset('new_template/js/waypoints.min.js')}}"></script>
<script src="{{ asset('new_template/js/counterup.js')}}"></script>
<script src="{{ asset('new_template/js/scrollme.min.js')}}"></script>
<script src="{{ asset('new_template/js/fakeLoader.min.js')}}"></script>
<script src="{{ asset('new_template/js/owl.carousel.js')}}"></script>
<script src="{{ asset('new_template/js/owl.autoplay.js')}}"></script>
<script src="https://use.fontawesome.com/4dfd2d448a.js"></script>
<script src="{{ asset('new_template/js/custom.js')}}"></script>
<script src="{{ asset('js/public.js') }}"></script>
</body>
</html>