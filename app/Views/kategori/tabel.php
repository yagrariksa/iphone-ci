<div class="container">

    <div class="row">
        <div class="col">
            <p class="h1">
                Tabel Kategori
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="/kategori/create">
                <button class="btn btn-primary">
                    Tambah Kategori
                </button>
            </a>
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
                <?php } else { ?>
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
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($data as $item) : ?>
                        <tr>
                            <th scope="row"><?= esc($count); ?></th>
                            <td><?= esc($item['nama_kategori']); ?></td>
                            <td>
                                <a href="/kategori/delete/<?= esc($item['kategori_id']); ?>"><button class="btn btn-danger">DELETE</button></a>
                                <a href="/kategori/update/<?= esc($item['kategori_id']); ?>"><button class="btn btn-success">UPDATE</button></a>
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