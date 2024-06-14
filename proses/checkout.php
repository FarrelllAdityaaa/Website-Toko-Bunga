<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $phone = mysqli_real_escape_string($koneksi, $_POST['phone']);
    $address = mysqli_real_escape_string($koneksi, $_POST['address']);
    $payment_method = mysqli_real_escape_string($koneksi, $_POST['payment_method']);
    $total_payment = $_POST['total_payment'];
    // $total_payment = mysqli_real_escape_string($koneksi, $_POST['total_payment']);

    // Validasi metode pembayaran
    $valid_payment_methods = ['BTN', 'Mandiri', 'BCA', 'BSI'];
    if (!in_array($payment_method, $valid_payment_methods)) {
        echo "Metode pembayaran tidak valid.";
        exit();
    }

    // Handle file upload
    $payment_proof = $_FILES['payment_proof'];
    $target_dir = "../gambar/";
    $target_file = $target_dir . basename($payment_proof["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($payment_proof["tmp_name"]);
    if ($check === false) {
        echo "
                <script>
                    alert('File bukan gambar!');
                    window.location = '../checkout.php';
                </script>
                ";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "
                <script>
                    alert('File bukti pembayaran sudah ada!');
                    window.location = '../checkout.php';
                </script>
                ";
        $uploadOk = 0;
    }

    // Check file size
    if ($payment_proof["size"] > 5000000) {
        echo "
                <script>
                    alert('Ukuran file terlalu besar!');
                    window.location = '../checkout.php';
                </script>
                ";

        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "
                <script>
                    alert('Format file harus JPG, JPEG, & PNG!');
                    window.location = '../checkout.php';
                </script>
                ";

        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "
                <script>
                    alert('File pembayaran tidak Anda masukkan!');
                    window.location = '../checkout.php';
                </script>
                ";
    } else {
        if (move_uploaded_file($payment_proof["tmp_name"], $target_file)) {
            $payment_proof_path = basename($payment_proof["name"]);

            // Hitung total produk dan total quantity
            $cart_result = mysqli_query($koneksi, "SELECT * FROM cart");
            $total_products = mysqli_num_rows($cart_result);
            $total_quantity = 0;

            while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                $total_quantity += $cart_row['quantity'];

                // Kurangi jumlah produk yang dibeli dari stok
                $product_id = $cart_row['product_id'];
                $quantity_bought = $cart_row['quantity'];
                mysqli_query($koneksi, "UPDATE produk SET qty = qty - $quantity_bought WHERE kode_produk = '$product_id'");
            }


            // Hapus semua item dari keranjang
            $clear_cart_query = "DELETE FROM cart";
            mysqli_query($koneksi, $clear_cart_query);

            // Insert data into orders table
            $query = "INSERT INTO orders (name, phone, address, payment_method, payment_proof, total_products, total_quantity, total_payment) 
            VALUES ('$name', '$phone', '$address', '$payment_method', '$payment_proof_path', $total_products, $total_quantity, $total_payment)";

            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "<script>alert('Checkout berhasil!'); window.location = '../products.php';</script>";
            } else {
                echo "Gagal menyimpan data order.";
            }
        } else {
            echo "Terjadi eror.";
        }
    }
}
