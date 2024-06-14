<?php 
include '../../koneksi/koneksi.php';

$kode = $_GET['kode'];
$produk = mysqli_query($koneksi, "SELECT * FROM produk where kode_produk ='$kode'");
$row = mysqli_fetch_assoc($produk);
unlink("../../gambar/".$row['gambar']);
$del = mysqli_query($koneksi, "DELETE FROM produk WHERE kode_produk = '$kode'");

mysqli_query($koneksi, "DELETE FROM favorites WHERE fav_id = '$kode'");

if($del){
	echo "
	<script>
	alert('DATA $kode BERHASIL DIHAPUS');
	window.location = '../s.product.php';
	</script>
	";
}

?>