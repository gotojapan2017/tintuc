@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm User
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if (count($errors) > 0)
                    @foreach($errors->all() as $err)
                        <div class="alert alert-danger">
                            {{$err}}<br>
                        </div>
                    @endforeach
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form action="admin/user/them" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Name</h3>
                                    <input type="input" class="form-control" name="name" placeholder=" Nhập tên người dùng">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Email</h3>
                                    <input type="email" class="form-control" name="email" placeholder=" Nhập địa chỉ email">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Password</h3>
                                    <input type="password" class="form-control" name="password" placeholder=" Nhập mật khẩu">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Nhập lại Password</h3>
                                    <input type="password" class="form-control" name="passwordAgain" placeholder=" Nhập Lại mật khẩu">
                                </div>
                            </div>
                            <div class="form-group box-body">
                                <h3 class="box-title">Quyền người dùng</h3>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="level" value="0" checked>
                                        Thường
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="level" value="1">
                                        Admin
                                    </label>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <button type="reset" class="btn btn-danger">Làm mới</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection