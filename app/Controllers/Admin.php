<?php

namespace App\Controllers;

use App\Models\ModelProcedure;


class Admin extends BaseController
{

	// Dashboard Superuser
	public function dashboards()
	{
		if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure;
				$hah_id = $this->session->hakakses;
				// dd($user,$procedure->iscrud($user));
				$data = [
					'judul_web' => 'Dashboard',
					'subtitle' => 'Dashboard',
					'menu' => $procedure->iscrud($hah_id),
					'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
					'get' => session() // ambil session user yang sedang login
				];
				return view('adminsuper/dashboard', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
		
	}

	// Dashboard Pemda
	public function dashboardp()
	{
		if (session()->logged_in) {
			if (session()->hakakses == 1) {
				$procedure = new ModelProcedure;
				$hah_id = $this->session->hakakses;
				// dd(session()->id,session()->pegawai_id,$procedure->iscrud($hah_id));
				$data = [
					'judul_web' => 'Dashboard',
					'subtitle' => 'Dashboard',
					'menu' => $procedure->iscrud($hah_id),
					'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
					'get' => session() // ambil session user yang sedang login
				];
				return view('adminpemda/dashboard', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
		
	}

	// Dashboard OPD
	public function dashboardo()
	{
		if (session()->logged_in) {
			if (session()->hakakses == 2) {
				$procedure = new ModelProcedure;
				$hah_id = $this->session->hakakses;
				// dd(session()->id,session()->pegawai_id,$procedure->iscrud($hah_id));
				$data = [
					'judul_web' => 'Dashboard',
					'subtitle' => 'Dashboard',
					'menu' => $procedure->iscrud($hah_id),
					'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
					'get' => session() // ambil session user yang sedang login
				];
				return view('adminopd/dashboard', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
		
	}
}
