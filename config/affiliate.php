<?php
function addCommission($ref_id,$amount){
  global $conn;
  $com = $amount * 0.05;
  mysqli_query($conn,"
  UPDATE users SET balance=balance+$com WHERE id='$ref_id'
  ");
}
