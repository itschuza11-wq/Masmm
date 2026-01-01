<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.php");
    exit;
}

$q = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
?>
<h3>All Orders</h3>

<?php while($o = mysqli_fetch_assoc($q)): ?>
<p>
<b>#<?= $o['id'] ?></b> |
<?= $o['service'] ?> |
<?= $o['quantity'] ?> |
<?= $o['status'] ?>
</p>
<?php endwhile; ?>
