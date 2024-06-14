<?php

// Lakukan koneksi ke database
include '../koneksi/koneksi.php';

// Periksa apakah tombol hati diklik
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Lakukan validasi data jika diperlukan

    // Periksa apakah produk sudah ada di favorit
    $check = mysqli_query($koneksi, "SELECT * FROM favorites WHERE product_id = '$product_id'");

    if (mysqli_num_rows($check) > 0) {
        echo "<script>
                alert('Produk sudah ada di favorit Anda.');
                window.location.href = '{$_SERVER['HTTP_REFERER']}';
              </script>";
    } else {
        // Simpan informasi produk ke favorit dalam database
        $query = "INSERT INTO favorites (product_id) VALUES ('$product_id')";
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah penyimpanan berhasil
        if ($result) {
            echo "<script>
                    alert('Produk berhasil ditambahkan ke favorit.');
                    window.location.href = '{$_SERVER['HTTP_REFERER']}';
                  </script>";
        } else {
            // Tampilkan pesan kesalahan jika ada
            echo "<script>
                    alert('Gagal menambahkan produk ke favorit.');
                    window.location.href = '{$_SERVER['HTTP_REFERER']}';
                  </script>";
        }
    }
}
?>
