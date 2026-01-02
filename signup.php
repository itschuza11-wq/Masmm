<?php
include("config/db.php");

if (isset($_POST['signup'])) {

    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already registered";
    } else {

        mysqli_query($conn,"
            INSERT INTO users (name,email,password,role)
            VALUES ('$name','$email','$pass','user')
        ");

        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup - masmmpanel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h3>Create Account</h3>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="post">
<input name="name" placeholder="Full Name" required><br><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button name="signup">Sign Up</button>
</form>

<p>
Already have account? <a href="index.php">Login</a>
</p>

</body>
</html>
