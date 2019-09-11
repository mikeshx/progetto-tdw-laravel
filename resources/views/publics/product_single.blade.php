@extends('layouts.header_1')

@section('content')


	<div class="container-fluid light section">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 matchHeight">
					<div class="product-img-wrap">
						<img src="{{asset('../storage/app/public/'.$product->image)}}" alt="About our Brewery" />
					</div>
				</div>
				<div class="col-sm-6 col-sm-push-1 matchHeight">
					<section class="alignMiddle mobile-center">
						<header>
							<h1><i>{{$product->ml}} ml   </i>    {{$product->alchool}} %</h1>
							<h2>{{$product->name}}</h2>
						</header>
						{{$product->quickdescription}}
						<h4>&euro;{{$product->price}}</h4>
						<h4>{{$product->quantity}} left in stock</h4> <a href="javascript:void(0);" class="buy-now to-cart"><span>Add to cart</span></a>
					</section>
				</div>
			</div>
		</div>
	</div>

	<!-- Section -->
	<div class="container-fluid light section no-padding-bottom">
		<div class="row">
			<div class="tabs">
				<ul>
					<li><a href="#description">Full description</a></li>
					<li><a href="#reviews">Customer reviews</a></li>

				</ul>
				<div id="description">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
							{{$product->description}}
							</div>
						</div>
					</div>
				</div>
				<div id="reviews">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12 user-comments">
										<div class="row">
											<div class="col-sm-1">
												<img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
											</div>
											<div class="col-sm-11">
												<h5>David Moore</h5>
												<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>
												<span class="edit">
															<a href="#">Reply</a> | <a href="#">Edit</a>
														</span>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-1">
												<img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
											</div>
											<div class="col-sm-11">
												<h5>Terry Woods</h5>
												<p>Anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
												<span class="edit">
															<a href="#">Reply</a> | <a href="#">Edit</a>
														</span>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-1">
												<img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
											</div>
											<div class="col-sm-11">
												<h5>Alex Johnstone</h5>
												<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica.</p>
												<span class="edit">
															<a href="#">Reply</a> | <a href="#">Edit</a>
														</span>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-1">
												<img src="http://placehold.it/72x72" alt="Craft ale HTML template" />
											</div>
											<div class="col-sm-11">
												<h5>Harry Ransome</h5>
												<p>Anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
												<span class="edit">
															<a href="#">Reply</a> | <a href="#">Edit</a>
														</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Section -->
	<div class="container-fluid super-dark section no-padding">
		<div class="row" id="share">
			<div class="col-md-2 col-sm-4 col-xs-6 icon-grid share-this">
				<a href="#"></a>
				<i class="fa fa-facebook"></i>
				<h4>Facebook</h4>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 icon-grid share-this">
				<a href="#"></a>
				<i class="fa fa-instagram"></i>
				<h4>Instagram</h4>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 icon-grid share-this">
				<a href="#"></a>
				<i class="fa fa-linkedin"></i>
				<h4>Linked In</h4>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 icon-grid share-this">
				<a href="#"></a>
				<i class="fa fa-twitter"></i>
				<h4>Twitter</h4>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 icon-grid share-this">
				<a href="#"></a>
				<i class="fa fa-google-plus"></i>
				<h4>Google +</h4>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 icon-grid share-this">
				<a href="#"></a>
				<i class="fa fa-pinterest"></i>
				<h4>Pinterest</h4>
			</div>
		</div>
	</div>

	<!-- Section -->
	<div class="container-fluid dark section" style="background-image: url(http://placehold.it/880x650);">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 matchHeight scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-75">
					<div class="alignMiddle mobile-center">
						<header>
							<h1>Our hand picked</h1>
							<h2>Favourites</h2>
						</header>
						<p>Malt character and sweetness is pretty bland, with a weak toasty note as the highlight. Finish is drying, with a lingering hop character and sourness that just doesn't seem right.</p>
					</div>
				</div>
				<div class="col-sm-6 col-sm-push-1 matchHeight">
					<div class="owl-carousel">
						<!-- Products -->
						<div class="product item">
							<a href="our-beer.html">
								<span>Buy it</span>
								<img src="http://placehold.it/169x299" alt="Beer can mockup">
							</a>
							<h3>Pale ale</h3>
							<h4>4.5%</h4>
						</div>
						<div class="product item">
							<a href="our-beer.html">
								<span>Buy it</span>
								<img src="http://placehold.it/169x299" alt="Beer can mockup">
							</a>
							<h3>Golden ale</h3>
							<h4>4.2%</h4>
						</div>
						<div class="product item">
							<a href="our-beer.html">
								<span>Buy it</span>
								<img src="http://placehold.it/169x299" alt="Beer can mockup">
							</a>
							<h3>IPA</h3>
							<h4>7%</h4>
						</div>
						<div class="product item">
							<a href="our-beer.html">
								<span>Buy it</span>
								<img src="http://placehold.it/169x299" alt="Beer can mockup">
							</a>
							<h3>Zombie</h3>
							<h4>8.2%</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection