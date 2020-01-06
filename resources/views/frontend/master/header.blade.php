<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<div class="user-menu">
							<a href="/login"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng nhập</a>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</nav>
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="/">Fashion</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="/">Trang chủ</a></li>
								<li class="">
									<a href="/product">Cửa hàng</a>
								</li>
								<li><a href="/user/cart"><i class="icon-shopping-cart"></i> Giỏ hàng [{{ count(Cart::content()) }}]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	