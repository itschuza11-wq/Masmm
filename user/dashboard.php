<?php
require_once "../config/session.php";
if($_SESSION['role']!="user"){header("Location: ../index.php");exit;}
?>
<!DOCTYPE html>
<html>
<head>
<title>MASMM Panel</title>
<link rel="stylesheet" href="../assets/css/panel.css">
<script>
function toggleMenu(){
 document.querySelector('.sidebar').classList.toggle('show');
}
</script>
</head>
<body>

<div class="topbar">
 <div class="left">
  <div class="menu-btn" onclick="toggleMenu()">☰</div>
  <div class="logo">MASMM PANEL</div>
 </div>
 <div><?php echo $_SESSION['email']; ?></div>
</div>

<div class="layout">

<div class="sidebar">
<a class="active" href="dashboard.php">Dashboard</a>
<a href="new-order.php">New Order</a>
<a href="orders.php">My Orders</a>
<a href="add-funds.php">Add Funds</a>
<a href="affiliate.php">Affiliate</a>
<a href="tickets.php">Support</a>
<a href="../index.php?logout=1">Logout</a>
</div>

<div class="content">

<div class="cards">
 <div class="card">Balance<h3>Rs 0</h3></div>
 <div class="card">Orders<h3>0</h3></div>
 <div class="card">Spent<h3>Rs 0</h3></div>
 <div class="card">Status<h3>Reseller</h3></div>
</div>

</div>
</div>
</body>
</html>
