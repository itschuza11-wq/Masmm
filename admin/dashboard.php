<?php
include("../config/session.php");
if($_SESSION['role']!="admin"){
 header("Location: ../index.php");
 exit;
}
?>
<h3>Admin Panel</h3>
<p>Users: 0</p>
<p>Orders: 0</p>
<a href="users.php">Users</a><br>
<a href="orders.php">Orders</a><br>
<a href="services.php">Services</a>
