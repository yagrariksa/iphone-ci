<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">CUSTOMER</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?php
                                    if ($session->get('page') === 'dashboard') {
                                        echo ("active");
                                    }
                                    ?>" href="/customer">Home</a>
                <?php
                if ($session->has('auth')) {
                    if ($session->get('auth')) {
                ?>
                        <a class="nav-link <?php
                                            if ($session->get('page') === 'keranjang') {
                                                echo ("active");
                                            }
                                            ?>" href="/customer/keranjang">Keranjang</a>
                        <a class="nav-link <?php
                                            if ($session->get('page') === 'transaksiku') {
                                                echo ("active");
                                            }
                                            ?>" href="/customer/transaksiku">transaksiku</a>
                        <a class="ml-4 btn btn-danger" href="/customer/logout">Log Out</a>
                    <?php
                    } else {
                    ?>
                        <a class="ml-4 btn btn-success" href="/customer/login">Login</a>
                        <a class="ml-4 btn btn-primary" href="/customer/register">Register</a>
                    <?php
                    }
                } else {
                    ?>
                    <a class="ml-4 btn btn-success" href="/customer/login">Login</a>
                    <a class="ml-4 btn btn-primary" href="/customer/register">Register</a>
                <?php
                }
                ?>

            </div>
        </div>
    </div>

</nav>