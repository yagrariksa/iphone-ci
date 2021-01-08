<nav class="navbar navbar-expand-lg navbar-dark bg-admin mb-4">
    <div class="container">
    <a class="navbar-brand" href="#">ADMINNNN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link <?php 
            if($session->get('page') === 'barang'){
                echo("active");
            }
            ?>" href="/barang">Barang</a>
            <a class="nav-link <?php 
            if($session->get('page') === 'kategori'){
                echo("active");
            }
            ?>" href="/kategori">Kategori</a>
            <a class="nav-link  <?php 
            if($session->get('page') === 'user'){
                echo("active");
            }
            ?>" href="/user">User</a>
            <a class="nav-link  <?php 
            if($session->get('page') === 'transaksi'){
                echo("active");
            }
            ?>" href="/transaksi">Transaksi</a>
            <a class="ml-4 btn btn-danger"  href="/user/logout">Keluar</a>
        </div>
    </div>
    </div>
    
</nav>