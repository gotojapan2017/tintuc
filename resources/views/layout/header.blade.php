<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="trangchu">Laravel Tin Tức</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a >Giới Thiệu</a></li>
                <li><a href="lienhe">Liên Hệ</a></li>
            </ul>
            <form action="timkiem" method="POST" class="navbar-form navbar-left" role="search">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm">
                </div>
                <button type="submit" class="btn btn-default">Tìm</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if(!isset($current_user))
                    <li><a href="dangky">Đăng ký</a></li>
                    <li><a href="dangnhap">Đăng nhập</a></li>
                @else
                    <li><a href="nguoidung" class="fa  fa-user-secret ten_user"> {{$current_user->name}}</a></li>
                    <li><a href="dangxuat">Đăng xuất</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
