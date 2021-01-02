<div class="container">
    <div class="row">
        <div class="col">
            <p class="h1">Form tambah Barang</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <form method="POST" action="/barang/store">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputNama">Nama Barang</label>
                    <input name="nama_barang" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputSatuan">Satuan Barang</label>
                    <input name="satuan_barang" type="text" class="form-control" id="inputSatuan" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputStok">Stok Barang</label>
                    <input name="stok_barang" type="number" class="form-control" id="inputStok">
                </div>
                <div class="form-group">
                    <label for="inputHarga">Harga Barang</label>
                    <input name="harga_barang" type="number" class="form-control" id="inputHarga">
                </div>
                <div class="form-group">
                    <label for="selectKategori">Pilih Kategori</label>
                    <select name="kategori" class="form-control" id="selectKategori">
                        <?php foreach ($kategori as $item) : ?>
                            <option value="<?= esc($item['kategori_id']); ?>">
                                <?= esc($item['nama_kategori']); ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>