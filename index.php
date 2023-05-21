<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "db4free.net";
    $username = "pelangipub";
    $password = "pelangipublishing";
    $dbname = "nurserymathadb";

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

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

    mysqli_close($conn);
}
?>



<head>
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
.bg-image-vertical {
	position: relative;
	overflow: hidden;
	background-repeat: no-repeat;
	background-position: right center;
	background-size: auto 100%;
	}
	
	@media (min-width: 1025px) {
	.h-custom-2 {
	height: 100%;
	}
	}
	</style>

<body>

	<section class="vh-100">
		<div class="container-fluid">
		  <div class="row">
			<div class="col-sm-6 text-black">
	  <p></p>
			  <div class="px-5 ms-xl-4">
				<i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" ></i>
				<img src="raw/pelangi.png"
				alt="logo" width="10%" style="object-fit: cover; object-position: left;">
			  </div>
	  
			  <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
				<form action="login.php" method="post">

					<div class="form-outline mb-4">
					   <input type="email" id="email" name="email" class="form-control form-control-lg" />
					   <label class="form-label" for="email">Email address</label>
					</div>
					
					<div class="form-outline mb-4">
					   <input type="password" id="password" name="password" class="form-control form-control-lg" />
					   <label class="form-label" for="password">Password</label>
					</div>
					
					<div class="pt-1 mb-4">
					   <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
					</div>
					
					</form>
	  
			  </div>
	  
			</div>
			<div class="col-sm-6 px-0 d-none d-sm-block">
			  <img src="raw/iLeapBanner.png"
				alt="Login image" width="100%" style="object-fit: cover; object-position: left;">
			</div>
		  </div>
		</div>
	  </section>
</body>
</html>