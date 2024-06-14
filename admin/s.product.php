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
    $kode = mysqli_query($koneksi, "SELECT kode_produk from produk order by kode_produk desc");

    if ($data = mysqli_fetch_assoc($kode)) {
        $num = substr($data['kode_produk'], 2, 4);
        $add = (int) $num + 1;
    } else {
        $add = 1; // Nilai default jika tidak ada kode produk dalam tabel
    }

    if (strlen($add) == 1) {
        $format = "SP000" . $add;
    } else if (strlen($add) == 2) {
        $format = "SP00" . $add;
    } else if (strlen($add) == 3) {
        $format = "SP0" . $add;
    } else {
        $format = "SP" . $add;
    }
    ?>

    <!--Header section ends-->

    <!-- Product list section starts -->
    
    <section>
        <h1 class="heading"><span>Sunny</span> Product</h1>
    </section>
    <section>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>QTY</th>
                        <th>Harga</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM produk");
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $no; ?>.</td>
                            <td><?= $row['kode_produk']; ?></td>
                            <td style="width: 28%;"><?= $row['nama'];  ?></td>
                            <td><img src="../gambar/<?= $row['gambar']; ?>" width="100"></td>
                            <td><?= $row['qty'];  ?></td>
                            <td>Rp.<?= number_format($row['harga'], 0, ',', '.');  ?></td>
                            <td>
                                <!-- Edit product menu section starts -->
                                <a href="edit.product.php?kode=<?= $row['kode_produk']; ?>" class="edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>
                                <!-- Edit product menu section ends -->

                                <!-- Delete product menu section starts -->
                                <a href="proses/delete.product.php?kode=<?= $row['kode_produk']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" class="delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </a>
                                <!-- Delete product menu section ends -->

                            </td>

                        </tr>
                    <?php
                        $no++;
                    }
                    ?>

                </tbody>
            </table>

        </div>
        <a class="btn" id="addModalBtn">Tambah Barang</a>
    </section>

    <!-- Product list section ends -->

    <!-- Add product menu section starts -->
    
    <br><br><br><br><br><br><br><br><br><br>
    <?php
    include 'modal.add.php';
    ?>

    <!-- Add product menu section ends -->

    <!--footer section starts-->

    <?php
    include 'footer.php';
    ?>

    <!--footer section ends-->
    
</body>

</html>