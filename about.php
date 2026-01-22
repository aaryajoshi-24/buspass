<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Bus Pass Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f8f9fa;
        }

        /* GLASS NAVBAR */
        .glass-nav {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 9999;
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.25);
        }
        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #d1ecff !important;
        }

        /* FULLSCREEN HERO FIX */
        .about-hero {
            position: relative;
            width: 100%;
            height: calc(100vh + 80px);   /* keeps image fullscreen even under navbar */
            margin-top: -80px;            /* pulls hero image up behind navbar */
            background-image: url('https://thumbs.dreamstime.com/b/yellow-school-bus-traveling-scenic-mountain-landscape-autumn-foliage-drives-along-road-surrounded-vibrant-332237855.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .about-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.55);
            z-index: 1;
        }

        /* CENTERED TEXT */
        .about-text {
            position: absolute;
            top: 50%;                       /* exact center vertically */
            left: 50%;                      /* exact center horizontally */
            transform: translate(-50%, -50%);
            z-index: 2;
            text-align: center;
            color: white;
            width: 90%;
        }

        .about-text h1 {
            font-size: 3.3rem;
            font-weight: 700;
        }

        .about-text p {
            font-size: 1.4rem;
            margin-top: 10px;
        }

        /* CONTENT SECTION */
        .content-section {
            padding: 60px 20px;
        }
    </style>
</head>

<body>

<!-- NAVBAR WITHOUT LOGO -->
<nav class="navbar navbar-expand-lg navbar-dark glass-nav">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Bus Pass Portal</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="apply.php">Apply</a></li>
            <li class="nav-item"><a class="nav-link" href="status.php">Status</a></li>
            <li class="nav-item"><a class="nav-link" href="admin_login.php">Admin</a></li>
            <li class="nav-item"><a class="nav-link active" href="about.php">About Us</a></li>
        </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<div class="about-hero">
    <div class="about-overlay"></div>

    <div class="about-text">
        <h1>About Us</h1>
        <p>Your trusted digital bus pass management solution</p>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="container content-section">
    <h2 class="fw-bold text-primary mb-3">Who We Are</h2>
    <p class="text-muted fs-5">
        The Bus Pass Management System is designed to simplify and digitalize the traditional 
        process of applying, renewing, and managing bus passes.
    </p>

    <h2 class="fw-bold text-primary mt-5 mb-3">Our Mission</h2>
    <ul class="fs-5 text-muted">
        <li>Streamline the transport pass application process</li>
        <li>Reduce waiting time and paperwork</li>
        <li>Provide transparency to passengers</li>
        <li>Support institutions and transport authorities</li>
    </ul>

    <h2 class="fw-bold text-primary mt-5 mb-3">Features</h2>
    <ul class="fs-5 text-muted">
        <li>Online application for bus pass</li>
        <li>Real-time status tracking</li>
        <li>Easy renewal process</li>
        <li>Admin approval dashboard</li>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>