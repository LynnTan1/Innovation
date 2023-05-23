<?php
// SQLite database connection
$db = new SQLite3('users.db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $db->query($query);

    // Check if user exists
    if ($result->fetchArray()) {
        // Redirect to another page upon successful login
        header("Location: start.html");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
