
@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách Loại Tin
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Loại Tin</th>
                                    <th>Thể Loại</th>
                                    <th>Tên không dấu</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loaitin as $lt)
                                    <tr>
                                        <td>{{$lt->id}}</td>
                                        <td>{{$lt->Ten}}</td>
                                        <td>{{$lt->theloai->Ten}}</td>
                                        <td>{{$lt->TenKhongDau}}</td>
                                        <td class="center"><a href="admin/loaitin/sua/{{$lt->id}}"><i class="fa fa-pencil fa-fw"></i></a></td>
                                        <td class="center"><a href="admin/loaitin/xoa/{{$lt->id}}"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Loại Tin</th>
                                    <th>Thể Loại</th>
                                    <th>Tên không dấu</th>
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
