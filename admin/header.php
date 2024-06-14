<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon Sunny.co -->
    <link rel="icon" type="image" href="../images/favicon.png">
    <!--Font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!--custom css file link-->
    <link rel="stylesheet" href="../css/styleadmin.css" />
</head>

<body>
    <?php
    include '../koneksi/koneksi.php';
    ?>
    <header>
        <input type="checkbox" name="" id="toggler" />
        <label for="toggler" class="fas fa-bars"></label>
        <a href="dashboard.php" class="logo">Sunny<span>.Admin</span></a>
        <nav class="navbar">
            <a href="dashboard.php">Dashboard</a>
            <select name="data" id="data" required>
                <option value="" disabled selected hidden>Data Sunny</option>
                <option value="s.product.php" class="drop">Sunny Product</option>
                <option value="s.customer.php" class="drop">Sunny Customer</option>
                <option value="s.message.php" class="drop">Sunny Message</option>
                <option value="s.order.php" class="drop">Sunny Order</option>
            </select>
            <!-- <a href="#Data">Data Sunny</a> -->
        </nav>
        <div class="icons">
            <a href="#" class="fas fa-user"></a>
            <select name="admin" id="admin" required>
                <option disabled selected hidden>Admin</option>
                <option value="../login.php" class="drop">Logout</option>
            </select>

        </div>

    </header>

    <script>
        document.getElementById('data').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        });

        document.getElementById('admin').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        });
    </script>
</body>

</html>