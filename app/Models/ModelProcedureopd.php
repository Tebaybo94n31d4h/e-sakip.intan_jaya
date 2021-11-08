<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use CodeIgniter\Database\BaseBuilder;

class ModelProcedureopd extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    // Query menampilkan Hak Akses Hdr
    public function hakakseshdr()
    {
        $query = $this->db->query("CALL hak_akses_hdr_view()");
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

    public function cek_menu($p_input_id)
    {
        $query = $this->db->query("CALL cek_hak_akses('$p_input_id')");
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

    //  query user
    public function useraksesmenu()
    {
        $query = $this->db->query("SELECT * FROM user_sakip");
        $results = $query->getResult();
        return $results;
    }
    //------------------------------------------------------------------------------------
    //  query untuk menampilkan bidang view
    public function bidangView($pegawai_id)
    {

        $query = $this->db->query("CALL bidang_view($pegawai_id)");
        $results = $query->getResult();
        return $results;
    }

    public function tampilbidang($pegawai_id)
    {
        $query = $this->db->query("SELECT b.id, b.kode, b.nama_bidang, b.user_created, b.user_updated, b.last_modified_date, b.is_active, b.opd_hdr_id, b.tipe_bidang_id, tb.tipe, oh.nama_opd
                                    FROM bidang b
                                    INNER JOIN tipe_bidang tb ON tb.id = b.tipe_bidang_id
                                    INNER JOIN opd_hdr oh ON oh.id = b.opd_hdr_id
                                    WHERE oh.id = b.opd_hdr_id
                                    AND b.is_active = 1 
                                    AND b.user_created = 'adminpemda' 
                                    ORDER BY b.last_modified_date desc;
                                    ");
        $results = $query->getResult();
        return $results;
    }

    // menampilkan data bidang select
    public function bidangSelectViews($pegawai_id)
    {
        $query = $this->db->query("SELECT b.id, b.opd_hdr_id as opd_id, b.kode, b.nama_bidang, b.tipe_bidang_id
                                        oh.id as oh_id, oh.kode, oh.nama_opd, us.id as us_id, us.opd_hdr_id, us.pegawai_id
                                        p.id as pegawai_id
                                    FROM bidang b
                                    LEFT JOIN opd_hdr oh ON oh.oh_id = b.opd_id
                                    RIGHT JOIN user_sakip us ON us.opd_hdr_id = oh.oh_id
                                    LEFT JOIN pegawai p ON p.pegawai_id = us.pegawai_id
                                    WHERE p.pegawai_id = $pegawai_id
                                    -- AND b.opd_id = oh.id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    // public function bidangSelectViews()
    // {
    //     $query = $this->db->query("CALL bidang_view");
    //     $results = $query->getResult();
    //     return $results;
    // }

    //query untuk menampilkan detail edit bidang
    public function byideditbidang($id)
    {
        $query = $this->db->query("CALL bidang_view_dtl('$id')");
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
    public function jabatanView($p_input_id)
    {

        $query = $this->db->query("CALL jabatan_view($p_input_id)");
        $results = $query->getResult();
        return $results;
    }

    public function tampiljabatn()
    {

        $query = $this->db->query("SELECT j.id, j.bidang_id, j.sub_bidang_id, j.kode, j.nama_jabatan, j.opd_hdr_id,
                                    oh.id, oh.nama_opd, b.nama_bidang, sb.nama_sub_bidang
                                    FROM jabatan j
                                    INNER JOIN opd_hdr oh ON oh.id = j.opd_hdr_id
                                    LEFT JOIN bidang b ON b.id = j.bidang_id
                                    RIGHT JOIN sub_bidang sb ON sb.id = j.sub_bidang_id
                                    WHERE oh.id = j.opd_hdr_id
                                    AND j.is_active = 1 
                                    -- AND b.user_created = 'adminpemda' 
                                    -- ORDER BY b.last_modified_date desc;
                                    ");
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

    // ambil data jabatan untuk ditampilkan pada select option
    public function jabatanselectView($opdIDPegawai)
    {
        $query = $this->db->query("CALL jabatan_view_su('$opdIDPegawai')");
        $results = $query->getResult();
        return $results;
    }

    //query untuk menampilkan pilihan jabatan
    public function selectjabatansuper($user)
    {
        $query = $this->db->query("CALL jabatan_view('$user')");
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
        $query = $this->db->query("SELECT * FROM opd_hdr");
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
        $query = $this->db->query("SELECT * FROM pegawai");
        $results = $query->getResult();
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

    // ----------------------------------------------------------------------------------------------------------------

    // satuan
    public function tampilsatuan()
    {
        $query = $this->db->query("SELECT s.id, s.satuan, s.opd_id, oh.nama_opd, oh.kode FROM satuan s
                                    INNER JOIN opd_hdr oh ON oh.id = s.opd_id
                                    WHERE oh.id = s.opd_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    // opd satuan
    public function selectopdsatuan()
    {
        $query = $this->db->query("SELECT * FROM opd_hdr");
        $results = $query->getResult();
        return $results;
    }

    // opd satuan
    public function selectsatuan()
    {
        $query = $this->db->query("SELECT * FROM satuan");
        $results = $query->getResult();
        return $results;
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Periode
    public function tampilperiode()
    {
        $query = $this->db->query("SELECT sp.id, sp.periode_id, sp.tahun, p.kode FROM sub_periode sp
                                    JOIN periode p ON sp.periode_id = p.id
                                    WHERE sp.periode_id =  p.id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    public function selectperiode()
    {
        $query = $this->db->query("SELECT * FROM periode");
        $results = $query->getResult();
        return $results;
    }

    public function selectsubperiode()
    {
        $query = $this->db->query("SELECT * FROM sub_periode");
        $results = $query->getResult();
        return $results;
    }

    // ----------------------------------------------------------------------------------------------------------------

    // Periode
    public function tampilsub_periode()
    {
        $query = $this->db->query("SELECT * FROM sub_periode");
        $results = $query->getResult();
        return $results;
    }

    // ----------------------------------------------------------------------------------------------------------------

    // visi
    public function tampilvisi()
    {
        $query = $this->db->query("SELECT v.id, v.periode_id, v.no_urut, v.visi, p.kode FROM visi v
                                    INNER JOIN periode p ON p.id = v.periode_id
                                    WHERE p.id = v.periode_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    public function selectvisi()
    {
        $query = $this->db->query("SELECT * FROM visi");
        $results = $query->getResult();
        return $results;
    }

    // Misi
    public function tampilmisi()
    {
        $query = $this->db->query("SELECT m.id, m.misi, m.no_urut, v.id as visi_id, v.visi, v.no_urut 
                                            as no_urut_visi 
                                    FROM misi m
                                    INNER JOIN visi v ON v.id = m.visi_id
                                    WHERE v.id =  m.visi_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    public function selectmisi()
    {
        $query = $this->db->query("SELECT * FROM misi");
        $results = $query->getResult();
        return $results;
    }

    // Tujuan
    public function tampiltujuan()
    {
        $query = $this->db->query("SELECT tjo.tujuan_opd, tjo.opd_id, oh.nama_opd 
                                    FROM tujuan_opd tjo
                                    INNER JOIN opd_hdr oh ON oh.id = tjo.opd_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    public function selecttujuan()
    {
        $query = $this->db->query("SELECT * FROM tujuan_opd");
        $results = $query->getResult();
        return $results;
    }

    // sasaran
    public function tampilsasaran()
    {
        $query = $this->db->query("SELECT so.sasaran_opd, so.tujuan_opd_id, tjo.tujuan_opd 
                                    FROM sasaran_opd so
                                    INNER JOIN tujuan_opd tjo ON tjo.id = so.tujuan_opd_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    // opd satuan
    public function selectsasaranopd()
    {
        $query = $this->db->query("SELECT * FROM sasaran_opd");
        $results = $query->getResult();
        return $results;
    }

    // INDIKATOR
    // indikator tujuan
    public function tampilindikatorprogramopd()
    {
        $query = $this->db->query("SELECT * FROM indikator_program_opd");
        $results = $query->getResult();
        return $results;
    }

    // indikator sasaran
    public function tampilindikatorsasaranopd()
    {
        $query = $this->db->query("SELECT * FROM indikator_sasaran_opd");
        $results = $query->getResult();
        return $results;
    }
    public function tampiltargetindikatorsasaranopd()
    {
        $query = $this->db->query("SELECT tiso.indikator_sasaran_opd_id, tiso.satuan_id, tiso.sub_periode_id, tiso.target, s.satuan
                                    , sp.tahun, iso.indikator_sasaran_opd
                                    FROM target_indikator_sasaran_opd tiso
                                    INNER JOIN indikator_sasaran_opd iso ON iso.id = tiso.indikator_sasaran_opd_id
                                    LEFT JOIN satuan s ON s.id = tiso.satuan_id
                                    RIGHT JOIN sub_periode sp ON sp.id = tiso.sub_periode_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    // program

    public function tampilprogram()
    {
        $query = $this->db->query("SELECT po.nama_program_opd, po.indikator_sasaran_opd_id, iso.indikator_sasaran_opd
                                    FROM program_opd po
                                    INNER JOIN indikator_sasaran_opd iso ON iso.id = po.indikator_sasaran_opd_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    public function tampilindikatorprogram()
    {
        $query = $this->db->query("SELECT ipo.indikator_program_opd, ipo.program_opd_id, po.nama_program_opd
                                    FROM indikator_program_opd ipo
                                    INNER JOIN program_opd po ON po.id = ipo.program_opd_id
                                    ");
        $results = $query->getResult();
        return $results;
    }

    public function selectprogramopd()
    {
        $query = $this->db->query("SELECT * FROM program_opd");
        $results = $query->getResult();
        return $results;
    }

    public function selectindikatorsasaranopd()
    {
        $query = $this->db->query("SELECT * FROM indikator_sasaran_opd");
        $results = $query->getResult();
        return $results;
    }

    public function tampiltargetindikatorprogramopd()
    {
        $query = $this->db->query("SELECT * FROM target_indikator_program_opd ");
        $results = $query->getResult();
        return $results;
    }

    public function selectindikatorprogramopd()
    {
        $query = $this->db->query("SELECT * FROM indikator_program_opd");
        $results = $query->getResult();
        return $results;
    }

    public function selecttargetindikatorprogramopd()
    {
        $query = $this->db->query("SELECT * FROM target_indikator_program_opd ");
        $results = $query->getResult();
        return $results;
    }
}
