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


if ($eror === 4) {
	echo "
	<script>
	alert('TIDAK ADA GAMBAR YANG DIPILIH');
	window.location = '../s.product.php';
	</script>
	";
	die;
}

$ekstensiGambar = array('jpg', 'jpeg', 'png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
	echo "
	<script>
	alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
	window.location = '../s.product.php';
	</script>
	";
	die;
}

if ($size_gambar > 1000000) {
	echo "
	<script>
	alert('UKURAN GAMBAR TERLALU BESAR');
	window.location = '../s.product.php';
	</script>
	";
	die;
}

$namaGambarBaru = uniqid() . "." . $ekstensiGambarValid;

$nama_p = mysqli_query($koneksi, "SELECT nama from produk WHERE nama = '$nm_produk'");
$tnama_p = mysqli_fetch_assoc($nama_p);

if ($tnama_p) {
	$n_qty = mysqli_query($koneksi, "SELECT qty from produk WHERE nama = '$nm_produk'");
	$tn_qty = mysqli_fetch_assoc($n_qty);
	$t_qty = (int)$tn_qty['qty'] + $qty;
	$result1 = mysqli_query($koneksi, "UPDATE produk SET qty = '$t_qty' WHERE nama = '$nm_produk'");

	if ($result1) {
		echo "
			<script>
			alert('Produk $nm_produk Sudah Ada, Data QTY $nm_produk Berhasil Ditambahkan');
			window.location = '../s.product.php';
			</script>
			";
	}

} else if (move_uploaded_file($tmp_file, "../../gambar/" . $namaGambarBaru)) {
	$result2 = mysqli_query($koneksi, "INSERT INTO produk VALUES('$kode','$nm_produk','$namaGambarBaru','$qty','$harga','$desk')");
	
	if ($result2) {
		echo "
			<script>
			alert('PRODUK BERHASIL DITAMBAHKAN');
			window.location = '../s.product.php';
			</script>
			";
	}
}
