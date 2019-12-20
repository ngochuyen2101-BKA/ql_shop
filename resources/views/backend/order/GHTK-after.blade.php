@extends('backend.master.master')
@section('title','Chi tiết đơn hàng GHTK')
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
				<li class="active">Chi tiết đơn hàng GHTK</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đơn hàng GHTK</div>
					<div class="panel-body">
						<div class="alert bg-success" role="alert">
							<svg class="glyph stroked checkmark">
									<use xlink:href="#stroked-checkmark"></use>
							</svg>Đơn hàng đang được vận chuyển<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>
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
								
								<div class="alert alert-primary" role="alert" align='right'>
									<a name="" id="" class="btn btn-success" href="/admin/order/deliver" role="button">Danh sách vận chuyển</a>
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
	