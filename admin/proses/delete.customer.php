<?php 
include '../../koneksi/koneksi.php';

$kode = $_GET['id'];
$del = mysqli_query($koneksi, "DELETE FROM user WHERE user_id = '$kode'");

if($del){
	echo "
	<script>
	alert('DATA CUSTOMER $kode BERHASIL DIHAPUS');
	window.location = '../s.customer.php';
	</script>
	";
}

?>