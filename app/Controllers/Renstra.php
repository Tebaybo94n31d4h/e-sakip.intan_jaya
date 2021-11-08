<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProcedure;
use App\Models\ModelProcedurepemda;
use App\Models\ModelProcedureopd;
use App\Models\ModelOpd;
use App\Models\ModelBidang;
use phpDocumentor\Reflection\Types\This;


class Renstra extends BaseController
{
    // tujuan
    // --------------------------------------------------------------------------------------------------------------------------------

    public function tujuano()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_active == 1) {
                    $procedure = new ModelProcedureopd();
                    $hah_id = $this->session->hakakses;
                    $data = [
                        'judul_web' => 'Master Tujuan',
                        'subtitle' => 'Renstra Tujuan',
                        'subtitle2' => 'Data Tujuan',
                        'procedure' => $procedure->tampiltujuan(),
                        'menu' => $procedure->iscrud($hah_id),
                        'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                        'get' => session() // ambil session user yang sedang login
                    ];
                    return view('masteropd/renstra/tujuan/v_tujuan', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // form tujuan
    public function f_tujuano()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Tujuan',
                    'subtitle' => 'Resntra Tujuan',
                    'subtitle2' => 'Data Tujuan',
                    'selectmisi' => $procedure->selectmisi(),
                    'selectOpd' => $procedure->selectOpd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/tujuan/f_tujuan', $data);
            } else {
                return redirect()->to('blocked/blocked');
            }
        } else {
            # code...
        }
    }

    // form tambah tujuan
    public function proccesstambahtujuano()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'opd_id' => [
                        'label' => 'OPD',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
                    'tj_opd' => [
                        'label' => 'Tujuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]

                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('renstra/f_tujuano')->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $opd_id = $this->request->getVar('opd_id');
                $tj_opd = $this->request->getVar('tj_opd');
                // dd($usr_input_id,$opd_id,$tj_opd);
                $this->db->query("CALL tujuan_opd_insert($usr_input_id,'$opd_id','$tj_opd')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('renstra/tujuano'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/visip'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/f_visip'));
                // }
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // -----------------------------------------------------------------------------------------------------
    // sasaran
    // --------------------------------------------------------------------------------------------------------------------------------
    public function sasarano()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_active == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Tujuan',
                    'subtitle' => 'Renstra Sasaran',
                    'subtitle2' => 'Data Sasaran',
                    'procedure' => $procedure->tampilsasaran(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/sasaran/v_sasaran', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // form sasaran
    public function f_sasarano()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Sasaran',
                    'subtitle' => 'Renstra Sasaran',
                    'subtitle2' => 'Data Sasaran',
                    'selecttujuan' => $procedure->selecttujuan(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/sasaran/f_sasaran', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // form tambah sasaran
    public function proccesstambahsasarano()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'tjn_opd_id' => [
                        'label' => 'Tujuan Opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'ssrn_opd' => [
                        'label' => 'Sasaran Opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]

                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('renstra/f_sasarano')->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $ssrn_opd = $this->request->getVar('ssrn_opd');
                $tjn_opd_id = $this->request->getVar('tjn_opd_id');
                // dd($usr_input_id, $ssrn_opd, $tjn_opd_id);
                $this->db->query("CALL sasaran_opd_insert('$usr_input_id','$ssrn_opd','$tjn_opd_id')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('renstra/sasarano'));
                // if ($simpan->n == 81) {
                //     session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                //     return redirect()->to(base_url('master/visip'));
                // }
                // if ($simpan->n == 80) {
                //     session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                //     return redirect()->to(base_url('master/f_visip'));
                // }
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // -----------------------------------------------------------------------------------------------------
    // Indikator Sasaran Program
    // --------------------------------------------------------------------------------------------------------------------------------
    public function indikatorsasaranopd()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_active == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Indikator Sasaran',
                    'subtitle' => 'Renstra Indikator Sasaran',
                    'subtitle2' => 'Data Indikator Sasaran',
                    'procedure' => $procedure->tampilindikatorsasaranopd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/sasaran/indikator/v_indikator', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function f_indikatorsasaranopdo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Indikator Sasaran',
                    'subtitle' => 'Renstra Indikator Sasaran',
                    'subtitle2' => 'Data Indikator Sasaran',
                    'procedure' => $procedure->tampilindikatorsasaranopd(),
                    'selectsasaranopd' => $procedure->selectsasaranopd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/sasaran/indikator/f_indikator', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function proccesstambahsasaranopdo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'indktr_ssrn_opd' => [
                        'label' => 'Sasaran Opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]

                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('renstra/f_sasarano')->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $ssrn_opd_id = $this->request->getVar('ssrn_opd_id');
                $indktr_ssrn_opd = $this->request->getVar('indktr_ssrn_opd');
                if ($this->request->getVar('aktif') == 'on') {
                    $iku = 1;
                } else {
                    $iku = 0;
                }
                // dd($usr_input_id, $indktr_ssrn_opd, $ssrn_opd_id, $iku);
                $this->db->query("CALL indikator_sasaran_opd_insert('$usr_input_id','$ssrn_opd_id','$indktr_ssrn_opd','$iku')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('renstra/indikatorsasaranopd/' . session()->IdSasaranopd));
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // -----------------------------------------------------------------------------------------------------
    // Target Indikator Sasaran Program
    // --------------------------------------------------------------------------------------------------------------------------------

    public function targetindikatorsasaran()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_active == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                // $targetIS = [
                //     'targetIS' => $id
                // ];
                // session()->set($targetIS);
                $data = [
                    'judul_web' => 'Renstra Target Indikator Sasaran',
                    'subtitle' => 'Renstra Target Indikator Sasaran',
                    'subtitle2' => 'Data Target Indikator Sasaran',
                    'procedure' => $procedure->tampiltargetindikatorsasaranopd(),
                    // 'id_sasaranopd' => $id,
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/sasaran/target/v_target', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function f_targetindikatorsasaran()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Target Indikator Sasaran',
                    'subtitle' => 'Renstra Target Indikator Sasaran',
                    'subtitle2' => 'Form tambah',
                    'procedure' => $procedure->tampiltargetindikatorsasaranopd(),
                    'selectindikatorsasaranopd' => $procedure->selectindikatorsasaranopd(),
                    'selectsatuanopd' => $procedure->selectsatuan(),
                    'selectsubperiodeopd' => $procedure->selectsubperiode(),
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/sasaran/target/f_target', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function proccesstambahtargetindikatorsasaranopdo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'indktr_ssrn_opd_id' => [
                        'label' => 'Indikator Sasaran Opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'stn_id' => [
                        'label' => 'Satuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
                    'sb_prd' => [
                        'label' => 'Sub periode',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'trgt' => [
                        'label' => 'Target indikator sasaran',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('renstra/f_targetindikatorsasaran')->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $indktr_ssrn_opd_id = $this->request->getVar('indktr_ssrn_opd_id');
                $stn_id = $this->request->getVar('stn_id');
                $sb_prd = $this->request->getVar('sb_prd');
                $trgt = $this->request->getVar('trgt');
                // dd(
                //     $usr_input_id,
                //     $indktr_ssrn_opd_id,
                //     $stn_id,
                //     $sb_prd,
                //     $trgt
                // );
                $this->db->query("CALL target_indikator_sasaran_opd('$usr_input_id','$indktr_ssrn_opd_id','$stn_id','$sb_prd','$trgt')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('renstra/targetindikatorsasaran'));
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // -----------------------------------------------------------------------------------------------------
    // Program
    // --------------------------------------------------------------------------------------------------------------------------------
    public function programo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_active == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Program OPD',
                    'subtitle' => 'Renstra Program OPD',
                    'subtitle2' => 'Data Program OPD',
                    'procedure' => $procedure->tampilprogram(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/program/v_program', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }


    // form sasaran
    public function f_programo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Program OPD',
                    'subtitle' => 'Renstra Program  OPD',
                    'subtitle2' => 'Data Program OPD',
                    'selectindikatorsasaranopd' => $procedure->selectindikatorsasaranopd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/program/f_program', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function proccesstambahprogramopdo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'indktr_ssrn_opd_id' => [
                        'label' => 'Indikator Sasaran Opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'nm_prgrm_opd' => [
                        'label' => 'Sasaran Opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('renstra/f_programo')->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $indktr_ssrn_opd_id = $this->request->getVar('indktr_ssrn_opd_id');
                $nm_prgrm_opd = $this->request->getVar('nm_prgrm_opd');
                // dd($usr_input_id, $indktr_ssrn_opd_id, $nm_prgrm_opd);
                $this->db->query("CALL program_opd_insert('$usr_input_id','$indktr_ssrn_opd_id','$nm_prgrm_opd')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('renstra/programo'));
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // -----------------------------------------------------------------------------------------------------
    // indikator program
    // --------------------------------------------------------------------------------------------------------------------------------

    public function indikatorprogramopd()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_active == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Indikator Program OPD',
                    'subtitle' => 'Renstra Indikator Program OPD',
                    'subtitle2' => 'Data Indikator Program OPD',
                    'procedure' => $procedure->tampilindikatorprogram(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/program/indikator/v_indikator', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function f_indikatorprogramopd()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Indikator Sasaran',
                    'subtitle' => 'Renstra Indikator Sasaran',
                    'subtitle2' => 'Data Indikator Sasaran',
                    // 'procedure' => $procedure->tampilindikatorsasaranopd(),
                    'selectprogramopd' => $procedure->selectprogramopd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/program/indikator/f_indikator', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function proccesstambahindikatorprogramopdo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'prgrm_opd_id' => [
                        'label' => 'Program opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
                    'indktr_prgrm_opd' => [
                        'label' => 'Indikator program opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('renstra/f_indikatorprogramopd/' . session()->IDProgram)->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $prgrm_opd_id = $this->request->getVar('prgrm_opd_id');
                $indktr_prgrm_opd = $this->request->getVar('indktr_prgrm_opd');
                // dd($usr_input_id, $prgrm_opd_id, $indktr_prgrm_opd);
                $this->db->query("CALL indikator_program_opd_insert('$usr_input_id','$prgrm_opd_id','$indktr_prgrm_opd')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('renstra/indikatorprogramopd/' . session()->IDProgram));
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    // -----------------------------------------------------------------------------------------------------
    // Target indikator program
    // --------------------------------------------------------------------------------------------------------------------------------
    public function targetindikatorprogram()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_active == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Target Indikator Program',
                    'subtitle' => 'Renstra Target Indikator Program',
                    'subtitle2' => 'Data Target Indikator Program',
                    'procedure' => $procedure->tampiltargetindikatorprogramopd(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/program/target/v_target', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function f_targetindikatorprogram()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                $procedure = new ModelProcedureopd();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Renstra Target Indikator Program',
                    'subtitle' => 'Renstra Target Indikator Program',
                    'subtitle2' => 'Form tambah',
                    'procedure' => $procedure->tampiltargetindikatorsasaranopd(),
                    'selectindikatorprogramopd' => $procedure->selectindikatorprogramopd(),
                    'selecttargetindikatorprogramopd' => $procedure->selecttargetindikatorprogramopd(),
                    'selectsatuanopd' => $procedure->selectsatuan(),
                    'selectsubperiodeopd' => $procedure->selectsubperiode(),
                    'validation' => \Config\Services::validation(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masteropd/renstra/program/target/f_target', $data);
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }

    public function proccesstambahtargetindikatorprogramopdo()
    {
        if (session()->logged_in) {
            $procedure = new ModelProcedureopd();
            $hah_id = $this->session->hakakses;
            $akses = $procedure->iscrud($hah_id);
            if ($akses[1]->is_insert == 1) {
                // cek validasi
                if (!$this->validate([
                    'indktr_prgrm_opd_id' => [
                        'label' => 'Indikator program opd',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'stn_id' => [
                        'label' => 'Satuan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],
                    'sb_prd_id' => [
                        'label' => 'Sub periode',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib dipilih'
                        ]
                    ],

                    'trgt_indktr_prgrm_opd' => [
                        'label' => 'Target indikator program',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ],
                    'anggrn' => [
                        'label' => 'Anggaran',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} wajib diisi'
                        ]
                    ]
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('renstra/f_targetindikatorprogram')->withInput()->with('validation', $validation);
                }
                $usr_input_id = session()->id;
                $indktr_prgrm_opd_id = $this->request->getVar('indktr_prgrm_opd_id');
                $stn_id = $this->request->getVar('stn_id');
                $sb_prd_id = $this->request->getVar('sb_prd_id');
                $trgt_indktr_prgrm_opd = $this->request->getVar('trgt_indktr_prgrm_opd');
                $anggrn = $this->request->getVar('anggrn');
                // dd(
                //     $usr_input_id,
                //     $indktr_prgrm_opd_id,
                //     $stn_id,
                //     $sb_prd_id,
                //     $trgt_indktr_prgrm_opd,
                //     $anggrn
                // );
                $this->db->query("CALL target_indikator_program_opd_insert('$usr_input_id','$indktr_prgrm_opd_id','$trgt_indktr_prgrm_opd','$stn_id','$sb_prd_id','$anggrn')")->getRow();

                session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                return redirect()->to(base_url('renstra/targetindikatorprogram'));
            } else {

                return redirect()->to('blocked/blocked');
            }
        }
    }
    // =============================================================================================================
}
