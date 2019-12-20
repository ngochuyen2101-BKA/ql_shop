@extends('backend.master.master')
@section('title','Thông tin Admin')
@section('user')
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
				<li class="active"></li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Thông tin Khách hàng</div>
					<div class="panel-body">
						@if (session('thongbao'))
							<div class="alert bg-success" role="alert">
								<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
								</svg>{{ session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
						@endif
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 info">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin Khách hàng</div>
												<div class="panel-body">
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Email : {{ $user['email'] }}</strong> <br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Họ & Tên : {{ $user['full'] }}</strong>
													<br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Địa chỉ : {{ $user['address'] }}</strong><br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Số điện thoại : {{ $user['phone'] }}</strong>
												</div>
											</div>
										</div>
									</div>
								</div>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>STT</th>
											<th>Thời gian</th>
											<th>Thanh toán</th>
											<th>Mã vận chuyển</th>
											<th>Trạng thái</th>
										</tr>
									</thead>
									<tbody>
										<a class="count-user">{{ $i = 0 }}</a>
										@foreach ($users as $row)
										<a class="count-user">{{ $i++ }}</a>
										<tr>
												<td>{{ $i }}</td>
												<td>{{ Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}</td>
												<td>{{ $row->total }}</td>
												<td><a class="count-user">{{ $a=$row->ghtk->last() }}</a>{{ $a['order_code'] }}</td>
												<td>
													@if ($row->state==1)
														Đã nhận đơn hàng
													@elseif($row->state==2)
														Đã đăng GHTK
													@elseif($row->state==3)
														Đang vận chuyển
													@elseif($row->state==4)
														Khách hàng xác nhận
													@else
														Đã tính doanh thu
													@endif
											</td>
											</tr>
										@endforeach
										
										


									</tbody>
								</table>
								<div align='right'>
									<ul class="pagination">
										{{ $users->links() }}
									</ul>
								</div>
								<div class="alert alert-primary btn-infoadmin" role="alert" align='right'>
									<a name="" id="" class="btn btn-primary infoadmin" href="/admin/user" role="button">Trở lại</a>
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
	