<?php
include '../koneksi/koneksi.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Periksa apakah produk sudah ada di keranjang
    $check = mysqli_query($koneksi, "SELECT * FROM cart WHERE product_id = '$product_id'");

    if (mysqli_num_rows($check) > 0) {
        // Jika produk sudah ada di keranjang, tambahkan kuantitasnya
        $query = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = '$product_id'";
    } else {
        // Jika produk belum ada di keranjang, tambahkan produk ke keranjang
        $query = "INSERT INTO cart (product_id) VALUES ('$product_id')";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
                alert('Produk berhasil ditambahkan ke keranjang.');
                window.location.href = '{$_SERVER['HTTP_REFERER']}';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan produk ke keranjang.');
                window.location.href = '{$_SERVER['HTTP_REFERER']}';
              </script>";
    }
}
?>
