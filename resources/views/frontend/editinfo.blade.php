@extends('frontend.master.master')
@section('title','Thông Tin')
@section('content')
    <!--main-->
        <div class="row edit-user">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row edit-user">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Sửa thông tin {{ $user->full }}</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <form method="post">
                                @csrf
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" readonly>
                                    {!! ShowError($errors,'email') !!}
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="text" name="full" class="form-control" value="{{ $user->full }}">
                                    {!! ShowError($errors,'full') !!}
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                    {!! ShowError($errors,'phone') !!}
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success btn-user"  type="submit">Sửa thành viên</button>
                                </div>
                            </div>
                            
                        </form>

                        </div>
                    
                        <div class="clearfix"></div>
                    </div>
                </div>

        </div>
    </div>

        <!--/.row-->

    <!--end main-->
@endsection