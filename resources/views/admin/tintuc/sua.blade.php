@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sửa Tin Tức
                <small>{{$tintuc->TieuDe}}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
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
                        @if (session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                    @endif
                    <!-- form start -->
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <h3 class="box-title">Thể Loại</h3>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option
                                           @if($tintuc->loaitin->theloai->id == $tl->id)
                                               {{"selected"}}
                                           @endif
                                           value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <h3 class="box-title">Loại Tin</h3>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option
                                            @if($tintuc->loaitin->id == $lt->id)
                                                {{"selected"}}
                                            @endif
                                            value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Tiêu Đề</h3>
                                    <input type="input" class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}" placeholder=" Nhập Tiêu đề">
                                </div>
                            </div>
                            <!-- textarea -->
                            <div class="box-body form-group">
                                <h3 class="box-title">Tóm tắt</h3>
                                <textarea class="form-control" id="editor1" name="TomTat" rows="3" placeholder="Nhập tóm tắt">
                                    {{$tintuc->TomTat}}
                                </textarea>
                            </div>
                            <div class="box-body form-group">
                                <h3 class="box-title">Nội dung</h3>
                                <textarea class="form-control" id="editor2" name="NoiDung" rows="5" placeholder="Nhập nội dung">
                                    {{$tintuc->NoiDung}}
                                </textarea>
                            </div>
                            <div class="box-body form-group">
                                <h3 class="box-title">Hình</h3>
                                <img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}">
                                <input type="file" name="Hinh" >
                            </div>
                            <!-- radio -->
                            <div class="form-group box-body">
                                <h3 class="box-title">Nổi Bật</h3>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="NoiBat" value="{{$tintuc->NoiBat}}"
                                            @if($tintuc->NoiBat == 0)
                                                {{"checked"}}
                                            @endif
                                        > Không
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="NoiBat" value="{{$tintuc->NoiBat}}"
                                           @if($tintuc->NoiBat == 1)
                                               {{"checked"}}
                                           @endif
                                        > Có
                                    </label>
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
            {{--Comment List start--}}
            <div class="row">
                <section class="content-header">
                    <h1>
                        Bình Luật
                        <small>{{$tintuc->TieuDe}}</small>
                    </h1>
                </section>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Người dùng</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tintuc->comment as $cm)
                                    <tr>
                                        <td>{{$cm->id}}</td>
                                        <td>{{$cm->user->name}}</td>
                                        <td>{{$cm->NoiDung}}</td>
                                        <td>{{$cm->created_at}}</td>
                                        <td class="center"><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Người dùng</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Xóa</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            {{--End Comment--}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#TheLoai").change(function () {
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function (data) {
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            CKEDITOR.replace('editor2')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection