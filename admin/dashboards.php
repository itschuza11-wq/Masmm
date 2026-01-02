<?php
$u = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM users"))[0];
$o = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM orders"))[0];
$s = mysqli_fetch_row(mysqli_query($conn,"SELECT SUM(price) FROM orders"))[0];
?>
<div class="card">Users: <?= $u ?></div>
<div class="card">Orders: <?= $o ?></div>
<div class="card">Sales: Rs <?= $s ?></div>
