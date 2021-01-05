<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height: 80vh;">
        <div class="col-12 col-lg-6">
            <p class="h1">Form Register Admin</p>

            <form action="/user/store" method="POST">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input required name="email" type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input required name="password" type="password" class="form-control" id="inputPassword">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="h5 mt-4">sudah jadi admin ? <a href="/user/login">LOGIN</a></p>
        </div>
    </div>
</div>