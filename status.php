<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Bus Pass Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf3ff; /* pastel blue */
        }

        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .card-header {
            background: #4a90e2 !important;
        }

        .btn-primary {
            background: #4a90e2;
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #3b7ac0;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#4a90e2;">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Bus Pass Portal</a>
  </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- FORM CARD -->
            <div class="card card-custom mb-4">
                <div class="card-header text-white text-center">
                    <h5 class="mb-0">Check Your Bus Pass Status</h5>
                </div>

                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Registered Email</label>
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Check Status</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- PHP LOGIC -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $email = $_POST['email'];

                $conn = new mysqli("localhost:3307", "root", "", "buspass");

                if ($conn->connect_error) {
                    echo "<div class='alert alert-danger'>Database error.</div>";
                    exit();
                }

                $student = $conn->query("SELECT * FROM students WHERE email='$email'")->fetch_assoc();

                if ($student) {
                    $id = $student['id'];
                    $pass = $conn->query("SELECT * FROM bus_pass WHERE student_id=$id")->fetch_assoc();

                    if ($pass) { ?>

                        <div class="card card-custom">
                            <div class="card-body">
                                <h5 class="mb-3 fw-semibold">Pass Details</h5>

                                <p><strong>Name:</strong> <?= htmlspecialchars($student['name']) ?></p>
                                <p><strong>Pass Type:</strong> <?= htmlspecialchars($pass['pass_type']) ?></p>

                                <p><strong>Status:</strong>
                                    <span class="badge 
                                        <?= $pass['status']=='approved' ? 'bg-success' : 
                                        ($pass['status']=='rejected' ? 'bg-danger' : 'bg-warning text-dark') ?>">
                                        <?= htmlspecialchars(ucfirst($pass['status'])) ?>
                                    </span>
                                </p>

                                <p><strong>Start Date:</strong> <?= $pass['start_date'] ?></p>
                                <p><strong>End Date:</strong> <?= $pass['end_date'] ?></p>
                            </div>
                        </div>

                    <?php } else {
                        echo '<div class="alert alert-info">No bus pass found for this student.</div>';
                    }

                } else {
                    echo '<div class="alert alert-danger">No student found with this email.</div>';
                }

                $conn->close();
            }
            ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>