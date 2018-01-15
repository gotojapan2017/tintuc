@extends('layout.index')


@section('content')
    <div class="body_content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row khoi1_chitiet">
                        <h3 class="chitiet_td">{{$tintuc->TieuDe}}</h3>
                        <h4>by Admin</h4>
                        <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                        <p><span>Posted on {{$tintuc->created_at}}</span></p>
                        <div class="break duongke1"></div>
                        {{--<h3 class="chitiet_tdnd">Natus vel auctor penatibus aperiam odit aliquid quae,--}}
                            {{--scelerisque! Fugiat! Architecto sem, egestas quisquam venenatis! Temporibus,--}}
                            {{--habitant, mollit facilis sit neque eum eligendi. Blandit! Lacinia cillum ligula--}}
                            {{--laboris?</h3>--}}
                        <p class="chitiet_nd">{!! $tintuc->NoiDung !!}</p>
                        @if(isset($current_user))
                            <hr>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <form action="comment/{{$tintuc->id}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group _binhluan">
                                    <label for="comment">Viết bình luận ... <i class="fa fa-pencil-square-o"></i> </label>
                                    <textarea name="NoiDung" class="form-control" rows="5" id="comment"></textarea>
                                    <button class="btn btn-info" type="submit">Gửi</button>
                                </div>
                            </form>
                        @endif
                        <hr>
                        @foreach($tintuc->comment as $cm)
                        <div class="traloi">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="upload/tintuc/1-1-2.jpg" alt="">
                                </div>
                                <div class="col-md-9">
                                    <div class="traloi_text">
                                        <h3 class="traloi_td">{{$cm->user->name}} <span class="traloi_date">{{$cm->created_at}}</span></h3>
                                        <p class="traloi_nd">{!! $cm->NoiDung !!}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3  panel_lienquan">
                    <panel class="panel-default">
                        <div class="panel-heading">
                            Tin liên quan
                        </div>
                        @foreach($tinlienquan as $tlq)
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img width="100%" src="upload/tintuc/{{$tlq->Hinh}}" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="chitiet_td2"><a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html">{{$tlq->TieuDe}}</a></h3>
                                        <p class="chitiet_ttat">{{$tlq->TomTat}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="break"></div>
                        @endforeach
                    </panel>
                </div>
                <div class="col-md-3  panel_lienquan noibat">
                    <panel class="panel-default">
                        <div class="panel-heading">
                            Tin Nổi Bật
                        </div>
                        @foreach($tinnoibat as $tnb)
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img width="40%" src="upload/tintuc/{{$tnb->Hinh}}" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="chitiet_td2"><a href="tintuc/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}.html">{{$tnb->TieuDe}}</a></h3>
                                        <p class="chitiet_ttat">{{$tnb->TomTat}}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="break"></div>
                        @endforeach
                    </panel>
                </div>
            </div>
        </div>
    </div>

@endsection
