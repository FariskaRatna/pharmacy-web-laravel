
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmasi</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href={{ asset('aset/style.css') }} />
  <link rel="stylesheet" href={{ asset('aset/home.css') }}>
  <!-- Boxiocns CDN Link -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <!-- Google Font: Source Sans Pro -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("plugins/fontawesome-free/css/all.min.css") }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  {{-- <link rel="stylesheet" href="{{ asset(plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css) }}"> --}}
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{ asset(plugins/icheck-bootstrap/icheck-bootstrap.min.css) }}"> --}}
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{ asset(plugins/jqvmap/jqvmap.min.css) }}"> --}}
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href={{ asset("dist/css/adminlte.min.css") }}> --}}
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}>
  <link rel="stylesheet" href={{ asset("plugins/datatables/datatables.css") }}>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Daterange picker -->
  {{-- <link rel="stylesheet" href="{{ asset(plugins/daterangepicker/daterangepicker.css) }}"> --}}
  <!-- summernote -->
  {{-- <link rel="stylesheet" href="{{ asset(plugins/summernote/summernote-bs4.min.css) }}"> --}}

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
            <a class="link_name" href="home"> <b>Home</b> </a>
          </li>
        </ul>
      </li>
      {{-- <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bxs-notepad"></i>
            <span class="link_name"> <b>UAS</b> </span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li>
            <a class="link_name" href="#"> <b>UAS</b> </a>
          </li>
          <li><a href="#">Fariska Ratna F</a>
            <ul>
              <li><a href="#">Data Prodi</a></li>
              <li><a href="#">Data Matkul</a></li>
              <li><a href="#">Data Mahasiswa</a></li>
              <li><a href="#">Data Nilai</a></li>
            </ul>
          </li>
          <li><a href="#">Alvarizqi</a></li>
          <li><a href="#">Safira Husnun N</a></li>
          <li><a href="#">Susilo Surya P</a></li>
          <li><a href="#">Sandya Agung A</a></li>
        </ul>
      </li> --}}
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
          <li><a href="/jualans">Tambah Penjualan</a></li>
          <li><a href="{{ route('jualans.home') }}">Laporan Penjualan</a></li>
          <li><a href="/pembelians">Pembelian Obat</a></li>
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
            <img src="aset/assets/lijeong.jpg" alt="profileImg" />
          </div>
          <div class="name-job">
            <div class="profile_name">Lijeong</div>
            <div class="job">Apoteker</div>
          </div>
          <a href="{{ route('logout') }}">
            <i class="bx bx-log-out"></i>
          </a>
        </div>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="home-content">
      <i class="bx bx-menu"></i>
      <span class="text">Sistem Farmasi</span>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<!-- ChartJS -->
{{-- <script src={{ asset("plugins/chart.js/Chart.min.js") }}></script> --}}
<!-- Sparkline -->
{{-- <script src={{ asset("plugins/sparklines/sparkline.js") }}></script> --}}
<!-- JQVMap -->
{{-- <script src={{ asset("plugins/jqvmap/jquery.vmap.min.js") }}></script> --}}
{{-- <script src={{ asset("plugins/jqvmap/maps/jquery.vmap.usa.js") }}></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src={{ asset("plugins/jquery-knob/jquery.knob.min.js") }}></script> --}}
<!-- daterangepicker -->
{{-- <script src={{ asset("plugins/moment/moment.min.js") }}></script> --}}
{{-- <script src={{ asset("plugins/daterangepicker/daterangepicker.js") }}></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src={{ asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script> --}}
<!-- Summernote -->
{{-- <script src={{ asset("plugins/summernote/summernote-bs4.min.js") }}></script> --}}
<!-- overlayScrollbars -->
<script src={{ asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("dist/js/adminlte.js") }}></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src={{ asset("dist/js/demo.js") }}></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src={{ asset("dist/js/pages/dashboard.js") }}></script> --}}
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
<script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>