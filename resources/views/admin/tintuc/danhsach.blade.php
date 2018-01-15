
@extends('admin.layout.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách Tin Tức
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu Đề</th>
                                    <th>Tên không dấu</th>
                                    <th>Tóm Tăt</th>
                                    <th>Thể Loại</th>
                                    <th>Loại Tin</th>
                                    <th>Nổi Bật</th>
                                    <th>Số Lượt Xem</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tintuc as $tt)
                                    <tr>
                                        <td>{{$tt->id}}</td>
                                        <td>
                                            <p>{{$tt->TieuDe}}</p>
                                            <img width="100" src="upload/tintuc/{{$tt->Hinh}}">
                                        </td>
                                        <td>{{$tt->TieuDeKhongDau}}</td>
                                        <td>{{$tt->TomTat}}</td>
                                        <td>{{$tt->loaitin->theloai->Ten}}</td>
                                        <td>{{$tt->loaitin->Ten}}</td>
                                        <td>
                                            @if($tt->NoiBat == 0)
                                                {{'Không'}}
                                            @else
                                                {{'Có'}}
                                            @endif
                                        </td>
                                        <td>{{$tt->SoLuotXem}}</td>
                                        <td class="center"><a href="admin/tintuc/sua/{{$tt->id}}"><i class="fa fa-pencil fa-fw"></i></a></td>
                                        <td class="center"><a href="admin/tintuc/xoa/{{$tt->id}}"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu Đề</th>
                                    <th>Tên không dấu</th>
                                    <th>Tóm Tăt</th>
                                    <th>Thể Loại</th>
                                    <th>Loại Tin</th>
                                    <th>Nổi Bật</th>
                                    <th>Số Lượt Xem</th>
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
