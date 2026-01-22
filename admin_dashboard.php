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

if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $conn->query("UPDATE bus_pass SET status='approved' WHERE id=$id");
}

if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    $conn->query("UPDATE bus_pass SET status='rejected' WHERE id=$id");
}

$pending = $conn->query("SELECT bus_pass.id, students.name, students.email, bus_pass.pass_type, bus_pass.status 
                        FROM bus_pass
                        JOIN students ON bus_pass.student_id = students.id
                        WHERE bus_pass.status='pending'");

$totalApproved = $conn->query("SELECT COUNT(*) AS c FROM bus_pass WHERE status='approved'")->fetch_assoc()['c'];
$totalRejected = $conn->query("SELECT COUNT(*) AS c FROM bus_pass WHERE status='rejected'")->fetch_assoc()['c'];
$totalPending  = $pending->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf3ff; /* pastel blue background */
        }
        .navbar {
            background: #4a90e2 !important;
        }
        .stat-card {
            border: none;
            border-radius: 15px;
            padding: 20px;
            color: white;
            box-shadow: 0 8px 18px rgba(0,0,0,0.08);
        }
        .stat-icon {
            font-size: 40px;
            opacity: 0.8;
        }
        .stat-1 { background: #4CAF50; }
        .stat-2 { background: #FFA726; }
        .stat-3 { background: #EF5350; }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }

        .btn-approve {
            background: #4CAF50;
            color: white;
        }
        .btn-approve:hover {
            background: #409743;
        }

        .btn-reject {
            background: #EF5350;
            color: white;
        }
        .btn-reject:hover {
            background: #d54440;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark px-4">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
    <div>
        <a href="index.php" class="btn btn-light btn-sm">User Site</a>
    </div>
  </div>
</nav>

<div class="container py-4">

    <!-- STATISTICS CARDS -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="stat-card stat-1">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Approved Passes</h6>
                        <h2><?= $totalApproved ?></h2>
                    </div>
                    <div class="stat-icon">✔</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card stat-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Pending Applications</h6>
                        <h2><?= $totalPending ?></h2>
                    </div>
                    <div class="stat-icon">⏳</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card stat-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Rejected Passes</h6>
                        <h2><?= $totalRejected ?></h2>
                    </div>
                    <div class="stat-icon">❌</div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-container mt-5">
        <h4 class="mb-3 fw-semibold">Pending Applications</h4>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Pass Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php if ($pending->num_rows > 0): ?>
                    <?php while ($row = $pending->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['pass_type']) ?></td>
                            <td><span class="badge bg-warning text-dark"><?= ucfirst($row['status']) ?></span></td>
                            <td>
                                <a href="admin_dashboard.php?approve=<?= $row['id'] ?>" class="btn btn-sm btn-approve">Approve</a>
                                <a href="admin_dashboard.php?reject=<?= $row['id'] ?>" class="btn btn-sm btn-reject">Reject</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center text-muted">No pending applications.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="approved_passes.php" class="btn btn-outline-primary px-4">View Approved Passes</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>