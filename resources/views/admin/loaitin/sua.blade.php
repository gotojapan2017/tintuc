@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sửa Thể Loại
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $err)
                                <div class="alert alert-danger">
                                    {{$err}}<br>
                                </div>
                            @endforeach
                        @endif
                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}<br>
                            </div>
                        @endif
                        <!-- form start -->
                        <form action="admin/loaitin/sua/{{$loaitin->id}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <h3 class="box-title">Tên Thể Loại</h3>
                                <select class="form-control" name="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}"
                                           @if($loaitin->idTheLoai == $tl->id)
                                              {{"selected"}}
                                           @endif
                                        >{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                        <h3 class="box-title">Tên:{{$loaitin->Ten}}</h3>
                                        <input type="input" class="form-control" id="Ten" name="Ten" value="{{$loaitin->Ten}}" placeholder=" Nhập tên thể loại">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Sửa</button>
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