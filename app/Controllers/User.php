<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProcedure;
use App\Models\ModelProcedurepemda;

class User extends BaseController
{
    public function profiles()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedurepemda;
				$hah_id = $this->session->hakakses;
				$user_id = $this->session->id;
				// dd($user_id,$procedure->logLogin($user_id));
				$data = [
					'judul_web' => 'Profile',
					'subtitle' => 'Profile',
					'user' => $procedure->logLogin($user_id, $hah_id),
					'menu' => $procedure->iscrud($hah_id),
					'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
					'get' => session() // ambil session user yang sedang login
				];
				return view('adminpemda/v_profile', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

	public function profilep()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 1) {
				$procedure = new ModelProcedurepemda;
				$hah_id = $this->session->hakakses;
				$user_id = $this->session->id;
				// dd($user_id,$procedure->logLogin($user_id));
				$data = [
					'judul_web' => 'Profile',
					'subtitle' => 'Profile',
					'user' => $procedure->logLogin($user_id, $hah_id),
					'menu' => $procedure->iscrud($hah_id),
					'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
					'get' => session() // ambil session user yang sedang login
				];
				return view('adminpemda/v_profile', $data);

			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

	public function profileo()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 2) {
				
				$procedure = new ModelProcedurepemda;
				$hah_id = $this->session->hakakses;
				$user_id = $this->session->id;
				// dd($user_id,$procedure->logLogin($user_id));
				$data = [
					'judul_web' => 'Profile',
					'subtitle' => 'Profile',
					'user' => $procedure->logLogin($user_id, $hah_id),
					'menu' => $procedure->iscrud($hah_id),
					'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
					'get' => session() // ambil session user yang sedang login
				];
				return view('adminpemda/v_profile', $data);

			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

}