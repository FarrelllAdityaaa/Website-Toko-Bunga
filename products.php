<!-- Header section starts -->
<?php
include 'header.php';
?>
<!-- Header section ends -->

<!-- Product section starts -->
<section>
    <h1 class="heading">Sunny <span>Products</span></h1>
</section>

<section class="products" id="products">
    <div class="s-products">
        <input type="text" placeholder="Search Products..." class="s-box" id="searchInput">
    </div>
    <div class="box-container">
        <?php
        
        $result = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($row = mysqli_fetch_assoc($result)) {
            $harga_asli = $row['harga'];
            $diskon = 0.20;

            $harga_diskon = $harga_asli - ($harga_asli * $diskon);
        ?>

            <div class="box">
                <span class="discount">Sale 20%</span>
                <div class="image">
                    <img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" />
                    <div class="icons">

                        <!-- <a href="#" class="fas fa-heart"></a> -->
                        <a href="proses/add.to.favorites.php?product_id=<?= $row['kode_produk']; ?>" class="fas fa-heart" data-product-id="<?= $row['kode_produk']; ?>" onclick="return confirm('Tambahkan produk ke favorit?')"></a>
                        <!-- <a href="#" class="cart-btn">Add to Cart</a> -->
                        <a href="proses/add.to.cart.php?product_id=<?= $row['kode_produk']; ?>" class="cart-btn" onclick="return confirm('Tambahkan produk ke keranjang?')">Add to Cart</a>
                        <a class="fas fa-circle-info detail-btn" data-kode="<?= $row['kode_produk']; ?>" id="detailModalBtn"></a>
                    </div>
                </div>
                <div class="content">
                    <h3><?= $row['nama'];  ?></h3>
                    <div class="price">Rp.<?= number_format($harga_diskon, 0, ',', '.'); ?></div>
                    <span>Rp.<?= number_format($row['harga'], 0, ',', '.'); ?></span>
                </div>
            </div>
        <?php
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

<!-- Footer section start -->
<?php
include 'footer.php';
?>
<!-- Footer section ends -->