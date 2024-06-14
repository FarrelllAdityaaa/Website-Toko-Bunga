<?php
session_start();
include "koneksi/koneksi.php";

// Define user roles (consider adding more as needed)
const USER_ROLE_ADMIN = 'admin';
const USER_ROLE_USER = 'user';

if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");

	if (mysqli_num_rows($query) > 0) {
		$data = mysqli_fetch_array($query);

		// Check user role and redirect accordingly
		if ($data['role'] === USER_ROLE_ADMIN) {
			$_SESSION['user'] = $data;
			echo '<script>alert("Selamat datang, Admin!"); location.href="./admin/dashboard.php";</script>';
		} else if ($data['role'] === USER_ROLE_USER) {
			$_SESSION['user'] = $data;
			echo '<script>alert("Selamat datang, ' . $data['username'] . '!"); location.href="index.php";</script>';
		} else {
			// Handle invalid role (optional: log error or display a more specific message)
			echo '<script>alert("Invalid user role.");</script>';
		}
	} else {
		echo '<script>alert("Username/Password Tidak Sesuai.")</script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sunny.co Login</title>
	<!-- Favicon Sunny.co -->
	<link rel="icon" type="image" href="images/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>

	<!-- <img class="wave" src="img/bg.png"> -->
	<div class="container">

		<div class="login-content">
			<form method="post">
				<h2 class="title">Welcome!</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="text" class="input" name="email">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="password">
					</div>
				</div>
				<input type="submit" class="btn" value="Login">
				<a href="daftar.php">Belum punya akun? sign up disini!</a>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>