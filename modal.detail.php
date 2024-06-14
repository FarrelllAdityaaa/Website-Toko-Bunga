<?php
include 'koneksi/koneksi.php';

if (isset($_GET['kode_produk'])) {
    $kode_produk = mysqli_real_escape_string($koneksi, $_GET['kode_produk']);
    $result = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");

    if ($row = mysqli_fetch_assoc($result)) {
        $harga_asli = $row['harga'];
        $diskon = 0.20;
        $harga_diskon = $harga_asli - ($harga_asli * $diskon);
?>
        <div class="modal-detail-container">
            <div class="detail-image">
                <img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" />
            </div>
            <div class="detail-table">
                <div class="d-title">
                    <div>
                        <h1 class="p-det"><span>DETAIL</span> PRODUCT</h1>
                    </div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama Produk</td>
                            <td><?= $row['nama'];  ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>Rp.<?= number_format($row['harga'], 0, ',', '.');  ?></td>
                        </tr>
                        <tr>
                            <td>Harga Diskon 20%</td>
                            <td>Rp.<?= number_format($harga_diskon, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><?= $row['deskripsi']; ?></td>
                        </tr>
                        <tr>
                            <td>QTY</td>
                            <td><?= $row['qty'];  ?></td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>


<?php
    }
}
?>

<!-- <script src="style.modal.detail.js"></script> -->