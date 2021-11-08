<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelProcedure;
use App\Models\ModelProcedurepemda;
use App\Models\ModelOpd;
use App\Models\ModelBidang;
use App\Models\ModelProcedureopd;
use App\Models\ModelSubBidang;
use App\Models\ModelHakAkses;
use phpDocumentor\Reflection\PseudoTypes\False_;
use phpDocumentor\Reflection\Types\This;

class Master extends BaseController
{

    
    public function __construct()
    {
        $this->model = new \App\Models\ModelBidang();
        $this->model = new \App\Models\ModelSubBidang();
        $this->modelHakAkses = new \App\Models\ModelHakAkses();
        //Do your magic here
    }
    
// ============================================================================================================================
// ============================================================================================================================
    /////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////
    /////-----------MASTER SUPERUSER------------/////
    ////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////
    
    // Hak Akses
//--------------------------------------------------------------------------------------------------------------------------//
    // View Hak akses
	public function hakakses()
	{
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure;
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Hak Akses',
                    'subtitle' => 'Master Hak Akses',
                    'subtitle2' => 'Master Hak Akses',
                    'HakAkses' => $procedure->hakakseshdr(),
                    'iscrud' => $procedure->iscrud($hah_id),
                    'menu' => $procedure->iscrud($hah_id),
                    'uri' => $this->request->uri->getSegment(1), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/hakakses/v_hakakses', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
	}

    public function ambildataModul($id)
    {
        $this->Modul = new ModelHakAkses();
        return json_encode($this->Modul->getModul($id));
    }

