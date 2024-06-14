<?php
include '../koneksi/koneksi.php';

$id = $_GET['id'];

// Query untuk mengambil data pesanan berdasarkan id
$query = "SELECT * FROM orders WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$order = mysqli_fetch_assoc($result);
?>

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
    ?>
    <!--Header section ends-->

    <!-- Order detail section starts -->

    <section>
        <h1 class="heading"><span>Detail</span> Order</h1>
    </section>
    <section>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Orders</th>
                        <th>Nama Customer</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Metode Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Total Pembayaran</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td><?= $order['name']; ?></td>
                    <td><?= $order['phone']; ?></td>
                    <td><?= $order['address']; ?></td>
                    <td><?= $order['payment_method']; ?></td>
                    <td>
                        <img src="../gambar/<?= $order['payment_proof']; ?>" alt="Bukti Pembayaran" height="80" width="70" onclick="showModal(this)">
                    </td>
                    <td><?= $order['total_payment']; ?></td>
            </table>
        <a href="s.order.php" class="btn">Kembali</a>
            
        </div>
    </section>
    <div id="myModal" class="modal">
        <div class="modal-content-img">
            <span class="close-img">&times;</span>
            <img id="modalImg" src="" alt="Bukti Pembayaran">
        </div>
    </div>

    <script src="style.modal.detail.js"></script>
    <!-- Order detail section ends -->

    <!--footer section starts-->
    <br><br><br><br><br><br><br><br><br><br>
    <?php
    include 'footer.php';
    ?>
    <!--footer section ends-->
</body>

</html>