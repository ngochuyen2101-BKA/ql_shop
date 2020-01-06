@extends('frontend.master.master')
@section('title','Trang chủ')
@section('content')
		<!-- main -->
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/img_bg_1.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_2.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_3.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="/product?category=2" class="f-product-1" style="background-image: url(images/item-1.jpg);">
							<div class="desc">
								<h2>Mẫu <br>cho <br>Nam</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="/product?category=11" class="f-product-2" style="background-image: url(images/item-2.jpg);">
									<div class="desc">
										<h2> <br>Váy <br> Mới</h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="/product?category=12" class="f-product-2" style="background-image: url(images/item-4.jpg);">
									<div class="desc">
										<h2>Áo <br> Khoác<br> Nữ</h2>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="/product?category=13" class="f-product-2" style="background-image: url(images/about.jpg);">
									<div class="desc">
										<h2>Quần<br> áo<br> Trẻ em</h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/cover-img-1.jpg);"
		 data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-rights">
									<h3 class="title">Đặt hàng hôm nay,diện ngay đồ mới!</h3>
									<p>Các đơn hàng được gửi đi ở khắp quốc gia.</p>
									<p><a href="/product" class="btn btn-warning">Mua ngay</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Nổi bật</span></h2>
						<p>Đây là những sản phẩm được ưa chuộng nhất năm 2019</p>
					</div>
				</div>
				<div class="row">
					@foreach ($product_fe as $product)
						<div class="col-md-3 text-center">
							<div class="product-entry">
								<div class="product-img" style="background-image: url(/backend/img/{{ $product->img }});">
	
									<div class="cart">
										<p>
											<span class="addtocart"><a href="/product/detail/{{ $product->id }}"><i class="icon-shopping-cart"></i></a></span>
											<span><a href="/product/detail/{{ $product->id }}"><i class="icon-eye"></i></a></span>
	
	
										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="shop.html">{{ $product->name }}</a></h3>
									<p class="price"><span> {{ number_format($product->price,0,'',',') }} đ</span> </p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm mới</span></h2>
						<p>Đây là những sản phẩm mới của năm năm 2019</p>
					</div>
				</div>
				<div class="row">
					@foreach ($product_new as $product)
						<div class="col-md-3 text-center">
							<div class="product-entry">
								<div class="product-img" style="background-image: url(/backend/img/{{ $product->img }});">
									<p class="tag"><span class="new">New</span></p>
									<div class="cart">
										<p>
											<span class="addtocart"><a href="/product/detail/{{ $product->id }}"><i class="icon-shopping-cart"></i></a></span>
											<span><a href="/product/detail/{{ $product->id }}"><i class="icon-eye"></i></a></span>
	
	
										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="shop.html">{{ $product->name }}</a></h3>
									<p class="price"><span>{{ number_format($product->price,0,'',',') }} đ</span></p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- end main -->
@endsection
		