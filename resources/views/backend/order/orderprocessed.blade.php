@extends('backend.master.master')
@section('title','Đơn hàng đã xử lý')
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
					<div class="panel-heading">Danh sách đơn đặt hàng đã xử lý</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="/admin/order/active-ed" class="btn btn-warning">Đơn đã giao hàng</a>
								<a href="/admin/order/deliver" class="btn btn-primary">Đơn đang vận chuyển</a>
								<a href="/admin/order/processed" class="btn btn-success">Đơn đã xử lý</a>
								<table class="table table-bordered" style="margin-top:20px;">				
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>
                                            <th>Thời gian</th>
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
												<td>{{ $customer->updated_at }}</td>
											</tr>
										@endforeach
                                        
                                    </tbody>
                                </table>
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