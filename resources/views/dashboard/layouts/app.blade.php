<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>Aplikasi Min Max</title>
    @endif

    <link rel="icon" href="{{ asset('admin/dist/img/AdminLTELogo.png') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

    <!-- Addtional style -->
    @hasSection('style')
        @yield('style')
    @endif

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="400" width="400">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="dashboard" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="ml-auto navbar-nav">
                <!-- Navbar Search -->

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" id="notificationDropdown">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge" id="notificationCount">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notificationMenu">
                        <span class="dropdown-item dropdown-header">Notifications</span>
                        <div class="dropdown-divider"></div>
                        <div id="notificationItems"></div>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ auth()->user()->name }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          this.closest('form').submit();">
                                <i class="fa fa-logout"></i>&nbsp;logout
                            </a>
                        </div>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('dashboard.layouts.slidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            @hasSection('title')
                                <h1 class="m-0">@yield('title')</h1>
                            @else
                                <h1>Aplikasi Min Max</h1>
                            @endif

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                @hasSection('title')
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                @else
                                    <li class="breadcrumb-item active">Aplikasi Min Max</li>
                                @endif

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script> --}}

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- SweetAlert2 -->
    {{-- <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select2 -->
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- additional script -->
    @hasSection('script')
        @yield('script')
    @endif

    <script>
        $(document).ready(function() {

            function loadNotifications() {
                $.ajax({
                    url: './notifications',
                    method: 'GET',
                    success: function(response) {
                        let notificationCount = response.length;
                        // Cek jika jumlah notifikasi 0, sembunyikan badge
                        if (notificationCount === 0) {
                            $('#notificationCount').hide();
                        } else {
                            $('#notificationCount').text(notificationCount).show();
                        }
                        $('#notificationItems').empty();

                        response.forEach(notification => {
                            $('#notificationItems').append(`
                    <a href="./notifications/read/${notification.id}" class="dropdown-item" >
                        <i class="mr-2 fas fa-exclamation-circle"></i>
                        <strong>${notification.title}</strong>
                        <p class="mb-1">${notification.message}</p>
                        <span class="float-right text-sm text-muted">${notification.waktu}</span>
                    </a>
                `);
                            $('#notificationItems').append(
                                '<div class="dropdown-divider"></div>');
                        });
                    }
                });
            }

            // Load notifications every 30 seconds
            loadNotifications();
            setInterval(loadNotifications, 30000);

            function loadNotificationCount() {
                $.ajax({
                    url: './notifications/count', // Pastikan rute ini sesuai dengan endpoint di backend
                    method: 'GET',
                    success: function(response) {

                        if (response.count == 0) {
                            $('#notificationBadge').text('');
                        } else {
                            // Asumsikan response.count berisi jumlah notifikasi
                            $('#notificationBadge').text(response.count);
                        }

                    },
                    error: function(xhr) {
                        console.error('Gagal mengambil jumlah notifikasi:', xhr);
                    }
                });
            }

            loadNotificationCount();
            setInterval(loadNotificationCount, 30000);

            function loadNotificationCountPending() {
                $.ajax({
                    url: './notifications-pending/count', // Pastikan rute ini sesuai dengan endpoint di backend
                    method: 'GET',
                    success: function(response) {

                        if (response.count == 0) {
                            $('#notificationBadgePending').text('');
                        } else {
                            // Asumsikan response.count berisi jumlah notifikasi
                            $('#notificationBadgePending').text(response.count);
                        }

                    },
                    error: function(xhr) {
                        console.error('Gagal mengambil jumlah notifikasi:', xhr);
                    }
                });
            }

            loadNotificationCountPending();
            setInterval(loadNotificationCountPending, 30000);
        });
    </script>
</body>

</html>