    // form tambah hak akses superuser
    public function f_hakakses()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
                $procedure = new ModelProcedure;
                $hah_id = $this->session->hakakses;
				session();
                $data = [
                    'judul_web' => 'Master Hak Akses',
                    'subtitle' => 'Master Hak Akses',
                    'subtitle2' => 'Master Hak Akses',
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'uri' => $this->request->uri->getSegment(1), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/hakakses/f_hakakses', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesstambahhakakses()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
                // cek validasi
                if (!$this->validate([
                    'nama_hah' => [
                        'label' => 'Nama hak akses',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                        ]
                    ],

                    'kd' => [
                        'label' => 'Kode hak akses',
                        'rules' => 'required|is_unique[hak_akses_hdr.kode]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => '{field} sudah ada, gunakan kode baru'
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    session()->setFlashdata('gagal', 'data gagal ditambahkan, periksa form inputan !');
                    return redirect()->to('/master/f_hakakses')->withInput()->with('validation', $validation);
                }
				$pegawai_id = session()->id;
                $kd = $this->request->getVar('kd');
                $nama_hah = $this->request->getVar('nama_hah');
                // dd($pegawai_id,$kd,$nama_hah);

                $simpan = $this->db->query("CALL hak_akses_hdr_insert($pegawai_id,'$kd','$nama_hah')")->getRow();
                if ($simpan->n == 81) {
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(site_url('master/hakakses'));
                } 

                if ($simpan->n == 80) {
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(site_url('master/hakakses'));

                }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}

    }

    public function f_edithakakses($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				session();
                $procedure = new ModelProcedure;
                $hah_id = $id;
                $IdSes = [
                    'idHahAkses' => $id
                ];
                session()->set($IdSes);
                $edit = $procedure->byIdHakAkses($hah_id);
                $data = [
                    'judul_web' => 'Master Hak Akses',
                    'subtitle' => 'Master Hak Akses',
                    'subtitle2' => 'Master Hak Akses',
                    'edit' => $edit,
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'uri' => $this->request->uri->getSegment(1), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/hakakses/f_edithakakses', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

    public function gantiAkses($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				session();
                $procedure = new ModelProcedure;
                $hah_id = $id;
                $gantiakses = [
                    'gantiaksesID' => $id
                ];
                session()->set($gantiakses);
                // dd(session()->gantiaksesID);
                $modul = $procedure->byIdGantiHakAkses($hah_id);
                $data = [
                    'judul_web' => 'Master Hak Akses',
                    'subtitle' => 'Master Hak Akses',
                    'subtitle2' => 'Master Hak Akses',
                    'modul' => $modul,
                    'hahdr_id' => session()->idHahAkses,
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'uri' => $this->request->uri->getSegment(1), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/hakakses/gantiakses', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

    // Update is Module Akses
    public function updateIsModul()
    {
        $id = $this->request->getVar('id');
        $name = $this->request->getVar('name');

        $builder = $this->db->table('hak_akses_dtl');

        if ($name == "is_active") {
            $value = $this->request->getVar('value');
            if ($value == 1) {
                $builder->set('is_active', 0);
                $builder->where('id', $id);
            }
            if ($value == 0) {
                $builder->set('is_active', 1);
                $builder->where('id', $id);
            }
        }
        if ($name == "is_view") {
            $value = $this->request->getVar('value');
            if ($value == 1) {
                $builder->set('is_view', 0);
                $builder->where('id', $id);
            }
            if ($value == 0) {
                $builder->set('is_view', 1);
                $builder->where('id', $id);
            }
        }
        if ($name == "is_insert") {
            $value = $this->request->getVar('value');
            if ($value == 1) {
                $builder->set('is_insert', 0);
                $builder->where('id', $id);
            }
            if ($value == 0) {
                $builder->set('is_insert', 1);
                $builder->where('id', $id);
            }
        }
        if ($name == "is_update") {
            $value = $this->request->getVar('value');
            if ($value == 1) {
                $builder->set('is_update', 0);
                $builder->where('id', $id);
            }
            if ($value == 0) {
                $builder->set('is_update', 1);
                $builder->where('id', $id);
            }
        }
        if ($name == "is_delete") {
            $value = $this->request->getVar('value');
            if ($value == 1) {
                $builder->set('is_delete', 0);
                $builder->where('id', $id);
            }
            if ($value == 0) {
                $builder->set('is_delete', 1);
                $builder->where('id', $id);
            }
        }

        return $builder->update();
        session()->setFlashdata('berhasil', 'data berhasil diupdate !');
        return redirect()->back()->withInput();

    }

    public function proccessedithakakses()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
                // cek validasi
                if (!$this->validate([
                    'nama_hah' => [
                        'label' => 'Nama hak akses',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                        ]
                    ],

                    'kd' => [
                        'label' => 'Kode hak akses',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    session()->setFlashdata('gagal', 'data gagal ditambahkan, periksa form inputan !');
                    return redirect()->to('/master/f_edithakakses/' . session()->idHahAkses)->withInput()->with('validation', $validation);
                }
				$pegawai_id = session()->id;
                $kd = $this->request->getVar('kd');
                $nama_hah = $this->request->getVar('nama_hah');
                $hah_id = $this->request->getVar('hah_id');
                // dd($pegawai_id,$kd,$nama_hah,$hah_id);

                $simpan = $this->db->query("CALL hak_akses_hdr_update($pegawai_id,'$kd','$nama_hah',$hah_id)");
                session()->setFlashdata('berhasil', 'data berhasil diupdate !');
                return redirect()->to(site_url('master/hakakses'));

			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

    public function hapushakakses($id)
    {
        $hah_id = $id;
        $pegawai_id = session()->id;

        $hapus = $this->db->query("CALL hak_akses_hdr_delete($hah_id, $pegawai_id)");
        if ($hapus->jabatan_id > 0) {
            session()->setFlashdata('hapus', 'tidak dapat dihapus, masih ada jabatan !');
            return redirect()->to('master/hakakses');
        } else
            session()->setFlashdata('hapus', 'data terhapus !');
            return redirect()->to('master/hakakses');
    }
//-----------------------------------------------------------------------------------------------------------------------------------------//

    // User
//------------------------------------------------------------------------------------------------------------------
    // View User
    public function users()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master User',
                    'subtitle' => 'Master User',
                    'subtitle2' => 'Data User',
                    'selectopduser' => $procedure->selectopdsuper(),
                    'selectpegawaiuser' => $procedure->pegawaiopdsuper(),
                    'selecthakaksesuser' => $procedure->hakakseshdr(),
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'procedure' => $procedure->tampiluser(),
                    'uri' => $this->request->uri->getSegment(1), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/user/v_user', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // form User
    public function f_users()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master User',
                    'subtitle' => 'Master User',
                    'subtitle2' => 'Data User',
                    'selectopduser' => $procedure->selectopdsuper(),
                    'selectpegawaiuser' => $procedure->pegawaiopdsuper(),
                    'selecthakaksesuser' => $procedure->hakakseshdr(),
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'uri' => $this->request->uri->getSegment(1), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/user/f_user', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // tambah user

    public function proccesstambahusers()
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'usr' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],

            'psswd' => [
                'label' => 'Password',
                'rules' => 'required|trim|min_length[6]|matches[psswd2]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'matches' => 'Konfirmasi password tidak sama!!',
                    'min_length' => '{field} minimal 6 karakter!!'
                ]
            ],
            'psswd2' => [
                'label' => 'Konfirmasi password',
                'rules' => 'required|trim|matches[psswd]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'matches' => 'Password tidak sama!!'
                ]
            ],

            'hah_id' => [
                'label' => 'Hak akses',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih'
                ]
            ],
            
            'nama_usr' => [
                'label' => 'Nama user',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],

            'opd_id' => [
                'label' => 'Nama OPD',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih'
                ]
            ],

            'p_id' => [
                'label' => 'Nama pegawai',
                'rules' => 'required|is_unique[user_sakip.pegawai_id]',
                'errors' => [
                    'required' => '{field} wajib dipilih',
                    'is_unique' => 'Data pegawai yang dipilih sudah digunakan!!'
                ]
            ],
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $usr = $this->request->getVar('usr');
            $psswd = $this->request->getVar('psswd');
            $opd_id = $this->request->getVar('opd_id');
            $p_id = $this->request->getVar('p_id');
            $usr_input_id = session()->id;
            $nama_usr = $this->request->getVar('nama_usr');
            $hah_id = $this->request->getVar('hah_id');
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $simpan = $this->db->query("CALL user_insert('$usr','$psswd','$hah_id','$opd_id','$p_id','$usr_input_id','$nama_usr')")->getRow();
            
            $hasil['sukses'] = "data berhasil ditambahkan";
            $hasil['error'] = true;
            session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

//------------------------------------------------------------------------------------------------------------------------------//

    // OPD
// --------------------------------------------------------------------------------------------------------------
    // View Opd
    public function opds()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $tipeodp = new ModelOpd();
                $hah_id = session()->hakakses;
                $data = [
                    'judul_web' => 'Master OPD',
                    'subtitle' => 'Master OPD',
                    'subtitle2' => 'Data OPD',
                    'procedure' => $procedure->superuserOpd(),
                    'levelopd' => $procedure->selectlevelopd(),
                    'selectTipeOpd' => $tipeodp->selecttypeopd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/opd/v_opdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    //form tambah opd super user
    public function f_opds()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = $this->session->hakakses;
                $tipeodp = new ModelOpd();
                $data = [
                    'judul_web' => 'Master OPD',
                    'subtitle' => 'Master OPD',
                    'subtitle2' => 'Data OPD',
                    'procedure' => $procedure->superuserOpd(),
                    'levelopd' => $procedure->selectlevelopd(),
                    'selectTipeOpd' => $tipeodp->selecttypeopd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/opd/f_opdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesstambahopds()
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required|is_unique[opd_hdr.kode]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Kode opd sudah ada, gunakan kode baru'
                ]
            ],

            'no_unit_kerja' => [
                'label' => 'Nomor unit kerja',
                'rules' => 'required|is_unique[opd_hdr.nomor_unit_kerja]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Nomor unit kerja sudah ada, gunakan nomor unit baru'
                ]
            ],
            'type' => [
                'label' => 'Type OPD',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],

            'nama_opd' => [
                'label' => 'Nama lenkap OPD',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],

            'email' => [
                'label' => 'Alamat email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],

            'lvl_opd_id' => [
                'label' => 'Level OPD',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $pegawai_id = session()->id;
            $kode = $this->request->getVar('kode');
            $nama_opd = $this->request->getVar('nama_opd');
            $alamat = $this->request->getVar('alamat');
            $telepon = $this->request->getVar('telepon');
            $email = $this->request->getVar('email');
            $lvl_opd_id = $this->request->getVar('lvl_opd_id');
            $type = $this->request->getVar('type');
            $kode_pos = $this->request->getVar('kode_pos');
            $fax = $this->request->getVar('fax');
            $website = $this->request->getVar('website');
            $no_unit_kerja = $this->request->getVar('no_unit_kerja');
            $simpan = $this->db->query("CALL opd_insert('$pegawai_id','$kode','$nama_opd','$alamat','$kode_pos','$telepon','$fax','$email','$website','$lvl_opd_id','$no_unit_kerja','$type')")->getRow();
            
            $hasil['sukses'] = "data berhasil diupdate";
            $hasil['error'] = true;
            session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
    //             return redirect()->to(base_url('master/bidangs/'. session()->id_OpdSess));
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);

    }

    // proses insert opd superuser
    // public function proccesstambahopds()
    // {
    //     if (session()->logged_in) {
	// 		if (session()->hakakses == 0) {
	// 			// cek validasi
    //             if (!$this->validate([
    //                 'kode' => [
    //                     'label' => 'Kode',
    //                     'rules' => 'required|is_unique[opd_hdr.kode]',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi',
    //                         'is_unique' => 'Kode opd sudah ada, gunakan kode baru'
    //                     ]
    //                 ],
        
    //                 'no_unit_kerja' => [
    //                     'label' => 'Nomor unit kerja',
    //                     'rules' => 'required|is_unique[opd_hdr.nomor_unit_kerja]',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi',
    //                         'is_unique' => 'Nomor unit kerja sudah ada, gunakan nomor unit baru'
    //                     ]
    //                 ],
    //                 'type' => [
    //                     'label' => 'Type OPD',
    //                     'rules' => 'required',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi'
    //                     ]
    //                 ],
        
    //                 'nama_opd' => [
    //                     'label' => 'Nama lenkap OPD',
    //                     'rules' => 'required',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi'
    //                     ]
    //                 ],
    //                 'alamat' => [
    //                     'label' => 'Alamat',
    //                     'rules' => 'required',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi'
    //                     ]
    //                 ],
        
    //                 'email' => [
    //                     'label' => 'Alamat email',
    //                     'rules' => 'required',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi'
    //                     ]
    //                 ],
        
    //                 'lvl_opd_id' => [
    //                     'label' => 'Level OPD',
    //                     'rules' => 'required',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi'
    //                     ]
    //                 ],
    //                 // 'telepon' => [
    //                 //     'label' => 'Nomor telepon',
    //                 //     'rules' => 'required|numeric|min_length[12]|max_length[12]',
    //                 //     'errors' => [
    //                 //         'required' => '{field} wajib diisi',
    //                 //         'numeric' => '{field} harus angka',
    //                 //         'min_length' => '{field} minimal 12 karakter',
    //                 //         'max_length' => '{field} maksimal 12 karakter'
    //                 //     ]
    //                 // ],
    //                 // 'kode_pos' => [
    //                 //     'label' => 'Kode pos',
    //                 //     'rules' => 'required|numeric',
    //                 //     'errors' => [
    //                 //         'required' => '{field} wajib diisi',
    //                 //         'numeric' => '{field} harus angka',
    //                 //     ]
    //                 // ],
        
    //                 // 'fax' => [
    //                 //     'label' => 'Nomor fax',
    //                 //     'rules' => 'required',
    //                 //     'errors' => [
    //                 //         'required' => '{field} wajib diisi'
    //                 //     ]
    //                 // ],
        
    //             ])) {
    //                 // jika validasi gagal
    //                 $validation =  \Config\Services::validation();
    //                 session()->setFlashdata('gagal', 'data gagal ditambahkan, periksa form inputan !');
    //                 return redirect()->to('master/f_opds')->withInput()->with('validation', $validation);
    //             }
        
        
    //             $pegawai_id = session()->id;
    //             $kode = $this->request->getVar('kode');
    //             $nama_opd = $this->request->getVar('nama_opd');
    //             $alamat = $this->request->getVar('alamat');
    //             $telepon = $this->request->getVar('telepon');
    //             $email = $this->request->getVar('email');
    //             $lvl_opd_id = $this->request->getVar('lvl_opd_id');
    //             $type = $this->request->getVar('type');
    //             $kode_pos = $this->request->getVar('kode_pos');
    //             $fax = $this->request->getVar('fax');
    //             $website = $this->request->getVar('website');
    //             $no_unit_kerja = $this->request->getVar('no_unit_kerja');
        
    //             $simpan = $this->db->query("CALL opd_insert('$pegawai_id','$kode','$nama_opd','$alamat','$kode_pos','$telepon','$fax','$email','$website','$lvl_opd_id','$no_unit_kerja','$type')")->getRow();
    //             // dd($pegawai_id, $kode, $nama_opd, $alamat, $telepon, $email, $lvl_opd_id, $type,$kode_pos,$fax,$website,$no_unit_kerja);
    //             // dd($simpan->n);
                
    //             if ($simpan->n == 81) {
    //                 session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
    //                 return redirect()->to(site_url('master/opds'));
    //             } 
        
    //             if ($simpan->n == 80) {
    //                 session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
    //                 return redirect()->to(site_url('master/opds'));
        
    //             }
	// 		} else{

    //                 return redirect()->to('blocked/blocked');

    //         }
			
	// 	}
        

    // }

    // form edit OPD super
    public function f_editopds($id)
    {
        $procedure = new ModelProcedure();
        $hah_id = session()->hakakses;
        $dataopd = $procedure->byideditopd($id);
        $IDOPD = [
            'sesIdOPD' => $id
        ];
        session()->set($IDOPD);
        // dd($data);
        $data = [
            'judul_web' => 'Master OPD',
            'subtitle' => 'Master OPD',
            'subtitle2' => 'Data OPD',
            'procedure' => $procedure->superuserOpd(),
            'levelopd' => $procedure->selectlevelopd(),
            'dataopd' => $dataopd,
            'menu' => $procedure->iscrud($hah_id),
            'validation' => \Config\Services::validation(),
			'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
            'get' => session() // ambil session user yang sedang login
        ];
        return view('mastersuper/opd/f_editopdsuper', $data);
    }

    public function proccesseditopds()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				// cek validasi
                if (!$this->validate([
                    'kode' => [
                        'label' => 'Kode',
                        'rules' => 'required|is_unique[opd_hdr.kode]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => 'Kode opd sudah ada, gunakan kode lain'
                        ]
                    ],
        
                    'no_unit_kerja' => [
                        'label' => 'Nomor unit kerja',
                        'rules' => 'required|is_unique[opd_hdr.nomor_unit_kerja]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => 'Nomor unit kerja sudah ada, gunakan yang lain'
                        ]
                    ],
                    // 'type' => [
                    //     'label' => 'Type OPD',
                    //     'rules' => 'required',
                    //     'errors' => [
                    //         'required' => '{field} wajib diisi'
                    //     ]
                    // ],
        
                    'nama_opd' => [
                        'label' => 'Nama lenkap OPD',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
                    'alamat' => [
                        'label' => 'Alamat',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
        
                    'email' => [
                        'label' => 'Alamat email',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
        
                    'lvl_opd_id' => [
                        'label' => 'Level OPD',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
                    // 'telepon' => [
                    //     'label' => 'Nomor telepon',
                    //     'rules' => 'required|numeric|min_length[12]|max_length[12]',
                    //     'errors' => [
                    //         'required' => '{field} wajib diisi',
                    //         'numeric' => '{field} harus angka',
                    //         'min_length' => '{field} minimal 12 karakter',
                    //         'max_length' => '{field} maksimal 12 karakter'
                    //     ]
                    // ],
                    // 'kode_pos' => [
                    //     'label' => 'Kode pos',
                    //     'rules' => 'required|numeric',
                    //     'errors' => [
                    //         'required' => '{field} wajib diisi',
                    //         'numeric' => '{field} harus angka',
                    //     ]
                    // ],
        
                    // 'fax' => [
                    //     'label' => 'Nomor fax',
                    //     'rules' => 'required',
                    //     'errors' => [
                    //         'required' => '{field} wajib diisi'
                    //     ]
                    // ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    session()->setFlashdata('gagal', 'data gagal ditambahkan, periksa form edit !');
                    return redirect()->to('master/f_editopds/'. session()->sesIdOPD)->withInput()->with('validation', $validation);
                }
        
                $id = $this->request->getVar('id_opd');
                $pegawai_id = session()->id;
                $kode = $this->request->getVar('kode');
                $nama_opd = $this->request->getVar('nama_opd');
                $alamat_opd = $this->request->getVar('alamat');
                $telepon = $this->request->getVar('telepon');
                $email = $this->request->getVar('email');
                $level = $this->request->getVar('lvl_opd_id');
                $kode_pos = $this->request->getVar('kode_pos');
                $fax = $this->request->getVar('fax');
                $website = $this->request->getVar('website');
                $no_unit_kerja = $this->request->getVar('no_unit_kerja');
                // dd($id,$pegawai_id, $kode,$nama_opd,$alamat_opd,$telepon,$email,$level,$kode_pos,$fax,$website,$no_unit_kerja);
                $this->db->query("CALL opd_update('$id','$pegawai_id','$kode','$nama_opd','$alamat_opd','$kode_pos','$telepon','$fax','$email','$website','$level','$no_unit_kerja')");
                // dd($update);
                session()->setFlashdata('update', 'data berhasil diupdate !');
                return redirect()->to(base_url('master/opds'));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//----------------------------------------------------------------------------------------------------------------------------//

    // Bidang
// ----------------------------------------------------------------------------------------------------------------
    // view bidang
    public function bidangs($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				// dd($id);
                $procedure = new ModelProcedure();
                $dataopd = $procedure->byideditopd($id);
                $hah_id = session()->hakakses;
                $bidang = new ModelBidang();
                $dataId = [
                    'id_OpdSess' => $id
                ];
                session()->set($dataId);
                $data = [
                    'judul_web' => 'Master Bidang',
                    'subtitle' => 'Master Bidang',
                    'subtitle2' => 'Data OPD',
                    'databidang' => $procedure->bidangView($id),
                    'edit' => $procedure->byideditbidangopd($id),
                    'dataopd' => $dataopd,
                    'validation' => \Config\Services::validation(),
                    'selectTipebidang' => $bidang->selecttypebidang(),
                    'validation' => \Config\Services::validation(),
                    'dataopd' => $dataopd,
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/opd/bidang/v_bidangopdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // form bidang opd
    // view bidang
    public function f_bidangs($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				// dd($id);
                $procedure = new ModelProcedure();
                $bidang = new ModelBidang();
                $hah_id = session()->hakakses;
                $dataopd = $procedure->byideditopd($id);
                $data = [
                    'judul_web' => 'Master Bidang',
                    'subtitle' => 'Master Bidang',
                    'subtitle2' => 'Data OPD',
                    'databidang' => $procedure->bidangView($id),
                    'dataopd' => $dataopd,
                    'selectTipebidang' => $bidang->selecttypebidang(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/opd/bidang/f_bidangopdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesstambahbidangs($id)
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required|is_unique[bidang.kode]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Kode bidang sudah ada, gunakan kode baru'
                ]
            ],

            'nama_bidang' => [
                'label' => 'Nama bidang',
                'rules' => 'required|is_unique[bidang.nama_bidang]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Nama bidang sudah ada, gunakan nama baru'
                ]
            ],
            'type' => [
                'label' => 'Type bidang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ]
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $pegawai_id = session()->id;
            $kd = $this->request->getVar('kode');
            $nama_bidang = $this->request->getVar('nama_bidang');
            $tipe_bidang_id = $this->request->getVar('type');
            $opd_id = $id;
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $simpan = $this->db->query("CALL bidang_insert_su('$pegawai_id','$kd','$nama_bidang','$tipe_bidang_id','$opd_id')")->getRow();
            
            $hasil['sukses'] = "data berhasil ditambahkan";
            $hasil['error'] = true;
            if ($simpan->n == 81) {
                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                // return redirect()->to(base_url('master/bidangs/'. $id));
            }
            if ($simpan->n == 80) {
                session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                // return redirect()->to(base_url('master/bidangs/'. $id));
                }
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

    public function f_editbidangs($id)
    {
        return json_encode($this->model->find($id));
    }

    public function proccesseditbidangs()
    {
        $validation = \Config\Services::validation();
        $validasiedit = [
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],

            'nama_bidang' => [
                'label' => 'Nama bidang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ]
        ];

        $validation->setRules($validasiedit);
        if ($validation->withRequest($this->request)->run()) {
            $bidang_id = $this->request->getVar('id');
            $pegawai_id = session()->id;
            $kode = $this->request->getVar('kode');
            $nama_bidang = $this->request->getVar('nama_bidang');
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $simpan = $this->db->query("CALL bidang_update($bidang_id,'$pegawai_id','$kode','$nama_bidang')")->getRow();
            
            $hasil['sukses'] = "data berhasil diupdate";
            $hasil['error'] = true;
            session()->setFlashdata('update', 'data berhasil diupdate !');
    //             return redirect()->to(base_url('master/bidangs/'. session()->id_OpdSess));
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

    public function hapusbidangs($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$pegawai_id = session()->id;
                // dd($id,$pegawai_id);

                $this->db->query("CALL bidang_delete($id,$pegawai_id)");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to('master/bidangs/'. session()->id_OpdSess);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//--------------------------------------------------------------------------------------------------------------//

    // Sub Bidang
// ----------------------------------------------------------------------------------------------------------------
    // Method Sub Bidang
    public function subbidangs($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				// dd($id);
                $procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $databidang = $procedure->byideditbidangopd($id);
                $back = [
                    'id_Bidang' => $databidang->id
                ];
                session()->set($back);
                // dd($back);
                $dataId = [
                    'id_BidangSess' => $id
                ];
                session()->set($dataId);
                $data = [
                    'judul_web' => 'Master Sub Bidang',
                    'subtitle' => 'Master Sub Bidang',
                    'subtitle2' => 'Data Bidang',
                    'datasubbidang' => $procedure->sub_bidangView($id),
                    'tampil' => $procedure->tampilbidang($id),
                    'databidang' => $databidang,
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/opd/bidang/subbidang/v_subbidangopdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function f_subbidangs($id)
    {
        // dd($id);
        $procedure = new ModelProcedure();
        $hah_id = session()->hakakses;
        $databidang = $procedure->byideditbidangopd($id);
        $data = [
            'judul_web' => 'Master Sub Bidang',
            'subtitle' => 'Master Sub Bidang',
            'subtitle2' => 'Data Bidang',
            'datasubbidang' => $procedure->sub_bidangView($id),
            'databidang' => $databidang,
            'iscrud' => $procedure->iscrud($hah_id),
            'validation' => \Config\Services::validation(),
            'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
            'get' => session() // ambil session user yang sedang login
        ];
        return view('mastersuper/opd/bidang/subbidang/f_subbidangopdsuper', $data);
    }

    public function proccesstambahsubbidangs($id)
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required|is_unique[sub_bidang.kode]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Kode bidang sudah ada, gunakan kode baru'
                ]
            ],

            'nama_sub_bidang' => [
                'label' => 'Nama sub bidang',
                'rules' => 'required|is_unique[sub_bidang.nama_sub_bidang]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Nama sub bidang sudah ada, gunakan nama baru'
                ]
            ]
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $pegawai_id = session()->id;
            $kode = $this->request->getVar('kode');
            $b_id = $id;
            $nama_sub_bidang = $this->request->getVar('nama_sub_bidang');
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $simpan = $this->db->query("CALL sub_bidang_insert('$pegawai_id','$kode','$b_id','$nama_sub_bidang')")->getRow();
            
            $hasil['sukses'] = "data berhasil ditambahkan";
            $hasil['error'] = true;
            if ($simpan->n == 81) {
                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                // return redirect()->to(base_url('master/subbidangs/'. $id));
            }
            if ($simpan->n == 80) {
                session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                // return redirect()->to(base_url('master/subbidangs/'. $id));
            }
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

    public function f_editsubbidangs($id)
    {
        return json_encode($this->model->find($id));
    }

    public function proccesseditsubbidangs()
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],

            'nama_sub_bidang' => [
                'label' => 'Nama sub bidang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ]
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $pegawai_id = session()->id;
            $kode = $this->request->getVar('kode');
            $bidang_id = $this->request->getVar('id_bidang');
            $nama_sub_bidang = $this->request->getVar('nama_sub_bidang');
            $sub_bidang_id = $this->request->getVar('id');
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $this->db->query("CALL sub_bidang_update($pegawai_id,'$kode',$bidang_id,'$nama_sub_bidang',$sub_bidang_id)");
            
            $hasil['sukses'] = "data berhasil diupdate";
            $hasil['error'] = true;
            session()->setFlashdata('update', 'data berhasil diupdate !');
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

    public function hapussubbidangs($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$pegawai_id = session()->id;

                $this->db->query("CALL sub_bidang_delete('$pegawai_id','$id')");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/subbidangs/'. session()->id_subBidang));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//--------------------------------------------------------------------------------------------------------------------

    // Jabatan
// ----------------------------------------------------------------------------------------------------------------
    // function Jabatan Super user
    public function jabatans($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $dataopd = $procedure->byideditopd($id);
                // dd($procedure->jabatanView($id));
                $dataId = [
                    'id_OpdSessJabatan' => $id
                ];
                session()->set($dataId);
                $data = [
                    'judul_web' => 'Master Jabatan',
                    'subtitle' => 'Master Jabatan',
                    'subtitle2' => 'Data jabatan',
                    'datajabatan' => $procedure->jabatanView($id),
                    'dataopd' => $dataopd,
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/opd/jabatan/v_jabatanopdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data bidang
    public function getBidang()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $BidangID = $this->request->getVar('BidangID');
                $opd_id = session()->id_OpdSessJabatan;
                // dd($id_bidang);
                $getdatabidang = $procedure->bidangSelectViews($opd_id);
                $output = '<option value="">---Pilih Bidang---</option>';
                foreach ($getdatabidang as $row) {
                    if ($BidangID) { //Edit data
                        if ($BidangID == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.$row->id.'" selected>'.$row->nama_bidang.'</option>';
                        } else {
                            $output .='<option value="'.$row->id.'">'.$row->nama_bidang.'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.$row->id.'">'.$row->nama_bidang.'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data subbidang
    public function getDataSubbidang()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $subbidang_id = $this->request->getVar('subbidang_id');
                $bidang_id = $this->request->getVar('bidang_id');
                // dd($id_bidang);
                $getdataSubbidang = $procedure->subbidangselectView($bidang_id);
                $output = '<option value="">---Pilih Sub Bidang---</option>';
                foreach ($getdataSubbidang as $row) {
                    if ($subbidang_id) { //Edit data
                        if ($subbidang_id == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.$row->id.'" selected>'.$row->nama_sub_bidang.'</option>';
                        } else {
                            $output .='<option value="'.$row->id.'">'.$row->nama_sub_bidang.'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.$row->id.'">'.$row->nama_sub_bidang.'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function f_jabatans($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $dataopd = $procedure->byideditopd($id);
                $data = [
                    'judul_web' => 'Master Jabatan',
                    'subtitle' => 'Master Jabatan',
                    'subtitle2' => 'Data jabatan',
                    'datajabatan' => $procedure->jabatanView($id),
                    'selectbidang' => $procedure->bidangView($id),
                    // 'selectsubbidang' => $procedure->sub_bidangView($id, $id_bidang),
                    'selectlevel' => $procedure->leveljabatan($id),
                    'dataopd' => $dataopd,
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/opd/jabatan/f_jabatanopdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesstambahjabatans($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
                    // cek validasi
                    if (!$this->validate([
                        'kode' => [
                            'label' => 'Kode|trim|is_unique[jabatan.kode]',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} wajib diisi',
                                'is_unique' => 'Kode jabatan sudah ada, gunakan kode baru'
                            ]
                        ],

                        'level' => [
                            'label' => 'Level',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} wajib pilih'
                            ]
                        ],
            
                        'nama_jabatan' => [
                            'label' => 'Nama jabatan',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} wajib diisi'
                            ]
                        ]
            
                    ])) {
                        // jika validasi gagal
                        $validation =  \Config\Services::validation();
                        return redirect()->to('/master/f_jabatans/' . $id)->withInput()->with('validation', $validation);
                    }
				$pegawai_id = session()->id;
                $kode = $this->request->getVar('kode');
                $lvl = $this->request->getVar('level');
                $nama_jabatan = $this->request->getVar('nama_jabatan');
                $opd_id = $id;

                if ($lvl == 1) {
                    $b_id = $this->request->getVar('bidang_idManipulasi');
                    $sb_id = $this->request->getVar('sub_bidang_idManipulasi');
                }
                if ($lvl == 2) {
                    $b_id = $this->request->getVar('bidang_id');
                    $sb_id = $this->request->getVar('sub_bidang_idManipulasi');
                }
                if ($lvl == 3) {
                    $b_id = $this->request->getVar('bidang_id');
                    $sb_id = $this->request->getVar('sub_bidang_id');
                }
                if ($lvl == 4) {
                    $b_id = $this->request->getVar('bidang_id');
                    $sb_id = $this->request->getVar('sub_bidang_id');
                }

                
                
                // dd($pegawai_id,$kode,$b_id,$sb_id,$lvl,$nama_jabatan,$opd_id);
                
                $simpan = $this->db->query("CALL jabatan_insert_su($pegawai_id,'$kode',$b_id,$sb_id,$lvl,'$nama_jabatan',$opd_id)")->getRow();

                if ($simpan->n == 81) {
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/jabatans/'. $id));
                }
                if ($simpan->n == 80) {
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(base_url('master/f_jabatans/'. $id));
                }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // form edit jabatan opd super
    public function f_editjabatans($id, $type)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $dataopd = $procedure->byideditopd($id);
                $idOpdback = session()->id_OpdSessJabatan;
                $dataJabatan = $procedure->byideditjabatanopd($id);
                
                // dd($procedure->byideditjabatanopd($id));
                $data = [
                    'judul_web' => 'Master Jabatan',
                    'subtitle' => 'Master Jabatan',
                    'subtitle2' => 'Data jabatan',
                    // 'selectbidang' => $procedure->bidangView($id),
                    // 'selectsubbidang' => $procedure->sub_bidangView($id, $id_bidang),
                    'selectlevel' => $procedure->leveljabatan($id),
                    'dataopd' => $dataopd,
                    'back' => $idOpdback,
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];

                if ($type == 'edit') {
                    $data['dataeditjabatan'] = $dataJabatan;
                    return view('mastersuper/opd/jabatan/f_editjabatanopdsuper', $data);
                } else {
                    // data json
                    echo json_encode($dataJabatan);
                }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}

        
    }

    public function  proccesseditjabatans()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
                // cek validasi
                if (!$this->validate([
                    'kode' => [
                        'label' => 'Kode|trim|is_unique[jabatan.kode]',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => 'Kode jabatan sudah ada, gunakan kode baru'
                        ]
                    ],

                    'level' => [
                        'label' => 'Level',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib pilih'
                        ]
                    ],
        
                    'nama_jabatan' => [
                        'label' => 'Nama jabatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('/master/f_editjabatans')->withInput()->with('validation', $validation);
                }

				$pegawai_id = session()->id;
                $kode = $this->request->getVar('kode');
                $b_id = $this->request->getVar('bidang_id');
                $sb_id = $this->request->getVar('sub_bidang_id'); 
                $lvl = $this->request->getVar('level');
                $nama_jabatan = $this->request->getVar('nama_jabatan');
                $hah_id = $this->request->getVar('hah_id');
                $notes = $this->request->getVar('notes');
                $j_id = $this->request->getVar('j_id');
                // $simpan = $this->db->query("CALL jabatan_update()");
                session()->setFlashdata('update', 'data berhasil diupdate !');
                return redirect()->to(base_url('master/jabatans/'. session()->id_OpdSessJabatan));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // fungsi hapus jabatan opd super
    public function hapusjabatans($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$pegawai_id = session()->id;
                // dd($id,$pegawai_id);

                $this->db->query("CALL jabatan_delete('$id','$pegawai_id')");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/jabatans/'. session()->id_OpdSessJabatan));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//-----------------------------------------------------------------------------------------------------------------------//

    // Pegawai
// ----------------------------------------------------------------------------------------------------------------
    // pegawai
    public function pegawais()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $data = [
                    'judul_web' => 'Master Pegawai',
                    'subtitle' => 'Master Pegawai',
                    'subtitle2' => 'Data Pegawai',
                    'procedure' => $procedure->pegawaiopdsuper(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/pegawai/v_pegawaisuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data OPD pegawai
    public function getOpdIDPegawai()
    {
        if (session()->hakakses == 0) {
                $procedure = new ModelProcedure();
                $id_pegawai = session()->id;
                $opdIDPegawai = $this->request->getVar('opdIDPegawai');
                $getdataopdPegawai = $procedure->superuserOpd();
            //  dd($getdatajabatan);
                $output = '<option value="">---Pilih OPD---</option>';
                foreach ($getdataopdPegawai as $row) {
                if ($opdIDPegawai) { //Edit data
                    if (5 == $row->id) { 
                        // selected sub bidang
                        $output .='<option value="'.$row->id.'" selected>'.$row->nama_opd.'</option>';
                    } else {
                        $output .='<option value="'.$row->id.'">'.$row->nama_opd.'</option>';
                    } 
                } else { // tambah data
                    # data foraeach
                    $output .='<option value="'.$row->id.'">'.$row->nama_opd.'</option>';
                }
            }
                echo json_encode($output);
        } else{

                return redirect()->to('blocked/blocked');

        }
        
        
    }

    // get data jabatan pegawai
     public function getJabatanPegawai()
     {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $jabatan_id = $this->request->getVar('jabatan_id');
                $opdIDPegawai = $this->request->getVar('opdIDPegawai');
                $getdatajabatanPegawai = $procedure->jabatanselectView($opdIDPegawai);
                //  dd($getdatajabatan);
                $output = '<option value="">---Pilih Jabatan---</option>';
                foreach ($getdatajabatanPegawai as $row) {
                    if ($jabatan_id) { //Edit data
                        if ($jabatan_id == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.$row->id.'" selected>'.$row->nama_jabatan.'</option>';
                        } else {
                            $output .='<option value="'.$row->id.'">'.$row->nama_jabatan.'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.$row->id.'">'.$row->nama_jabatan.'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
         
     }
    
    //form tambah pegawai super user
    public function f_pegawais()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $opd = $procedure->selectjabatansuper();
                // $tipeodp = new ModelOpd();
                $data = [
                    'judul_web' => 'Master pegawai',
                    'subtitle' => 'Master pegawai',
                    'subtitle2' => 'Data pegawai',
                    'procedure' => $procedure->superuserOpd(),
                    'selectjabatansuper' => $procedure->selectjabatansuper(),
                    'selectopdsuper' => $procedure->selectopdsuper(),
                    'selectgolongansuper' => $procedure->selectgolongansuper(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('mastersuper/pegawai/f_pegawaisuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesstambahpegawais()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
                // cek validasi
                if (!$this->validate([
                    'nik' => [
                        'label' => 'Nik',
                        'rules' => 'required|trim|is_unique[pegawai.nik]|max_length[16]|min_length[16]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => '{field} pegawai sudah ada',
                            'max_length' => 'Maksimal karakter untuk field {field} adalah 16 karakter',
                            'min_length' => 'Minimal karakter untuk field {field} adalah 16 karakter'
                        ]
                    ],

                    'nip' => [
                        'label' => 'Nip',
                        'rules' => 'required|trim|is_unique[pegawai.nip]|max_length[16]|min_length[16]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => '{field} pegawai sudah ada',
                            'max_length' => 'Maksimal karakter untuk field {field} adalah 16 karakter',
                            'min_length' => 'Minimal karakter untuk field {field} adalah 16 karakter'
                        ]
                    ],
        
                    'nama_pegawai' => [
                        'label' => 'Nama pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],

                    'jk' => [
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'jabatan_id' => [
                        'label' => 'Nama jabatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'golongan' => [
                        'label' => 'Golongan pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'opdid_pegawai' => [
                        'label' => 'Opd pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'email' => [
                        'label' => 'Email',
                        'rules' => 'valid_email',
                        'errors' => [
                            'valid_email' => '{field} tidak valid'
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('/master/f_pegawais')->withInput()->with('validation', $validation);
                }
				$p_id_input = session()->id;
                $p_nama = $this->request->getVar('nama_pegawai');
                $p_nik = $this->request->getVar('nik');
                $p_nip = $this->request->getVar('nip');
                $p_kelamin_code = $this->request->getVar('jk');
                $p_no_hp = $this->request->getVar('no_hp');
                $p_email = $this->request->getVar('email');
                $p_jabatan = $this->request->getVar('jabatan_id');
                $gol_id = $this->request->getVar('golongan');
                $opd_id = $this->request->getVar('opdid_pegawai');

                // dd($p_id_input,$p_nama,$p_nik,$p_nip,$p_kelamin,$p_no_hp,$p_email,$p_jabatan,$gol_id);

                $simpan = $this->db->query("CALL pegawai_insert_su($p_id_input,'$p_nama',$p_nik,$p_nip,'$p_kelamin_code',$p_no_hp,'$p_email',$p_jabatan,$gol_id,$opd_id)")->getRow();

                if ($simpan->n == 54) {
                    session()->setFlashdata('no_jabatan', 'tidak dapat menduduki jabatan !');
                    return redirect()->to(base_url('master/f_pegawais'));
                }
                if ($simpan->n == 81) {
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/pegawais'));
                }
                if ($simpan->n == 80) {
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(base_url('master/pegawais'));
                }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}

    }

    //form edit pegawai super user
    public function f_editpegawais($id, $type)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $pegawai_id = $id;
                $editpegawai = [
                    'idpegawai' => $id,
                    'typepegawai' => $type
                ];
                session()->set($editpegawai);
                $dataPegawai = $procedure->editpegawaiopdsuper($pegawai_id);
                $jabatan = $procedure->selectjabatansuper();
                // dd($procedure->editpegawaiopdsuper($pegawai_id));
                $data = [
                    'judul_web' => 'Master Pegawai',
                    'subtitle' => 'Master Pegawai',
                    'subtitle2' => 'Data Pegawai',
                    'procedure' => $procedure->superuserOpd(),
                    'selectjabatansuper' => $procedure->selectjabatanedit($pegawai_id),
                    'jabatan' => $jabatan,
                    'dataPegawai' => $dataPegawai,
                    'selectopdsuper' => $procedure->selectopdsuper($pegawai_id),
                    'selectopdd' => $procedure->superuserOpd(),
                    'selectgolongansuper' => $procedure->selectgolongansuper(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];

                if ($type == 'edit') {
                    $data['dataeditjabatan'] = $dataPegawai;
                    return view('mastersuper/pegawai/f_editpegawaisuper', $data);
                } else {
                    // data json
                    echo json_encode($dataPegawai);
                }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesseditpegawais()
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
                // cek validasi
                if (!$this->validate([
                    'nik' => [
                        'label' => 'Nik',
                        'rules' => 'required|trim',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],

                    'nip' => [
                        'label' => 'Nip',
                        'rules' => 'required|trim',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => 'Nip pegawai sudah ada'
                        ]
                    ],
        
                    'nama_pegawai' => [
                        'label' => 'Nama pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],

                    'jk' => [
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'jabatan_id' => [
                        'label' => 'Nama jabatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'golongan' => [
                        'label' => 'Golongan pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'opdid_pegawai' => [
                        'label' => 'Opd pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'email' => [
                        'label' => 'Email',
                        'rules' => 'valid_email',
                        'errors' => [
                            'valid_email' => '{field} tidak valid'
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('/master/f_editpegawais/'. session()->idpegawai.'/'. 'edit')->withInput()->with('validation', $validation);
                }
				$p_id_input = session()->id;
                $p_nama = $this->request->getVar('nama_pegawai');
                $p_nik = $this->request->getVar('nik');
                $p_nip = $this->request->getVar('nip');
                $p_kelamin_kode = $this->request->getVar('jk');
                $p_no_hp = $this->request->getVar('no_hp');
                $p_email = $this->request->getVar('email');
                $p_golongan_id = $this->request->getVar('golongan');
                $p_jabatan = $this->request->getVar('jabatan_id');
                $pegawai_id = $this->request->getVar('p_id');
                $opd_id = $this->request->getVar('opdid_pegawai');

                // dd($p_id_input,$p_nama,$p_nik,$p_nip,$p_kelamin_kode,$p_no_hp,$p_email,$p_golongan_id,$p_jabatan,$pegawai_id,$opd_id);

                $simpan = $this->db->query("CALL pegawai_update_su($p_id_input,'$p_nama',$p_nik,$p_nip,'$p_kelamin_kode',$p_no_hp,'$p_email',$p_golongan_id,$p_jabatan,$pegawai_id,$opd_id)");
                if ($simpan->n == 54) {
                    session()->setFlashdata('no_jabatan', 'tidak dapat menduduki jabatan !');
                    return redirect()->to(base_url('/master/f_editpegawais/'. session()->idpegawai.'/'. 'edit'));
                }
                session()->setFlashdata('berhasil', 'data berhasil diupdate !');
                return redirect()->to(base_url('master/pegawais'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/pegawais'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/pegawais'));
                // }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}

    }

    // fungsi hapus jabatan opd super
    public function hapuspegawais($id)
    {
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$p_id_input = session()->id;
                $pegawai_id = $id;
                dd($p_id_input,$pegawai_id);

                $this->db->query("CALL pegawai_delete('$p_id_input','$pegawai_id')");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/pegawais'));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }
    
    ////////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////
    ////////--------------AKHIR MASTER SUPERUSER------------////////
    ///////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>////////



//----------------------------------------------------------------------------------------------------------------------------//

    /////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////
    /////-----------AKHIR MASTER SUPERUSER------------/////
    ////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////

// ==============================================================================================================================
// ============================================================================================================================

    /////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////
    /////-----------MASTER ADMIN PEMDA------------/////
    ////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////

        // Bidang pemda
// ----------------------------------------------------------------------------------------------------------------
    // view bidang
    public function bidangp()
    {
       if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_active == 1) {
                   // dd($id);
                   $procedure = new ModelProcedurepemda();
                   $pegawai_id = session()->id;
                   $hah_id = $this->session->hakakses;
                   //  dd($id);
                   //  $dataopd = $procedure->byideditopd($id);
                   $bidang = new ModelBidang();
                   $data = [
                    'judul_web' => 'Master Bidang',
                    'subtitle' => 'Master Bidang',
                    'subtitle2' => 'Data Bidang',
                       'databidang' => $procedure->bidangView($pegawai_id),
                       'menu' => $procedure->iscrud($hah_id),
                       'validation' => \Config\Services::validation(),
                       'selectTipebidang' => $bidang->selecttypebidang(),
                       'menu' => $procedure->iscrud($hah_id),
                       'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                       'get' => session() // ambil session user yang sedang login
                   ];
                   return view('masterpemda/bidang/v_bidang', $data);
           } else{
   
                   return redirect()->to('blocked/blocked');
   
           }
           
        }
    }

    // tambah bidang
    public function f_bidangp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_insert == 1) {
                   // dd($id);
                   $procedure = new ModelProcedurepemda();
                   $procedure = new ModelProcedure();
                   $id = session()->id;
                   $hah_id = $this->session->hakakses;
                   //  dd($id);
                   //  $dataopd = $procedure->byideditopd($id);
                   $bidang = new ModelBidang();
                   $data = [
                    'judul_web' => 'Master Bidang',
                    'subtitle' => 'Master Bidang',
                    'subtitle2' => 'Data OPD',
                       'databidang' => $procedure->bidangView($id),
                       'selectopdsuper' => $procedure->selectopdsuper(),
                       'menu' => $procedure->iscrud($hah_id),
                       'validation' => \Config\Services::validation(),
                       'selectTipebidang' => $bidang->selecttypebidang(),
                       'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                       'get' => session() // ambil session user yang sedang login
                   ];
                   return view('masterpemda/bidang/f_bidang', $data);
           } else{
   
                   return redirect()->to('blocked/blocked');
   
           }
           
        }
    }

    // proses bidang
    public function proccesstambahbidangp()
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'kd' => [
                'label' => 'Kode',
                'rules' => 'required|is_unique[bidang.kode]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Kode bidang sudah ada, gunakan kode baru'
                ]
            ],

            'nama_bidang' => [
                'label' => 'Nama bidang',
                'rules' => 'required|is_unique[bidang.nama_bidang]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Nama bidang sudah ada, gunakan nama baru'
                ]
            ],
            'typeBidang' => [
                'label' => 'Type bidang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih'
                ]
            ]
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $pegawai_id = session()->id;
            $kd = $this->request->getVar('kd');
            $nama_bidang = $this->request->getVar('nama_bidang');
            $tipe_b_id = $this->request->getVar('typeBidang');
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $simpan = $this->db->query("CALL bidang_insert($pegawai_id,'$kd','$nama_bidang',$tipe_b_id)")->getRow();
            
            $hasil['sukses'] = "data berhasil ditambahkan";
            $hasil['error'] = true;
            if ($simpan->n == 81) {
                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                // return redirect()->to(base_url('master/bidangs/'. $id));
            }
            if ($simpan->n == 80) {
                session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                // return redirect()->to(base_url('master/bidangs/'. $id));
                }
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

    // public function f_editbidangp($id)
    // {
    //     return json_encode($this->model->find($id));
    // }

    // public function proccesseditbidangp()
    // {
    //     $validation = \Config\Services::validation();
    //     $validasiedit = [
    //         'kd' => [
    //             'label' => 'Kode',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi'
    //             ]
    //         ],

    //         'nama_bidang' => [
    //             'label' => 'Nama bidang',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi'
    //             ]
    //         ]
    //     ];

    //     $validation->setRules($validasiedit);
    //     if ($validation->withRequest($this->request)->run()) {
    //         $bidang_id = $this->request->getVar('id');
    //         $pegawai_id = session()->id;
    //         $kd = $this->request->getVar('kd');
    //         $nama_bidang = $this->request->getVar('nama_bidang');
    //         // dd($bidang_id,$pegawai_id,$kode,$nama_bidang);
            
    //         $this->db->query("CALL bidang_update('$bidang_id','$pegawai_id','$kd','$nama_bidang')");
            
    //         $hasil['sukses'] = "data berhasil diupdate";
    //         $hasil['error'] = true;
    //         session()->setFlashdata('update', 'data berhasil diupdate !');
    //     //             return redirect()->to(base_url('master/bidangs/'. session()->id_OpdSess));
    //     } else {
    //         $hasil['sukses'] = false;
    //         $hasil['error'] = $validation->listErrors();
    //     }

        
    //     return json_encode($hasil);
    // }
    // public function proccesstambahbidangp()
    // {
    //     if (session()->logged_in) {
	// 		if (session()->hakakses == 1) {
	// 			// cek validasi
    //             if (!$this->validate([
    //                 'kd' => [
    //                     'label' => 'Kode',
    //                     'rules' => 'required|is_unique[bidang.kode]',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi',
    //                         'is_unique' => '{field} sudah ada, gunakan kode lain',
    //                     ]
    //                 ],
                        
    //                 'nama_bidang' => [
    //                     'label' => 'Nama Bidang',
    //                     'rules' => 'required|is_unique[bidang.nama_bidang]',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi',
    //                         'is_unique' => '{field} sudah ada, gunakan nama bidang lain',
    //                     ]
    //                 ],
    //                 'typeBidang' => [
    //                     'label' => 'Type Bidang',
    //                     'rules' => 'required',
    //                     'errors' => [
    //                         'required' => '{field} wajib diisi'
    //                     ]
    //                 ]
        
    //             ])) {
    //                 // jika validasi gagal
    //                 $validation =  \Config\Services::validation();
    //                 return redirect()->to('/master/f_bidangp')->withInput()->with('validation', $validation);
    //             }
    //                 $pegawai_id = session()->id;
    //                 $kd = $this->request->getVar('kd');
    //                 $nama_bidang = $this->request->getVar('nama_bidang');
    //                 $tipe_b_id = $this->request->getVar('typeBidang');
    //                 // dd($pegawai_id,$kd,$nama_bidang,$tipe_b_id);
    //                 $simpan = $this->db->query("CALL bidang_insert($pegawai_id,'$kd','$nama_bidang',$tipe_b_id)")->getRow();
        
    //             if ($simpan->n == 81) {
    //                 session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
    //                 return redirect()->to(base_url('master/bidangp'));
    //             }
    //             if ($simpan->n == 80) {
    //                 session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
    //                 return redirect()->to(base_url('master/f_bidangp'));
    //             }
	// 		} else{

    //                 return redirect()->to('blocked/blocked');

    //         }
			
	// 	}  
    // }

    // Edit Bidang
    public function f_editbidangp($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_update == 1) {
				$procedure = new ModelProcedure();
				$proceduree = new ModelProcedurepemda();
                $hah_id = session()->hakakses;
                $data = [
                    'judul_web' => 'Master Bidang',
                    'subtitle' => 'Master Bidang',
                    'subtitle2' => 'Data OPD',
                    'edit' => $proceduree->byideditbidang($id),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/bidang/f_editbidang', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // Proses Edit Bidang
    public function proccesseditbidangp()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_update == 1) {
                // cek validasi
                if (!$this->validate([
                    'kd' => [
                        'label' => 'Kode',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                        ]
                    ],
                        
                    'nama_bidang' => [
                        'label' => 'Nama Bidang',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('/master/f_bidangp')->withInput()->with('validation', $validation);
                }
				$bidang_id = $this->request->getVar('id');
                $pegawai_id = session()->id;
                $kode = $this->request->getVar('kode');
                $nama_bidang = $this->request->getVar('nama_bidang');
                // dd($bidang_id,$pegawai_id,$kode,$nama_bidang);
                
                $this->db->query("CALL bidang_update('$bidang_id','$pegawai_id','$kode','$nama_bidang')");

                session()->setFlashdata('update', 'data berhasil diupdate !');
                return redirect()->to(base_url('master/bidangp'));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

    public function hapusbidangp($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_delete == 1) {
				$pegawai_id = session()->id;
                $bidang_id = $id;
                // dd($id,$user);

                $this->db->query("CALL bidang_delete('$bidang_id','$pegawai_id')");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/bidangp'));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }
// ------------------------------------------------------------------------------------------------------------------



    // Sub Bidang
// ----------------------------------------------------------------------------------------------------------------
    // Method Sub Bidang
    public function subbidangp($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_active == 1) {
				// dd($id);
                $procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $databidang = $procedure->byideditbidangopd($id);
                $back = [
                    'id_Bidang' => $databidang->id
                ];
                session()->set($back);
                // dd($back);
                $dataId = [
                    'id_BidangSess' => $id
                ];
                session()->set($dataId);
                $data = [
                    'judul_web' => 'Master Sub Bidang',
                    'subtitle' => 'Master Sub Bidang',
                    'subtitle2' => 'Data Bidang',
                    'datasubbidang' => $procedure->sub_bidangView($id),
                    'tampil' => $procedure->tampilbidang($id),
                    'databidang' => $databidang,
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/subbidang/v_subbidangopdsuper', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function f_subbidangp($id)
    {
        // dd($id);
        $procedure = new ModelProcedure();
        $hah_id = session()->hakakses;
        $databidang = $procedure->byideditbidangopd($id);
        $data = [
            'judul_web' => 'Master Sub Bidang',
            'subtitle' => 'Master Sub Bidang',
            'subtitle2' => 'Data Bidang',
            'datasubbidang' => $procedure->sub_bidangView($id),
            'databidang' => $databidang,
            'iscrud' => $procedure->iscrud($hah_id),
            'validation' => \Config\Services::validation(),
            'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
            'get' => session() // ambil session user yang sedang login
        ];
        return view('masterpemda/subbidang/f_subbidangopdsuper', $data);
    }

    public function proccesstambahsubbidangp($id)
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required|is_unique[sub_bidang.kode]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Kode bidang sudah ada, gunakan kode baru'
                ]
            ],

            'nama_sub_bidang' => [
                'label' => 'Nama sub bidang',
                'rules' => 'required|is_unique[sub_bidang.nama_sub_bidang]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => 'Nama sub bidang sudah ada, gunakan nama baru'
                ]
            ]
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $pegawai_id = session()->id;
            $kode = $this->request->getVar('kode');
            $b_id = $id;
            $nama_sub_bidang = $this->request->getVar('nama_sub_bidang');
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $simpan = $this->db->query("CALL sub_bidang_insert('$pegawai_id','$kode','$b_id','$nama_sub_bidang')")->getRow();
            
            $hasil['sukses'] = "data berhasil ditambahkan";
            $hasil['error'] = true;
            if ($simpan->n == 81) {
                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                // return redirect()->to(base_url('master/subbidangs/'. $id));
            }
            if ($simpan->n == 80) {
                session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                // return redirect()->to(base_url('master/subbidangs/'. $id));
            }
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

    public function f_editsubbidangp($id)
    {
        return json_encode($this->model->find($id));
    }

    public function proccesseditsubbidangp()
    {
        $validation = \Config\Services::validation();
        $validasi = [
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],

            'nama_sub_bidang' => [
                'label' => 'Nama sub bidang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ]
        ];

        $validation->setRules($validasi);
        if ($validation->withRequest($this->request)->run()) {
            $pegawai_id = session()->id;
            $kode = $this->request->getVar('kode');
            $bidang_id = $this->request->getVar('id_bidang');
            $nama_sub_bidang = $this->request->getVar('nama_sub_bidang');
            $sub_bidang_id = $this->request->getVar('id');
            // dd($pegawai_id,$kd,$nama_bidang,$tipe_bidang_id,$opd_id);
            $this->db->query("CALL sub_bidang_update($pegawai_id,'$kode',$bidang_id,'$nama_sub_bidang',$sub_bidang_id)");
            
            $hasil['sukses'] = "data berhasil diupdate";
            $hasil['error'] = true;
            session()->setFlashdata('update', 'data berhasil diupdate !');
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validation->listErrors();
        }

        
        return json_encode($hasil);
    }

    public function hapussubbidangp($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_delete == 1) {
				$pegawai_id = session()->id;

                $this->db->query("CALL sub_bidang_delete('$pegawai_id','$id')");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/subbidangs/'. session()->id_subBidang));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//--------------------------------------------------------------------------------------------------------------------



        // jabatan Pemda
// ---------------------------------------------------------------------------------------------------------------
    // function Jabatan admin pemda
    public function jabatanp()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_active == 1) {
				$procedure = new ModelProcedure();
				$proceduree = new ModelProcedurepemda();
                $p_input_id = $this->session->id;
                $jabatan = $proceduree->jabatanView($p_input_id);
                // dd($p_input_id,$jabatan);
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Jabatan',
                    'subtitle' => 'Master Jabatan',
                    'subtitle2' => 'Data jabatan',
                    'datajabatan' => $proceduree->jabatanView($p_input_id),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/jabatan/v_jabatan', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data bidang
    public function getBidangpemda()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_active == 1) {
				$procedure = new ModelProcedurepemda();
                $b_id = $this->request->getVar('b_id');
                $pegawai_id = session()->id;
                $getdatabidang = $procedure->bidangSelectViews($pegawai_id);
                // dd($getdatabidang);
                $output = '<option value="">---Pilih Bidang---</option>';
                foreach ($getdatabidang as $row) {
                    if ($b_id) { //Edit data
                        if ($b_id == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.$row->id.'" selected>'.$row->nama_bidang.'</option>';
                        } else {
                            $output .='<option value="'.$row->id.'">'.$row->nama_bidang.'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.$row->id.'">'.$row->nama_bidang.'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data subbidang
    public function getDataSubbidangpemda()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_active == 1) {
				$procedure = new ModelProcedure();
                $sb_id = $this->request->getVar('sb_id');
                $b_id = $this->request->getVar('b_id');
                // dd($id_bidang);
                $getdataSubbidang = $procedure->subbidangselectView($b_id);
                $output = '<option value="">---Pilih Sub Bidang---</option>';
                foreach ($getdataSubbidang as $row) {
                    if ($sb_id) { //Edit data
                        if ($sb_id == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.$row->id.'" selected>'.$row->nama_sub_bidang.'</option>';
                        } else {
                            $output .='<option value="'.$row->id.'">'.$row->nama_sub_bidang.'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.$row->id.'">'.$row->nama_sub_bidang.'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function f_jabatanp()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_insert == 1) {
				$procedure = new ModelProcedure();
				$proceduree = new ModelProcedurepemda();
                // $dataopd = $procedure->byideditopd($id);
                $p_input_id = $this->session->id;
                $pegawai_id = session()->id;
                $bidang = $proceduree->bidangView($pegawai_id);
                // dd($bidang,$pegawai_id);
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Jabatan',
                    'subtitle' => 'Master Jabatan',
                    'subtitle2' => 'Data jabatan',
                    // 'datajabatan' => $proceduree->tampiljabatn(),
                    'selectbidang' => $proceduree->bidangView($pegawai_id),
                    'selectlevel' => $proceduree->leveljabatan(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/jabatan/f_jabatanp', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesstambahjabatanp()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_insert == 1) {
                    // cek validasi
                    if (!$this->validate([
                        'kd' => [
                            'label' => 'Kode',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} wajib diisi'
                            ]
                        ],

                        'lvl' => [
                            'label' => 'Level',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} wajib dipilih'
                            ]
                        ],
            
                        'nama_jabatan' => [
                            'label' => 'Nama jabatan',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} wajib diisi'
                            ]
                        ]
            
                    ])) {
                        // jika validasi gagal
                        $validation =  \Config\Services::validation();
                        return redirect()->to('/master/f_jabatanp')->withInput()->with('validation', $validation);
                    }
				$pegawai_id = session()->id;
                $kd = $this->request->getVar('kd');
                $lvl = $this->request->getVar('lvl');
                $nama_jabatan = $this->request->getVar('nama_jabatan');
                // $opd_id = $id;

                if ($lvl == 1) {
                    $b_id = $this->request->getVar('b_idManipulasi');
                    $sb_id = $this->request->getVar('sb_idManipulasi');
                }
                if ($lvl == 2) {
                    $b_id = $this->request->getVar('b_id');
                    $sb_id = $this->request->getVar('sb_idManipulasi');
                }
                if ($lvl == 3) {
                    $b_id = $this->request->getVar('b_id');
                    $sb_id = $this->request->getVar('sb_id');
                }
                if ($lvl == 4) {
                    $b_id = $this->request->getVar('b_id');
                    $sb_id = $this->request->getVar('sb_id');
                }
                
                // dd($pegawai_id,$kd,$b_id,$sb_id,$lvl,$nama_jabatan);
                
                $simpan = $this->db->query("CALL jabatan_insert($pegawai_id,'$kd',$b_id,$sb_id,$lvl,'$nama_jabatan')")->getRow();

                if ($simpan->n == 81) {
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/jabatanp'));
                }
                if ($simpan->n == 80) {
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(base_url('master/f_jabatanp'));
                }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

// ---------------------------------------------------------------------------------------------------------------

        // Pegawai pemda
// -----------------------------------------------------------------------------------------------------------------
     // pegawai
     public function pegawaip()
     {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_active == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $pegawai_id = session()->id;
                $data = [
                    'judul_web' => 'Master Pegawai',
                    'subtitle' => 'Master Pegawai',
                    'subtitle2' => 'Master Pegawai',
                    'procedure' => $procedure->pegawaiopdsuper($pegawai_id),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/pegawai/v_pegawai', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
         
     }

     //form tambah pegawai super user
    public function f_pegawaip()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_insert == 1) {
				$procedure = new ModelProcedure();
				$proceduree = new ModelProcedurepemda();
                $opd = $procedure->selectjabatansuper();
                $hah_id = $this->session->hakakses;
                $user = $this->session->id;
                // $tipeodp = new ModelOpd();
                $data = [
                    'judul_web' => 'Master Pegawai',
                    'subtitle' => 'Master Pegawai',
                    'subtitle2' => 'Data Pegawai',
                    'procedure' => $procedure->superuserOpd(),
                    'selectjabatansuper' => $proceduree->selectjabatansuper($user),
                    'selectopdsuper' => $procedure->selectopdsuper(),
                    'selectgolongansuper' => $procedure->selectgolongansuper(),
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/pegawai/f_pegawaip', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses tambah pegawai pemda
    public function proccesstambahpegawaip()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'nik' => [
                        'label' => 'Nik',
                        'rules' => 'required|trim|is_unique[pegawai.nik]|max_length[16]|min_length[16]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => '{field} pegawai sudah ada',
                            'max_length' => 'Maksimal karakter untuk field {field} adalah 16 karakter',
                            'min_length' => 'Minimal karakter untuk field {field} adalah 16 karakter'
                        ]
                    ],

                    'nip' => [
                        'label' => 'Nip',
                        'rules' => 'required|trim|is_unique[pegawai.nip]|max_length[16]|min_length[16]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'is_unique' => '{field} pegawai sudah ada',
                            'max_length' => 'Maksimal karakter untuk field {field} adalah 16 karakter',
                            'min_length' => 'Minimal karakter untuk field {field} adalah 16 karakter'
                        ]
                    ],
        
                    'nama_pegawai' => [
                        'label' => 'Nama pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],

                    'jk' => [
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'jabatan_id' => [
                        'label' => 'Nama jabatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'golongan' => [
                        'label' => 'Golongan pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'opdid_pegawai' => [
                        'label' => 'Opd pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'email' => [
                        'label' => 'Email',
                        'rules' => 'valid_email',
                        'errors' => [
                            'valid_email' => '{field} tidak valid'
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('/master/f_pegawaip')->withInput()->with('validation', $validation);
                }
				$p_id_input = session()->id;
                $p_nama = $this->request->getVar('nama_pegawai');
                $p_nik = $this->request->getVar('nik');
                $p_nip = $this->request->getVar('nip');
                $p_kelamin_code = $this->request->getVar('jk');
                $p_no_hp = $this->request->getVar('no_hp');
                $p_email = $this->request->getVar('email');
                $p_jabatan = $this->request->getVar('jabatan_id');
                $gol_id = $this->request->getVar('golongan');

                // dd($p_id_input,$p_nama,$p_nik,$p_nip,$p_kelamin,$p_no_hp,$p_email,$p_jabatan,$gol_id);

                $simpan = $this->db->query("CALL pegawai_insert($p_id_input,'$p_nama',$p_nik,$p_nip,'$p_kelamin_code',$p_no_hp,'$p_email',$p_jabatan,$gol_id)")->getRow();
                if ($simpan->n == 54) {
                    session()->setFlashdata('no_jabatan', 'tidak dapat menduduki jabatan !');
                    return redirect()->to('master/f_pegawaip');
                }
                if ($simpan->n == 81) {
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/pegawaip'));
                }
                if ($simpan->n == 80) {
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(base_url('master/f_pegawaip'));
                }
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}

    }

    //form tambah pegawai super user
    public function f_editpegawaip($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_update == 1) {
				$procedure = new ModelProcedurepemda();
                $pegawai_id = $id;
                $IDPegawai = [
                    'IDPegawai' => $id
                ];
                session()->set($IDPegawai);
                $hah_id = $this->session->hakakses;
                $dataPegawai = $procedure->editpegawaiopdsuper($pegawai_id);
                // dd($procedure->editpegawaiopdsuper($pegawai_id));
                $data = [
                    'judul_web' => 'Master Pegawai',
                    'subtitle' => 'Master Pegawai',
                    'subtitle2' => 'Data Pegawai',
                    'datapegawai' => $dataPegawai,
                    // 'procedure' => $procedure->superuserOpd(),
                    'selectjabatansuper' => $procedure->selectjabatansuper(),
                    'selectopdsuper' => $procedure->selectopdsuper(),
                    'selectgolongansuper' => $procedure->selectgolongansuper(),
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];

                return view('masterpemda/pegawai/f_editpegawaip', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    public function proccesseditpegawaip()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_update == 1) {
                // cek validasi
                if (!$this->validate([
                    'nik' => [
                        'label' => 'Nik',
                        'rules' => 'required|trim|max_length[16]|min_length[16]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'max_length' => 'Maksimal karakter untuk field {field} adalah 16 karakter',
                            'min_length' => 'Minimal karakter untuk field {field} adalah 16 karakter'
                        ]
                    ],

                    'nip' => [
                        'label' => 'Nip',
                        'rules' => 'required|trim|max_length[16]|min_length[16]',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'max_length' => 'Maksimal karakter untuk field {field} adalah 16 karakter',
                            'min_length' => 'Minimal karakter untuk field {field} adalah 16 karakter'
                        ]
                    ],
        
                    'nama_pegawai' => [
                        'label' => 'Nama pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],

                    'jk' => [
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'jabatan_id' => [
                        'label' => 'Nama jabatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'golongan' => [
                        'label' => 'Golongan pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'opdid_pegawai' => [
                        'label' => 'Opd pegawai',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'email' => [
                        'label' => 'Email',
                        'rules' => 'valid_email',
                        'errors' => [
                            'valid_email' => '{field} tidak valid'
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('/master/f_editpegawaip/' . session()->IDPegawai)->withInput()->with('validation', $validation);
                }
				$p_id_input = session()->id;
                $p_nama = $this->request->getVar('nama_pegawai');
                $p_nik = $this->request->getVar('nik');
                $p_nip = $this->request->getVar('nip');
                $p_kelamin_code = $this->request->getVar('jk');
                $p_no_hp = $this->request->getVar('no_hp');
                $p_email = $this->request->getVar('email');
                $p_jabatan = $this->request->getVar('jabatan_id');
                $gol_id = $this->request->getVar('golongan');
                $pegawai_id = $this->request->getVar('pegawai_id');

                dd($p_id_input,$p_nama,$p_nik,$p_nip,$p_kelamin_code,$p_no_hp,$p_email,$p_jabatan,$gol_id,$pegawai_id);

                $simpan = $this->db->query("CALL pegawai_update($p_id_input,'$p_nama',$p_nik,$p_nip,'$p_kelamin_code',$p_no_hp,'$p_email',$p_jabatan,$gol_id,$pegawai_id)");

                if ($simpan->n == 54) {
                    session()->setFlashdata('no_jabatan', 'tidak dapat menduduki jabatan !');
                    return redirect()->to('master/f_editpegawaip/' . session()->IDPegawai);
                }
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/pegawaip'));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

    // satuan
// --------------------------------------------------------------------------------------------------------------------------------
    public function satuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_active == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Satuan',
                    'subtitle' => 'Master Satuan',
                    'subtitle2' => 'Data Satuan',
                    'procedure' => $procedure->tampilsatuan(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/satuan/v_satuan', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form satuan
    public function f_satuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_insert == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Satuan',
                    'subtitle' => 'Master Satuan',
                    'subtitle2' => 'Data Satuan',
                    'selectopd' => $procedure->selectopdsatuan(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/satuan/f_satuan', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tambah satuan
    public function proccesstambahsatuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[5]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'opd_id' => [
                        'label' => 'Opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
        
                    'stn' => [
                        'label' => 'Satuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('master/f_satuanp')->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $opd_id = $this->request->getVar('opd_id');
                $stn = $this->request->getVar('stn');
                // dd($usr_input_id,$periode_id,$no_urut,$visi);
                $this->db->query("CALL satuan_insert('$usr_input_id','$opd_id','$stn')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('master/satuanp'));
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }
//----------------------------------------------------------------------------------------------------------------

    /////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////
    /////-----------AKHIR MASTER ADMIN PEMDA------------/////
    ////>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>/////

// ==========================================================================================================================
// ==========================================================================================================================
}