<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.php");
    exit;
}

/* counts (future-ready) */
$users  = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM users"));
$orders = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM orders"));
$salesQ = mysqli_query($conn,"SELECT SUM(price) as total FROM orders WHERE status!='cancelled'");
$salesR = mysqli_fetch_assoc($salesQ);
$sales  = $salesR['total'] ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard - masmmpanel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{font-family:Arial;background:#f5f5f5}
.box{background:#fff;padding:10px;margin-bottom:10px;border-radius:5px}
a{display:block;padding:10px;background:#222;color:#fff;text-decoration:none;margin-bottom:6px;border-radius:4px}
</style>
</head>
<body>

<h3>Admin Dashboard</h3>

<div class="box">Users: <?= $users ?></div>
<div class="box">Orders: <?= $orders ?></div>
<div class="box">Sales: Rs <?= number_format($sales,2) ?></div>

<a href="users.php">Users</a>
<a href="orders.php">Orders</a>
<a href="services.php">Services</a>
<a href="providers.php">API Providers</a>

<a href="../index.php?logout=1" style="background:#b00000">Logout</a>

</body>
</html>
