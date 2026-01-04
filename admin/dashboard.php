<?php
require_once __DIR__ . "/../config/session.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    header("Location: ../index.php");
    exit;
}

// stats
$users  = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM users"))[0];
$orders = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM orders"))[0];
$sales  = mysqli_fetch_row(mysqli_query($conn,"SELECT SUM(price) FROM orders"))[0];
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h3>Admin Dashboard</h3>

<div>Users: <?php echo $users; ?></div>
<div>Orders: <?php echo $orders; ?></div>
<div>Sales: Rs <?php echo $sales ?? 0; ?></div>

<hr>

<a href="users.php">Users</a><br>
<a href="orders.php">Orders</a><br>
<a href="services.php">Services</a><br>
<a href="providers.php">API Providers</a><br>
<a href="payments.php">Payments</a><br>

<hr>

<a href="../index.php?logout=1">Logout</a>

</body>
</html>
