<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height: 80vh;">
        <div class="col-12 col-lg-6">
            <p class="h1 mb-4">
                Form Update User
            </p>
            <form action="/user/edit/<?php echo($data['admin_id']) ?>" method="POST">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input value="<?= esc($data['email']); ?>" name="email" type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Old Password</label>
                    <input name="oldpassword" type="password" class="form-control" id="inputPassword">
                </div>
                <div class="form-group">
                    <label for="inputPassword">New Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
