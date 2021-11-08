<?php

namespace App\Controllers;

use App\HTTP\IncomingRequest;
use Config\Database;
use CodeIgniter\Database\BaseBuilder;
use App\Models\ModelAuth;
use CodeIgniter\Session\Session;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		helper('form');
		$this->ModelAuth = new ModelAuth();
		$validation =  \Config\Services::validation();
		$security =  \Config\Services::security();
	}
	public function login()
	{
		if (session()->logged_in) {
			if (session()->hakakses == 0) {
				// session()->setFlashdata('password_salah', 'user password tidak sesuai !');
				return redirect()->to('admin/dashboards');
			}

			if (session()->hakakses == 1) {
				// session()->setFlashdata('password_salah', 'user password tidak sesuai !');
				return redirect()->to('admin/dashboardp');
			}

			if (session()->hakakses == 2) {
				// session()->setFlashdata('password_salah', 'user password tidak sesuai !');
				return redirect()->to('admin/dashboardo');
			}
			
		}

		$data = [
            'subtitleform' => 'Login | E-Sakip Intan Jaya',
            'subtitle' => 'Login',
            'subtitleAktif' => 'Master / Hak Akses',
			'validation' =>  \Config\Services::validation()
        ];
		return view('auth/login', $data);
	}

	public function prosesslogin()
	{
		// cek validasi inputan
		if (!$this->validate([
			'username' => [
				'label' => 'Username',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib diisi'
				]
			],

			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib diisi'
				]
			]

		])) {
			// jika validasi gagal
			$validation =  \Config\Services::validation();
			return redirect()->to('auth/login')->withInput()->with('validation', $validation);
		}

		// jika lolos Validasi
		// ambil inputan login
		$username = $this->security->sanitizeFilename($this->request->getVar('username'));
		$password = $this->security->sanitizeFilename($this->request->getVar('password'));
		// $username = $this->request->getVar('username');
		// $password = $this->request->getVar('password');

		// ambil data di database dengan parameter inputan login
		$cek_login = $this->ModelAuth->login_user($username, $password, '');
		// dd($cek_login);

		if ($cek_login->n == 50) {
			// dd($cek_login);
				$data_sess = [
					'id'       =>  $cek_login->usr_id,
					'username' => $cek_login->usr_name2,
					'hakakses' => $cek_login->hak_akses_id,
					// 'pegawai_id' => $cek_login->id_pegawai,
					'logged_in'     => TRUE
				];
				session()->set($data_sess);
				if (session()->hakakses == 0) {
					// session()->setFlashdata('password_salah', 'user password tidak sesuai !');
					return redirect()->to('admin/dashboards');
				}
				if (session()->hakakses == 1) {
					// session()->setFlashdata('password_salah', 'user password tidak sesuai !');
					return redirect()->to('admin/dashboardp');
				}
				if (session()->hakakses == 2) {
					// session()->setFlashdata('password_salah', 'user password tidak sesuai !');
					return redirect()->to('admin/dashboardo');
				}
				

			}elseif ($cek_login->n == 51) {
				// jika password tidk sesuai
				session()->setFlashdata('password_salah', 'user password tidak sesuai !');
				return redirect()->to(base_url('auth/login'));
			} elseif ($cek_login->n == 52) {
				// jika user belum ktif
				session()->setFlashdata('user_tdk_aktif', 'user belum aktivasi !');
				return redirect()->to(base_url('auth/login'));
			} elseif ($cek_login->n == 53) {
				// jika user belum terdaftar
				session()->setFlashdata('belum_regis', 'user atau email tidak ditemukan !');
				return redirect()->to(base_url('auth/login'));
			}

	}

	public function logout()
    {

        session()->destroy();
        return redirect()->to('auth/login');
    }
}
