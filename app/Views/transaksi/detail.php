<div class="container">
    <div class="row my-4">
        <div class="col">
            <p class="h1">Detail Transaksi</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Jumlah Beli</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($data as $item) :
                    ?>
                        <tr>
                            <th scope="row"><?= esc($count) ?></th>
                            <td><?= esc($item['nama_barang']) ?></td>
                            <td><?= esc($item['harga_barang']) ?></td>
                            <td><?= esc($item['jumlah_beli']) ?></td>
                            <td><?= esc($item['subtotal']) ?></td>
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