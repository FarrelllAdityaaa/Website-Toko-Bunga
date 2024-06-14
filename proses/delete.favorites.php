<?php 
include '../koneksi/koneksi.php';

$kode = $_GET['id'];
$del = mysqli_query($koneksi, "DELETE FROM favorites WHERE fav_id = '$kode'");

if($del){
	echo "
	<script>
	alert('PRODUK FAVORIT BERHASIL DIHAPUS');
	window.location = '../favorites.php';
	</script>
	";
}

?>