@extends('frontend.master.master')
@section('title','Thông Tin')
@section('content')
    <!--main-->
        <div class="row edit-user">
            <div class="col-lg-12">
                <h1 class="page-header">Đổi mật khẩu</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row edit-user">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Đổi mật khẩu {{ $user->full }}</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <form method="post">
                                @csrf
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" value="">
                                    {!! ShowError($errors,'password') !!}
                                </div>
                                <div class="form-group">
                                    <label>Re-enter Password</label>
                                    <input type="password" name="repassword" class="form-control" value="">
                                    {!! ShowError($errors,'repassword') !!}
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success btn-user"  type="submit">Đổi mật khẩu</button>
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