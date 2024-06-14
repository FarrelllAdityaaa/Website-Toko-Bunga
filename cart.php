<?php
include 'header.php';
include 'koneksi/koneksi.php';

// Ambil data produk yang ada di keranjang
$result = mysqli_query($koneksi, "SELECT produk.nama, produk.harga, produk.gambar, cart.quantity, cart.product_id FROM cart JOIN produk ON cart.product_id = produk.kode_produk ");
// $result = mysqli_query($koneksi, $query);
?>

<section>
    <h1 class="heading">Sunny <span>Cart</span></h1>
</section>

<section class="cart" id="cart">
    <div class="box-container">
        <?php
        $total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $harga_asli = $row['harga'];
            $sub_total = $harga_asli * $row['quantity'];
            $diskon = 0.20;
            $harga_diskon = $harga_asli - ($harga_asli * $diskon);
            $total_diskon = $harga_diskon * $row['quantity'];
            $diskon = 0.20;
            $total += $total_diskon;


        ?>
            <div class="box">
                <span class="discount">Sale 20%</span>
                <div class="image">
                    <img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" />
                </div>
                <div class="content">
                    <h3><?= $row['nama']; ?></h3>
                    <div class="price">Rp.<?= number_format($harga_diskon, 0, ',', '.'); ?> x <?= $row['quantity']; ?> = Rp.<?= number_format($total_diskon, 0, ',', '.'); ?></div>
                    <span>Rp.<?= number_format($sub_total, 0, ',', '.'); ?></span>
                    <form action="proses/edit.cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>">
                        <input type="number" name="quantity" value="<?= $row['quantity']; ?>" min="1">
                        <button type="submit" class="update-btn" onclick="return confirm('Produk berhasil diubah/di-edit')">Update</button>
                        <a href="proses/delete.cart.php?product_id=<?= $row['product_id']; ?>" class="remove-btn" onclick="return confirm('Hapus produk dari keranjang?')">Remove</a>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="total">
        <h3>Total Harga: Rp.<?= number_format($total, 0, ',', '.'); ?></h3>
        <a href="checkout.php" class="checkout-btn">Checkout</a>
    </div>
</section>

<?php
include 'footer.php';
?>