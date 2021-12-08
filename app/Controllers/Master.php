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
        $this->modelbidang = new \App\Models\ModelBidang();
        $this->modelsubbidang = new \App\Models\ModelSubBidang();
        $this->modelHakAkses = new \App\Models\ModelHakAkses();
        $this->security =  \Config\Services::security();
        helper('form');
        helper('url');
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
        // jika sudah login
        if (session()->logged_in) {

            // yang login wajib superuser 
			if (session()->hakakses == 0) {

                // view data hak akses
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

                // jika yang login bukan superuser maka di alihkan ke halaman blocked 
                return redirect()->to('blocked/blocked');

            }
			
		}
        
	}

    // ambil data Modul menggunakan json
    public function ambildataModul($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan memproses halaman form edit bidang
            if (session()->hakakses == 0) {

                $this->Modul = new ModelHakAkses();
                return json_encode($this->Modul->getModul($id));
                
			} else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // form view tambah hak akses superuser
    public function f_hakakses()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view tambah hak akses
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
                    
                    // jika yang login bukan superuser maka di alihkan ke halaman blocked
                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses tambah hak akses superuser
    public function proccesstambahhakakses()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
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
                    session()->setFlashdata('gagal', 'data gagal ditambahkan !');
                    return redirect()->to('/master/f_hakakses')->withInput()->with('validation', $validation);
                }

                // data yang diambil dari inputan
				$pegawai_id = htmlspecialchars(session()->id);
                $kd = htmlspecialchars($this->request->getVar('kd'));
                $nama_hah = htmlspecialchars($this->request->getVar('nama_hah'));

                dd($pegawai_id,$kd,$nama_hah);
                // proses simpan
                $simpan = $this->db->query("CALL hak_akses_hdr_insert($pegawai_id,'$kd','$nama_hah')")->getRow();
                
                // notivikasi yang di ambil berdasarkan nilai n.....
                if ($simpan->n == 81) {
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(site_url('master/hakakses'));
                } 

                if ($simpan->n == 80) {
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(site_url('master/hakakses'));

                }
			} else{
                    // halaman blocked
                    return redirect()->to('blocked/blocked');

            }
			
		}

    }

    // form view edit hak akses superuser
    public function f_edithakakses($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
            
            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form edit
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

                // ;jika yang login bukan superuser maka di alihkan ke halaman blocked
                    return redirect()->to('blocked/blocked');

            }
			
		}
    }

    // view ganti akses hak akses
    public function gantiAkses($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view ganti hak akses
				session();
                $procedure = new ModelProcedure;
                $hah_id = $id;
                $gantiakses = [
                    'gantiaksesID' => $id
                ];
                session()->set($gantiakses);
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

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
    }

    // proses update Modul Menu
    public function updateIsModul()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // ambil data dari apa yang di masukan dalam script js
                $id = htmlspecialchars($this->request->getVar('id'));
                $name = htmlspecialchars($this->request->getVar('name'));

                $builder = $this->db->table('hak_akses_dtl');

                if ($name == "is_active") {
                    $value = htmlspecialchars($this->request->getVar('value'));
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
                    $value = htmlspecialchars($this->request->getVar('value'));
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
                    $value = htmlspecialchars($this->request->getVar('value'));
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
                    $value = htmlspecialchars($this->request->getVar('value'));
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
                    $value = htmlspecialchars($this->request->getVar('value'));
                    if ($value == 1) {
                        $builder->set('is_delete', 0);
                        $builder->where('id', $id);
                    }
                    if ($value == 0) {
                        $builder->set('is_delete', 1);
                        $builder->where('id', $id);
                    }
                }
                
                // ketika data sudah di cocokan dengan fungsi diatas, kemudian diupdate
                return $builder->update();
                session()->setFlashdata('berhasil', 'data berhasil diupdate !');
                return redirect()->back()->withInput();

            } else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }

    }

    // proses edit hak akses superuser
    public function proccessedithakakses()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
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

                // ambil data inputan lalu simpan dalam variabel
				$pegawai_id = htmlspecialchars(session()->id);
                $kd = htmlspecialchars($this->request->getVar('kd'));
                $nama_hah = htmlspecialchars($this->request->getVar('nama_hah'));
                $hah_id = htmlspecialchars($this->request->getVar('hah_id'));

                // proses simpan
                $simpan = $this->db->query("CALL hak_akses_hdr_update($pegawai_id,'$kd','$nama_hah',$hah_id)");
                session()->setFlashdata('berhasil', 'data berhasil diupdate !');
                return redirect()->to(site_url('master/hakakses'));

			} else{

                // jika yang login bukan superuser di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
    }

    // hapus hak akses superuser
    public function hapushakakses($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // data parameter
                $hah_id = htmlspecialchars($id);
                $pegawai_id = htmlspecialchars(session()->id);

                // proses hapus
                $hapus = $this->db->query("CALL hak_akses_hdr_delete($hah_id, $pegawai_id)");

                // cek jika jabatan id lebih besar dari 0(nol)
                if ($hapus->jabatan_id > 0) {
                    // tidak dapat dihapus
                    session()->setFlashdata('hapus', 'tidak dapat dihapus, masih ada jabatan !');
                    return redirect()->to('master/hakakses');
                } else {
                    // jika sama dengan 0 maka, dihapus
                    session()->setFlashdata('hapus', 'data terhapus !');
                    return redirect()->to('master/hakakses');
                }

            } else{

                // jika yang login bukan superuser di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
    }
//-----------------------------------------------------------------------------------------------------------------------------------------//


    // User
