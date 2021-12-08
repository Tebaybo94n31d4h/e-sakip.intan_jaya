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

class Setting extends BaseController
{

    
    public function __construct()
    {
        $this->model = new \App\Models\ModelBidang();
        $this->model = new \App\Models\ModelSubBidang();
        $this->modelHakAkses = new \App\Models\ModelHakAkses();
        //Do your magic here
    }

    // View Hak akses
	public function index()
	{
        if (session()->logged_in) {
			if (session()->hakakses == 0) {
				$procedure = new ModelProcedure;
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Setting',
                    'subtitle' => 'Setting',
                    'subtitle2' => 'Setting',
                    'HakAkses' => $procedure->hakakseshdr(),
                    'procedure' => $procedure->tampiluser(),
                    'selectopduser' => $procedure->selectopdsuper(),
                    'selectpegawaiuser' => $procedure->pegawaiopdsuper(),
                    'selecthakaksesuser' => $procedure->hakakseshdr(),
                    'validation' => \Config\Services::validation(),
                    'iscrud' => $procedure->iscrud($hah_id),
                    'menu' => $procedure->iscrud($hah_id),
                    'uri' => $this->request->uri->getSegment(1), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('setting/v_setting', $data);
			} else{

                    return redirect()->to('blocked/blocked');

            }
			
		}
        
	}

    public function ambildataModul($id)
    {
        if (session()->logged_in) {
            if (session()->hakakses == 0) {
                $this->Modul = new ModelHakAkses();
                return json_encode($this->Modul->getModul($id));
            } else {
                return redirect()->to('blocked/blocked');
            }
        }
    }

    // Update is Module Akses
    public function updateIsModul()
    {

        if (session()->logged_in) {
            if (session()->hakakses == 0) {
                
                $id = htmlspecialchars($this->request->getVar('id'));
                $name = htmlspecialchars($this->request->getVar('name'));

                $builder = $this->db->table('hak_akses_dtl');

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

                return $builder->update();
                session()->setFlashdata('berhasil', 'data berhasil diupdate !');
                return redirect()->back()->withInput();

            } else {
                return redirect()->to('blocked/blocked');
            }
        }

        

    }


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
            $usr = htmlspecialchars($this->request->getVar('usr'));
            $psswd = htmlspecialchars($this->request->getVar('psswd'));
            $opd_id = htmlspecialchars($this->request->getVar('opd_id'));
            $p_id = htmlspecialchars($this->request->getVar('p_id'));
            $usr_input_id = htmlspecialchars(session()->id);
            $nama_usr = htmlspecialchars($this->request->getVar('nama_usr'));
            $hah_id = htmlspecialchars($this->request->getVar('hah_id'));
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

}