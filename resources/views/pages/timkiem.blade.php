@extends('layout.index')

@section('content')

    <div class="body_content">
        <div class="container">
            <div class="row">
                <!-- begin left menu -->
            @include('layout.menu')
            <!-- end left menu -->
                <!-- begin right content -->
                <?php
                    function doimau($str, $tukhoa){
                        return str_replace($tukhoa,"<span style='color:red;background:yellow;'>$tukhoa</span>",$str);
                    }
                ?>
                <div class="col-md-9">
                    <div class="right_content panel panel-default">
                        <div class="tieude panel-heading">Laravel Tin Tuc</div>
                        <div class="panel-body">
                            {{--begin item--}}
                            <div class="category_tieude">
                                <a>Tìm kiếm: {{$tukhoa}}</a>
                            </div>
                            @foreach($tintuc as $tt)
                                <div class="row row-item">
                                    <div class="khoiCategory">
                                        <div class="col-md-4">
                                            <img src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <h3 class="cate_tieude"><a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{!! doimau($tt->TieuDe, $tukhoa) !!}</a></h3>
                                            <p>{!! doimau($tt->TomTat, $tukhoa) !!}</p>
                                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="btn btn-info">Xem thêm</a>
                                        </div>
                                        <div class="duong_keLoaitin"></div>
                                    </div>
                                </div>
                            @endforeach
                            {{--end item--}}
                        </div>

                        {{--phan trang--}}
                        <div class="text-center">
                            {{--{{$tintuc->links()}}--}}
                        </div>
                    </div>
                </div>
                <!-- end right content -->
            </div>
        </div>
    </div>

@endsection