//------------------------------------------------------------------------------------------------------------------
    // View User superuser
    public function users()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view data user
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

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // form view tambah User superuser
    public function f_users()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form user
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

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }


    // proses tambah user superuser
    public function proccesstambahusers()
    {
        //  jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan kembali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // cek validasi
                if (!$this->validate([

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
                            ]
                
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    session()->setFlashdata('gagal', 'Data gagal ditambahkan!');
                    return redirect()->back()->withInput()->with('validation', $validation);
                }

                // persiapkan data yang diambil dari form inputan
                $usr = htmlspecialchars($this->request->getVar('usr'));
                $psswd = htmlspecialchars($this->request->getVar('psswd'));
                $opd_id = htmlspecialchars($this->request->getVar('opd_id'));
                $p_id = htmlspecialchars($this->request->getVar('p_id'));
                $usr_input_id = htmlspecialchars(session()->id);
                $nama_usr = htmlspecialchars($this->request->getVar('nama_usr'));
                $hah_id = htmlspecialchars($this->request->getVar('hah_id'));
                            
                //proses simpan 
                $simpan = $this->db->query("CALL user_insert('$usr','$psswd','$hah_id','$opd_id','$p_id','$usr_input_id','$nama_usr')")->getRow();

                // jika proses simpan , maka lakukan pengecekan dengan memanfaatkan nilai n
                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('master/users'));
                
                // if ($simpan->n == 81) {
                    // jika nilai n = 81 maka data berhasil disimpan
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/pegawais'));
                // }
                // if ($simpan->n == 80) {
                    // jika nilai n = 80 maka data pernah dibuat
                    // session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    // return redirect()->to(base_url('master/pegawais'));
                // }
               

            } else{

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
            
    }

//------------------------------------------------------------------------------------------------------------------------------//

    // OPD
