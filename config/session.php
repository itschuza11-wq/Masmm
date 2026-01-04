<?php
session_start();
require_once __DIR__ . "/db.php";
?>
$conn = mysqli_connect(
  "sql309.infinityfree.com",
  "if0_40818881",
  "WuV4DzRiGA",
  "if0_40818881_masmm"
);

if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>


if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}
?>
