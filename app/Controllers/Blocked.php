<?php

namespace App\Controllers;

use App\Models\ModelProcedure;


class Blocked extends BaseController
{
	public function blocked()
	{

		$data = [
            'judul_web' => 'Blocked',
            'subtitle' => 'Blocked',
            'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
			'get' => session() // ambil session user yang sedang login
        ];
		return view('blocked/blocked', $data);
	}
}
