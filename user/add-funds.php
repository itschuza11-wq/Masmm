<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "user") {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {

    $amount = (float)$_POST['amount'];
    $method = $_POST['method'];
    $currency = $_POST['currency'];

    mysqli_query($conn,"
        INSERT INTO payments (user_id, amount, method, currency, status)
        VALUES ('{$_SESSION['uid']}','$amount','$method','$currency','pending')
    ");

    $success = "Payment request submitted";
}
?>
<h3>Add Funds</h3>

<?php if(isset($success)) echo $success; ?>

<form method="post">
<input name="amount" placeholder="Amount" required><br><br>

<select name="currency">
  <option value="PKR">PKR</option>
  <option value="USD">USD</option>
</select><br><br>

<select name="method">
  <option>JazzCash</option>
  <option>EasyPaisa</option>
  <option>Binance</option>
  <option>Payeer</option>
</select><br><br>

<button name="submit">Submit</button>
</form>
