@extends('layouts.layouts');
{{-- @extends('home'); --}}
@section('product')
<div class="beta-products-list">
	<h4>New Products</h4>
	<div class="beta-products-details">
		<p class="pull-left">438 styles found</p>
		<div class="clearfix"></div>
	</div>

	<div class="row">
		@foreach($products as $product)
		<div class="col-sm-4">
			<div class="single-item">
				<div class="single-item-header">
					<a href="/products/{id}
                                            "><img style="width: 300px; height: 300px" src="/source/image/product/{{ $product['image'] }}" alt=""></a>
				</div>
				<div class="single-item-body">
					<p class="single-item-title">{{$product->name}}</p>
					<p class="single-item-price">


						@if($product->promotion_price != 0)
						<span class="flash-sale">{{ number_format( $product->unit_price,2,",",".")}} vnd</span>
						<span class="flash-del">{{ number_format( $product->promotion_price,2,",",".")}} vnd</span>
						@else
						<span class="flash-sale">{{ number_format( $product->unit_price,2,",",".")}} vnd</span>
						@endif
					</p>
				</div>
				<div class="single-item-caption">
					<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
					<a class="beta-btn primary" href="{{ route('product/detail', $product->id) }}
                                            ">Details <i class="fa fa-chevron-right"></i></a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		@endforeach



	</div>
</div>
@endsection

@section('topProduct')
<div class="beta-products-list">
	<h4>Top Products</h4>
	<div class="beta-products-details">
		<p class="pull-left">438 styles found</p>
		<div class="clearfix"></div>
	</div>
	<div class="row">
		@foreach($productAll as $product)
		<div class="col-sm-4">
			<div class="single-item">
				<div class="single-item-header">
					<a href="/products/{id}
                                            "><img style="width: 300px; height: 300px" src="/source/image/product/{{ $product['image'] }}" alt=""></a>
				</div>
				<div class="single-item-body">
					<p class="single-item-title">{{$product->name}}</p>
					<p class="single-item-price">


						@if($product->promotion_price != 0)
						<span class="flash-sale">{{ number_format( $product->unit_price,2,",",".")}} vnd</span>
						<span class="flash-del">{{ number_format( $product->promotion_price,2,",",".")}} vnd</span>
						@else
						<span class="flash-sale">{{ number_format( $product->unit_price,2,",",".")}} vnd</span>
						@endif
					</p>
				</div>
				<div class="single-item-caption">
					<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
					<a class="beta-btn primary" href="{{ route('product/detail', $product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>
@endsection