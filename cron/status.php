<?php
include("../config/db.php");
include("../config/api.php");

$q = mysqli_query($conn,"SELECT * FROM orders WHERE status='processing'");
while($o=mysqli_fetch_assoc($q)){
  $status = checkStatus($o['api_order_id']);
  if($status=="completed"){
    mysqli_query($conn,"
    UPDATE orders SET status='completed' WHERE id='{$o['id']}'
    ");
  }
}
