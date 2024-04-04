@include('layouts/header')
@yield('product-type-header')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					@yield('product');
					@yield('product-type')
					<!-- .beta-products-list -->
					<div class="space50">&nbsp;</div>
					@yield('topProduct')
					<!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->

		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@include('layouts/footer')