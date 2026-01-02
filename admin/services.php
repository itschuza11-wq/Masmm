<?php
include("../config/session.php");
include("../config/db.php");

if ($_SESSION['role'] != "admin") {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rate = (float)$_POST['rate'];
    $min  = (int)$_POST['min'];
    $max  = (int)$_POST['max'];

    mysqli_query($conn, "
        INSERT INTO services (name, rate, min, max)
        VALUES ('$name', '$rate', '$min', '$max')
    ");
}

$services = mysqli_query($conn, "SELECT * FROM services");
?>
<h3>Services</h3>

<form method="post">
<input name="name" placeholder="Service name"><br><br>
<input name="rate" placeholder="Rate per 1000"><br><br>
<input name="min" placeholder="Min qty"><br><br>
<input name="max" placeholder="Max qty"><br><br>
<button name="add">Add Service</button>
</form>

<hr>

<?php while($s = mysqli_fetch_assoc($services)): ?>
<p>
<b><?= $s['name'] ?></b>
(Rs <?= $s['rate'] ?> / 1000)
</p>
<?php endwhile; ?>
