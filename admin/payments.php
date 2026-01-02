<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.php");
    exit;
}

if (isset($_GET['approve'])) {

    $pid = (int)$_GET['approve'];

    $p = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT * FROM payments WHERE id='$pid'")
    );

    mysqli_query($conn,"
        UPDATE users
        SET balance = balance + {$p['amount']}
        WHERE id='{$p['user_id']}'
    ");

    mysqli_query($conn,"
        UPDATE payments
        SET status='approved'
        WHERE id='$pid'
    ");
}

$q = mysqli_query($conn,"SELECT * FROM payments ORDER BY id DESC");
?>
<h3>Payments</h3>

<?php while($p = mysqli_fetch_assoc($q)): ?>
<p>
User #<?= $p['user_id'] ?> |
<?= $p['amount'] ?> <?= $p['currency'] ?> |
<?= $p['method'] ?> |
<?= $p['status'] ?>

<?php if($p['status']=="pending"): ?>
 | <a href="?approve=<?= $p['id'] ?>">Approve</a>
<?php endif; ?>
</p>
<?php endwhile; ?>
