<div class="container">
    <div class="row my-4">
        <div class="col">
            <p class="h1">
                KeranjangKU
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nama barang</th>
                        <th scope="col">harga satuan</th>
                        <th scope="col">jumlah beli</th>
                        <th scope="col">subtotal</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($data != null) {

                        $count = 1;
                        foreach ($data as $item) :

                    ?>
                            <tr>
                                <th scope="row"><?= esc($count) ?></th>
                                <td><?= esc($item['nama_barang']) ?></td>
                                <td><?= esc($item['harga_barang']) ?></td>
                                <td><?= esc($item['jumlah_beli']) ?></td>
                                <td><?= esc($item['subtotal']) ?></td>
                                <td>
                                    <a href="/customer/hapusitem/<?= esc($item['barangbeli_id']) ?>">
                                        <button class="btn btn-danger">
                                            Hapus item
                                        </button>
                                    </a>
                                </td>
                            </tr>
                    <?php
                            $count++;
                        endforeach;
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>