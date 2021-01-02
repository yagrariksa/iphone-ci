<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Customer extends BaseController
{
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

    public function log()
    {
        $session = \Config\Services::session();

        $model = new UserModel();

        if ($this->request->getMethod() === 'post') {

            $cek = $model->where('email', $this->request->getPost('email'))->first();

            if ($cek != null && !$cek['admin']) {

                if (password_verify($this->request->getPost('password'), $cek['password'])) {

                    $this->setAuth();
                    $session->set('user', $cek['user_id']);
                    return redirect()->to('/customer');
                } else {

                    $session->setFlashdata('error', 'password anda salah');
                    $session->setFlashdata('error_email',$this->request->getPost('email'));

                    return redirect()->back();
                }
            } else {
                $session->setFlashdata('error', 'email anda salah');

                return redirect()->back();
            }
        }
    }
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


                $this->setAuth();
                $session->set('user', $cek['user_id']);

                return redirect()->to('/customer');
            }
        }
    }

    public function logout()
    {
        $this->unsetAuth();

        return redirect()->back();
    }

    public function setAuth()
    {
        $session = \Config\Services::session();

        $session->set('auth', 'true');
    }

    public function unsetAuth()
    {
        $session = \Config\Services::session();

        $session->remove('auth');
        $session->remove('user');
    }
}
