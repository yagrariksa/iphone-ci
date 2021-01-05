<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height: 80vh;">
        <div class="col-12 col-lg-6">
            <form action="/customer/log" method="POST">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input value="
                    <?php 
                     if($session->has('error_email')){
                         echo($session->getFlashData('error_email'));
                     }
                      ?>"
                     name="email" type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword">
                    <?php 
                     if($session->has('error')){
                         echo("<small>". $session->getFlashData('error') ."</small>");
                     }
                      ?>
                </div>
                <button type="submit" class="btn btn-success">LOG IN</button>
            </form>
        </div>
    </div>
    <div class="row">
        <p class="h3">Belum punya akun ?<a href="/customer/register">Register</a></p>
    </div>
</div>