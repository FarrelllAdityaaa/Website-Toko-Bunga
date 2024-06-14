<?php 
include '../../koneksi/koneksi.php';

$kode = $_GET['id'];
$del = mysqli_query($koneksi, "DELETE FROM pesan WHERE id = '$kode'");

if($del){
	echo "
	<script>
	alert('PESAN $kode BERHASIL DIHAPUS');
	window.location = '../s.message.php';
	</script>
	";
}

?>