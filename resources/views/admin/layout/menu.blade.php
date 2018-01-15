<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Aoverz Design</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">ADMIN</li>
            <li class="active treeview">
                <a>
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    {{--<span class="pull-right-container">--}}
                      {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                    {{--<li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard</a></li>--}}
                {{--</ul>--}}
            </li>
            <li class="treeview">
                <a href="admin/theloai/danhsach">
                    <i class="fa fa-pie-chart"></i>
                    <span>Thể loại</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/theloai/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="admin/theloai/them"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin/loaitin/danhsach">
                    <i class="fa fa-pie-chart"></i>
                    <span>Loại Tin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/loaitin/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="admin/loaitin/them"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin/tintuc/danhsach">
                    <i class="fa fa-pie-chart"></i>
                    <span>Tin Tức</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/tintuc/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="admin/tintuc/them"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="admin/tintuc/danhsach">
                    <i class="fa fa-pie-chart"></i>
                    <span>Slide</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/slide/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="admin/slide/them"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/user/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="admin/user/them"><i class="fa fa-circle-o"></i> Thêm</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>