<div class="container">
    <div class="row">
        <div class="col">
            <h1>TABEL BARANG</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/barang/create"><button class="btn btn-primary">Tambah Barang</button></a>
        </div>
    </div>
    <?php
    if ($session->has('msg')) { ?>
        <div class="row mt-4">
            <div class="col">
                <?php if ($session->getFlashData('msg') === "BERHASIL") { ?>

                    <div class="alert alert-success" role="alert">
                        <?= $session->getFlashData('msg'); ?>
                    </div>
                <?php }else{ ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $session->getFlashData('msg'); ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col">
            <table class="table my-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stok</th>
                        <th scope="col">satuan</th>
                        <th scope="col">harga</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($data as $item) : ?>
                        <tr>
                            <th scope="row"><?= esc($count); ?></th>
                            <td><?= esc($item['nama_barang']); ?></td>
                            <td><?= esc($item['stok_barang']); ?></td>
                            <td><?= esc($item['satuan_barang']); ?></td>
                            <td><?= esc($item['harga_barang']); ?></td>

                            <td><?= esc($item['kategori_text']); ?></td>
                            <td>
                                <a href="/barang/delete/<?= esc($item['barang_id']); ?>"><button class="btn btn-danger">DELETE</button></a>
                                <a href="/barang/update/<?= esc($item['barang_id']); ?>"><button class="btn btn-success">UPDATE</button></a>
                            </td>
                        </tr>

                    <?php
                        $count++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>