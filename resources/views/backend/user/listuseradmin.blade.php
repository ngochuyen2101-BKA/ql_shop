
@extends('backend.master.master')
@section('title','Danh sách Admin')
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
				<li class="active">Danh sách Admin</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách Admin</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if (session('thongbao'))
								<div class="alert bg-success" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{ session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								@endif
								<a href="/admin/user/add" class="btn btn-primary list-user">Thêm Thành Viên</a>
								<a href="/admin/user" class="btn btn-warning list-user">Danh Sách Người Dùng</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Email</th>
											<th>Full</th>
											<th>Address</th>
                                            <th>Phone</th>
                                            <th>Level</th>
										</tr>
									</thead>
									<tbody>

										@foreach ($users as $row)
											
										<tr>
												<td>{{ $row->id }}</td>
												<td>{{ $row->email }}</td>
												<td>{{ $row->full }}</td>
												<td>{{ $row->address }}</td>
												<td>{{ $row->phone }}</td>
												<td>Admin</td>
											</tr>

										@endforeach
									
										
										
								
									</tbody>
								</table>
								<div align='right'>
									{{ $users->links() }}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->
			@endsection

			@section('script')
			@parent
			<script>
				function Del_User(name)
				{
					return confirm('Bạn muốn xóa thành viên: '+name+'?')
				}
			</script>

			@endsection
			