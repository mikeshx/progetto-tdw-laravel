<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Craft Beer Nation - Craft Beer HTML Template</title>
    <link rel="icon" type="image/png" href="images/favicon.png" />
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
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-facebook-square"></a></li>
                            <li><a href="#" class="fa fa-twitter-square"></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <div class="finder">
                            <a href="#">
                                <span class="fa fa-map-marker"></span> Find our beer
                            </a>
                        </div>
                        <div class="cart">
                            <a href="cart.html">
                                <span class="fa fa-shopping-cart"></span> Empty
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="navbar-header">
                <a href="index.html" class="logo" title="Craft beer landing page">
                    <img src="images/logo.png" alt="Craft Beer HTML Template">
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
                    <li>
								<span>
									<a href="{{ lang_url('home') }}">Home</a>
								</span>
                    </li>
                    <li class="active">
								<span>
									<a href="{{ lang_url('products') }}">Shop</a>
								</span>
                    </li>
                    <li class="dropdown">
								<span>
									<a href="our-beer.html">Our beer</a>
								</span>
                        <ul class="dropdown-menu">
                            <li><a href="our-beer.html">Sugar Skull</a></li>
                            <li><a href="our-beer.html">BraveHeart</a></li>
                            <li><a href="our-beer.html">The Drunk Indian</a></li>
                        </ul>
                    </li>
                    <li>
								<span>
									<a href="our-story.html">Our story</a>
								</span>
                    </li>
                    <li>
								<span>
									<a href="contact.html">Contact</a>
								</span>
                    </li>
                    <li class="dropdown">
								<span>
									<a href="blog.html">Blog</a>
								</span>
                        <ul class="dropdown-menu">
                            <li><a href="blog-single.html">Single post</a></li>
                        </ul>
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
                    <h1>A very warm welcome to our</h1>
                    <h2>Beer shop</h2>
                </div>
            </div>
        </div>

    </div>

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


@yield('content')

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <h6>Useful</h6>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="our-story.html">Our story</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h6>Help</h6>
                <ul>
                    <li><a href="#">Customer service</a></li>
                    <li><a href="#">Find our beer</a></li>
                    <li><a href="#">Recent orders</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Terms &amp; Privacy</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h6>Shop</h6>
                <ul>
                    <li><a href="#">Pale ale</a></li>
                    <li><a href="#">Golden ale</a></li>
                    <li><a href="#">Dark ale</a></li>
                    <li><a href="#">IPA</a></li>
                </ul>
            </div>
            <div class="col-sm-5 col-sm-push-1">
                <h6>Our information</h6>
                <p><i class="fa fa-map-marker"></i> 94 River Road, London, United Kingdom</p>
                <p><i class="fa fa-envelope-o"></i> sales@craftbeer-nation.com</p>
                <p><i class="fa fa-phone"></i> (0)203 123 4567</p>
                <ul class="social">
                    <li><a href="#" class="fa fa-instagram"></a></li>
                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                    <li><a href="#" class="fa fa-twitter-square"></a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>2017 &copy; Craft Beer Nation  /  <a href="http://www.klevermedia.co.uk">Web design by Klever media</a></p>
        </div>
    </div>
</footer>

</div>

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
</body>
</html>
