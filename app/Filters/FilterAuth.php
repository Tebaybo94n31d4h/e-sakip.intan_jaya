<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        // jika user belum login
        if (!session()->logged_in) {
            // maka redirct ke halaman login
            session()->setFlashdata('belum_login', 'Anda belum login !');
            return redirect()->to('auth/login');

        // } else {
        //     $akses_id = session()->hak_akses_id;

        //     $uri = service('uri');
        //     $menu = $uri->getSegment(1);
            
        //     $this->db = \Config\Database::connect();
        //     $builder = $this->db->query("CALL hak_akses_view('nama_modul')");
        //     $queryMenu   = $builder->getRow();
        //     $menu_id = $queryMenu['id'];

        //     $userAccess = $this->db->get_where("CALL hak_akses_dtl_view('hak_akses_hdr_id' => '$akses_id', 'modul_id' => '$menu_id')");

        //     if($userAccess->num_rows() < 1)
        //     {
        //         redirect('auth/blocked');
        //     }
        // }
        }
        
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
            // $hakakses = session()->hakakses;

            // $uri = service('uri');
            // $menu = $uri->getSegment(1);
            
            // $this->db = \Config\Database::connect();
            // $builder = $this->db->query("CALL hak_akses_view('$hakakses')");
            // $queryMenu   = $builder->getRow();
            // $menu_id = $queryMenu['id'];

            // $userAccess = $this->db->get_where("CALL hak_akses_dtl_view('hak_akses_hdr_id' => '$hakakses', 'modul_id' => '$menu_id')");

            // if($userAccess->num_rows() < 1)
            // {
            //     redirect('auth/blocked');
            // }
    }
}
