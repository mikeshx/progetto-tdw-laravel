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
							<h1><i>{{$product->category_name}} &nbsp;&nbsp;-&nbsp;&nbsp;{{$product->ml}} ml &nbsp;&nbsp;-</i>&nbsp;&nbsp;{{$product->alchool}} %</h1>
							</br>
							<h2>{{$product->name}}</h2>
							<h2><a href="{{lang_url('addFavorite/'.$product->id)}}" class="btn btn-block btn-default", style="width:290px";>  Add/remove favorite</a></h2>
						</header>
						<p>{{$product->quickdescription}}</p>
						</br></br>
						<h2>&euro;&nbsp;{{$product->price}}</h2>
						<h4><input class="quantity"  name="quantity" type="text" placeholder="Quantity"> <a href="javascript:void(0);" class="buy-now to-cart"  data-product-id="{{$product->id}}" ><span>Add to cart</span></a></h4>

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
								<p>{{$product->description}}</p>
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
										@forelse($review as $review)
										<div class="row">
											<div class="col-sm-1">
												<img src="{{asset('../storage/app/public/'.$review->directory)}}" alt="No IMG" />
											</div>
											<div class="col-sm-11">
												<h5>{{$review->name}}</h5>
												<p>{{$review->text}}</p>
											</div>
										</div>
											@empty
											<div class="col-sm-12">
												<p>No comments present</p>
											</div>
										@endforelse
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5 col-sm-push-1 matchHeight">
										<form action="review.submit" class="scrollme animateme" data-when="enter" data-from="1" data-to="0" data-opacity="0" data-scale="1.1" method="POST">
											{{ csrf_field() }}
											<input type="hidden" value="{{$product->id}}" name="prodId" />
											<textarea name="review_text" placeholder="Comment" rows="3"></textarea>
											<input type="submit" value="{{__('public_pages.reply')}}" class="btn btn-default">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection