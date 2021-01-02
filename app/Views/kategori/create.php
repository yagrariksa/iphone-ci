<div class="container">
    <div class="row">
        <div class="col">
            <p class="h1">Form tambah Kategori</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <form method="POST" action="/kategori/store">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputNama">Nama Kategori</label>
                    <input name="nama_kategori" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputKeterangan">Keterangan</label>
                    <textarea rows="3" name="keterangan" type="text" class="form-control" id="inputKeterangan">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>