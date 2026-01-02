<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['add'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $url  = mysqli_real_escape_string($conn, $_POST['api_url']);
    $key  = mysqli_real_escape_string($conn, $_POST['api_key']);

    mysqli_query($conn,"
        INSERT INTO providers (name, api_url, api_key)
        VALUES ('$name','$url','$key')
    ");
}

$q = mysqli_query($conn,"SELECT * FROM providers");
?>
<h3>API Providers</h3>

<form method="post">
<input name="name" placeholder="Provider Name"><br><br>
<input name="api_url" placeholder="API URL"><br><br>
<input name="api_key" placeholder="API Key"><br><br>
<button name="add">Add Provider</button>
</form>

<hr>

<?php while($p = mysqli_fetch_assoc($q)): ?>
<p><?= $p['name'] ?></p>
<?php endwhile; ?>
