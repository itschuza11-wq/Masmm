if (isset($_POST['submit'])) {

    $service_id = (int)$_POST['service'];
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $qty  = (int)$_POST['quantity'];

    // get service rate
    $s = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT rate FROM services WHERE id='$service_id'")
    );

    $price = ($qty / 1000) * $s['rate'];

    mysqli_query($conn, "
        INSERT INTO orders (user_id, service, link, quantity, price, status)
        VALUES ('{$_SESSION['uid']}', '$service_id', '$link', '$qty', '$price', 'pending')
    ");

    $success = "Order placed successfully";
}
