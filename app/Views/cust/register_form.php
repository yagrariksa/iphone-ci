<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height: 80vh;">
        <div class="col-12 col-lg-6">
            <form action="/customer/reg" method="POST">
                <?php csrf_field() ?>
                <div class="form-group">
                    <label for="inputUsername">Email</label>
                    <input name="email" type="email" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                    <?php 
                     if($session->has('error')){
                         echo("<small>Email sudah digunakan</small>");
                     }
                      ?>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword">
                    
                    

                </div>
                <button type="submit" class="btn btn-primary">REGISTER</button>
            </form>
        </div>
    </div>
    <div class="row">
        <p class="h3">Sudah punya akun ?<a href="/customer/login">Login</a></p>
    </div>
</div>