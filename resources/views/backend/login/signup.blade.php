<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up</title>
	<base href="{{ asset('backend') }}/">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Sign up</div>
				<div class="panel-body">
					@if (session('thongbao'))
						<div class="alert alert-danger" role="alert">
							<strong>{{ session('thongbao') }}</strong>
						</div>
					@endif
					<form method="POST" role="form">
						@csrf
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="{{ old('email') }}">
								@if ($errors->has('email'))
									<div class="alert alert-danger" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</div>
								@endif
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								@if ($errors->has('password'))
									<div class="alert alert-danger" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</div>
								@endif
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Họ & Tên" name="full" type="text" value="">
								@if ($errors->has('full'))
									<div class="alert alert-danger" role="alert">
										<strong>{{ $errors->first('full') }}</strong>
									</div>
								@endif
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Địa chỉ" name="address" type="text" value="">
								@if ($errors->has('address'))
									<div class="alert alert-danger" role="alert">
										<strong>{{ $errors->first('address') }}</strong>
									</div>
								@endif
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Số điện thoai" name="phone" type="text" value="">
								@if ($errors->has('phone'))
									<div class="alert alert-danger" role="alert">
										<strong>{{ $errors->first('phone') }}</strong>
									</div>
								@endif
							</div>
							<button type="submit" class="btn btn-primary">Sign up</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		! function ($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function () {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>