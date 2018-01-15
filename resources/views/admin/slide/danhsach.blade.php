
@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách Slide
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hình</th>
                                    <th>Nội dung</th>
                                    <th>Link</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($slide as $sl)
                                    <tr>
                                        <td>{{$sl->id}}</td>
                                        <td>{{$sl->Ten}}</td>
                                        <td><img width="400px" src="upload/slide/{{$sl->Hinh}}" alt="Hinh Slide"></td>
                                        <td>{{$sl->NoiDung}}</td>
                                        <td>{{$sl->link}}</td>
                                        <td class="center"><a href="admin/slide/sua/{{$sl->id}}"><i class="fa fa-pencil fa-fw"></i></a></td>
                                        <td class="center"><a href="admin/slide/xoa/{{$sl->id}}"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hình</th>
                                    <th>Nội dung</th>
                                    <th>Link</th>
                                    <th>Sửa</th>
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
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
