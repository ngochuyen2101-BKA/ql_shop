@extends('frontend.master.master')
@section('title','Thanh toán')
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
	<form method="post" class="colorlib-form">
		@csrf
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Giỏ hàng</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Thanh toán</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Hoàn tất thanh toán</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
							<h2>Chi tiết thanh toán</h2>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">Họ & Tên</label>
										<input name="full" type="text" id="fname" class="form-control" placeholder="First Name" value="{{ $custom->full }}">
										{!! ShowError($errors,"full") !!}
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="fname">Địa chỉ</label>
										<input name="address" type="text" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn" value="{{ $custom->address }}">
										{!! ShowError($errors,"address") !!}
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6">
										<label for="fname">Quận/Huyện</label>
										<input name="district" type="text" id="district" class="form-control" placeholder="Ex: Thanh Xuân" value="{{ old('district') }}">
										{!! ShowError($errors,"district") !!}
									</div>
									<div class="col-md-6">
										<label for="fname">Tỉnh/Thành Phố</label>
										<input name="province" type="text" id="province" class="form-control" placeholder="Ex: Hà Nội" value="{{ old('province') }}">
										{!! ShowError($errors,"province") !!}
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6">
										<label for="email">Địa chỉ email</label>
										<input name="email" type="email" id="email" class="form-control" placeholder="Ex: youremail@domain.com" value="{{ $custom->email }}">
										{!! ShowError($errors,"email") !!}
									</div>
									<div class="col-md-6">
										<label for="Phone">Số điện thoại</label>
										<input name="phone" type="text" id="zippostalcode" class="form-control" placeholder="Ex: 0123456789" value="{{ $custom->phone }}">
										{!! ShowError($errors,"phone") !!}
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										
									</div>
								</div>
							</div>
					</div>
					
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Tổng Giỏ hàng</h2>
							<ul>
								<li>

									<ul>
										@foreach ($cart as $product)
											<li><span>{{ $product->qty }} x {{ $product->name }} 
												@foreach ($product->options->attr as $key=>$value)
													({{ $key }}:{{ $value }})
												@endforeach
												</span>
												<span>{{ number_format($product->price*$product->qty,0,'',',') }} đ</span>
											</li>
										@endforeach
										
									</ul>
								</li>

								<li><span>Tổng tiền đơn hàng</span> <span>{{ $total }} đ</span></li>
								
							</ul>
						</div>

						<div class="row">
							<div class="col-md-12">
								<p><button class="btn btn-primary btn-ckt">Thanh toán</button></p>
								{{-- <p><a onclick="return check_deliver()" class="btn btn-warning btn-ckt">Phí vận chuyển</a></p> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
		<!-- end main -->

@stop

{{-- @section('script')
@parent
<script>
	var address = document.getElementById("address").value;
	var province = document.getElementById("province").value;
	var district = document.getElementById("district").value;
	function check_deliver()
		{
			alert(province);
			// $.get("/user/checkout/check-deliver/"+address+"/"+province+"/"+district,
			// function(data)
			// {
			// 	if(data=="success")
			// 	{
			// 		// location.reload();
			// 		alert("cập nhật");
			// 	}
			// 	else
			// 	{
			// 		alert("cập nhật thất bại");
			// 	}
			// }
			// );
		}
</script>
@endsection --}}