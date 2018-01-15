@extends('layout.index')

@section('content')
<!-- begin slide -->
@include('layout.slide')
<!-- end slide -->
<div class="body_content">
    <div class="container">
        <div class="row">
            <!-- begin left menu -->
            @include('layout.menu')
        <!-- end left menu -->
            <!-- begin right content -->
            <div class="col-md-9">
                <div class="right_content panel panel-default">
                    <div class="tieude panel-heading">Laravel Tin Tuc</div>
                    <div class="panel-body">
                        @foreach($theloai as $tl)
                            @if(count($tl->loaitin) > 0)
                                {{--begin item--}}
                                <div class="category_tieude">
                                    <a href="#">{{$tl->Ten}}</a> |
                                    @foreach($tl->loaitin as $lt)
                                        <small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a> /</small>
                                    @endforeach
                                </div>
                                <div class="row row-item">
                                    {{--Lay ra 5 tin tuc Noi Bat, Moi nhat--}}
                                    <?php
                                        $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('create_at')->take(5);
                                        $tin1 = $data->shift();
                                    ?>
                                    <div class="khoiCategory col-md-8">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <img src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                            </div>
                                            <div class="col-md-5">
                                                <h3 class="cate_tieude"><a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">{{$tin1['TieuDe']}}</a></h3>
                                                <p>{{$tin1['TomTat']}}</p>
                                                <a class="btn btn-info" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem thêm</a>
                                                <div class="break"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="khoi_phai col-md-4">
                                        @foreach($data->all() as $tintuc)
                                            <p><a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html"><span class="fa fa-align-left"></span> {{$tintuc['TieuDe']}}</a></p>
                                        @endforeach
                                    </div>
                                    <div class="duong_ke"></div>
                                </div>
                                {{--end item--}}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end right content -->
        </div>
    </div>
</div>

@endsection
