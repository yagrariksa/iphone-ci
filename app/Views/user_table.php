<?php require('header.php'); ?>
<div class="container ">
    <div class="row my-4">
        <div class="col">
            <a href="/user/create" class=""><button class="btn btn-primary">Tambah User</button></a>

        </div>
    </div>
    <?php
    if ($session->has('msg')) { ?>
        <div class="row">
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

    <table class="table my-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Admin</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($data as $item) : ?>
                <tr>
                    <th scope="row"><?= esc($count); ?></th>
                    <td><?= esc($item['email']); ?></td>
                    <td><?php 
                    if($item['admin']){
                        echo("Admin");
                    }else{
                        echo("Customer");
                    }
                    ?></td>

                    <td>
                        <!-- <a href="/user/delete/<?= esc($item['user_id']); ?>"><button class="btn btn-danger">DELETE</button></a> -->
                        <a href="/user/update/<?= esc($item['user_id']); ?>"><button class="btn btn-success">UPDATE</button></a>
                    </td>
                </tr>

            <?php
                $count++;
            endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('footer.php'); ?>