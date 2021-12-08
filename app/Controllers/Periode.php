<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProcedure;
use App\Models\ModelProcedurepemda;
use App\Models\ModelOpd;
use App\Models\ModelBidang;
use phpDocumentor\Reflection\Types\This;

class Periode extends BaseController
{

	// periode pemda
//-----------------------------------------------------------------------------------------------------------
    public function periodep()
    {
        if (session()->logged_in) {
            if (session()->hakakses == 1 || 2) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Periode',
                    'subtitle' => 'Master Periode',
                    'subtitle2' => 'Data Periode',
                    'procedure' => $procedure->tampilperiode(),
                    'proceduresub' => $procedure->tampilsub_periode(),
                    'menu' => $procedure->iscrud($hah_id),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/periode/v_periode', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form periode
    public function f_periodep()
    {
        if (session()->logged_in) {
            if (session()->hakakses == 1 || 2) {
                $procedure = new ModelProcedurepemda();
                $hah_id = $this->session->hakakses;
                $data = [
                    'judul_web' => 'Master Periode',
                    'subtitle' => 'Master Periode',
                    'subtitle2' => 'Data Periode',
                    'menu' => $procedure->iscrud($hah_id),
                    'validation' => \Config\Services::validation(),
                    'urimenu' => $this->request->uri->getSegment(2), // mengambil uri file diari url /controller -> function -> metod -> variabel
                    'get' => session() // ambil session user yang sedang login
                ];
                return view('masterpemda/periode/f_periode', $data);
            } else{

                    return redirect()->to('blocked/blocked');

            }
            
        }
    }

    // form tambah periode
    public function proccesstambahperiodep()
    {
        if (session()->logged_in) {
            if (session()->hakakses == 1 || 2) {
                // cek validasi
                if (!$this->validate([
                    'tahun_awal' => [
                        'label' => 'Tahun awal',
                        'rules' => 'required|numeric',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'numeric' => '{field} wajib diisi angka'
                        ]
                    ],

                    'tahun_akhir' => [
                        'label' => 'Tahun akhir',
                        'rules' => 'required|numeric',
                        'errors' => [
                            'required' => '{field} wajib diisi',
                            'numeric' => '{field} wajib diisi angka'
                        ]
                    ],
        
                ])) {
                    // jika validasi gagal
                    $validation =  \Config\Services::validation();
                    return redirect()->to('/periode/f_periodep')->withInput()->with('validation', $validation);
                }
                $usr_input_id = htmlspecialchars(session()->id);
                $tahun_awal = htmlspecialchars($this->request->getVar('tahun_awal'));
                $tahun_akhir = htmlspecialchars($this->request->getVar('tahun_akhir'));
                // dd($usr_input_id,$tahun_awal,$tahun_akhir);
                $simpan = $this->db->query("CALL periode_insert($usr_input_id,'$tahun_awal','$tahun_akhir')")->getRow();
                if ($simpan->n == 81) {
                    session()->setFlashdata('berhasil', 'data berhasil ditambahkan !');
                    return redirect()->to(base_url('periode/periodep'));
                }
                if ($simpan->n == 80) {
                    session()->setFlashdata('sudah_ada', 'data pernah dibuat !');
                    return redirect()->to(base_url('periode/f_periodep'));
                }
            } else{

                    return redirect()->to('blocked/blocked');
            }
        }
    }

// ----------------------------------------------------------------------------------------------------------------

}
