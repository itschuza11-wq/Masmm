<?php
session_start();

/* ---------- LOGOUT ---------- */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

include("config/db.php");

/* ---------- LOGIN ---------- */
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' LIMIT 1");
    $user = mysqli_fetch_assoc($q);

    if ($user && password_verify($pass, $user['password'])) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['role']  = $user['role'];
        $_SESSION['uid']   = $user['id'];

        if ($user['role'] == "admin") {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
        exit;

    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>masmmpanel Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h3>Login</h3>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="post">
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button name="login">Login</button>
</form>

<p>
New user? <a href="signup.php">Create account</a>
</p>

</body>
</html>
