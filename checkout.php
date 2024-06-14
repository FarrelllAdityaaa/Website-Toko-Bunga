<?php
include 'header.php';
include 'koneksi/koneksi.php';


$total_byr = mysqli_query($koneksi, "SELECT produk.harga, cart.quantity FROM cart JOIN produk ON cart.product_id = produk.kode_produk");
$total = 0;
while ($row = mysqli_fetch_assoc($total_byr)) {
    $harga_asli = $row['harga'];
    $sub_total = $harga_asli * $row['quantity'];
    $diskon = 0.20;
    $harga_diskon = $harga_asli - ($harga_asli * $diskon);
    $total_diskon = $harga_diskon * $row['quantity'];
    $diskon = 0.20;
    $total += $total_diskon;
}

// Ambil nomor rekening dari tabel bank
$bank_result = mysqli_query($koneksi, "SELECT bank_name, account_number FROM bank");
$bank_accounts = [];
while ($row = mysqli_fetch_assoc($bank_result)) {
    $bank_accounts[$row['bank_name']] = $row['account_number'];
}
?>

<section>
    <h1 class="heading">Sunny <span>Checkout</span></h1>
</section>

<section class="checkout-form">
    <div class="box-container">
        <div class="box-cek">
            <form action="proses/checkout.php" method="post" enctype="multipart/form-data">
                <div class="input-box">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-box">
                    <label for="phone">Nomor HP</label>
                    <input type="text" id="phone" name="phone" required maxlength="12" size="12">
                </div>
                <div class="input-box">
                    <label for="address">Alamat Penerima</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                <div class="input-box">
                    <label for="payment_method">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method" required onchange="updateAccountNumber()">
                        <option value="" disabled selected hidden>Pilih Metode Pembayaran</option>
                        <?php foreach ($bank_accounts as $bank_name => $account_number) : ?>
                            <option value="<?= $bank_name ?>"><?= $bank_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="account_number">Nomor Rekening</label>
                    <input type="text" id="account_number" name="account_number" readonly required>
                </div>
                <div class="input-box">
                    <label for="account_number">Total Pembayaran</label>
                    <input type="text" readonly required value="<?= $total ?>">
                    <input type="hidden" id="total_payment" name="total_payment" value="<?= $total ?>">
                </div>
                <div class="input-img">
                    <label for="payment_proof">Upload Bukti Pembayaran</label>
                    <input type="file" id="payment_proof" name="payment_proof" accept="image/*" required>
                </div>
                <button type="submit" class="btn">Kirim</button>
            </form>
        </div>

    </div>

</section>

<script>
    // Simpan nomor rekening dalam JavaScript object
    const bankAccounts = <?= json_encode($bank_accounts) ?>;

    // Fungsi untuk mengupdate field nomor rekening berdasarkan metode pembayaran yang dipilih
    function updateAccountNumber() {
        const paymentMethod = document.getElementById('payment_method').value;
        const accountNumberField = document.getElementById('account_number');

        if (bankAccounts[paymentMethod]) {
            accountNumberField.value = bankAccounts[paymentMethod];
        } else {
            accountNumberField.value = '';
        }
    }
</script>

<?php
include 'footer.php';
?>