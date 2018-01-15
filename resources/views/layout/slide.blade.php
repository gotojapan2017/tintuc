<div class="slide_top">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $i = 0; ?>
                @foreach($slide as $sl)
                    <li data-target="#myCarousel" data-slide-to="{{$i}}"
                        @if ($i == 0)
                            class="active"
                        @endif
                    ></li>
                    <?php $i++; ?>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php $i = 0; ?>
                @foreach($slide as $sl)
                    <div
                        @if ($i == 0)
                            class="item active"
                        @else
                            class="item"
                        @endif
                    >
                        <?php $i++; ?>
                        <img src="upload/slide/{{$sl->Hinh}}" alt="{{$sl->NoiDung}}">
                        <div class="carousel-caption">
                            <h3>{{$sl->Ten}}</h3>
                            <p>{!! $sl->NoiDung !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>