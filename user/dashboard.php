<?php
require_once __DIR__ . "/../config/session.php";

// user login check
if (!isset($_SESSION['role']) || $_SESSION['role'] != "user") {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h3>User Dashboard</h3>

<p>
Welcome: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong>
</p>

<hr>

<a href="new-order.php">New Order</a><br>
<a href="orders.php">My Orders</a><br>
<a href="affiliate.php">Affiliate</a><br>

<hr>

<a href="../index.php?logout=1">Logout</a>

</body>
</html>
