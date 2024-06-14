<?php
include 'header.php';
include 'koneksi/koneksi.php';
?>

<section>
    <h1 class="heading">Sunny <span>Favorites</span></h1>
</section>

<section class="products" id="products">
    <div class="s-products">
        <input type="text" placeholder="Search Products..." class="s-box" id="searchInput">
    </div>
    <div class="box-container">
        <?php
        $result = mysqli_query($koneksi, "SELECT * FROM favorites");
        while ($row = mysqli_fetch_assoc($result)) {
            // Ambil informasi produk favorit dari tabel produk
            $product_result = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk = '{$row['product_id']}'");
            $product = mysqli_fetch_assoc($product_result);

            // Pastikan produk ditemukan sebelum melanjutkan
            if ($product) {
                // Tampilkan produk favorit
                $harga_asli = $product['harga'];
                $diskon = 0.20;
                $harga_diskon = $harga_asli - ($harga_asli * $diskon);
        ?>
        
            <div class="box">
                <span class="discount">Sale 20%</span>
                <div class="image">
                    <img src="gambar/<?= $product['gambar']; ?>" alt="<?= $product['nama']; ?>" />
                    <div class="icons">
                        <a href="proses/delete.favorites.php?id=<?= $row['fav_id']; ?>" class="fas fa-heart" onclick="return confirm('Ingin menghapus produk dari Sunny Favorites?')"></a>
                        <a href="proses/add.to.cart.php?product_id=<?= $product['kode_produk']; ?>" class="cart-btn" onclick="return confirm('Tambahkan produk ke keranjang?')">Add to Cart</a>
                        <a class="fas fa-circle-info detail-btn" data-kode="<?= $product['kode_produk']; ?>" id="detailModalBtn"></a>
                    </div>
                </div>
                <div class="content">
                    <h3><?= $product['nama'];  ?></h3>
                    <div class="price">Rp.<?= number_format($harga_diskon, 0, ',', '.'); ?></div>
                    <span>Rp.<?= number_format($product['harga'], 0, ',', '.'); ?></span>
                </div>
            </div>
        <?php
            } else {
                echo "<div class='box'><p>Produk tidak ditemukan</p></div>";
            }
        }
        ?>
    </div>
</section>
<script src="style.search.js"></script>

<!-- Product sections ends -->

<!-- Detail product section starts -->

<section class="detail-product" id="detail-product">

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="table-container">
                <!-- Detail product fill -->
            </div>
            <a class="close">Tutup</a>
        </div>
    </div>

</section>
<script src="style.modal.detail.js"></script>

<!-- Detail product section ends -->

<?php
include 'footer.php';
?>
