<?php
// Database connection
$conn = new mysqli("localhost:3307", "root", "", "buspass");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pass_type = $_POST['pass_type'];

$success = false;
$errorMsg = "";

// Insert into students
$sql1 = "INSERT INTO students (name, email, phone, address) 
         VALUES ('$name', '$email', '$phone', '$address')";

if ($conn->query($sql1) === TRUE) {

    $student_id = $conn->insert_id;

    $sql2 = "INSERT INTO bus_pass (student_id, pass_type, start_date, end_date, status) 
             VALUES ($student_id, '$pass_type', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 30 DAY), 'pending')";

    if ($conn->query($sql2) === TRUE) {
        $success = true;
    } else {
        $errorMsg = $conn->error;
    }

} else {
    $errorMsg = $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Status</title>
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
        <div class="col-md-7">

            <div class="card card-custom p-4 text-center">

                <?php if ($success): ?>

                    <h3 class="text-success fw-bold mb-3">Application Submitted Successfully 🎉</h3>

                    <p class="text-muted fs-5">
                        Your bus pass request has been submitted with  
                        <span class="fw-bold text-primary">Pending</span> status.
                        <br><br>
                        You can check your status anytime using your registered email.
                    </p>

                <?php else: ?>

                    <h3 class="text-danger fw-bold mb-3">Oops! Something Went Wrong</h3>
                    <p class="text-muted">
                        Error: <?= htmlspecialchars($errorMsg) ?>
                    </p>

                <?php endif; ?>

                <a href="index.php" class="btn btn-primary mt-3 px-4">Go Back to Home</a>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>