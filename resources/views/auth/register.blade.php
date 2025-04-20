<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ asset('AdminLTE-3.2.0/index2.html') }}"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"> Register a new membership</p>
      <form action="{{ route('register') }}" method="POST">
      @csrf
        <!-- Nama -->
        <div class="input-group mb-3">
            <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
            <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>
        </div>

        <!-- Alamat -->
        <div class="input-group mb-3">
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            <div class="input-group-append"><div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div></div>
        </div>

        <!-- Nomor HP -->
        <div class="input-group mb-3">
            <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP" required>
            <div class="input-group-append"><div class="input-group-text"><span class="fas fa-phone"></span></div></div>
        </div>

        <!-- Email -->
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
        </div>

        <!-- Role -->
        <div class="input-group mb-3">
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="pasien">Pasien</option>
                <option value="dokter">Dokter</option>
            </select>
        </div>

        <div class="row">
            <div class="col-8">
                <a href="{{ route('login') }}">Sudah punya akun?</a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-success btn-block">Daftar</button>
            </div>
        </div>
      </form>


      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
