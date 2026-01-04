<?php
require_once "../config/session.php";
if ($_SESSION['role'] != "user") {
  header("Location: ../index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="../assets/css/panel.css">
</head>
<body>

<div class="topbar">MASMM PANEL</div>

<div class="layout">

<div class="sidebar">
  <a class="active" href="dashboard.php">Dashboard</a>
  <a href="new-order.php">New Order</a>
  <a href="orders.php">Orders</a>
  <a href="../index.php?logout=1">Logout</a>
</div>

<div class="content">

<div class="stats">
  <div class="stat-box">
    <span>Balance</span>
    <h2>Rs 0</h2>
  </div>
  <div class="stat-box">
    <span>Total Orders</span>
    <h2>0</h2>
  </div>
  <div class="stat-box">
    <span>Total Spent</span>
    <h2>Rs 0</h2>
  </div>
</div>

</div>
</div>

</body>
</html>
