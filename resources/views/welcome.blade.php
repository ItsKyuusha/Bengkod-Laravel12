<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Selamat Datang</title>
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <b>Health</b>App
  </div>

  <div class="card">
    <div class="card-body login-card-body text-center">
      <h4>Selamat Datang di Sistem Manajemen Kesehatan</h4>
      <p class="mt-3">
        <a href="{{ route('login') }}" class="btn btn-primary btn-block">Login</a>
        <a href="{{ route('register') }}" class="btn btn-success btn-block">Daftar</a>
      </p>
    </div>
  </div>
</div>

<script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
