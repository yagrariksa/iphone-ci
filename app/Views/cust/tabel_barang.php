<div class="container my-4">
    <div class="row">
        <?php
        $count = 1;
        foreach ($data as $item) :
        ?>
            <div class="col-3">

                <div class="card" style="width: 18rem;">
                    <img src="https://drive.google.com/uc?export=view&id=<?= esc($item['link_gambar']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($item['nama_barang']) ?></h5>
                        <small class="subtitle"><?= esc($item['kategori_text']) ?></small>
                        <p class="card-text"><?= esc($item['harga_barang']) ?></p>
                        <a href="/customer/detail/<?= esc($item['barang_id']) ?>" class="btn btn-primary">Lihat detil</a>
                    </div>
                </div>
            </div>

        <?php
            $count++;
        endforeach;
        ?>

    </div>
</div>