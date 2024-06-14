<?php
include '../../koneksi/koneksi.php';


$kode = $_POST['kode'];
$nm_produk = ucwords(strtolower($_POST['nama']));
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$desk = $_POST['desk'];
$nama_gambar = $_FILES['gambar']['name'];
$size_gambar = $_FILES['gambar']['size'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$eror = $_FILES['gambar']['error'];
$type = $_FILES['gambar']['type'];


if($eror === 4){

	$result = mysqli_query($koneksi, "UPDATE produk SET nama = '$nm_produk', deskripsi = '$desk', harga = '$harga', qty = '$qty' where kode_produk = '$kode'");

	
	if($result){
		echo "
		<script>
		alert('PRODUK BERHASIL DIEDIT');
		window.location = '../s.product.php';
		</script>
		";
	}
	die;

}



$ekstensiGambar = array('jpg','jpeg','png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if(!in_array($ekstensiGambarValid, $ekstensiGambar)){
	echo "
	<script>
	alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
	window.location = '../edit.product.php?kode=".$kode."';
	</script>
	";
	die;
}

if($size_gambar > 1000000){
	echo "
	<script>
	alert('UKURAN GAMBAR TERLALU BESAR');
	window.location = '../edit.product.php?kode=".$kode."';
	</script>
	";
	die;
}

$namaGambarBaru = uniqid();
$namaGambarBaru.=".";
$namaGambarBaru.=$ekstensiGambarValid;

$gambar = mysqli_query($koneksi, "SELECT gambar from produk where kode_produk = '$kode'");
$tgambar = mysqli_fetch_assoc($gambar);
if (file_exists("../../gambar/".$tgambar['gambar'])) {
	unlink("../../gambar/".$tgambar['gambar']);
	move_uploaded_file($tmp_file, "../../gambar/".$namaGambarBaru);

	$result = mysqli_query($koneksi, "UPDATE produk SET nama = '$nm_produk', gambar = '$namaGambarBaru' ,deskripsi = '$desk', harga = '$harga', qty = '$qty' where kode_produk = '$kode'");

	if($result){
		echo "
		<script>
		alert('PRODUK BERHASIL DIEDIT');
		window.location = '../s.product.php';
		</script>
		";
	}


}else{

move_uploaded_file($tmp_file, "../../gambar/".$namaGambarBaru);

	$result = mysqli_query($koneksi, "UPDATE produk SET nama = '$nm_produk', gambar = '$namaGambarBaru' ,deskripsi = '$desk', harga = '$harga', qty = '$qty' where kode_produk = '$kode'");

	if($result){
		echo "
		<script>
		alert('PRODUK BERHASIL DIEDIT');
		window.location = '../s.product.php';
		</script>
		";
	}
}

?>