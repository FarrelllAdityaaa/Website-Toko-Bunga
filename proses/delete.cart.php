<?php
include '../koneksi/koneksi.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "DELETE FROM cart WHERE product_id = '$product_id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../cart.php");
        exit();
    } else {
        echo "Gagal menghapus produk dari keranjang.";
    }
}
?>
