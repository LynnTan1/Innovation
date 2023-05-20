<?php
$servername = "db4free.net"; // change this to the servername where your database is hosted
$username = "pelangipub"; // default username for PHPMyAdmin
$password = "pelangipublishing"; // default password for PHPMyAdmin
$dbname = "nurserymathadb"; // replace "your_database_name" with the name of your database

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    // Login successful
    $_SESSION['email'] = $email;
    header("Location: start.html");
    exit(); // stop executing the rest of the code
  } else {
    // Login failed
    $error = "Invalid username or password";
  }
}

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Close the connection
mysqli_close($conn);
?>
