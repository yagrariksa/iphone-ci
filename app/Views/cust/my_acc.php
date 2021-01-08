<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height: 80vh;">
        <div class="col-12 col-lg-6">
            <p class="h1 mb-4">
                My account
            </p>
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input disabled value="<?= esc($data['email']); ?>" name="email" type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label>Nama</label>

                <input disabled class="form-control" value="<?= esc($data['nama']); ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea disabled class="form-control"><?= esc($data['alamat']); ?></textarea>
            </div>
            <a href="/customer/updateacc">
                <button type="button" class="btn btn-success">Update</button>
            </a>
        </div>
    </div>
</div>