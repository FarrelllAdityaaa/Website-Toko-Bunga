<?php
session_start();
include 'koneksi/koneksi.php';

$cart_count_query = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM cart");
$cart_count_result = mysqli_fetch_assoc($cart_count_query);
$cart_count = $cart_count_result['count'];

$is_logged_in = isset($_SESSION['user']);
$user_name = $is_logged_in ? $_SESSION['user']['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunny.co</title>
    <!-- Favicon Sunny.co -->
    <link rel="icon" type="image" href="images/favicon.png">
    <!--Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!--custom css file link-->
    <link rel="stylesheet" href="css/styleuser.css" />
</head>

<body>

    <header>
        <input type="checkbox" name="" id="toggler" />
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">Sunny<span>.co</span></a>
        <nav class="navbar">
            <a href="index.php#home">Home</a>
            <a href="index.php#about">About</a>
            <a href="products.php">Products</a>
            <a href="index.php#contact">Contact</a>
        </nav>
        <div class="icons">
            <a href="favorites.php" class="fas fa-heart"></a>
            <a href="cart.php" class="fas fa-shopping-cart">
                <span class="cart-count"><?= $cart_count ?></span>
            </a>
            <div class="dropdown">
                <a href="#" class="fas fa-user" id="user-icon"></a>
                <div class="dropdown-content" id="dropdown-content">
                    <?php if ($is_logged_in) : ?>
                        <p class="dropdown-text">Hello, <?= $user_name ?></p>
                        <a href="login.php" class="dropdown-link">Logout</a>
                    <?php else : ?>
                        <a href="login.php" class="dropdown-link">Login</a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </header>

    <script>
        // JavaScript untuk menampilkan dan menyembunyikan dropdown
        document.getElementById('user-icon').addEventListener('click', function() {
            var dropdownContent = document.getElementById('dropdown-content');
            dropdownContent.classList.toggle('show');
        });

        // Menyembunyikan dropdown ketika klik di luar
        window.onclick = function(event) {
            if (!event.target.matches('.fas.fa-user')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>

</html>