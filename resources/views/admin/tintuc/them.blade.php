@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm Tin Tức
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
                        <form action="admin/tintuc/them" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <h3 class="box-title">Thể Loại</h3>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <h3 class="box-title">Loại Tin</h3>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Tiêu Đề</h3>
                                    <input type="input" class="form-control" name="TieuDe" placeholder=" Nhập Tiêu đề">
                                </div>
                            </div>
                            <!-- textarea -->
                            <div class="box-body form-group">
                                <h3 class="box-title">Tóm tắt</h3>
                                <textarea class="form-control" id="editor1" name="TomTat" rows="3" placeholder="Nhập tóm tắt"></textarea>
                            </div>
                            <div class="box-body form-group">
                                <h3 class="box-title">Nội dung</h3>
                                <textarea class="form-control" id="editor2" name="NoiDung" rows="5" placeholder="Nhập nội dung"></textarea>
                            </div>
                            <div class="box-body form-group">
                                <h3 class="box-title">Hình</h3>
                                <input type="file" name="Hinh" >
                            </div>
                            <!-- radio -->
                            <div class="form-group box-body">
                                <h3 class="box-title">Nổi Bật</h3>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="NoiBat" value="0" checked>
                                        Không
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="NoiBat" value="1">
                                        Có
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