<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Farmasi</title>
    <link rel="stylesheet" href={{ asset('aset/style.css') }} />
    <!-- Boxiocns CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href={{ asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}> --}}
    {{-- important --}}
    <link rel="stylesheet" href={{ asset("plugins/datatables/datatables.css") }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href={{ asset("dist/css/adminlte.min.css") }} />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <style>
      .input {
        font-size: 14px;
        color: gray;
        padding: 10px 10px;
        border-radius: 4px;
      }
    </style>
  </head>
  <body class="d-flex flex-column">
    <div class="sidebar close">
      <div class="header">
        <div class="logo">
          <img src="aset/assets/logo.png" alt="" />
        </div>
        <div class="list-item">
          <a href="#">
            <span class="sistem-farmasi">SISTEM FARMASI</span>
          </a>
        </div>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#">
            <i class="bx bx-home-alt"></i>
            <span class="link_name"> <b>Home</b> </span>
          </a>
          <ul class="sub-menu blank">
            <li>
              <a class="link_name" href="#"> <b>Home</b> </a>
            </li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bxs-inbox"></i>
              <span class="link_name"> <b>Data Obat</b> </span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li>
              <a class="link_name" href="#"> <b>Data Obat</b> </a>
            </li>
            <li><a href="{{ route('obat.index') }}">Katalog Obat</a></li>
            <li><a href="{{ route('type.index') }}">Jenis Obat</a></li>
            <li><a href="{{ route('category.index') }}">Kategori Obat</a></li>
            <li><a href="{{ route('satuan.index') }}">Satuan Obat</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bx-book-alt"></i>
              <span class="link_name"> <b>Data Stok</b> </span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li>
              <a class="link_name" href="#"> <b>Data Stok</b> </a>
            </li>
            <li><a href="{{ route('stocks.index') }}">Stok Obat</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bxs-truck"></i>
              <span class="link_name"> <b>Supplier Obat</b> </span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li>
              <a class="link_name" href="#"> <b>Supplier Obat</b> </a>
            </li>
            <li><a href="{{ route('brand.index') }}">Data Supplier</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bx-money"></i>
              <span class="link_name"> <b>Transaksi</b> </span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li>
              <a class="link_name" href="#"> <b>Transaksi</b> </a>
            </li>
            <li><a href="{{ route('jualans.index') }}">Penjualan Obat</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bxs-bell"></i>
              <span class="link_name"> <b>Pengaduan</b> </span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li>
              <a class="link_name" href="#"> <b>Pengaduan</b> </a>
            </li>
            <li><a href="{{ route('pengaduan.index') }}">Data Pengaduan</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bx-cog"></i>
              <span class="link_name"> <b>Lainnya</b> </span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li>
              <a class="link_name" href="#"> <b>Lainnya</b> </a>
            </li>
            <li><a href="#">Pengaturan</a></li>
            <li><a href="#">Tambah Akun</a></li>
          </ul>
        </li>
        <li>
          <div class="profile-details">
            <div class="profile-content">
              <img src="aset/assets/profile.webp" alt="profileImg" />
            </div>
            <div class="name-job">
              <div class="profile_name">Baizhu</div>
              <div class="job">Apoteker</div>
            </div>
            <i class="bx bx-log-out"></i>
          </div>
        </li>
      </ul>
    </div>

    <section class="home-section">
      <div class="home-content">
        <i class="bx bx-menu"></i>
        <span class="text">Direktori Aktif</span>
      </div>

      <div class="main-content">
        {{-- <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus dolores nam minima cupiditate magnam alias explicabo, iusto rem quisquam ut accusantium laboriosam, ratione minus expedita harum officia quam dicta perferendis?
        </p> --}}
        @yield('content')
      </div>

      <footer id="footer">
        <p>Copyright © <b>2023 Kelompok Farmasi</b> All rights reserved.</p>
      </footer>
    </section>

    <script src={{ asset('aset/script.js') }}></script>
    <!-- jQuery -->
    <script src={{ asset("dist/js/adminlte.js") }}></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    {{-- <script src={{ asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src={{ asset("dist/js/pages/dashboard.js") }}></script>
    <script type="text/javascript">
      $(function () {
          $('#datetimepicker1').datepicker({
              format: "yyyy/mm/dd",
              weekStart: 0,
              calendarWeeks: true,
              autoclose: true,
              todayHighlight: true, 
              orientation: "auto"
          });
      });
      $(function () {
          $('#datetimepicker2').datepicker({
              format: "yyyy/mm/dd",
              weekStart: 0,
              calendarWeeks: true,
              autoclose: true,
              todayHighlight: true, 
              orientation: "auto"
          });
      });
  </script>
  <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
  
    @stack('js')
    <script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  </body>
</html>
