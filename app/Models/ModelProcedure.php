<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use CodeIgniter\Database\BaseBuilder;

class ModelProcedure extends Model
{
	protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


	 // Query menampilkan Hak Akses Hdr
	 public function hakakseshdr()
	 {
		 $query = $this->db->query("CALL hak_akses_hdr_view");
		 $results = $query->getResult();
		 return $results;
	 }

     public function byIdHakAkses($hah_id)
     {
        $query = $this->db->query("CALL hak_akses_hdr_view_dtl('$hah_id')");
        $results = $query->getResult();
        return $results;
     }

     public function byIdGantiHakAkses($hah_id)
     {
        $query = $this->db->query("CALL hak_akses_dtl_view('$hah_id')");
        $results = $query->getResult();
        return $results;
     }

	 // Query Procedure untuk menampilkan hak akses pada halaman hak akses
	 public function hakAkses($user_id)
	 {
		 $query = $this->db->query("CALL hak_akses_view('$user_id')");
		 $results = $query->getResult();
		 return $results;
	 }

	 // Query untuk menampilkan menu sidebire 
	 public function iscrud($hah_id)
	 {
		 $query = $this->db->query("CALL hak_akses_dtl_view('$hah_id')");
		 $results = $query->getResult();
		 return $results;
	 }

	//  query user
	public function usersuper()
	{
        $query = $this->db->query("SELECT * FROM user_sakip");
        $results = $query->getResult();
        return $results;
	}

