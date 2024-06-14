<section class="add-product" id="add-product">
        <div class="row">
            <div id="modal" class="modal">

                <div class="modal-content">
                    <div class="p-title">
                        <div>
                            <h1 class="p-add"><span>ADD</span> PRODUCT</h1>
                        </div>
                    </div>

                    <form action="proses/add.product.php" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label for="nama">Nama Produk</label> </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="nama" id="nama" class="box" required></td>
                                
                            </tr>
                            <tr>
                                <td><label for="kode">Kode Produk</label> </td>
                            </tr>
                            <tr>
                                <td><input type="text" class="box" disabled value="<?= $format; ?>"></td>
                                <td><input type="hidden" name="kode" id="kode" class="box" value="<?= $format; ?>"></td>
                            </tr>
                            <tr>
                                <td><label for="gambar">Gambar</label> </td>
                            </tr>
                            <tr>
                                <td><input type="file" name="gambar" id="gambar" class="box-img" required></td>
                                
                            </tr>
                            <tr>
                                <td><label for="qty">QTY</label> </td>
                            </tr>
                            <tr>
                                <td><input type="number" name="qty" id="qty" class="box" required></td>
                                
                            </tr>
                            <tr>
                                <td><label for="desk">Deskripsi</label> </td>
                            </tr>
                            <tr>
                                <td><textarea name="desk" id="desk" class="box" required></textarea></td>
                                
                            </tr>
                            <tr>
                                <td><label for="harga">Harga</label> </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="harga" id="harga" class="box" placeholder="Contoh = 35000" required>
                                    <span>Harga diisi tanpa tanda titik (.) atau koma (,)</span>
                                    
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn">Tambah</button>
                        <!-- <input type="submit" value="Tambah" class="btn" id="submit"> -->
                        <a class="close">Tutup</a>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script src="style.modal.js"></script>