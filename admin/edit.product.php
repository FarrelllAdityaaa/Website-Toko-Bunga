<?php
include 'header.php';

$kode_produk = $_GET['kode'];
$kode = mysqli_query($koneksi, "SELECT * from produk where kode_produk = '$kode_produk'");
$data = mysqli_fetch_assoc($kode);
?>

<section>
    <h1 class="heading"><span>Sunny</span> Product</h1>
</section>

<section class="edit-product" id="edit-product">

    <div class="edit-row">
        <form id="" action="proses/edit.product.php" method="POST" enctype="multipart/form-data">
            <div class="p-title">
                <div>
                    <h1 class="p-edit"><span>EDIT</span> PRODUCT</h1>
                </div>
            </div>
            <table>
                <tr>
                    <td><label for="nama">Nama Produk</label> </td>
                </tr>
                <tr>
                    <td><input type="text" name="nama" id="nama" class="box" value="<?= $data['nama']; ?>" required></td>

                </tr>
                <tr>
                    <td><label for="kode">Kode Produk</label> </td>
                </tr>
                <tr>
                    <td><input type="text" class="box" disabled value="<?= $data['kode_produk']; ?>"></td>
                    <td><input type="hidden" name="kode" id="kode" class="box" value="<?= $data['kode_produk']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="gambar">Gambar</label> </td>
                </tr>
                <tr>
                    <td><label for="gambar"><img src="../gambar/<?= $data['gambar']; ?>" width="100"></label></td>
                </tr>
                <tr>
                    <td><input type="file" name="gambar" id="gambar" class="box-img"></td>

                </tr>
                <tr>
                    <td><label for="qty">QTY</label> </td>
                </tr>
                <tr>
                    <td><input type="number" name="qty" id="qty" class="box" value="<?= $data['qty']; ?>" required></td>

                </tr>
                <tr>
                    <td><label for="desk">Deskripsi</label> </td>
                </tr>
                <tr>
                    <td><textarea name="desk" id="desk" class="box" required><?= $data['deskripsi']; ?></textarea></td>

                </tr>
                <tr>
                    <td><label for="harga">Harga</label> </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="harga" id="harga" class="box" value="<?= $data['harga']; ?>" required>

                    </td>
                </tr>
            </table>
            <button type="submit" class="btn">Edit</button>
            <!-- <input type="submit" value="Tambah" class="btn" id="submit"> -->
            <a href="s.product.php" class="btn">Kembali</a>
        </form>
    </div>

</section>

<?php
include 'footer.php';
?>