<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost:3307", "root", "", "buspass");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT bus_pass.id, students.name, students.email, bus_pass.pass_type, bus_pass.start_date, bus_pass.end_date 
                        FROM bus_pass
                        JOIN students ON bus_pass.student_id = students.id
                        WHERE bus_pass.status='approved'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Approved Bus Passes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf3ff; /* pastel blue */
        }

        .table-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .navbar {
            background: #4a90e2 !important; /* match your theme */
        }

        h3 {
            font-weight: 600;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark px-4">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="admin_dashboard.php">Bus Pass Admin</a>
  </div>
</nav>

<div class="container py-4">

    <h3 class="mb-3 text-center">Approved Bus Passes</h3>

    <div class="table-card">

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Pass ID</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Pass Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>

                <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['pass_type']) ?></td>
                            <td><?= $row['start_date'] ?></td>
                            <td><?= $row['end_date'] ?></td>
                        </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center text-muted">No approved passes yet.</td></tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>

    <div class="text-center mt-4">
        <a href="admin_dashboard.php" class="btn btn-outline-secondary px-4">Back to Dashboard</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>