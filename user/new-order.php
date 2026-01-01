<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "user") {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {

    $service  = mysqli_real_escape_string($conn, $_POST['service']);
    $link     = mysqli_real_escape_string($conn, $_POST['link']);
    $qty      = (int)$_POST['quantity'];
    $price    = $qty * 0.5; // demo price

    mysqli_query($conn, "
        INSERT INTO orders (user_id, service, link, quantity, price, status)
        VALUES ('{$_SESSION['uid']}', '$service', '$link', '$qty', '$price', 'pending')
    ");

    $success = "Order placed successfully";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>New Order</title>
</head>
<body>

<h3>New Order</h3>

<?php if(isset($success)) echo $success; ?>

<form method="post">
<select name="service">
  <option>Instagram Followers</option>
  <option>Instagram Likes</option>
  <option>Facebook Likes</option>
</select><br><br>

<input name="link" placeholder="Profile / Post Link"><br><br>
<input name="quantity" type="number" placeholder="Quantity"><br><br>

<button name="submit">Place Order</button>
</form>

</body>
</html>
