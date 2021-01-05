<?php

namespace App\Controllers;

use App\Models\BarangTerbeliModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Transaksi extends BaseController
{
    public function index(){
        $session = \Config\Services::session();
        $session->set('page', 'transaksi');

        $model = new TransaksiModel();
        $usermodel = new UserModel();
        $data = $model->where('status !=','KERANJANG')->orderBy('waktu_transaksi', 'DESC')->findAll();

        $dataf = [];
        foreach($data as $item){
            $user = $usermodel->where('user_id',$item['id_pembeli'])->first();
            $item['pembeli'] = $user['email'];
            array_push($dataf, $item);
        }

        echo view('header', [
            'title' => 'list transaksi',
        ]);

        echo view('navbar_admin', [
            'session' => $session,
        ]);

        echo view('transaksi/tabel', [
            'data' => $dataf,
            'session' => $session,
        ]);

        echo view('footer');
    }

    public function detail($id){
        $session = \Config\Services::session();
        $session->set('page', 'transaksiku');

        $transaksiModel = new TransaksiModel();
        $barterModel = new BarangTerbeliModel();

        $transaksi = $transaksiModel->where('transaksi_id',$id)->first();
        $data = $barterModel->where('transaksi_id', $transaksi['transaksi_id'])->findAll();

        echo view('header', [
            'title' => 'detail transaksi',
        ]);

        echo view('navbar_admin', [
            'session' => $session,
        ]);

        echo view('transaksi/detail', [
            'transaksi' => $transaksi,
            'data' => $data,
        ]);

        echo view('footer');

    }
}