<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

	public function index()
	{
		return redirect()->to('/user/got');
	}

	//--------------------------------------------------------------------

	public function login()
	{
		return view('login_form', [
			'title' => 'list user',
		]);
	}

	public function create()
	{
		return view('login_create', [
			'title' => 'list user',
		]);
	}

	public function store()
	{
		$model = new UserModel();

		if ($this->request->getMethod() === 'post') {
			$model->save([
				'email'		=> $this->request->getPost('email'),
				'password'	=> password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
			]);
		}

		return redirect()->to('/user/got');
	}

	public function update($id)
	{
		$model = new UserModel();
		
		$data = $model->where('user_id', $id)->first();
		// dd($data['user_id']);
		return view('login_update', [
			'title' => 'update data',
			'data' => $data,
		]);
	}

	public function edit($id) {
		$session = \Config\Services::session();
		$model = new UserModel();
		if ($this->request->getMethod() === 'post') {
			$data = $model->where('user_id', $id)->first();
			if (password_verify($this->request->getPost('oldpassword'), $data['password'])) {
				$simpan = [
					'email'		=> $this->request->getPost('email'),
					'password'	=> password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
				];

				$model->where('user_id',$id)->set($simpan)->update();
				$session->setFlashdata('msg', 'BERHASIL');
			}else{
				echo("PASSWORD SALAH");
				$session->setFlashdata('msg', 'GAGAL');

			}
		}
		return redirect()->to('/user/got');
	}
	public function delete($id)
	{
		$model = new UserModel();
		$model->where('user_id', $id)->delete();
		return redirect()->to('/user/got');
	}
	public function got()
	{
		$session = \Config\Services::session();

		$model = new UserModel();
		$data = $model->getAll();
		return view('user_table', [
			'title' => 'list user',
			'data' => $data,
			'session' => $session,
		]);
	}
}
