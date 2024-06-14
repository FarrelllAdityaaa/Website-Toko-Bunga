<?php
session_start();
include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunny.co Register</title>
	<!-- Favicon Sunny.co -->
	<link rel="icon" type="image" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styledaftar.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

</head>

<body>
    <script>
        // Validasi form saat submit
        function validateForm(event) {
            const form = document.getElementById('registerForm');
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const nomerhp = document.getElementById('nomerhp').value;
            const password = document.getElementById('password').value;
            const phonePattern = /^[0-9]+$/;
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            // Validasi username tidak kosong
            if (!username) {
                alert('Kolom username harus diisi.');
                event.preventDefault(); // Mencegah form dikirim
                return;
            }

            // Validasi email tidak kosong dan sesuai format
            if (!email) {
                alert('Kolom email harus diisi.');
                event.preventDefault(); // Mencegah form dikirim
                return;
            } else if (!emailPattern.test(email)) {
                alert('Format email salah.');
                event.preventDefault(); // Mencegah form dikirim
                return;
            }

            // Validasi nomor telepon tidak kosong dan hanya mengandung angka
            if (!nomerhp) {
                alert('Kolom nomor telepon harus diisi.');
                event.preventDefault(); // Mencegah form dikirim
                return;
            } else if(!phonePattern.test(nomerhp)){
                alert('Nomor telepon hanya boleh mengandung angka.');
                event.preventDefault(); // Mencegah form dikirim
                return;
            }

            // Validasi password tidak kosong
            if (!password) {
                alert('Kolom password harus diisi.');
                event.preventDefault(); // Mencegah form dikirim
                return;
            }
        }

        window.onload = function() {
            const form = document.getElementById('registerForm');
            form.addEventListener('submit', validateForm);
        }
    </script>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $nomerhp = trim($_POST["nomerhp"]);
        $password = md5($_POST["password"]);

        // Periksa apakah email atau username sudah ada dalam basis data
        $query = "SELECT * FROM user WHERE email='$email' OR username='$username'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            // Jika data sudah ada, tampilkan pesan kesalahan
            echo '<script>alert(" Registrasi Gagal Username atau Email Sudah Pernah Dibuat")</script>';
        } else {
            // Jika tidak ada data yang sama, lanjutkan proses registrasi
            // Misalnya, tambahkan data ke basis data
            $query = "INSERT INTO user (username, email, nomerhp, password) VALUES ('$username', '$email', '$nomerhp', '$password')";
            $insert_result = mysqli_query($koneksi, $query);

            if ($insert_result) {
                echo '<script>alert("Selamat Pendaftaran Anda Berhasil, Anda akan Diarahkan ke Login Form");
            window.location.href = "login.php";</script>';

                // Redirect to login page or any other page as needed
            } else {
                echo '<script>alert("Pendaftaran Gagal")</script>';
            }
        }
    }
    ?>
    <div class="container">

        <div class="login-content">
            <form method="post" id="registerForm">
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" id="username" >
                    </div>

                </div>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" class="input" name="email" id="email" >
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-mobile"></i>
                    </div>
                    <div class="div">
                        <h5>No.HP</h5>
                        <input type="text" class="input" name="nomerhp" id="nomerhp"  maxlength="12" size="12">
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>

                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" id="password" >
                    </div>
                </div>
                <input type="submit" class="btn" value="Daftar" name="daftar">
                <a href="login.php">Sudah punya akun? login disini!</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>