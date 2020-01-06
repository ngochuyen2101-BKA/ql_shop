@extends('backend.master.master')
@section('title','Chi tiết đơn hàng')
@section('order')
	class="active"
@endsection
@section('content')	

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Chi tiết đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin khách hàng</div>
												<div class="panel-body">
													<strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Tên : {{ $customer->full_name }}</strong> <br>
													<strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>SĐT : {{ $customer->phone }}</strong>
													<br>
													<strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span>Địa chỉ : {{ $customer->address }}</strong>
												</div>
											</div>
                                        </div>
                                        
                                        <div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin giao hàng</div>
												<div class="panel-body">
													<strong><span class="glyphicon" aria-hidden="true"></span>Mã đơn hàng : {{ $ghtk->order_code }}</strong> <br>
													<strong><span class="glyphicon" aria-hidden="true"></span>Phí ship : {{ $ghtk->fee }}</strong>
													<br>
                                                    <strong><span class="glyphicon" aria-hidden="true"></span>Thời gian lấy hàng : {{ $ghtk->estimated_pick_time }}</strong><br>
                                                    <strong><span class="glyphicon" aria-hidden="true"></span>Thời gian giao hàng : {{ $ghtk->estimated_deliver_time }}</strong>
													
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
								<div class="col-md-10 col-md-offset-1">
									<div class="total-wrap">
										<div class="row">
											<div class="col-md-8">
											</div>
											<div class="col-md-3 col-md-push-1 text-center total-order">
												<div class="total">
													<div class="sub">
														<p><span>Tổng:</span> <span>{{ number_format($customer->total,0,'',',') }} đ</span></p>
														<p><span>Phí vận chuyển:</span> <span>{{ number_format($customer->fee,0,'',',') }} đ</span></p>
													</div>
													<div class="grand-total">
														<p><span><strong>Tổng cộng: {{ number_format($customer->total+$customer->fee,0,'',',') }} đ</strong></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="alert alert-primary" role="alert" align='right'>
							<a name="" id="" class="btn btn-success" href="/admin/order/confirm-after/{{ $customer->id }}" role="button">Xử lý</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@endsection
	