<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apply for Bus Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf3ff; /* pastel blue */
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin-top: 40px;
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card card-custom">
                <div class="card-header text-white text-center">
                    <h4 class="mb-0">Bus Pass Application Form</h4>
                </div>

                <div class="card-body">

                    <form action="save_application.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email ID</label>
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Enter your current address" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pass Type</label>
                            <select name="pass_type" class="form-select">
                                <option value="monthly">Monthly Pass</option>
                                <option value="semester">Semester Pass</option>
                                <option value="yearly">Yearly Pass</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="index.php" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Submit Application</button>
                        </div>

                    </form>
                </div>

                <div class="card-footer text-muted text-center small">
                    * Your application will be reviewed by the transport department.
                </div>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>