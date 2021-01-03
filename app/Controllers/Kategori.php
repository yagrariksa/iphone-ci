<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Exception;

class Kategori extends BaseController
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
            $session->set('page', 'kategori');

            $model = new KategoriModel();

            $data = $model->orderBy('kategori_id', 'DESC')->getAll();

            echo view('header', [
                'title' => 'tabel Kategori'
            ]);
            echo view('navbar_admin', [
                'session' => $session,
            ]);
            echo view('kategori/tabel', [
                'data' => $data,
            ]);
            echo view('footer');
        } else {
            return redirect()->to('/user/login');
        }
    }

    public function create()
    {
        $session = \Config\Services::session();
        $session->set('page', 'kategori');

        echo view('header', [
            'title' => 'tabel Kategori'
        ]);
        echo view('navbar_admin', [
            'session' => $session,
        ]);
        echo view('kategori/create');
        echo view('footer');
    }

    public function store()
    {
        $model = new KategoriModel();

        if ($this->request->getMethod() === 'post') {
            $model->save([
                'nama_kategori'    => $this->request->getPost('nama_kategori'),
                'keterangan'    => $this->request->getPost('keterangan'),
            ]);
        }

        return redirect()->to('/kategori');
    }

    public function update($id)
    {
        $model = new KategoriModel();
        $session = \Config\Services::session();
        $session->set('page', 'kategori');

        $data = $model->where('kategori_id', $id)->first();
        echo view('header', [
            'title' => 'tabel Kategori'
        ]);
        echo view('navbar_admin', [
            'session' => $session,
        ]);
        echo view('kategori/update', [
            'data' => $data,
        ]);
        echo view('footer');
    }

    public function edit($id)
    {
        $model = new KategoriModel();
        $session = \Config\Services::session();
        $session->set('page', 'kategori');

        if ($this->request->getMethod() === 'post') {
            $simpan = [
                'nama_kategori'    => $this->request->getPost('nama_kategori'),
                'keterangan'    => $this->request->getPost('keterangan'),
            ];
            try {
                $model->where('kategori_id', $id)->set($simpan)->update();
                $session->setFlashdata('msg', 'BERHASIL');
            } catch (Exception $e) {
                $session->setFlashdata('msg', 'GAGAL');
            }
        }

        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $model = new KategoriModel();

        $model->where('kategori_id', $id)->delete();

        return redirect()->to('/kategori');
    }
}
