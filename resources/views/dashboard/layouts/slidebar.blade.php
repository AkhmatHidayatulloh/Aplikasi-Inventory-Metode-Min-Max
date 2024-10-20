<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi Min Max</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (auth()->user()->role == 'super visor' || auth()->user()->role == 'admin')
            <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                <div class="image">
                    <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="dashboard" class="d-block">Admin </a>
                </div>
            </div>
        @else
            <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                <div class="image">
                    <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="dashboard" class="d-block">Gudang </a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item {{ Request::is('admin/dashboard') ? 'menu-open' : '' }} ">
                    <a href="#" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="dashboard" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>

                    </ul>
                </li>


                @if (auth()->user()->role == 'super visor' || auth()->user()->role == 'admin')
                    <li
                        class="nav-item {{ Request::is('admin/supplier') ? 'menu-open' : '' }} {{ Request::is('admin/customer') ? 'menu-open' : '' }} {{ Request::is('admin/barang') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/supplier') ? 'active' : '' }} {{ Request::is('admin/customer') ? 'active' : '' }} {{ Request::is('admin/barang') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="supplier"
                                    class="nav-link {{ Request::is('admin/supplier') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Supplier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="customer"
                                    class="nav-link {{ Request::is('admin/customer') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="barang" class="nav-link {{ Request::is('admin/barang') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li
                    class="nav-item {{ Request::is('admin/transaksi_masuk') ? 'menu-open' : '' }} {{ Request::is('admin/transaksi_keluar') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ Request::is('admin/transaksi_masuk') ? 'active' : '' }} {{ Request::is('admin/transaksi_keluar') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="transaksi_masuk"
                                class="nav-link {{ Request::is('admin/transaksi_masuk') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="transaksi_keluar"
                                class="nav-link {{ Request::is('admin/transaksi_keluar') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi Barang Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ Request::is('admin/laporan-masuk') ? 'menu-open' : '' }} {{ Request::is('admin/laporan-keluar') ? 'menu-open' : '' }} {{ Request::is('admin/laporan-perhitungan') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ Request::is('admin/laporan-masuk') ? 'active' : '' }} {{ Request::is('admin/laporan-keluar') ? 'active' : '' }} {{ Request::is('admin/laporan-perhitungan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="laporan-masuk"
                                class="nav-link {{ Request::is('admin/laporan-masuk') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="laporan-keluar"
                                class="nav-link {{ Request::is('admin/laporan-keluar') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi Barang Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="laporan-perhitungan"
                                class="nav-link {{ Request::is('admin/laporan-perhitungan') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perhitungan Min Max</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (auth()->user()->role == 'super visor' || auth()->user()->role == 'admin')
                    <li class="nav-header">Menu</li>
                    <li class="nav-item">
                        <a href="perhitungan-min-max"
                            class="nav-link {{ Request::is('admin/perhitungan-min-max') ? 'active' : '' }}">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Perhitungan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="verif-permintaan-keluar"
                            class="nav-link {{ Request::is('admin/verif-permintaan-keluar') ? 'active' : '' }}">
                            <i class="far fa-check-circle nav-icon"></i>
                            <p>
                                Verifikasi Permintaan
                                <span id="notificationBadgePending" class="badge badge-warning right"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="notif" class="nav-link {{ Request::is('admin/notif') ? 'active' : '' }}">
                            <i class="nav-icon far fa-bell "></i>
                            <p>
                                Notifikasi Restock
                                <span id="notificationBadge" class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
