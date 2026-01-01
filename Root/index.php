<?php
session_start();
include("config/db.php");

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' LIMIT 1");
    $user = mysqli_fetch_assoc($q);

    if ($user && password_verify($pass, $user['password'])) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['role']  = $user['role'];
        $_SESSION['uid']   = $user['id'];

        if ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
        exit;
    } else {
        $error = "Invalid login details";
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
<?php if(isset($error)) echo $error; ?>
<form method="post">
<input name="email" placeholder="Email"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<button name="login">Login</button>
</form>
</body>
</html>