// --------------------------------------------------------------------------------------------------------------
    // View Opd superuser
    public function opds()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan kembali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view data opd
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

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    //form view tambah opd super user
    public function f_opds()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan kembali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form tambah opd
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

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses tambah opd superuser
    public function proccesstambahopds()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // cek validasi
                if (!$this->validate([
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
                    'telepon' => [
                        'label' => 'Telepon',
                        'rules' => 'numeric',
                        'errors' => [
                            'numeric' => '{field} wajib diisi angka'
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
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    session()->setFlashdata('gagal', 'data gagal ditambahkan!');
                    return redirect()->back()->withInput('validation', $validation);
                }

                    // siapkan data, data diambil dari form inputan
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kode = htmlspecialchars($this->request->getVar('kode'));
                    $nama_opd = htmlspecialchars($this->request->getVar('nama_opd'));
                    $alamat = htmlspecialchars($this->request->getVar('alamat'));
                    $telepon = htmlspecialchars($this->request->getVar('telepon'));
                    $email = htmlspecialchars($this->request->getVar('email'));
                    $lvl_opd_id = htmlspecialchars($this->request->getVar('lvl_opd_id'));
                    $type = htmlspecialchars($this->request->getVar('type'));
                    $kode_pos = htmlspecialchars($this->request->getVar('kode_pos'));
                    $fax = htmlspecialchars($this->request->getVar('fax'));
                    $website = htmlspecialchars($this->request->getVar('website'));
                    $no_unit_kerja = htmlspecialchars($this->request->getVar('no_unit_kerja'));

                    // proses simpan
                    $simpan = $this->db->query("CALL opd_insert('$pegawai_id','$kode','$nama_opd','$alamat','$kode_pos','$telepon','$fax','$email','$website','$lvl_opd_id','$no_unit_kerja','$type')")->getRow();
                     // jika proses simpan , maka lakukan pengecekan dengan memanfaatkan nilai n
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/opds'));

            } else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }

    }

    // form edit OPD super
    public function f_editopds($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

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

            } else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }

    }

    public function proccesseditopds()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

				// cek validasi
                if (!$this->validate([
                    'kode' => [
                        'label' => 'Kode',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
        
                    'no_unit_kerja' => [
                        'label' => 'Nomor unit kerja',
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
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    session()->setFlashdata('gagal', 'data gagal ditambahkan, periksa form edit !');
                    return redirect()->to('master/f_editopds/'. session()->sesIdOPD)->withInput()->with('validation', $validation);
                }
                
                // ambil data dari form inputan, lalu simpan dalam variabel
                $opd_hdr_id = htmlspecialchars($this->request->getVar('id_opd'));
                $pegawai_id = htmlspecialchars(session()->id);
                $kode = htmlspecialchars($this->request->getVar('kode'));
                $nama_opd = htmlspecialchars($this->request->getVar('nama_opd'));
                $alamat_opd = htmlspecialchars($this->request->getVar('alamat'));
                $telepon = htmlspecialchars($this->request->getVar('telepon'));
                $email = htmlspecialchars($this->request->getVar('email'));
                $level = htmlspecialchars($this->request->getVar('lvl_opd_id'));
                $kode_pos = htmlspecialchars($this->request->getVar('kode_pos'));
                $fax = htmlspecialchars($this->request->getVar('fax'));
                $website = htmlspecialchars($this->request->getVar('website'));
                $no_unit_kerja = htmlspecialchars($this->request->getVar('no_unit_kerja'));

                // proses simpan
                $this->db->query("CALL opd_update('$opd_hdr_id','$pegawai_id','$kode','$nama_opd','$alamat_opd','$kode_pos','$telepon','$fax','$email','$website','$level','$no_unit_kerja')");
                
                // jika berhasil update, muncilkan pesan notivikasi
                session()->setFlashdata('update', 'data berhasil diupdate !');
                return redirect()->to(base_url('master/opds'));

			} else{

                // jika yang login bukan superuser, maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//----------------------------------------------------------------------------------------------------------------------------//

    // Bidang
// ----------------------------------------------------------------------------------------------------------------
    // view bidang superuser berdasrkan id OPD
    public function bidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view data bidang
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

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // form bidang superuser
    public function f_bidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form tambah bidang
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

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses tambah bidang superuser berdasarkan id OPD
    public function proccesstambahbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                $validation = \Config\Services::validation();

                // cek validasi
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

                // jika validasi berhasil lolos
                if ($validation->withRequest($this->request)->run()) {

                    // ambil data dari form inputan dan disimpan dalam variabel
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kd = htmlspecialchars($this->request->getVar('kode'));
                    $nama_bidang = htmlspecialchars($this->request->getVar('nama_bidang'));
                    $tipe_bidang_id = htmlspecialchars($this->request->getVar('type'));
                    $opd_id = htmlspecialchars($id);

                    // proses simpan
                    $simpan = $this->db->query("CALL bidang_insert_su('$pegawai_id','$kd','$nama_bidang','$tipe_bidang_id','$opd_id')")->getRow();
                    
                    // jika berhasil disimpan maka munculkan pesan notivikasi
                    $hasil['sukses'] = "data berhasil ditambahkan";
                    $hasil['error'] = true;
                    if ($simpan->n == 81) {
                        session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    }
                    if ($simpan->n == 80) {
                        session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                        }
                } else {

                    // jika tidak lolos validasi maka munculkan pesan error...
                    $hasil['sukses'] = false;
                    $hasil['error'] = $validation->listErrors();
                }

                
                return json_encode($hasil);

            } else{

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
    }

    // ambil data bidang dengan json berdasrkan id bidang
    public function f_editbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan memproses halaman form edit bidang
            if (session()->hakakses == 0) {

                return json_encode($this->modelbidang->find($id));
                
			} else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses edit bidang superuser
    public function proccesseditbidangs()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                $validation = \Config\Services::validation();

                // cek validasi
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

                // jika validasi lolos
                if ($validation->withRequest($this->request)->run()) {

                    // ambil data inputan lalu simapn dalam variabel
                    $bidang_id = htmlspecialchars($this->request->getVar('id'));
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kode = htmlspecialchars($this->request->getVar('kode'));
                    $nama_bidang = htmlspecialchars($this->request->getVar('nama_bidang'));

                    // proses simpan
                    $this->db->query("CALL bidang_update($bidang_id,$pegawai_id,'$kode','$nama_bidang')")->getRow();
                    
                    // jika berhasil disimpan, munculkan pesan notivikasi
                    $hasil['sukses'] = "data berhasil diupdate";
                    $hasil['error'] = true;
                    session()->setFlashdata('update', 'data berhasil diupdate !');
                } else {

                    // jika validasi tidak lolos maka munculkan pesan error
                    $hasil['sukses'] = false;
                    $hasil['error'] = $validation->listErrors();
                }

                
                return json_encode($hasil);

            } else{

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
    
    }

    // hapus bidang
    public function hapusbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

				$bidang_id = htmlspecialchars($id);
                $pegawai_id = htmlspecialchars(session()->id);

                $this->db->query("CALL bidang_delete($bidang_id,$pegawai_id)");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to('master/bidangs/'. session()->id_OpdSess);
			} else{
                
                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//--------------------------------------------------------------------------------------------------------------//

    //view Sub Bidang superuser
// ----------------------------------------------------------------------------------------------------------------
    // Method Sub Bidang
    public function subbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view data sub bidang
                $procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $databidang = $procedure->byideditbidangopd($id);

                $back = [
                    'id_Bidang' => $databidang->id
                ];
                session()->set($back);

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

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // view form tambah sub bidang superuser
    public function f_subbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form tambah sub bidang
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

            } else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
    }

    // proses tambah sub bidang superuser
    public function proccesstambahsubbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                $validation = \Config\Services::validation();

                // cek validasi
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

                // jika lolos validasi
                if ($validation->withRequest($this->request)->run()) {

                    // ambil data dari form inputan lalu simpan dalam variabel
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kode = htmlspecialchars($this->request->getVar('kode'));
                    $b_id = htmlspecialchars($id);
                    $nama_sub_bidang = htmlspecialchars($this->request->getVar('nama_sub_bidang'));

                    // proses simpan
                    $simpan = $this->db->query("CALL sub_bidang_insert('$pegawai_id','$kode','$b_id','$nama_sub_bidang')")->getRow();
                    
                    // jika berhasil disimpan maka munculkan pesan notivikasi
                    $hasil['sukses'] = "data berhasil ditambahkan";
                    $hasil['error'] = true;
                    if ($simpan->n == 81) {
                        session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    }
                    if ($simpan->n == 80) {
                        session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    }
                } else {

                    // jika validasi tidak lolos maka munculkan pesan error
                    $hasil['sukses'] = false;
                    $hasil['error'] = $validation->listErrors();
                }

                
                return json_encode($hasil);

            } else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
    }

    // ambil data sub bidang dengan json
    public function f_editsubbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan memproses halaman form edit bidang
            if (session()->hakakses == 0) {

                return json_encode($this->modelsubbidang->find($id));
                
			} else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses edit sub bidang superuser
    public function proccesseditsubbidangs()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                $validation = \Config\Services::validation();

                // cek validasi
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
                // jika validasi lolos
                if ($validation->withRequest($this->request)->run()) {

                    // ambil data dari form input edit lalu disimpan dalam variabel
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kode = htmlspecialchars($this->request->getVar('kode'));
                    $bidang_id = htmlspecialchars($this->request->getVar('id_bidang'));
                    $nama_sub_bidang = htmlspecialchars($this->request->getVar('nama_sub_bidang'));
                    $sub_bidang_id = htmlspecialchars($this->request->getVar('id'));

                    // proses simpan
                    $this->db->query("CALL sub_bidang_update($pegawai_id,'$kode',$bidang_id,'$nama_sub_bidang',$sub_bidang_id)");
                    
                    // jika berhasil disimpan, munculkan pesan notivikasi
                    $hasil['sukses'] = "data berhasil diupdate";
                    $hasil['error'] = true;
                    session()->setFlashdata('update', 'data berhasil diupdate !');
                } else {

                    // jika validasi tidak lolos maka munculkan pesan error
                    $hasil['sukses'] = false;
                    $hasil['error'] = $validation->listErrors();
                }

                
                return json_encode($hasil);

            } else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
    }

    // hapus sub bidang
    public function hapussubbidangs($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

				$pegawai_id = htmlspecialchars(session()->id);
                $sub_bidang_id = htmlspecialchars($id);

                $this->db->query("CALL sub_bidang_delete('$pegawai_id','$sub_bidang_id')");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/subbidangs/'. session()->id_BidangSess));
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

//--------------------------------------------------------------------------------------------------------------------

    // Jabatan
// ----------------------------------------------------------------------------------------------------------------
    // view function Jabatan Super user
    public function jabatans($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view data jabatan
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $dataopd = $procedure->byideditopd($id);
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

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data bidang dengan json
    public function getBidang()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();

                // ambil bidang id pada script js
                $BidangID = htmlspecialchars($this->request->getVar('BidangID'));

                $opd_id = htmlspecialchars(session()->id_OpdSessJabatan);
                $getdatabidang = $procedure->bidangSelectViews($opd_id);
                $output = '<option value="">---Pilih Bidang---</option>';
                foreach ($getdatabidang as $row) {
                    if ($BidangID) { //Edit data
                        if ($BidangID == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.htmlspecialchars($row->id).'" selected>'.htmlspecialchars($row->nama_bidang).'</option>';
                        } else {
                            $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_bidang).'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_bidang).'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data subbidang dengan json
    public function getDataSubbidang()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();

                // ambil data subbidang id dan bidang id pada script js
                $subbidang_id = htmlspecialchars($this->request->getVar('subbidang_id'));
                $bidang_id = htmlspecialchars($this->request->getVar('bidang_id'));
                // dd($id_bidang);
                $getdataSubbidang = $procedure->subbidangselectView($bidang_id);
                $output = '<option value="">---Pilih Sub Bidang---</option>';
                foreach ($getdataSubbidang as $row) {
                    if ($subbidang_id) { //Edit data
                        if ($subbidang_id == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.htmlspecialchars($row->id).'" selected>'.htmlspecialchars($row->nama_sub_bidang).'</option>';
                        } else {
                            $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_sub_bidang).'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_sub_bidang).'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // view form tambah jabatan superuser
    public function f_jabatans($id)
    {
         // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form tambah jabatan
				$procedure = new ModelProcedure();
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

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses tambah jabatan superuser
    public function proccesstambahjabatans($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
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
                
                // jika lolos validasi, kemudian ambil data pada form inputan lalu disimpan dengan variabel
				$pegawai_id = htmlspecialchars(session()->id);
                $kode = htmlspecialchars($this->request->getVar('kode'));
                $lvl = htmlspecialchars($this->request->getVar('level'));
                $nama_jabatan = htmlspecialchars($this->request->getVar('nama_jabatan'));
                $opd_id = htmlspecialchars($id);
                
                // menentukan level yang nantinya akan digunakan untuk menampilkan bidang dan sub bidang ketika kita memilih salah satu level
                if ($lvl == 1) {
                    $b_id = htmlspecialchars($this->request->getVar('bidang_idManipulasi'));
                    $sb_id = htmlspecialchars($this->request->getVar('sub_bidang_idManipulasi'));
                }
                if ($lvl == 2) {
                    $b_id = htmlspecialchars($this->request->getVar('bidang_id'));
                    $sb_id = htmlspecialchars($this->request->getVar('sub_bidang_idManipulasi'));
                }
                if ($lvl == 3) {
                    $b_id = htmlspecialchars($this->request->getVar('bidang_id'));
                    $sb_id = htmlspecialchars($this->request->getVar('sub_bidang_id'));
                }
                if ($lvl == 4) {
                    $b_id = htmlspecialchars($this->request->getVar('bidang_id'));
                    $sb_id = htmlspecialchars($this->request->getVar('sub_bidang_id'));
                }
                
                // proses simpan
                $simpan = $this->db->query("CALL jabatan_insert_su($pegawai_id,'$kode',$b_id,$sb_id,$lvl,'$nama_jabatan',$opd_id)")->getRow();

                // jika disimpan, kemudian akan melakukan pengecekan terhadap nilai n (notivikasi)
                if ($simpan->n == 81) {
                    // jika nilai n = 81 maka berhasil disimpan kemudian munculkan pesan notivikasi
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/jabatans/'. $id));
                }
                if ($simpan->n == 80) {
                    // jika nilai n = 80 maka data sudah pernah dibuat, sehingga datanya tidak disimpan....
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(base_url('master/f_jabatans/'. $id));
                }
			} else{
                
                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // view form edit jabatan opd super dengan json menggunakan dua parameter
    public function f_editjabatans($id, $type)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form edit jabatan
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $dataopd = $procedure->byideditopd($id);
                $idOpdback = session()->id_OpdSessJabatan;
                $dataJabatan = $procedure->byideditjabatanopd($id);
                
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

                // jika parameter sama dengan edit yang dicocokan pada link yang ada pada halaman terkait
                if ($type == 'edit') {

                    // jika tipe = edit
                    $data['dataeditjabatan'] = $dataJabatan;
                    return view('mastersuper/opd/jabatan/f_editjabatanopdsuper', $data);

                } else {
                    // data json
                    echo json_encode($dataJabatan);
                }
			} else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}

        
    }

    // proses edit jabatan superuser
    public function  proccesseditjabatans()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // cek validasi
                if (!$this->validate([
                    'kode' => [
                        'label' => 'Kode',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
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

                // jika lolos validasi, ambil data yang ada pada form input edit kemudian taruh dalam variabel
				$pegawai_id = htmlspecialchars(session()->id);
                $kode = htmlspecialchars($this->request->getVar('kode'));
                $b_id = htmlspecialchars($this->request->getVar('bidang_id'));
                $sb_id = htmlspecialchars($this->request->getVar('sub_bidang_id'));
                $lvl = htmlspecialchars($this->request->getVar('level'));
                $nama_j = htmlspecialchars($this->request->getVar('nama_jabatan'));
                $j_id = htmlspecialchars($this->request->getVar('j_id'));

                // proses update
                $simpan = $this->db->query("CALL jabatan_update($pegawai_id,'$kode',$b_id,$sb_id,$lvl,'$nama_j',$j_id)");
                session()->setFlashdata('update', 'data berhasil diupdate !');
                return redirect()->to(base_url('master/jabatans/'. session()->id_OpdSessJabatan));

			} else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // fungsi hapus jabatan opd super
    public function hapusjabatans($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

				$j_id = htmlspecialchars($id);
                $pegawai_id = htmlspecialchars(session()->id);

                $this->db->query("CALL jabatan_delete('$j_id','$pegawai_id')");

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
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view data pegawai
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

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data OPD pegawai dengan json
    public function getjabatanMutasi($id_opdMutasi, $jabatan_idMutasi='')
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

				$procedure = new ModelProcedure();

                $getdatajabatanPegawai = $procedure->jabatanselectView($id_opdMutasi);
                //  dd($getdatajabatanPegawai);
                $output = '<option value="">---Pilih Jabatan---</option>';
                foreach ($getdatajabatanPegawai as $row) {
                    if ($jabatan_idMutasi != '') { //Edit data
                        if ($jabatan_idMutasi == $row->id)    { 
                            // selected sub bidang
                            $output .='<option value="'.htmlspecialchars($row->id).'" selected>'.htmlspecialchars($row->nama_jabatan).'</option>';
                        } else {
                            $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_jabatan).'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_jabatan).'</option>';
                    }
                }
                // dd($output);
                echo json_encode($output);
			} else{
                
                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
        
    }

    // get data jabatan pegawai dengan json
     public function getJabatanPegawai($opdIDPegawai, $jabatan_id='')
     {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

				$procedure = new ModelProcedure();

                $getdatajabatanPegawai = $procedure->jabatanselectView($opdIDPegawai);
                //  dd($getdatajabatanPegawai);
                $output = '<option value="">---Pilih Jabatan---</option>';
                foreach ($getdatajabatanPegawai as $row) {
                    if ($jabatan_id != '') { //Edit data
                        if ($jabatan_id == $row->id)    { 
                            // selected sub bidang
                            $output .='<option value="'.htmlspecialchars($row->id).'" selected>'.htmlspecialchars($row->nama_jabatan).'</option>';
                        } else {
                            $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_jabatan).'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_jabatan).'</option>';
                    }
                }
                // dd($output);
                echo json_encode($output);
			} else{
                
                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
         
     }
    
    // view form tambah pegawai super user
    public function f_pegawais()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form tambah pegawai
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

                // jika yang login buka superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // proses tambah pegawai super user
    public function proccesstambahpegawais()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
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

                // jika lolos validasi, ambil data yang ada pada form inputan form pegawai lalu simpan dalam variabel
				$p_id_input = htmlspecialchars(session()->id);
                $p_nama = htmlspecialchars($this->request->getVar('nama_pegawai'));
                $p_nik = htmlspecialchars($this->request->getVar('nik'));
                $p_nip = htmlspecialchars($this->request->getVar('nip'));
                $p_kelamin_code = htmlspecialchars($this->request->getVar('jk'));
                $p_no_hp = htmlspecialchars($this->request->getVar('no_hp'));
                $p_email = htmlspecialchars($this->request->getVar('email'));
                $p_jabatan = htmlspecialchars($this->request->getVar('jabatan_id'));
                $gol_id = htmlspecialchars($this->request->getVar('golongan'));
                $opd_id = htmlspecialchars($this->request->getVar('opdid_pegawai'));

                // proses simpan
                $simpan = $this->db->query("CALL pegawai_insert_su($p_id_input,'$p_nama',$p_nik,$p_nip,'$p_kelamin_code',$p_no_hp,'$p_email',$p_jabatan,$gol_id,$opd_id)")->getRow();

                // jika proses simpan , maka lakukan pengecekan dengan memanfaatkan nilai n
                if ($simpan->n == 54) {
                    // jika nilai n = 54 tidak bisa menduduki jabatan
                    session()->setFlashdata('no_jabatan', 'tidak dapat menduduki jabatan !');
                    return redirect()->to(base_url('master/f_pegawais'));
                }
                if ($simpan->n == 81) {
                    // jika nilai n = 81 maka data berhasil disimpan
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('master/pegawais'));
                }
                if ($simpan->n == 80) {
                    // jika nilai n = 80 maka data pernah dibuat
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(base_url('master/pegawais'));
                }
			} else{
                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}

    }

    // view form edit pegawai super user menggunakan dua parameter
    public function f_editpegawais($id, $type)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // view form edit pegawai
				$procedure = new ModelProcedure();
                $hah_id = session()->hakakses;
                $pegawai_id = $id;
                $editpegawai = [
                    'idpegawai' => $id,
                    'typepegawai' => $type
                ];
                session()->set($editpegawai);
                $dataPegawai = $procedure->editpegawaiopdsuper($pegawai_id);
                $jabatanID = $dataPegawai->jabatan_id;
                $jabatan = $procedure->selectjabatansuper();
                $pegawai_opd_id = $procedure->bypegawaidtl($pegawai_id);
                // dd($IDJABATANNN);
                $data = [
                    'judul_web' => 'Master Pegawai',
                    'subtitle' => 'Master Pegawai',
                    'subtitle2' => 'Data Pegawai',
                    'procedure' => $procedure->superuserOpd(),
                    'selectjabatansuper' => $procedure->selectjabatanedit($pegawai_id),
                    'pegawai_opd_id' => $pegawai_opd_id, 
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

                // jika parameter type sama dengan edit
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

    // proses edit pegawai superuser
    public function proccesseditpegawais()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
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
                            'required' => '{field} wajib diisi'
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

                    'golongan' => [
                        'label' => 'Golongan pegawai',
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

                // jika lolos validasi maka ambil data yang ada pada form input edit kemudian masukan dalam variabel
				$p_id_input = htmlspecialchars(session()->id);
                $p_nama = htmlspecialchars($this->request->getVar('nama_pegawai'));
                $p_nik = htmlspecialchars($this->request->getVar('nik'));
                $p_nip = htmlspecialchars($this->request->getVar('nip'));
                $p_kelamin_kode = htmlspecialchars($this->request->getVar('jk'));
                $p_no_hp = htmlspecialchars($this->request->getVar('no_hp'));
                $p_email = htmlspecialchars($this->request->getVar('email'));
                $p_golongan_id = htmlspecialchars($this->request->getVar('golongan'));
                $p_jabatan = htmlspecialchars($this->request->getVar('jabatan_id'));
                $pegawai_id = htmlspecialchars($this->request->getVar('p_id'));
                $opd_id = htmlspecialchars($this->request->getVar('opd_id'));

                // proses update pegawai
                $simpan = $this->db->query("CALL pegawai_update_su($p_id_input,'$p_nama','$p_nik','$p_nip','$p_kelamin_kode','$p_no_hp','$p_email','$p_golongan_id','$p_jabatan','$pegawai_id','$opd_id')");
                
                // jika variabel simpan nilai n = 54 maka tidak dapat menduduki jabatan
                // if ($simpan->n == 54) {
                //     session()->setFlashdata('no_jabatan', 'tidak dapat menduduki jabatan !');
                //     return redirect()->to(base_url('/master/f_editpegawais/'. session()->idpegawai.'/'. 'edit'));
                // }

                // jika berhasil diupdate , munculkan pesan notivikasi
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

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}

    }

    // proses simpan Mutasi Janbatan
    public function editjabatanMutasi()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

                // cek validasi
               

                // jika lolos validasi maka ambil data yang ada pada form input edit kemudian masukan dalam variabel
				$p_id_input = htmlspecialchars(session()->id);
                $p_nama = htmlspecialchars($this->request->getVar('nama_pegawai'));
                $p_nik = htmlspecialchars($this->request->getVar('nik'));
                $p_nip = htmlspecialchars($this->request->getVar('nip'));
                $p_kelamin_kode = htmlspecialchars($this->request->getVar('jk'));
                $p_no_hp = htmlspecialchars($this->request->getVar('no_hp'));
                $p_email = htmlspecialchars($this->request->getVar('email'));
                $p_golongan_id = htmlspecialchars($this->request->getVar('golongan'));
                $p_jabatan = htmlspecialchars($this->request->getVar('jabatan_idMutasi'));
                $pegawai_id = htmlspecialchars($this->request->getVar('p_id'));
                $opd_id = htmlspecialchars($this->request->getVar('id_opdMutasi'));

                // dd($p_id_input,$p_nama,$p_nik,$p_nip,$p_kelamin_kode,$p_no_hp,$p_email,$p_golongan_id,$p_jabatan,$pegawai_id,$opd_id);
                
                // proses update pegawai
                $simpan = $this->db->query("CALL pegawai_update_su($p_id_input,'$p_nama','$p_nik','$p_nip',$p_kelamin_kode,'$p_no_hp','$p_email',$p_golongan_id,$p_jabatan,$pegawai_id,$opd_id)");
                // $simpan = $this->db->query("CALL pegawai_update_su(0,'bbbbbbbbbbb','5555555555555555','5555555555555555',1,'0812736456376',null,10,4,11,4)");
                // dd($simpan);
                // jika variabel simpan nilai n = 54 maka tidak dapat menduduki jabatan
                // if ($simpan->n == 54) {
                //     session()->setFlashdata('no_jabatan', 'tidak dapat menduduki jabatan !');
                //     return redirect()->to(base_url('/master/f_editpegawais/'. session()->idpegawai.'/'. 'edit'));
                // }

                // jika berhasil diupdate , munculkan pesan notivikasi
                session()->setFlashdata('berhasil', 'data berhasil dimutasi !');
                return redirect()->to(base_url('/master/f_editpegawais/'. session()->idpegawai.'/'. 'edit'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/pegawais'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/pegawais'));
                // }
			} else{

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
    }

    // fungsi hapus jabatan opd super
    public function hapuspegawais($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {

				$p_id_input = htmlspecialchars(session()->id);
                $pegawai_id = htmlspecialchars(htmlspecialchars($id));

                $this->db->query("CALL pegawai_delete($p_id_input,$pegawai_id)");

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
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_active = 1 maka diperbolehkan mengakses halaman bidang
            if ($akses[5]->is_active == 1) {

                // view data bidang
                   $procedure = new ModelProcedurepemda();
                   $pegawai_id = session()->id;
                   $hah_id = $this->session->hakakses;
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

                // jika modul master is_active = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');
   
           }
           
        }
    }

    // tambah bidang
    public function f_bidangp()
    {
         // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_insert = 1 maka diperbolehkan mengakses halaman form tambah bidang
            if ($akses[5]->is_insert == 1) {

                    // view form tambah bidang
                   $procedure = new ModelProcedurepemda();
                   $procedure = new ModelProcedure();
                   $id = session()->id;
                   $hah_id = $this->session->hakakses;
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

                // jika modul master is_active = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');
   
           }
           
        }
    }

    // proses tambah bidang
    public function proccesstambahbidangp()
    {
         // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan memproses halaman form tambah bidang
            if ($akses[5]->is_update == 1) {

                $validation = \Config\Services::validation();

                // cek validasi
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

                // jika lolos validasi
                if ($validation->withRequest($this->request)->run()) {

                    // ambil data inputan dari form tambah bidang
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kd = htmlspecialchars($this->request->getVar('kd'));
                    $nama_bidang = htmlspecialchars($this->request->getVar('nama_bidang'));
                    $tipe_b_id = htmlspecialchars($this->request->getVar('typeBidang'));

                    // proses tambah bidang
                    $simpan = $this->db->query("CALL bidang_insert($pegawai_id,'$kd','$nama_bidang',$tipe_b_id)")->getRow();
                    
                    // jika berhasil ditambahkan, munculkan pesan notivikasi
                    $hasil['sukses'] = "data berhasil ditambahkan";
                    $hasil['error'] = true;

                    // ketika disimpan dilakukan pengecekan berdasarkan nilai n
                    if ($simpan->n == 81) {
                        // jika berhasil
                        session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    }
                    if ($simpan->n == 80) {
                        // jika data sudah ada
                        session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                        }
                } else {

                    // jika tidak lolos validasi maka munculkan pesan error
                    $hasil['sukses'] = false;
                    $hasil['error'] = $validation->listErrors();
                }

                
                return json_encode($hasil);

            } else{

                // jika modul master is_active = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');
   
           }

        }
        
    }

    // ambil data bidang dengan json berdasrkan id bidang
    public function f_editbidangp($id)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan memproses halaman form edit bidang
            if ($akses[5]->is_update == 1) {

                return json_encode($this->modelbidang->find($id));
                
			} else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // Edit Bidang
    // public function f_editbidangp($id)
    // {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        // if (session()->logged_in) {
		// 	$procedure = new ModelProcedurepemda();
        //     $hah_id = $this->session->hakakses;
        //     $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan mengakses halaman form edit bidang
            // if ($akses[5]->is_update == 1) {

                // view form edit
			// 	$procedure = new ModelProcedure();
			// 	$proceduree = new ModelProcedurepemda();
            //     $hah_id = session()->hakakses;

            //     $data = [
            //         'judul_web' => 'Master Bidang',
            //         'subtitle' => 'Master Bidang',
            //         'subtitle2' => 'Data OPD',
            //         'edit' => $proceduree->byideditbidang($id),
            //         'menu' => $procedure->iscrud($hah_id),
            //         'validation' => \Config\Services::validation(),
            //         'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
            //         'get' => session() // ambil session user yang sedang login
            //     ];

            //     return view('masterpemda/bidang/f_editbidang', $data);

			// } else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
                // return redirect()->to('blocked/blocked');

    //         }
			
	// 	}
        
    // }

    // Proses Edit Bidang
    public function proccesseditbidangp()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan memproses halaman form edit bidang
            if ($akses[5]->is_update == 1) {

                $validation = \Config\Services::validation();

                // cek validasi
                $validasiedit = [
                    'kd' => [
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

                // jika validasi lolos
                if ($validation->withRequest($this->request)->run()) {
                    
                    // ambil data inputan lalu simapn dalam variabel
                    $bidang_id = htmlspecialchars($this->request->getVar('id'));
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kode = htmlspecialchars($this->request->getVar('kd'));
                    $nama_bidang = htmlspecialchars($this->request->getVar('nama_bidang'));

                    // proses simpan
                    $this->db->query("CALL bidang_update($bidang_id,$pegawai_id,'$kode','$nama_bidang')")->getRow();
                    
                    // jika berhasil disimpan, munculkan pesan notivikasi
                    $hasil['sukses'] = "data berhasil diupdate";
                    $hasil['error'] = true;
                    session()->setFlashdata('update', 'data berhasil diupdate !');
                } else {

                    // jika validasi tidak lolos maka munculkan pesan error
                    $hasil['sukses'] = false;
                    $hasil['error'] = $validation->listErrors();
                }

                
                return json_encode($hasil);

			} else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
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
				$pegawai_id = htmlspecialchars(session()->id);
                $bidang_id = htmlspecialchars($id);

                $this->db->query("CALL bidang_delete('$bidang_id','$pegawai_id')");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/bidangp'));
			} else{

                // jika modul master is_delete = 0 maka dialihkan ke halaman blocked
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

                // jika modul master is_active = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // view form tambah subbidang
    public function f_subbidangp($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            if ($akses[5]->is_insert == 1) {

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

            } else{

                // jika modul master is_insert = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
            
    }

    // proses tambah subbidang
    public function proccesstambahsubbidangp($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            if ($akses[5]->is_insert == 1) {

                $validation = \Config\Services::validation();

                // cek validasi
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
                    $pegawai_id = htmlspecialchars(session()->id);
                    $kode = htmlspecialchars($this->request->getVar('kode'));
                    $b_id = htmlspecialchars($id);
                    $nama_sub_bidang = htmlspecialchars($this->request->getVar('nama_sub_bidang'));

                    // proses simpan
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

            } else{

                // jika modul master is_insert = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
    }

    // ambildata subbidang dengan json
    public function f_editsubbidangp($id)
    {

        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // jika variabel akses array 5(master) dengan field is_update = 1 maka diperbolehkan memproses halaman form edit bidang
            if ($akses[5]->is_update == 1) {

                 return json_encode($this->modelsubbidang->find($id));
                
			} else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
       
    }

    // proses edit subbidang
    public function proccesseditsubbidangp()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            if ($akses[5]->is_update == 1) {

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

                    $pegawai_id = htmlspecialchars(session()->id);
                    $kode = htmlspecialchars($this->request->getVar('kode'));
                    $bidang_id = htmlspecialchars($this->request->getVar('id_bidang'));
                    $nama_sub_bidang = htmlspecialchars($this->request->getVar('nama_sub_bidang'));
                    $sub_bidang_id = htmlspecialchars($this->request->getVar('id'));

                    // proses simpan
                    $this->db->query("CALL sub_bidang_update($pegawai_id,'$kode',$bidang_id,'$nama_sub_bidang',$sub_bidang_id)");
                    
                    $hasil['sukses'] = "data berhasil diupdate";
                    $hasil['error'] = true;
                    session()->setFlashdata('update', 'data berhasil diupdate !');
                } else {
                    $hasil['sukses'] = false;
                    $hasil['error'] = $validation->listErrors();
                }

                
                return json_encode($hasil);

            } else{

                // jika modul master is_update = 0 maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }

        }
        
    }

    public function hapussubbidangp($id)
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            if ($akses[5]->is_delete == 1) {
				$pegawai_id = htmlspecialchars(session()->id);
                $sub_bidang_id = htmlspecialchars($id);

                $this->db->query("CALL sub_bidang_delete($pegawai_id,$sub_bidang_id)");

                session()->setFlashdata('hapus', 'data terhapus !');
                return redirect()->to(base_url('master/subbidangp/'. session()->id_BidangSess));
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

    // get data bidang dengan json
    public function getBidangp()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();

                // ambil bidang id pada script js
                $BidangID = htmlspecialchars($this->request->getVar('BidangID'));

                $pegawai_id = session()->id;
                $getdatabidang = $procedure->bidangSelectViews($pegawai_id);
                $output = '<option value="">---Pilih Bidang---</option>';
                foreach ($getdatabidang as $row) {
                    if ($BidangID) { //Edit data
                        if ($BidangID == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.htmlspecialchars($row->id).'" selected>'.htmlspecialchars($row->nama_bidang).'</option>';
                        } else {
                            $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_bidang).'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_bidang).'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                // jika yang login bukan superuser maka dialihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // get data subbidang dengan json
    public function getDataSubbidangp()
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {

            // yang login wajib superuser
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure();

                // ambil data subbidang id dan bidang id pada script js
                $subbidang_id = htmlspecialchars($this->request->getVar('subbidang_id'));
                $b_id = htmlspecialchars($this->request->getVar('bidang_id'));
                // dd($id_bidang);
                $getdataSubbidang = $procedure->subbidangselectView($b_id);
                $output = '<option value="">---Pilih Sub Bidang---</option>';
                foreach ($getdataSubbidang as $row) {
                    if ($subbidang_id) { //Edit data
                        if ($subbidang_id == $row->id) { 
                            // selected sub bidang
                            $output .='<option value="'.htmlspecialchars($row->id).'" selected>'.htmlspecialchars($row->nama_sub_bidang).'</option>';
                        } else {
                            $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_sub_bidang).'</option>';
                        } 
                    } else { // tambah data
                        # data foraeach
                        $output .='<option value="'.htmlspecialchars($row->id).'">'.htmlspecialchars($row->nama_sub_bidang).'</option>';
                    }
                }
                echo json_encode($output);
			} else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
                return redirect()->to('blocked/blocked');

            }
			
		}
        
    }

    // view form tambah jabatan
    public function f_jabatanp()
    {
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            if ($akses[5]->is_insert == 1) {
				$procedure = new ModelProcedure();
				$proceduree = new ModelProcedurepemda();
                $p_input_id = $this->session->id;
                $pegawai_id = session()->id;
                $bidang = $proceduree->bidangView($pegawai_id);
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

                $pegawai_id = htmlspecialchars(session()->id);
                $kd = htmlspecialchars($this->request->getVar('kd'));
                $lvl = htmlspecialchars($this->request->getVar('lvl'));
                $nama_jabatan = htmlspecialchars($this->request->getVar('nama_jabatan'));

                if ($lvl == 1) {
                    $b_id = htmlspecialchars($this->request->getVar('b_idManipulasi'));
                    $sb_id = htmlspecialchars($this->request->getVar('sb_idManipulasi'));
                }
                if ($lvl == 2) {
                    $b_id = htmlspecialchars($this->request->getVar('b_id'));
                    $sb_id = htmlspecialchars($this->request->getVar('sb_idManipulasi'));
                }
                if ($lvl == 3) {
                    $b_id = htmlspecialchars($this->request->getVar('b_id'));
                    $sb_id = htmlspecialchars($this->request->getVar('sb_id'));
                }
                if ($lvl == 4) {
                    $b_id = htmlspecialchars($this->request->getVar('b_id'));
                    $sb_id = htmlspecialchars($this->request->getVar('sb_id'));
                }
                
                // proses simpan
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

    // view form edit jabatan opd super dengan json menggunakan dua parameter
    public function f_editjabatanp($id, $type)
    {
        // jika sudah login tidak bisa kembali lagi ke halaman login, kecuali logout baru akan ke,mbali ke halaman login
        if (session()->logged_in) {
			$procedure = new ModelProcedurepemda();
            
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);

            // yang login wajib superuser
			if ($akses[5]->is_insert == 1) {

                // view form edit jabatan
				$procedure = new ModelProcedure();
                $dataId = [
                    'id_OpdSessJabatan' => $id
                ];
                session()->set($dataId);
                $hah_id = session()->hakakses;
                $dataopd = $procedure->byideditopd($id);
                $idOpdback = session()->id_OpdSessJabatan;
                $dataJabatan = $procedure->byideditjabatanopd($id);
                
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

                // jika parameter sama dengan edit yang dicocokan pada link yang ada pada halaman terkait
                if ($type == 'edit') {

                    // jika tipe = edit
                    $data['dataeditjabatan'] = $dataJabatan;
                    return view('masterpemda/jabatan/f_editjabatanp', $data);

                } else {
                    // data json
                    echo json_encode($dataJabatan);
                }
			} else{

                // jika yang login bukan superuser maka di alihkan ke halaman blocked
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
                $p_input_id = session()->id;

                $data = [
                    'judul_web' => 'Master Pegawai',
                    'subtitle' => 'Master Pegawai',
                    'subtitle2' => 'Data Pegawai',
                    'procedure' => $procedure->superuserOpd(),
                    'selectjabatansuper' => $proceduree->selectjabatansuper($p_input_id),
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

				$p_id_input = htmlspecialchars(session()->id);
                $p_nama = htmlspecialchars($this->request->getVar('nama_pegawai'));
                $p_nik = htmlspecialchars($this->request->getVar('nik'));
                $p_nip = htmlspecialchars($this->request->getVar('nip'));
                $p_kelamin_code = htmlspecialchars($this->request->getVar('jk'));
                $p_no_hp = htmlspecialchars($this->request->getVar('no_hp'));
                $p_email = htmlspecialchars($this->request->getVar('email'));
                $p_jabatan = htmlspecialchars($this->request->getVar('jabatan_id'));
                $gol_id = htmlspecialchars($this->request->getVar('golongan'));

                // proses simpan
                $simpan = $this->db->query("CALL pegawai_insert($p_id_input,'$p_nama','$p_nik','$p_nip',$p_kelamin_code,'$p_no_hp','$p_email',$p_jabatan,$gol_id)")->getRow();
                
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

    // proses edit pegawai
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

				$p_id_input = htmlspecialchars(session()->id);
                $p_nama = htmlspecialchars($this->request->getVar('nama_pegawai'));
                $p_nik = htmlspecialchars($this->request->getVar('nik'));
                $p_nip = htmlspecialchars($this->request->getVar('nip'));
                $p_kelamin_code = htmlspecialchars($this->request->getVar('jk'));
                $p_no_hp = htmlspecialchars($this->request->getVar('no_hp'));
                $p_email = htmlspecialchars($this->request->getVar('email'));
                $p_jabatan = htmlspecialchars($this->request->getVar('jabatan_id'));
                $gol_id = htmlspecialchars($this->request->getVar('golongan'));
                $pegawai_id = htmlspecialchars($this->request->getVar('pegawai_id'));

                // proses simpan
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
// ------------------------------------------------------------------------------------------



    // view data satuan
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

    // view form tambah satuan
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

                $usr_input_id = htmlspecialchars(session()->id);
                $opd_id = htmlspecialchars($this->request->getVar('opd_id'));
                $stn = htmlspecialchars($this->request->getVar('stn'));

                // proses simpan
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