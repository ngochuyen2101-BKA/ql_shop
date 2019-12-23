@extends('backend.master.master')
@section('title','Đơn hàng đã gửi')
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
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng đã gửi</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="/admin/order/active-ed" class="btn btn-warning btn-nh">Đơn đã giao hàng</a>
								<a href="/admin/order/deliver" class="btn btn-primary btn-nh">Đơn đang vận chuyển</a>
								<a href="/admin/order/cancel" class="btn btn-danger btn-nh">Đơn hàng hủy</a>
								<a href="/admin/order/confirm-order" class="btn btn-info btn-nh">Đơn đã xác nhận</a>
								<a href="/admin/order/processed" class="btn btn-success btn-nh">Đơn đã xử lý</a>
								<table class="table table-bordered" style="margin-top:20px;">				
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>
                                            <th>TÙy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach ($customers as $customer)
											<tr>
												<td>{{ $customer->id }}</td>
												<td>{{ $customer->full_name }}</td>
												<td>{{ $customer->email }}</td>
												<td>{{ $customer->phone }}</td>
												<td>{{ $customer->address }}</td>
												<td>
													<a href="/admin/order/active-after/{{ $customer->id }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Chi tiết</a>
												</td>
											</tr>
										@endforeach
                                        
                                    </tbody>
								</table>
								<div align='right'>
									<ul class="pagination">
										{{ $customers->links() }}
									</ul>
								</div>
							</div>
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