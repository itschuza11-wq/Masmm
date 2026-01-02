<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "user") {
    header("Location: ../index.php");
    exit;
}
?>

<h3>User Dashboard</h3>

<p>Balance: Rs 0</p>

<a href="new-order.php">New Order</a><br>
<a href="orders.php">My Orders</a><br>
<a href="affiliate.php">Affiliate</a><br>
<a href="add-funds.php">Add Funds</a><br>

<hr>

<a href="../index.php?logout=1">Logout</a>
