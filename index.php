<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bus Pass Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* FULLSCREEN HERO SECTION */
        .hero-section {
            position: relative;
            height: 100vh;
            width: 100%;
            background-image: url('https://i.pinimg.com/1200x/bb/e7/49/bbe749904e9b2060f26f1c8a2fce1b7d.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
        }

        .hero-text {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 3.5rem;
        }

        /* Card Hover Effect */
        .card-hover:hover {
            transform: translateY(-5px);
            transition: 0.2s;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* GLASS NAVBAR */
        .glass-nav {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.25);
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link {
            margin-left: 15px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #d1ecff !important;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

<!-- GLASS NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark glass-nav">
  <div class="container">

    <!-- LOGO + TEXT -->
    <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
        <img src="https://cdn-icons-png.flaticon.com/512/2983/2983946.png" 
             style="width:32px; height:32px; margin-right:10px;">
        Bus Pass Portal
    </a>

    <!-- Toggle Button for Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- NAV LINKS -->
    <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="#apply">Apply</a></li>
            <li class="nav-item"><a class="nav-link" href="#status">Status</a></li>
            <li class="nav-item"><a class="nav-link" href="admin_login.php">Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
        </ul>
    </div>

  </div>
</nav>


<!-- FULLSCREEN HERO SECTION -->
<div class="hero-section d-flex align-items-center justify-content-center">
    <div class="hero-overlay"></div>

    <div class="hero-text text-white">
        <h1 class="fw-bold">Bus Pass Management System</h1>
        <p class="fs-5">Smart, simple and digital transport pass service</p>
    </div>
</div>


<!-- CARDS BELOW HERO -->
<div class="container mt-5 mb-5">

    <div class="row g-4 justify-content-center">

        <div class="col-md-3">
            <div class="card card-hover h-100" id="apply">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Apply for Pass</h5>
                    <p class="text-muted">Submit a new bus pass application.</p>
                    <a href="apply.php" class="btn btn-outline-primary w-100">Apply Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-3" id="status">
            <div class="card card-hover h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Check Status</h5>
                    <p class="text-muted">Track your application progress.</p>
                    <a href="status.php" class="btn btn-outline-primary w-100">Check Status</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-hover h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Renew Pass</h5>
                    <p class="text-muted">Extend your bus pass validity.</p>
                    <a href="renew.php" class="btn btn-outline-primary w-100">Renew</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-hover h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Admin Panel</h5>
                    <p class="text-muted">Transport department login.</p>
                    <a href="admin_login.php" class="btn btn-outline-primary w-100">Admin Login</a>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
