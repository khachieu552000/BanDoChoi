<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')

    <link href="{{ asset('ad/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ad/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ad/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('ad/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('ad/css/startmin.css') }}" rel="stylesheet">
    <link href="{{ asset('ad/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('ad/css/style.css') }}">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.index') }}">Trang quản trị</a>
            </div>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->employee->name }}<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><i class="fa fa-user fa-fw"></i> Thông tin
                                tài khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('admin.index') }}" class="active"><i class="fa fa-dashboard fa-fw"></i>
                                Trang chủ</a>
                        </li>
                            <li>
                                <a href="{{ route('admin.DanhMuc.index') }}"><i class="fa fa-pied-piper-pp fa-fw"></i> Quản lý danh mục</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.sanpham.index') }}"><i class="fa fa-product-hunt fa-fw"></i> Quản lý sản phẩm</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.hoadonxuat.index') }}"><i class="fa fa-paste fa-fw"></i> Quản lý hoá đơn</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.khachhang.index') }}"><i class="fa fa-group fa-fw"></i> Quản lý khách hàng</a>
                            </li>
                        @if (Auth::user()->role == 1)
                            <li>
                                <a href="{{ route('admin.nhanvien.index') }}"><i class="fa fa-group fa-fw"></i> Quản lý nhân viên</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="{{ asset('ad/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ad/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ad/js/metisMenu.min.js') }}"></script>

    <script src="{{ asset('ad/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ad/js/dataTables/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('ad/js/startmin.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-admin').DataTable({
                responsive: true
            });
        });
    </script>

    <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có muốn xoá?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        $(".alert").fadeTo(4500, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });
    </script>
    @yield('script')
</body>

</html>
