<div class="container">

    <div class="row">
        <div class="col">
            <p class="h1">
                Tabel Transaksi
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">status/kode</th>
                        <th scope="col">waktu transaksi</th>
                        <th scope="col">total</th>
                        <th scope="col">total barang</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($data as $item) :
                    ?>
                        <tr>
                            <th scope="row"><?= esc($count) ?></th>
                            <td><?= esc($item['pembeli']) ?></td>
                            <td><?= esc($item['status']) ?></td>
                            <td><?= esc($item['waktu_transaksi']) ?></td>
                            <td><?= esc($item['total']) ?></td>
                            <td><?= esc($item['total_barang']) ?></td>
                            <td>
                                <a href="/transaksi/detail/<?= esc($item['transaksi_id']) ?>">
                                    <button class="btn btn-primary">
                                        Lihat Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $count++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>