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
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Email : {{ $user->email }}</strong> <br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Họ & Tên : {{ $user->full }}</strong>
													<br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Địa chỉ : {{ $user->address }}</strong><br>
													<strong class="qwert"><span class="glyphicon info-admin" aria-hidden="true"></span>Số điện thoại : {{ $user->phone }}</strong>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="alert alert-primary btn-infoadmin" role="alert" align='right'>
									<a name="" id="" class="btn btn-success infoadmin" href="/user/edit-info/{{ $user->id }}" role="button">Cập nhật thông tin</a>
								</div>
								<div class="alert alert-primary btn-infoadmin" role="alert" align='right'>
									<a name="" id="" class="btn btn-warning infoadmin" href="/user/change-password/{{ $user->id }}" role="button">Đổi mật khẩu</a>
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
									<th>Tùy chọn</th>
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
											@if ($row->state==0)
												Đã nhận đơn hàng
											@elseif($row->state==2)
												Đã đăng GHTK
											@elseif($row->state==3)
												Đang vận chuyển
											@elseif($row->state==4 || $row->state==1 )
												Đã xác nhận nhận hàng
											@elseif($row->state==5 )
												Hủy đơn
											@endif
										</td>
										<td>
											<a onclick="return xn_order('{{ $a['order_code'] }}') " href="/user/confirm/{{ $row->id }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Xác nhận</a>
											<a onclick="return del_prd() " href="/user/del/{{ $row->id }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											@if($row->state!=5)
											<a href="/user/detail/{{ $row->id }}" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Chi tiết</a>
											@elseif($row->state==5)
											<a href="/user/detail01/{{ $row->id }}" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Chi tiết</a>
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
			return confirm('Bạn muốn hủy đơn hàng ');
		}

	function xn_order(prd)
	{
		return confirm('Xác nhận đã nhận đơn hàng: '+prd);
	}
</script>
@endsection
	