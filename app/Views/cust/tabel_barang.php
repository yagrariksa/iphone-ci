<div class="container my-4">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">HandPhone</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $count = 1;
                        foreach($data as $item) :
                    ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= esc($item['nama_barang']) ?></td>
                        <td><?= esc($item['harga_barang']) ?></td>
                        <td><?= esc($item['kategori_text']) ?></td>
                        <td><?= esc($item['stok_barang']) ?></td>
                        <td>anjay</td>
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