@extends('backend.master.master')
@section('title','Thông tin Admin')
@section('admin')
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
					<div class="panel-heading">Thông tin Admin</div>
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
												<div class="panel-heading dark-overlay">Thông tin Admin</div>
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
									<a name="" id="" class="btn btn-success infoadmin" href="/admin/edit-info/{{ $user->id }}" role="button">Cập nhật thông tin</a>
								</div>
								<div class="alert alert-primary btn-infoadmin" role="alert" align='right'>
									<a name="" id="" class="btn btn-warning infoadmin" href="/admin/change-password/{{ $user->id }}" role="button">Đổi mật khẩu</a>
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
	