<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelProcedure;
use App\Models\ModelProcedurepemda;
use App\Models\ModelOpd;
use App\Models\ModelBidang;
use phpDocumentor\Reflection\Types\This;


class Rpjmd extends BaseController
{

        // RPJMD
//-----------------------------------------------------------------------------------------------------------
    // visi
// -----------------------------------------------------------------------------------------------------------
    public function visip()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_active == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Visi',
                    'subtitle' => 'Master Visi',
                    'subtitle2' => 'Data Visi',
                    'procedure' => $procedure->tampilvisi(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/visi/v_visi', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form visi
    public function f_visip()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Visi',
                    'subtitle' => 'Master Visi',
                    'subtitle2' => 'Data Visi',
                    'selectperiode' => $procedure->selectperiode(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/visi/f_visi', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tambah visi
    public function proccesstambahvisip()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'periode_id' => [
                        'label' => 'Periode',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
        
                    'no_urut' => [
                        'label' => 'Nomor urut visi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
                    'visi' => [
                        'label' => 'Visi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('rpjmd/f_visip')->withInput()->with('validation', $validation);
                }
                $usr_input_id = htmlspecialchars(session()->id);
                $periode_id = htmlspecialchars($this->request->getVar('periode_id'));
                $no_urut = htmlspecialchars($this->request->getVar('no_urut'));
                $visi = htmlspecialchars($this->request->getVar('visi'));
                // dd($usr_input_id,$periode_id,$no_urut,$visi);
                $this->db->query("CALL visi_insert('$usr_input_id','$periode_id','$no_urut','$visi')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('rpjmd/visip'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/visip'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/f_visip'));
                // }
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }
// -------------------------------------------------------------------------------------------------------------------------------
    // misi
// --------------------------------------------------------------------------------------------------------------------------------
    public function misip()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_active == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Misi',
                    'subtitle' => 'Master Misi',
                    'subtitle2' => 'Data Misi',
                    'procedure' => $procedure->misiView(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/misi/v_misi', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form visi
    public function f_misip()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Misi',
                    'subtitle' => 'Master Misi',
                    'subtitle2' => 'Data Misi',
                    'selectvisi' => $procedure->selectvisi(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/misi/f_misi', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tambah visi
    public function proccesstambahmisip()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'vs_id' => [
                        'label' => 'Visi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
        
                    'n_urut' => [
                        'label' => 'Nomor urut misi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
                    'ms' => [
                        'label' => 'Misi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('rpjmd/f_misip')->withInput()->with('validation', $validation);
                }
                $usr_input_id = htmlspecialchars(session()->id);
                $vs_id = htmlspecialchars($this->request->getVar('vs_id'));
                $n_urut = htmlspecialchars($this->request->getVar('n_urut'));
                $ms = htmlspecialchars($this->request->getVar('ms'));
                // dd($usr_input_id,$periode_id,$no_urut,$visi);
                $this->db->query("CALL misi_insert('$usr_input_id','$vs_id','$n_urut','$ms')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('rpjmd/misip'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/visip'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/f_visip'));
                // }
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }
// -------------------------------------------------------------------------------------------------------------------------------
    // tujuan
// --------------------------------------------------------------------------------------------------------------------------------

    public function tujuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_active == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Tujuan',
                    'subtitle' => 'Master Tujuan',
                    'subtitle2' => 'Data Tujuan',
                    'procedure' => $procedure->tujuanView(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/tujuan/v_tujuan', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tujuan
    public function f_tujuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Tujuan',
                    'subtitle' => 'Master Tujuan',
                    'subtitle2' => 'Data Tujuan',
                    'selectmisi' => $procedure->selectmisi(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/tujuan/f_tujuan', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tambah tujuan
    public function proccesstambahtujuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'ms_id' => [
                        'label' => 'Misi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
        
                    'n_urut' => [
                        'label' => 'Nomor urut tujuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
                    'tj' => [
                        'label' => 'Tujuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('rpjmd/f_tujuanp')->withInput()->with('validation', $validation);
                }
                $ms_id = htmlspecialchars($this->request->getVar('ms_id'));
                $n_urut = htmlspecialchars($this->request->getVar('n_urut'));
                $tj = htmlspecialchars($this->request->getVar('tj'));
                $usr_input_id = htmlspecialchars(session()->id);
                // dd($usr_input_id,$periode_id,$no_urut,$visi);
                $this->db->query("CALL tujuan_insert('$ms_id','$n_urut','$tj',$usr_input_id)")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('rpjmd/tujuanp'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/visip'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/f_visip'));
                // }
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }
// -----------------------------------------------------------------------------------------------------
    // sasaran
// --------------------------------------------------------------------------------------------------------------------------------
    public function sasaranp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_active == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Sasaran',
                    'subtitle' => 'Master Sasaran',
                    'subtitle2' => 'Data Sasaran',
                    'procedure' => $procedure->tampilsasaran(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/sasaran/v_sasaran', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form sasaran
    public function f_sasaranp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Sasaran',
                    'subtitle' => 'Master Sasaran',
                    'subtitle2' => 'Data Sasaran',
                    'selecttujuan' => $procedure->selecttujuan(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/sasaran/f_sasaran', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tambah sasaran
    public function proccesstambahsasaranp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'tj_id' => [
                        'label' => 'Tujuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
        
                    'ssrn' => [
                        'label' => 'Sasaran',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('rpjmd/f_sasaranp')->withInput()->with('validation', $validation);
                }
                $usr_input_id = htmlspecialchars(session()->id);
                $tj_id = htmlspecialchars($this->request->getVar('tj_id'));
                $ssrn = htmlspecialchars($this->request->getVar('ssrn'));
                // dd($usr_input_id,$periode_id,$no_urut,$visi);
                $this->db->query("CALL sasaran_insert('$usr_input_id','$tj_id','$ssrn')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('rpjmd/sasaranp'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/visip'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/f_visip'));
                // }
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }

// -----------------------------------------------------------------------------------------------------
    // indikator
// --------------------------------------------------------------------------------------------------------------------------------
    public function indikatorp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_active == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Indikator',
                    'subtitle' => 'Master Indikator',
                    'subtitle2' => 'Data Indikator Tujuan',
                    'subtitle3' => 'Data Indikator Sasaran',
                    'procedureIT' => $procedure->tampilindikatortujuan(),
                    'procedureIS' => $procedure->tampilindikatorsasaran(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/indikator/v_indikator', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form indikator tujuan
    public function f_indikatortujuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Indikator Tujuan',
                    'subtitle' => 'Master Indikator Tujuan',
                    'subtitle2' => 'Data Indikator Tujuan',
                    'selecttujuan' => $procedure->selecttujuan(),
                    'selectsatuan' => $procedure->selectsatuan(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/indikator/f_tujuan', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form indikator sasaran
    public function f_indikatorsasaranp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Indikator Sasaran',
                    'subtitle' => 'Master Indikator Sasaran',
                    'subtitle2' => 'Data Indikator Sasaran',
                    'selectsasaran' => $procedure->selectsasaran(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/rpjmd/indikator/f_sasaran', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tambah indikator tujuan
    public function proccesstambahindikatortujuanp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'tj_id' => [
                        'label' => 'Tujuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
        
                    'indktr_tj' => [
                        'label' => 'Indikator tujuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],

                    'trgt' => [
                        'label' => 'Target',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],

                    'stn_id' => [
                        'label' => 'Satuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('rpjmd/f_indikatortujuanp')->withInput()->with('validation', $validation);
                }
                $usr_input_id = htmlspecialchars(session()->id);
                $tj_id = htmlspecialchars($this->request->getVar('tj_id'));
                $indktr_tj = htmlspecialchars($this->request->getVar('indktr_tj'));
                $trgt = htmlspecialchars($this->request->getVar('trgt'));
                $stn_id = htmlspecialchars($this->request->getVar('stn_id'));
                // dd($usr_input_id,$periode_id,$no_urut,$visi);
                $this->db->query("CALL indikator_tujuan_insert('$usr_input_id','$tj_id','$indktr_tj','$trgt','$stn_id')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('rpjmd/indikatorp'));
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }

    // form tambah indikator sasaran
    public function proccesstambahindikatorsasaranp()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedurepemda();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[0]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'ssrn_id' => [
                        'label' => 'Sasaran',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
        
                    'indktr_ssrn' => [
                        'label' => 'Indikator sasaran',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('rpjmd/f_indikatorsasaranp')->withInput()->with('validation', $validation);
                }
                $usr_input_id = htmlspecialchars(session()->id);
                $ssrn_id = htmlspecialchars($this->request->getVar('ssrn_id'));
                $indktr_ssrn = htmlspecialchars($this->request->getVar('indktr_ssrn'));
                // dd($usr_input_id,$periode_id,$no_urut,$visi);
                $this->db->query("CALL sasaran_insert('$usr_input_id','$ssrn_id','$indktr_ssrn')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('rpjmd/indikatorp'));
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }

}
