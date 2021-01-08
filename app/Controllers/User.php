<?php

namespace App\Controllers;

use App\Models\AdminModel;

class User extends BaseController
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
			return $this->got();
		} else {
			return redirect()->to('/user/login');
		}
	}

	//--------------------------------------------------------------------

	/**
	 * 
	 * function untuk menampilkan 
	 * FORM login
	 */
	public function login()
	{
		$session = \Config\Services::session();

		if ($this->cekLoginAdmin()) {
			return $this->got();
		} else {
			echo view('header', [
				'title' => 'LOGIN',
			]);
			echo view('admin/login_form', [
				'session' => $session,
			]);
			echo view('footer');
		}
	}

	/**
	 * 
	 * function untuk POST login
	 */
	public function loginadmin()
	{
		$session = \Config\Services::session();

		$userModel = new AdminModel();

		// cek metode akses nya post bukan
		if ($this->request->getMethod() === 'post') {

			$cek = $userModel->where('email', $this->request->getPost('email'))->first();

			// cek ada email kek gitu ga
			// cek email ini admin ga
			if ($cek != null) {

				// cek password benar atau tidak
				if (password_verify($this->request->getPost('password'), $cek['password'])) {

					// jika password benar
					$session->set('auth', true);
					$session->set('admin', true);

					return redirect()->to('/admin');
				} else {
					// jika password salah
					$session->setFlashdata('error', 'password anda salah');
					$session->setFlashdata('error_email', $this->request->getPost('email'));

					return redirect()->back();
				}
			} else {

				$session->setFlashdata('error', 'email anda salah');
				$session->setFlashdata('error_email', $this->request->getPost('email'));

				return redirect()->back();
			}
		} else {
			return redirect()->to('/admin');
		}
	}

	public function logout()
	{
		$session = \Config\Services::session();

		$session->remove('auth');
		$session->remove('admin');

		return redirect()->to('/admin');
	}

	/**
	 * 
	 * function untuk menampilkan
	 * FORM registrasi akun 
	 */
	public function create()
	{
		if ($this->cekLoginAdmin()) {
			return $this->got();
		} else {
			echo view('header', [
				'title' => 'REG USER',
			]);
			echo view('admin/login_create', []);
			echo view('footer');
		}
	}

	/**
	 * 
	 * function untuk POST
	 * registrasi akun baru
	 */
	public function store()
	{
		$session = \Config\Services::session();

		$model = new AdminModel();

		if ($this->request->getMethod() === 'post') {
			$model->save([
				'email'		=> $this->request->getPost('email'),
				'password'	=> password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
			]);
			$session->set('auth', true);
			$session->set('admin', true);

			return redirect()->to('/admin');
		}

		return redirect()->to('/admin');
	}

	/**
	 * 
	 * function untuk menampilkan
	 * form edit akun
	 */
	public function update($id)
	{
		if ($this->cekLoginAdmin()) {
			$session = \Config\Services::session();

			$model = new AdminModel();

			$data = $model->where('admin_id', $id)->first();
			// dd($data['user_id']);

			echo view('header', [
				'title' => 'update data',
			]);

			$session->set('page', 'user');

			echo view('navbar_admin', [
                'session' => $session,
			]);
			
			echo view('admin/login_update', [
				'data' => $data,
			]);

			echo view('footer');
		} else {
			return redirect()->to('/admin');
		}
	}

	/**
	 * 
	 * function untuk POST edit akun
	 */
	public function edit($id)
	{
		$session = \Config\Services::session();

		$model = new AdminModel();
		if ($this->request->getMethod() === 'post') {
			$data = $model->where('admin_id', $id)->first();
			if (password_verify($this->request->getPost('oldpassword'), $data['password'])) {
				$simpan = [
					'email'		=> $this->request->getPost('email'),
					'password'	=> password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
				];

				$model->where('admin_id', $id)->set($simpan)->update();
				$session->setFlashdata('msg', 'BERHASIL');
			} else {
				echo ("PASSWORD SALAH");
				$session->setFlashdata('msg', 'GAGAL');
			}
		}
		return redirect()->to('/user/got');
	}

	/**
	 * 
	 * function untuk megnhapus akun
	 */
	public function delete($id)
	{
		$model = new AdminModel();
		$model->where('user_id', $id)->delete();
		return redirect()->to('/user/got');
	}

	/**
	 * 
	 * function untuk menampilkan
	 * list akun
	 */
	public function got()
	{
		if ($this->cekLoginAdmin()) {
			$session = \Config\Services::session();

			$model = new AdminModel();
			$data = $model->getAll();

			echo view('header', [
				'title' => 'list user',
			]);
			
            $session->set('page', 'user');

			echo view('navbar_admin', [
                'session' => $session,
            ]);

			echo view('user_table', [
				'data' => $data,
				'session' => $session,
			]);

			echo view('footer');
		} else {
			return redirect()->to('/admin');
		}
	}
}