    public function tampiluser()
    {
        $query = $this->db->query("SELECT us.id, us.nama_user, us.username, us.is_active, us.hak_akses_hdr_id, us.opd_hdr_id,
                                        hah.nama_hak_akses, oh.kode as opd_hdr_kode
                                    FROM user_sakip us
                                    RIGHT JOIN opd_hdr oh on oh.id = us.opd_hdr_id 
                                    LEFT JOIN hak_akses_hdr hah on hah.id = us.hak_akses_hdr_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

	//  query user
	public function useraksesmenu()
	{
        $query = $this->db->query("SELECT * FROM user_sakip");
        $results = $query->getResult();
        return $results;
	}
//------------------------------------------------------------------------------------
	//  query untuk menampilkan bidang view
	 public function bidangView($id)
    {

        $query = $this->db->query("CALL bidang_view_su('$id')");
        $results = $query->getResult();
        return $results;
    }

	// menampilkan data bidang select
	public function bidangSelectViews($pegawai_id)
    {

        $query = $this->db->query("CALL bidang_view('$pegawai_id')");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan detail edit bidang
	public function byideditbidangopd($id)
	{
		$query = $this->db->query("CALL bidang_view_dtl('$id')");
        $results = $query->getRow();
        return $results;	
	}

    public function tampilbidang($id)
    {
        $query = $this->db->query("SELECT b.id, b.kode, b.nama_bidang, b.opd_hdr_id, b.is_active as aktif, 
                                    oh.id, oh.nama_opd, oh.kode as kode_opd, oh.nomor_unit_kerja
                                    FROM bidang b
                                    INNER JOIN opd_hdr oh ON oh.id = b.opd_hdr_id
                                    WHERE b.id = $id
                                    ");
        $results = $query->getRow();
        return $results;	
    }
//------------------------------------------------------------------------------------------------
	//  query untuk menampilkan sub bidang view
	public function sub_bidangView($id)
    {

        $query = $this->db->query("CALL sub_bidang_view('$id')");
        $results = $query->getResult();
        return $results;
    }

	// ambil data sub bidang untuk ditampilkan pada select option
	public function subbidangSelectView($b_id)
    {

        $query = $this->db->query("CALL sub_bidang_view('$b_id')");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan detail edit sub bidang
	public function byideditsubbidangopd($id)
	{
		$query = $this->db->query("CALL sub_bidang_view_dtl('$id')");
        $results = $query->getRow();
        return $results;	
	}

	// Query untuk menampilkan sub bidang pada select option 
    public function selectSubid($user, $bidang_id)
    {
        $query = $this->db->query("CALL sub_bidang_view('$user','$bidang_id')");
        $results = $query->getResult();
        return json_encode($results);
    }

// -------------------------------------------------------------------------------------------//
	//  query untuk menampilkan jabatan view
	public function jabatanView($id)
    {

        $query = $this->db->query("CALL jabatan_view_su('$id')");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan detail edit jabatan
	public function byideditjabatanopd($id)
	{
		$query = $this->db->query("SELECT * FROM jabatan WHERE id = $id");
        $results = $query->getRow();
        return $results;	
	}

	public function leveljabatan()
	{
		$query = $this->db->query("SELECT * FROM level_jabatan WHERE id != 0");
        $results = $query->getResult();
        return $results;
	}

    public function tampiljabatan($id)
    {
        $query = $this->db->query("SELECT j.id, j.kode, j.nama_bidang, j.opd_hdr_id, j.is_active as aktif, 
                                    oh.id, oh.nama_opd, oh.kode as kode_opd, oh.nomor_unit_kerja
                                    FROM jabatan j
                                    INNER JOIN opd_hdr oh ON oh.id = b.opd_hdr_id
                                    WHERE b.id = $id
                                    ");
        $results = $query->getRow();
        return $results;	
    }

	// ambil data jabatan untuk ditampilkan pada select option
	public function jabatanselectView($opdIDPegawai)
    {
        $query = $this->db->query("CALL jabatan_view_su('$opdIDPegawai')");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan pilihan jabatan
	public function selectjabatansuper()
    {
        $query = $this->db->query("SELECT * FROM jabatan");
        $results = $query->getResult();
        return $results;
    }

    //query untuk menampilkan pilihan jabatan
	public function selectjabatanedit($pegawai_id)
    {
        $query = $this->db->query("SELECT j.* FROM jabatan j
                                    JOIN pegawai p ON j.id = p.jabatan_id
                                    WHERE p.id = $pegawai_id
                                        ");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan pilihan opd
	public function selectopdsuper()
    {
        $query = $this->db->query("SELECT * FROM opd_hdr");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan pilihan golongan
	public function selectgolongansuper()
    {
        $query = $this->db->query("SELECT * FROM golongan_pegawai");
        $results = $query->getResult();
        return $results;
    }

// ------------------------------------------------------------------------------------------------
	//query untuk menampilkan opd
	public function superuserOpd()
	{
		$query = $this->db->query("CALL opd_view");
        $results = $query->getResult();
        return $results;
	}
	public function superuserOpdget($opdIDPegawai)
	{
		$query = $this->db->query("CALL opd_view_dtl('$opdIDPegawai')");
        $results = $query->getRow();
        return $results;
	}
	//query untuk menampilkan opd
	public function superuserOpdpegawais()
	{
		$query = $this->db->query("SELECT oh.* FROM opd_hdr oh 
                                        RIGHT JOIN jabatan j ON oh.id = j.opd_hdr_id 
                                        LEFT JOIN pegawai p ON p.jabatan_id = j.id 
                                        WHERE j.opd_hdr_id = oh.id
                                        AND j.id = p.jabatan_id
                                        ");
        $results = $query->getResult();
        return $results;
	}

	// ambil data opd untuk ditampilkan pada select option
	public function opdselectView()
    {
        $query = $this->db->query("SELECT * FROM opd_hdr");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan edit detail opd
	public function byideditopd($id)
	{
		$query = $this->db->query("CALL opd_view_dtl('$id')");
        $results = $query->getRowArray();
        return $results;
	}

	//query untuk menampilkan pilihan opd
	public function selectOpd()
    {
        $query = $this->db->query("CALL opd_view");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan pilihan level opd
	public function selectlevelopd()
    {
        $query = $this->db->query("SELECT * FROM level_opd");
        $results = $query->getResult();
        return $results;
    }

	//query untuk menampilkan pilihan level opd
	public function selectlevelsopd($level)
    {
        $query = $this->db->query("SELECT * FROM level_opd WHERE '$level'");
        $results = $query->getResult();
        return $results;
    }

//---------------------------------------------------------------------------------------------------//

	// pegawai
	//query untuk menampilkan pegawai
	public function pegawaiopdsuper()
	{
		$query = $this->db->query("CALL pegawai_view_su");
		$results = $query->getResult();
		return $results;
	}

    public function bypegawaidtl($id)
	{
		$query = $this->db->query("CALL pegawai_view_dtl('$id')");
        $results = $query->getRow();
        return $results;
	}

	public function editpegawaiopdsuper($pegawai_id)
	{
		$query = $this->db->query("SELECT * FROM pegawai WHERE id = $pegawai_id");
        $results = $query->getRow();
        return $results;
	}

	// ambil data opdpegawai untuk ditampilkan pada select option
	public function opdpegawaiselectView($opdIDPegawai)
    {
        $query = $this->db->query("SELECT * FROM opd_hdr WHERE id = $opdIDPegawai");
        $results = $query->getResult();
        return $results;
    }
	// ambil data opdpegawai untuk ditampilkan pada select option
	public function opdpegawai($id_pegawai)
    {
        $query = $this->db->query("SELECT oh.* FROM opd_hdr oh 
                                    JOIN jabatan j ON oh.id = j.opd_hdr_id 
                                    JOIN pegawai p ON p.jabatan_id = j.id 
                                    WHERE p.id = $id_pegawai");
        $results = $query->getResult();
        return $results;
    }



}
