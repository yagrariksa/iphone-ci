<div class="container">
    <div class="row my-4">
        <div class="col">
            <form method="POST" action="/test/submitPizza">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputPizza">Nama Pizza</label>
                    <input name="nama_pizza" type="text" class="form-control" id="inputPizza" aria-describedby="emailHelp">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama pizza</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    if ($data != null) {
                        foreach ($data as $item) : ?>
                            <tr>
                                <th scope="row"><?= esc($count); ?></th>
                                <td><?= esc($item['nama_pizza']); ?></td>
                                <td>
                                    <a href="/test/delete/<?= esc($item['pizza_id']); ?>">
                                        <button class="btn btn-danger">
                                            Hapus Pizza
                                        </button>
                                    </a>
                                </td>

                            </tr>
                    <?php
                            $count++;
                        endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>