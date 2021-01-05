<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangTerbeliModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Customer extends BaseController
{
    /**
     * 
     * function untuk menampilkan
     * dashboard toko hape
     */
    public function index()
    {
        $session = \Config\Services::session();
        $model = new BarangModel();
        $katModel = new KategoriModel();

        $session->set('page', 'dashboard');

        $builder = $model->builder();
        $data = $builder->orderBy('barang_id', 'DESC')->findAll();
        $dataf = [];
        foreach ($data as $item) {
            $kat = $katModel->where('kategori_id', $item['kategori'])->first();
            if ($kat != null) {
                $item['kategori_text'] = $kat['nama_kategori'];
            } else {
                $item['kategori_text'] = "tidak terkategori";
            }

            array_push($dataf, $item);
        }
        echo view('header', [
            'title' => 'dashboard',
        ]);

        echo view('navbar_cust', [
            'session' => $session,
        ]);

        echo view('cust/tabel_barang', [
            'data' => $dataf,
        ]);

        echo view('footer');
    }

    /**
     * 
     * function untuk menampilkan
     * form login akun (customer)
     */
    public function login()
    {
        $session = \Config\Services::session();

        $session->set('page', 'login');

        if ($session->has('auth')) {
            if ($session->get('auth')) {
                return redirect()->to('/customer');
            }
        }

        echo view('header', [
            'title' => 'login',
        ]);

        echo view('navbar_cust', [
            'session' => $session,
        ]);

        echo view('cust/login_form', []);

        echo view('footer');
    }

    /**
     * 
     * function untuk menampilkan
     * form registrasi akun baru (customer)
     */
    public function register()
    {
        $session = \Config\Services::session();

        $session->set('page', 'register');

        if ($session->has('auth')) {
            if ($session->get('auth')) {
                return redirect()->to('/customer');
            }
        }

        echo view('header', [
            'title' => 'register',
        ]);

        echo view('navbar_cust', [
            'session' => $session,
        ]);

        echo view('cust/register_form', []);

        echo view('footer');
    }

    /**
     * 
     * function untuk post data login
     */
    public function log()
    {
        $session = \Config\Services::session();

        $model = new UserModel();
        $cartmodel = new TransaksiModel();

        if ($this->request->getMethod() === 'post') {

            $cek = $model->where('email', $this->request->getPost('email'))->first();

            if ($cek != null && !$cek['admin']) {

                if (password_verify($this->request->getPost('password'), $cek['password'])) {

                    $mycart = $cartmodel->where('id_pembeli', $cek['user_id'])->where('status', 'KERANJANG')->first();
                    
                    
                    $this->setAuth();
                    $session->set('user', $cek['user_id']);
                    $session->set('cart_id', $mycart['transaksi_id']);
                    return redirect()->to('/customer');
                } else {

                    $session->setFlashdata('error', 'password anda salah');
                    $session->setFlashdata('error_email', $this->request->getPost('email'));

                    return redirect()->back();
                }
            } else {
                $session->setFlashdata('error', 'email anda salah');

                return redirect()->back();
            }
        }
    }

    /**
     * 
     * function untuk post data register
     */
    public function reg()
    {
        $session = \Config\Services::session();

        $model = new UserModel();
        $keranjangModel = new TransaksiModel();

        if ($this->request->getMethod() === 'post') {
            $cek = $model->where('email', $this->request->getPost('email'))->first();
            if ($cek != null) {

                $session->setFlashdata('error', 'email sudah terpakai');

                return redirect()->back();
            } else {

                $model->save([
                    'email'        => $this->request->getPost('email'),
                    'password'    => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    'admin'     => false,
                ]);

                $cek = $model->where('email', $this->request->getPost('email'))->first();

                $keranjangModel->save([
                    'id_pembeli'    => $cek['user_id'],
                    'status'        => 'KERANJANG',
                    'total' => 0,
                    'total_barang' => 0,
                ]);

                $mycart = $keranjangModel->where('id_pembeli', $cek['user_id'])->where('status', 'KERANJANG')->first();

                $this->setAuth();
                $session->set('user', $cek['user_id']);
                $session->set('cart_id', $mycart['transaksi_id']);

                return redirect()->to('/customer');
            }
        }
    }

    /**
     * 
     * function untuk lakukan logout
     */
    public function logout()
    {
        $this->unsetAuth();

        return redirect()->to('/customer');
    }

    /**
     * 
     * function untuk lakukan
     * basic SET auth
     */
    public function setAuth()
    {
        $session = \Config\Services::session();

        $session->set('auth', 'true');
    }

    /**
     * 
     * function untuk lakukan
     * basic UNSET auth
     */
    public function unsetAuth()
    {
        $session = \Config\Services::session();

        $session->remove('auth');
        $session->remove('user');
    }

    public function keranjang()
    {
        $session = \Config\Services::session();
        $session->set('page', 'keranjang');

        $bartermodel = new BarangTerbeliModel();

        $id_cart = $session->get('cart_id');
        $user = $session->get('user');


        $data = $bartermodel->where('transaksi_id', $id_cart)->findAll();

        echo view('header', [
            'title' => 'Keranjang',
        ]);

        echo view('navbar_cust', [
            'session' => $session,
        ]);

        echo view('cust/keranjang_list', [
            'data' => $data,
        ]);

        echo view('cust/checkout_form');

        echo view('footer');
    }

    public function hapusitem($id)
    {
        $session = \Config\Services::session();
        $session->set('page', 'keranjang');

        $bartermodel = new BarangTerbeliModel();

        $bartermodel->where('barangbeli_id', $id)->delete();

        return redirect()->back();
    }

    public function detail($id)
    {
        $session = \Config\Services::session();
        $session->set('page', 'detail');

        $barangModel = new BarangModel();
        $katModel = new KategoriModel();

        $data = $barangModel->where('barang_id', $id)->first();
        if ($data == null) {
            return redirect()->to('/customer');
        }

        $kat = $katModel->where('kategori_id', $data['kategori'])->first();
        $data['kategori_text'] = $kat['nama_kategori'];

        echo view('header', [
            'title' => 'Detail Barang',
        ]);

        echo view('navbar_cust', [
            'session' => $session,
        ]);

        echo view('cust/detail_barang', [
            'data' => $data,
        ]);

        echo view('footer');
    }

    public function addtocart()
    {
        $session = \Config\Services::session();

        $barterModel = new BarangTerbeliModel();
        $barangModel = new BarangModel();

        $id_cart = $session->get('cart_id');

        if ($this->request->getMethod() === 'post') {
            $barang_id = $this->request->getPost('barang_id');
            $jumlah_beli = $this->request->getPost('jumlah_beli');

            $barang = $barangModel->where('barang_id', $barang_id)->first();

            $subtotal = (int)$jumlah_beli * (int)$barang['harga_barang'];

            $barterModel->save([
                'transaksi_id'  => $id_cart,
                'barang_id'     => $barang['barang_id'],
                'nama_barang'   => $barang['nama_barang'],
                'harga_barang'  => $barang['harga_barang'],
                'jumlah_beli'   => $jumlah_beli,
                'subtotal'      => $subtotal,
            ]);

            return redirect()->to('/customer/keranjang');
        } else {
            return redirect()->to('/customer');
        }
    }

    /**
     * 
     * function untuk POST checkout
     */
    public function chekcout(){

        $session = \Config\Services::session();

        $barterModel = new BarangTerbeliModel();
        $transaksiModel = new TransaksiModel();
        $barangModel = new BarangModel();

        $id_cart = $session->get('cart_id');
        $user_id = $session->get('user');

        if ($this->request->getMethod() === 'post') {

            // mengambil data cart
            $cart = $barterModel->where('transaksi_id', $id_cart)->findAll();

            foreach($cart as $item){
                $cek = $barangModel->where('barang_id', $item['barang_id'])->first();
                if($cek['stok_barang'] < $item['jumlah_beli']){
                    $session->setFlashdata('error', $cek['nama_barang'] . " out of stock");
                    return redirect()->back();
                }
            }

            $alamat = $this->request->getPost('alamat');
            // membuat random string identifier
            do{
                $random = $this->getName(10);
                $detect = $transaksiModel->where('status', $random)->first();
            }while($detect != null);

            // menghitung jumlah barang
            // dan jumlah biaya
            $total_barang = 0;
            $total = 0;
            foreach($cart as $item){
                $total_barang = $total_barang + $item['jumlah_beli'];
                $total = $total + $item['subtotal'];
            }
            
            // menyimpan transaksi
            $transaksiModel->save([
                'id_pembeli'    => $user_id,
                'status'        => $random,
                'total'         => $total,
                'total_barang'  => $total_barang,
                // tambahkan alamat
            ]);

            $current_transaksi = $transaksiModel->where('status', $random)->first();

            // menyimpan barang yang dibeli
            foreach($cart as $item){
                $barterModel->save([
                    'transaksi_id'  => $current_transaksi['transaksi_id'],
                    'nama_barang'   => $item['nama_barang'],
                    'harga_barang'   => $item['harga_barang'],
                    'jumlah_beli'   => $item['jumlah_beli'],
                    'subtotal'   => $item['subtotal'],
                ]);

                $cek = $barangModel->where('barang_id', $item['barang_id'])->first();

                $value =  (int)$cek['stok_barang'] - (int)$item['jumlah_beli'];
                $simpan = [
                    'nama_barang'    => $cek['nama_barang'],
                    'satuan_barang'    => $cek['satuan_barang'],
                    'stok_barang'    => $value,
                    'harga_barang'  => $cek['harga_barang'],
                    'kategori'      => $cek['kategori'],
                ];

                $barangModel->where('barang_id', $item['barang_id'])->set($simpan)->update();

                // menghapus barang yang ada di keranjang
                $barterModel->where('barangbeli_id', $item['barangbeli_id'])->delete();
            }

            return redirect()->to('/customer/transaksiku');

        } else {
            return redirect()->to('/customer');
        }
    }

    /**
     * 
     * function untuk menampilkan
     * list transaksi yang sudah pernah
     */
    public function transaksiku()
    {
        $session = \Config\Services::session();
        $session->set('page', 'transaksiku');

        $transaksiModel = new TransaksiModel();

        $id_cart = $session->get('cart_id');
        $user = $session->get('user');


        $data = $transaksiModel->where('id_pembeli',$user)->where('status !=','KERANJANG')->findAll();
        echo view('header', [
            'title' => 'transaksiku',
        ]);

        echo view('navbar_cust', [
            'session' => $session,
        ]);

        echo view('cust/transaksiku', [
            'data' => $data,
            'session' => $session,
        ]);

        echo view('footer');
    }

    /**
     * 
     * function menampilkan detil transaksi
     */
    public function transaksidetail($id)
    {
        $session = \Config\Services::session();
        $session->set('page', 'transaksiku');

        $transaksiModel = new TransaksiModel();
        $barterModel = new BarangTerbeliModel();

        $transaksi = $transaksiModel->where('transaksi_id',$id)->first();
        $data = $barterModel->where('transaksi_id', $transaksi['transaksi_id'])->findAll();

        echo view('header', [
            'title' => 'transaksiku',
        ]);

        echo view('navbar_cust', [
            'session' => $session,
        ]);

        echo view('cust/transaksiku_detail', [
            'transaksi' => $transaksi,
            'data' => $data,
        ]);

        echo view('footer');
    }

    /**
     * 
     * function untuk men-generate
     * suatu random string
     */
    public function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
