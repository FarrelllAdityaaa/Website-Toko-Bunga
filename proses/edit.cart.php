<?php
include '../koneksi/koneksi.php';

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE cart SET quantity = '$quantity' WHERE product_id = '$product_id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../cart.php");
        exit();
    } else {
        echo "Gagal mengupdate kuantitas.";
    }
}
?>
