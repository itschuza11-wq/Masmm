<?php
session_start();

if (isset($_POST['login'])) {
    if ($_POST['email']=="admin@masmmpanel.com") {
        $_SESSION['email']="admin@masmmpanel.com";
        $_SESSION['role']="admin";
        header("Location: admin/dashboard.php");
    } else {
        $_SESSION['email']="user@masmmpanel.com";
        $_SESSION['role']="user";
        header("Location: user/dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>masmmpanel Login</title>
</head>
<body>
<h3>Login</h3>
<form method="post">
<input name="email" placeholder="Email"><br><br>
<input name="password" placeholder="Password"><br><br>
<button name="login">Login</button>
</form>
</body>
</html>
