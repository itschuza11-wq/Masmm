<?php
include("../config/session.php");
if($_SESSION['role']!="user"){
 header("Location: ../index.php");
 exit;
}
?>
<h3>User Dashboard</h3>
<p>Balance: Rs 0</p>
<a href="new-order.php">New Order</a><br>
<a href="orders.php">My Orders</a><br>
<a href="affiliate.php">Affiliate</a>
