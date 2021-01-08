<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height: 80vh;">
        <div class="col-12 col-lg-6">
            <p class="h1 mb-4">
                EDIT IDENTITAS My account
            </p>
            <form action="/customer/postupdateacc" method="post">
                <?php csrf_field() ?>

                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input value="<?= esc($data['email']); ?>" name="email" type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" type="text" class="form-control" value="<?= esc($data['nama']); ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"><?= esc($data['alamat']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputOldPassword">Old Password</label>
                    <input name="oldpassword" type="password" class="form-control" id="inputOldPassword">
                </div>
                <div class="form-group">
                    <label for="inputPassword">New Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>