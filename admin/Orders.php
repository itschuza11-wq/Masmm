<?php
include("../config/session.php");
include("../config/db.php");
include("../config/api.php");

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.php");
    exit;
}

if (isset($_GET['send'])) {

    $order_id = (int)$_GET['send'];

    // get order
    $o = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT * FROM orders WHERE id='$order_id'")
    );

    // get provider (first active)
    $p = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT * FROM providers WHERE status=1 LIMIT 1")
    );

    $resp = sendOrder(
        $p['api_url'],
        $p['api_key'],
        $o['service'],
        $o['link'],
        $o['quantity']
    );

    if (isset($resp['order'])) {
        mysqli_query($conn,"
            UPDATE orders
            SET status='processing',
                api_order_id='{$resp['order']}',
                provider_id='{$p['id']}'
            WHERE id='$order_id'
        ");
    }
}

$q = mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");
?>
<h3>Orders</h3>

<?php while($o = mysqli_fetch_assoc($q)): ?>
<p>
<b>#<?= $o['id'] ?></b> |
<?= $o['status'] ?>

<?php if($o['status']=="pending"): ?>
 | <a href="?send=<?= $o['id'] ?>">Send to API</a>
<?php endif; ?>
</p>
<?php endwhile; ?>
