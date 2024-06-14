<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon Sunny.co -->
    <link rel="icon" type="image" href="../images/favicon.png">

</head>

<body>
    <!--Header section starts-->

    <?php
    include 'header.php';
    $j_produk = mysqli_query($koneksi, "SELECT DISTINCT kode_produk from produk");
    $r_produk = mysqli_num_rows($j_produk);

    $j_user = mysqli_query($koneksi, "SELECT DISTINCT user_id from user");
    $r_user = mysqli_num_rows($j_user);

    $j_order = mysqli_query($koneksi, "SELECT DISTINCT id from orders");
    $r_order = mysqli_num_rows($j_order);


    ?>

    <!--Header section ends-->

    <!-- Dashboard section starts -->

    <section>
        <h1 class="heading"><span>Sunny</span> Dashboard</h1>
    </section>

    <br><br><br><br>

    <section>
        <div class="board">
            <div class="pesanan">
                <h4>PESANAN</h4>
                <h1><?= $r_order; ?></h1>
            </div>
            <div class="produk">
                <h4>PRODUK</h4>
                <h1><?= $r_produk; ?></h1>
            </div>
            <div class="pengguna">
                <h4>PENGGUNA</h4>
                <h1><?= $r_user; ?></h1>
            </div>
        </div>
    </section>

    <section>
        <?php
        include '../LineChart/chart.php';
        ?>
    </section>

    <!-- Dashboard section ends -->

    <!--footer section starts-->
    <br><br><br><br>
    <?php
    include 'footer.php';
    ?>

    <!--footer section ends-->
</body>

</html>