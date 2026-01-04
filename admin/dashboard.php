<?php
require_once "../config/session.php";
require_once "../config/db.php";
if($_SESSION['role']!="admin"){
 header("Location: ../index.php");
 exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="../assets/css/panel.css">
</head>
<body>

<div class="topbar">ADMIN PANEL</div>

<div class="layout">

<div class="sidebar">
<a class="active" href="dashboard.php">Dashboard</a>
<a href="#">Users</a>
<a href="#">Orders</a>
<a href="#">Services</a>
</div>

<div class="content">

<div class="stats">
 <div class="stat"><span>Users</span><h2>0</h2></div>
 <div class="stat"><span>Orders</span><h2>0</h2></div>
 <div class="stat"><span>Sales</span><h2>Rs 0</h2></div>
</div>

</div>
</div>
</body>
</html>
