<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height: 80vh;">
        <div class="col-12 col-lg-6">
            <p class="h1">Form Login Admin</p>
            <form action="/user/loginadmin" method="POST">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input value="<?php
                                    if ($session->has('error_email')) {
                                        echo ($session->getFlashData('error_email'));
                                    }
                                    ?>" name="email" required type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="password" required type="password" class="form-control" id="inputPassword">
                </div>
                <div class="form-group">
                    <?php
                    if ($session->has('error')) {
                        echo ("<small>" . $session->getFlashData('error') . "</small>");
                    }
                    ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Log In</button>
                </div>
            </form>
            <p class="h5 mt-4">belum jadi admin ? <a href="/user/create">REGISTRASI</a></p>
        </div>
    </div>
</div>