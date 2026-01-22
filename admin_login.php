<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #dcebfd; /* pastel blue */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .login-card {
            background: #ffffff; /* white background */
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .card-header {
            background: #4a90e2 !important; /* darker blue */
        }

        .btn-login {
            background: #4a90e2;
            color: white;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #3b7ac0;
        }

    </style>
</head>
<body>

<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid login details";
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background:#4a90e2;">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Bus Pass Portal - Admin</a>
  </div>
</nav>

<div class="container py-5 d-flex justify-content-center">
    <div class="col-md-4">

        <div class="card login-card">
            <div class="card-header text-white text-center">
                <h5 class="mb-0">Admin Login</h5>
            </div>

            <div class="card-body">

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-login w-100">Login</button>
                </form>
            </div>

            <div class="card-footer text-muted small text-center">
                Default: admin / admin123
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>