<?php
include '../koneksi/koneksi.php';

$m_nama = $_POST['nama'];
$m_email = $_POST['email'];
$m_phone = $_POST['phone'];
$m_pesan = $_POST['pesan'];

$result = mysqli_query($koneksi, "INSERT INTO pesan VALUES(NULL,'$m_nama', '$m_email', '$m_phone', '$m_pesan')");

if ($result) {
    echo "
        <script>
        alert('PESAN BERHASIL DIKIRIM');
        window.location = '../index.php#contact';
        </script>
        ";
}
