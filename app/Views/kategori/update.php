<div class="container">
    <div class="row">
        <div class="col">
            <p class="h1">Form Edit Kategori</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <form method="POST" action="/kategori/edit/<?= esc($data['kategori_id']); ?>">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputNama">Nama Kategori</label>
                    <input value="<?= esc($data['nama_kategori']); ?>" name="nama_kategori" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputKeterangan">Keterangan</label>
                    <textarea rows="3" name="keterangan" type="text" class="form-control" id="inputKeterangan" aria-describedby="emailHelp"> 
                    <?= esc($data['keterangan']); ?>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>