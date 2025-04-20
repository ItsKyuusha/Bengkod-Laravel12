<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="description" content="Bengkel Koding UTS">
  <meta name="keywords" content="Laravel 12">
  <meta name="author" content="David Sugiarto">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthApp - Management Health System</title>
  <link rel="shortcut icon" href="{{ asset('storage/logo.png') }}" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">

    <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#logoutModal">
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link text-center">
      <span class="brand-text font-weight-light">HealthApp</span>
    </a>

    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center align-items-center">
    <div class="info text-center">
      <a href="#" class="d-block">{{ Auth::user()->nama ?? 'Guest' }}</a>
    </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          {{-- Dokter --}}
          @if(Auth::user() && Auth::user()->role === 'dokter')
            <li class="nav-item">
              <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dokter.obat') }}" class="nav-link {{ request()->routeIs('dokter.obat*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-capsules"></i>
                <p>Kelola Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dokter.periksa') }}" class="nav-link {{ request()->routeIs('dokter.periksa*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-stethoscope"></i>
                <p>Pemeriksaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dokter.riwayat') }}" class="nav-link {{ request()->routeIs('dokter.riwayat') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-medical-alt"></i>
                <p>Riwayat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dokter.profile') }}" class="nav-link {{ request()->routeIs('dokter.profile') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-md"></i>
                <p>Profil</p>
              </a>
            </li>
          @endif

          {{-- Pasien --}}
          @if(Auth::user() && Auth::user()->role === 'pasien')
            <li class="nav-item">
              <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pasien.periksa') }}" class="nav-link {{ request()->routeIs('pasien.periksa') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar-plus"></i>
                <p>Daftar Pemeriksaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pasien.riwayat') }}" class="nav-link {{ request()->routeIs('pasien.riwayat') ? 'active' : '' }}">
                <i class="nav-icon fas fa-history"></i>
                <p>Riwayat Pemeriksaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pasien.profile') }}" class="nav-link {{ request()->routeIs('pasien.profile') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Profil</p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Page header -->
    <div class="content-header">
      <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center">
          <h4 class="mb-0">@yield('title', 'Dashboard')</h4>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-sm text-center">
    <strong>&copy; {{ date('Y') }} HealthApp</strong> - Sistem Manajemen Kesehatan
  </footer>
</div>

<!-- jQuery -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @elseif(session('error'))
        toastr.error("{{ session('error') }}");
    @elseif(session('warning'))
        toastr.warning("{{ session('warning') }}");
    @elseif(session('info'))
        toastr.info("{{ session('info') }}");
    @endif
</script>


<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-danger">Ya, Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
