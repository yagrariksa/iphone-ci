<div class="container">
    <div class="row">
        <div class="col">
            <p class="h1">Form Edit Barang</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <form method="POST" action="/barang/edit/<?= esc($data['barang_id']); ?>">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputNama">Nama Barang</label>
                    <input value="<?= esc($data['nama_barang']); ?>" name="nama_barang" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputStok">Stok Barang</label>
                    <input value="<?= esc($data['stok_barang']); ?>" name="stok_barang" type="number" class="form-control" id="inputStok">
                </div>
                <div class="form-group">
                    <label for="selectKategori">Pilih Kategori</label>
                    <select name="kategori" class="form-control" id="selectKategori">
                        <?php foreach ($kategori as $item) : ?>
                            <option value="<?= esc($item['kategori_id']); ?>"
                            <?php
                                if($item['kategori_id'] === $data['kategori']){
                                    echo("selected");
                                } 
                            ?>>
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