<div class="container">
    <div class="row">
        <div class="col">
            <p class="h1"><?= esc($data['nama_barang']) ?></p>
            <p class="h3">Rp <?= esc($data['harga_barang']) ?></p>
            <p class="">Stok : <?= esc($data['stok_barang']) ?> <?= esc($data['satuan_barang']) ?></p>
            <p class="">Kategori : <?= esc($data['kategori_text']) ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <form action="/customer/addtocart" method="POST">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputUsername">Jumlah beli</label>
                    <input value="" name="jumlah_beli" type="number" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="barang_id" value="<?= esc($data['barang_id']) ?>">
                <button type="submit" class="btn btn-success">Tambahkan Ke Keranjang</button>
            </form>
        </div>
    </div>
</div>