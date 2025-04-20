<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Selamat Datang | HealthApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Fonts & AdminLTE -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;600&display=swap">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #a8edea, #fed6e3);
      background-size: 300% 300%;
      animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    .hero-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      padding: 2rem;
    }

    .hero-text {
      flex: 1 1 450px;
      padding: 2rem;
      text-align: center;
    }

    .hero-text h1 {
      font-family: 'Great Vibes', cursive;
      font-size: 3.2rem;
      color: #5d1049;
    }

    .hero-text h2 {
      font-weight: 700;
      font-size: 2rem;
      color: #2563eb;
      margin-bottom: 1rem;
    }

    .hero-text p {
      color: #555;
      margin-bottom: 2rem;
    }

    .hero-buttons {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .hero-buttons a {
      min-width: 140px;
      font-weight: 500;
      padding: 0.6rem 1.5rem;
      border-radius: 30px;
      transition: all 0.3s ease;
    }

    .hero-buttons a.btn-primary:hover {
      background-color: #1d4ed8;
    }

    .hero-buttons a.btn-success:hover {
      background-color: #059669;
    }

    .hero-img {
      flex: 1 1 500px;
      text-align: center;
      padding: 1rem;
    }

    .hero-img img {
      max-width: 100%;
      height: auto;
    }

    @media (max-width: 768px) {
      .hero-text {
        padding: 1.5rem;
      }
    }
  </style>
</head>
<body>

<div class="hero-container">
  
  <!-- Kiri: Teks -->
  <div class="hero-text">
    <h1>Welcome to Health App</h1>
    <p>Sistem manajemen kesehatan digital yang modern dan ramah untuk pasien dan dokter.</p>

    <div class="hero-buttons">
      <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-sign-in-alt me-1"></i> Login
      </a>
      <a href="{{ route('register') }}" class="btn btn-success btn-lg">
        <i class="fas fa-user-plus me-1"></i> Daftar
      </a>
    </div>
  </div>

  <!-- Kanan: Gambar -->
  <div class="hero-img">
    <img src="{{ asset('storage/mockup.png') }}" alt="HealthApp Welcome Image">
  </div>

</div>

<!-- Scripts -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
