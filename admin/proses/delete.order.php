<?php
include '../../koneksi/koneksi.php';

$id = $_GET['id'];

// Hapus pesanan dari database
$del = mysqli_query($koneksi, "DELETE FROM orders WHERE id = '$id'");

if($del){
	echo "
	<script>
	alert('DETAIL ORDER $kode BERHASIL DIHAPUS');
	window.location = '../s.order.php';
	</script>
	";
} else {
    echo "Gagal menghapus detail order: " . mysqli_error($koneksi);
}
?>
