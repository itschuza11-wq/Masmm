<?php
require_once "../config/session.php";
require_once "../config/db.php";
if($_SESSION['role']!="user"){
 header("Location: ../index.php");
 exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>New Order</title>
<link rel="stylesheet" href="../assets/css/panel.css">
</head>
<body>

<div class="topbar">New Order</div>

<div class="layout">

<div class="sidebar">
<a href="dashboard.php">Dashboard</a>
<a class="active" href="new-order.php">New Order</a>
<a href="orders.php">My Orders</a>
</div>

<div class="content">

<div class="card">
<form method="post">
<select name="service">
<option>Instagram Followers</option>
<option>YouTube Views</option>
</select>

<input placeholder="Enter Link">
<input placeholder="Quantity">

<button>Submit Order</button>
</form>
</div>

</div>
</div>
</body>
</html>
