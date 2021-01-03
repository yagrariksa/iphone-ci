<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Exception;

class Barang extends BaseController
{

    public function cekLoginAdmin()
    {
        $session = \Config\Services::session();
        if ($session->has('auth')) {
            if ($session->get('auth') && $session->get('admin')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function index()
    {
        if ($this->cekLoginAdmin()) {

            $session = \Config\Services::session();
            $model = new BarangModel();
            $katModel = new KategoriModel();

            $session->set('page', 'barang');

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
                'title' => 'tabel Barang'
            ]);

            echo view('navbar_admin', [
                'session' => $session,
            ]);

            echo view('barang/tabel', [
                'data' => $dataf,
                'session' => $session,
            ]);
            echo view('footer');
        } else {
            return redirect()->to('/user/login');
        }
    }

    public function delete($id)
    {

        $model = new BarangModel();
        $model->where('barang_id', $id)->delete();

        return redirect()->to('/barang');
    }

    public function create()
    {
        $session = \Config\Services::session();

        $katModel = new KategoriModel();
        $kat = $katModel->findAll();

        echo view('header', [
            'title' => 'Tambah Barang'
        ]);

        echo view('navbar_admin', [
            'session' => $session,
        ]);


        echo view('barang/create', [
            'kategori' => $kat,
        ]);

        echo view('footer');
    }

    public function store()
    {
        $model = new BarangModel();

        if ($this->request->getMethod() === 'post') {
            $model->save([
                'nama_barang'    => $this->request->getPost('nama_barang'),
                'satuan_barang'    => $this->request->getPost('satuan_barang'),
                'stok_barang'    => $this->request->getPost('stok_barang'),
                'harga_barang'  => $this->request->getPost('harga_barang'),
                'kategori'      => $this->request->getPost('kategori'),
            ]);
        }

        return redirect()->to('/barang');
    }

    public function update($id)
    {
        $session = \Config\Services::session();

        $barModel = new BarangModel();
        $katModel = new KategoriModel();
        $kat = $katModel->findAll();
        $data = $barModel->where('barang_id', $id)->first();


        echo view('header', [
            'title' => 'Update Barang'
        ]);

        echo view('navbar_admin', [
            'session' => $session,
        ]);

        echo view('barang/update', [
            'kategori' => $kat,
            'data' => $data,
        ]);

        echo view('footer');
    }

    public function edit($id)
    {
        $session = \Config\Services::session();
        $model = new BarangModel();
        if ($this->request->getMethod() === 'post') {
            $simpan = [
                'nama_barang'    => $this->request->getPost('nama_barang'),
                'satuan_barang'    => $this->request->getPost('satuan_barang'),
                'stok_barang'    => $this->request->getPost('stok_barang'),
                'harga_barang'  => $this->request->getPost('harga_barang'),
                'kategori'      => $this->request->getPost('kategori'),
            ];

            try {
                $model->where('barang_id', $id)->set($simpan)->update();
                $session->setFlashdata('msg', 'BERHASIL');
            } catch (Exception $e) {
                $session->setFlashdata('msg', 'GAGAL');
            }
        }
        return redirect()->to('/barang');
    }
}
