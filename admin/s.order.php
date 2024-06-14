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

    // Query untuk mengambil data dari tabel orders
    $query = "SELECT * FROM orders";
    $result = mysqli_query($koneksi, $query);
    ?>

    <!--Header section ends-->

    <!-- Order product section starts -->
    <section>
        <h1 class="heading"><span>Sunny</span> Order</h1>
    </section>
    <section>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Orders</th>
                        <th>Kode Customer</th>
                        <th>Status</th>
                        <th>QTY</th>
                        <th>Tanggal</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td>
                            <?php if ($row['status'] == 1) {
                                    echo "Pesanan Diterima";
                                } else {
                                    echo "Pesanan Belum Diterima";
                                } ?>
                            </td>
                            <td><?= $row['total_quantity']; ?></td>
                            <td><?= date('d-m-Y', strtotime($row['created_at'])); ?></td>
                            <td class="o-actions">
                                <div class="o-veri">
                                    <a href="proses/update.status.order.php?id=<?= $row['id']; ?>" class="veri" onclick="return confirm('Ingin menerima pesanan ini?')">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                        </svg> -->
                                        Terima
                                    </a>
                                    <!-- <span>Terima</span> -->
                                </div>
                                <div class="o-veri">
                                    <a href="proses/delete.order.php?id=<?= $row['id']; ?>" class="dell" onclick="return confirm('Hapus pesanan ini?')">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg> -->
                                        Hapus
                                    </a>
                                    <!-- <span>Terima</span> -->
                                </div>
                                <div class="o-veri">
                                    <a href="detail.order.php?id=<?= $row['id']; ?>" class="deta">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-binoculars" viewBox="0 0 16 16">
                                            <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5z" />
                                        </svg> -->
                                        Detail
                                    </a>
                                    <!-- <span>Terima</span> -->
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

    </section>
    <!-- Order product section ends -->

    <!--footer section starts-->
    <br><br><br><br><br><br><br><br><br><br>
    <?php
    include 'footer.php';
    ?>
    <!--footer section ends-->
</body>

</html>