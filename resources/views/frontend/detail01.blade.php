@extends('frontend.master.master')
@section('title','Thông Tin')
@section('content')

	<!--main-->
		<!--/.row-->
		<div class="row row-user">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Thông tin User</div>
					<div class="panel-body panel-user1">
						@if (session('thongbao'))
							<div class="alert bg-success" role="alert">
								<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
								</svg>{{ session('thongbao') }}
							</div>
						@endif
						@if (session('thongbao1'))
							<div class="alert bg-danger" role="alert">
								<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
								</svg>{{ session('thongbao1') }}
							</div>
						@endif
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 info">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin User</div>
												<div class="panel-body">
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Mã đơn hàng : {{ $customer->email }}</strong> <br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Phí Ship :  </strong>
													<br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Thời gian lấy hàng :</strong><br>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<table class="table table-bordered" style="margin-top:20px;">
							<thead>
								<tr class="bg-primary">
									<th>ID</th>
									<th>Thông tin Sản phẩm</th>
									<th>Số lượng</th>
									<th>Giá sản phẩm</th>
									<th>Thành tiền</th>

								</tr>
							</thead>
							<tbody>
								@foreach ($customer->order as $order)
									<tr>
										<td>1</td>
										<td>
											<div class="row">
												<div class="col-md-4">
													<img width="100px" src="/backend/img/{{ $order->img }}" class="thumbnail">
												</div>
												<div class="col-md-8">
													<p>Tên Sản phẩm: <strong>{{ $order->name }}</strong></p>
													@foreach ($order->attr as $attr)
														<p>{{ $attr->name }}: {{ $attr->value }}</p>
													@endforeach
													
												</div>
											</div>
										</td>
										<td>{{ $order->quantity }}</td>
										<td>{{ number_format($order->price,0,'',',') }} đ</td>
										<td>{{ number_format($order->price*$order->quantity,0,'',',') }} đ</td>

									</tr>
								@endforeach

							</tbody>

						</table>
						<table class="table">
							<thead>
								<tr>
									<th width='70%'>
										<h4 align='right'>Tổng Tiền :</h4>
									</th>
									<th>
										<h4 align='right' style="color: brown;">{{ number_format($customer->total,0,'',',') }} đ</h4>
									</th>

								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->

	<!--end main-->
@endsection

@section('script')
@parent
<script>
	function del_prd(prd)
		{
			return confirm('Bạn muốn xóa đơn hàng: '+prd);
		}

	function xn_order(prd)
	{
		return confirm('Xác nhận đã nhận đơn hàng: '+prd);
	}
</script>
@endsection
	