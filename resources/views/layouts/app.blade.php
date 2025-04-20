<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ config('app.name', 'HealthApp') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">

  @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar user -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">HealthApp</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
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
            <a href="{{ route('dokter.obat') }}" class="nav-link {{ request()->routeIs('obat.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-capsules"></i>
                <p>Kelola Obat</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('dokter.periksa') }}" class="nav-link {{ request()->routeIs('periksa.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-stethoscope"></i>
                <p>Pemeriksaan</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('dokter.riwayat') }}" class="nav-link {{ request()->routeIs('riwayat.*') ? 'active' : '' }}">
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
    @yield('content')
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
</body>
</html>
