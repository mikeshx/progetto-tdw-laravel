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
			</div>
		</div>
	</div>


	@endsection