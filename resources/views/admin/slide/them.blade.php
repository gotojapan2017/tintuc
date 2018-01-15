@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm Slide
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{$err}} <br>
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
            <div class="row">
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form action="admin/slide/them" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Tên Slide</h3>
                                    <input type="input" class="form-control" id="Ten" name="Ten" placeholder=" Nhập tên Slide">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Hình</h3>
                                    <input type="file" class="form-control" name="Hinh">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Nội dung</h3>
                                    <textarea class="form-control" name="NoiDung" id="editor1" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <h3 class="box-title">Liên kết</h3>
                                    <input type="input" class="form-control" name="link" placeholder="Nhập liên kết">
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
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection