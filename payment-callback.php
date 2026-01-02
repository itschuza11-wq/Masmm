<?php
include("config/db.php");

$user_id = $_POST['user_id'];
$amount  = $_POST['amount'];
$txn     = $_POST['txn_id'];

mysqli_query($conn,"
UPDATE users SET balance=balance+$amount WHERE id='$user_id'
");

mysqli_query($conn,"
UPDATE payments SET status='approved', txn_id='$txn'
WHERE user_id='$user_id'
");
