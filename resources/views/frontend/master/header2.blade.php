<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/"><span>Store </span>User</a>
					<ul class="user-menu">
						<li class="dropdown pull-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> @if (Auth::check()) {{ Auth::user()->email }}  @endif <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="/user/info/{{ Auth::user()->email }}">
										<svg class="glyph stroked male-user">
											<use xlink:href="#stroked-male-user"></use>
										</svg>Thông tin
									</a>
								</li>
								<li>
									<a href="/user/logout">
										<svg class="glyph stroked cancel">
											<use xlink:href="#stroked-cancel"></use>
										</svg> Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
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
								<li>
									<a href="/product">Cửa hàng</a>
								</li>
								<li><a href="/user/cart"><i class="icon-shopping-cart"></i> Giỏ hàng [{{ count(Cart::content()) }}]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		