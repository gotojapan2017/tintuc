<div class="col-md-3">
    <nav class="navigation">
        <ul class="mainmenu">
            @foreach($theloai as $tl)
                @if(count($tl->loaitin) > 0)
                    <li><a >{{$tl->Ten}}</a>
                        @foreach($tl->loaitin as $lt)
                            <ul class="submenu">
                                <li><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a></li>
                            </ul>
                        @endforeach
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>