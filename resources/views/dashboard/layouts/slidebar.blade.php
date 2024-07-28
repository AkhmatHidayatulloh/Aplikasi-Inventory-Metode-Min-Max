<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ (Request::is('admin/dashboard')) ? 'menu-open' : '' }} {{ (Request::is('admin/dashboard2')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (Request::is('admin/dashboard')) ? 'active' : '' }} {{ (Request::is('admin/dashboard2')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard" class="nav-link {{ (Request::is('admin/dashboard')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dashboard2" class="nav-link {{ (Request::is('admin/dashboard2')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (Request::is('admin/supplier')) ? 'menu-open' : '' }} {{ (Request::is('admin/customer')) ? 'menu-open' : '' }} {{ (Request::is('admin/barang')) ? 'menu-open' : '' }}"  >
            <a href="#" class="nav-link {{ (Request::is('admin/supplier')) ? 'active' : '' }} {{ (Request::is('admin/customer')) ? 'active' : '' }} {{ (Request::is('admin/barang')) ? 'active' : '' }}" > 
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="supplier" class="nav-link {{ (Request::is('admin/supplier')) ? 'active' : '' }}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="customer" class="nav-link {{ (Request::is('admin/customer')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barang" class="nav-link {{ (Request::is('admin/barang')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (Request::is('admin/transaksi_masuk')) ? 'menu-open' : '' }} {{ (Request::is('admin/transaksi_keluar')) ? 'menu-open' : '' }} "  >
            <a href="#" class="nav-link {{ (Request::is('admin/transaksi_masuk')) ? 'active' : '' }} {{ (Request::is('admin/transaksi_keluar')) ? 'active' : '' }} " > 
              <i class="nav-icon fas fa-table"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="supplier" class="nav-link {{ (Request::is('admin/transaksi_masuk')) ? 'active' : '' }}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="customer" class="nav-link {{ (Request::is('admin/transaksi_keluar')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>