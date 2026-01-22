<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Renew Bus Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf3ff; /* pastel blue */
        }

        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #4a90e2 !important;
        }

        .btn-primary {
            background: #4a90e2;
        }

        .btn-primary:hover {
            background: #3b7ac0;
        }

        .btn-outline-secondary:hover {
            background: #e2e6ea;
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
                <div class="card-header text-white">
                    <h5 class="mb-0 text-center">Renew Your Bus Pass</h5>
                </div>

                <div class="card-body">

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Registered Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Renew</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- PHP LOGIC SECTION -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $email = $_POST['email'];

                $conn = new mysqli("localhost:3307", "root", "", "buspass");

                if ($conn->connect_error) {
                    die("<div class='alert alert-danger'>Database error.</div>");
                }

                $student = $conn->query("SELECT * FROM students WHERE email='$email'")->fetch_assoc();

                if ($student) {

                    $id = $student['id'];
                    $pass = $conn->query("SELECT * FROM bus_pass WHERE student_id=$id")->fetch_assoc();

                    echo "<div class='card card-custom mb-4'><div class='card-body'>";

                    if ($pass) {

                        echo "<p><strong>Pass Status:</strong> " . htmlspecialchars($pass['status']) . "</p>";

                        if ($pass['status'] == "approved") {

                            $sql = "UPDATE bus_pass 
                                    SET end_date = DATE_ADD(end_date, INTERVAL 30 DAY) 
                                    WHERE student_id=$id";

                            if ($conn->query($sql) === TRUE) {
                                echo "<div class='alert alert-success'>
                                        🎉 Your pass has been renewed successfully!  
                                        <br>New end date is updated in the system.
                                      </div>";
                            } else {
                                echo "<div class='alert alert-danger'>Error while renewing pass. Try again later.</div>";
                            }

                        } else {
                            echo "<div class='alert alert-warning'>
                                    ⏳ Your pass is not approved yet.  
                                    <br>Renewal is allowed only after approval.
                                  </div>";
                        }

                    } else {
                        echo "<div class='alert alert-info'>No bus pass found for this student.</div>";
                    }

                    echo "</div></div>";

                } else {
                    echo "<div class='alert alert-danger'>No student found with this email.</div>";
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