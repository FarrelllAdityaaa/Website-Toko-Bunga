<?php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];

// Update status pesanan menjadi diterima
$query = "UPDATE orders SET status = 1 WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../s.order.php");
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}
?>
