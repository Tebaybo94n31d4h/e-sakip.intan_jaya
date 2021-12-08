<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions DASHBOARD SUPERUSER, PEMDA, OPD
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('home', 'home::index');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/prosesslogin', 'Auth::prosesslogin');
$routes->get('auth/logout', 'Auth::logout', ['filter' => 'filterauth']);
$routes->get('blocked/blocked', 'Blocked::blocked', ['filter' => 'filterauth']);
$routes->get('admin/dashboards', 'Admin::dashboards', ['filter' => 'filterauth']);
$routes->get('admin/dashboardp', 'Admin::dashboardp', ['filter' => 'filterauth']);
$routes->get('admin/dashboardo', 'Admin::dashboardo', ['filter' => 'filterauth']);

/*
 * --------------------------------------------------------------------
 * Route Definitions Master SUPERUSER
 * --------------------------------------------------------------------
 */
//---------------------------------------------------------------------------------
	// Master Routes Hak Akses
	$routes->get('master/hakakses', 'Master::hakakses', ['filter' => 'filterauth']);
	$routes->get('master/f_hakakses', 'Master::f_hakakses', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahhakakses', 'Master::proccesstambahhakakses', ['filter' => 'filterauth']);
	$routes->get('master/f_edithakakses/(:num)', 'Master::f_edithakakses/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccessedithakakses', 'Master::proccessedithakakses', ['filter' => 'filterauth']);

	//------------------------------------------------------------------------------------
	// Master Routes User
	$routes->get('master/users', 'Master::users', ['filter' => 'filterauth']);
	$routes->get('master/f_users', 'Master::f_users', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahusers', 'Master::proccesstambahusers', ['filter' => 'filterauth']);

	//---------------------------------------------------------------------------------------
	// Master Routes OPD
	$routes->get('master/opds', 'Master::opds', ['filter' => 'filterauth']);
	$routes->get('master/f_opds', 'Master::f_opds', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahopds', 'Master::proccesstambahopds', ['filter' => 'filterauth']);
	$routes->get('master/f_editopds/(:num)', 'Master::f_editopds/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditopds/(:num)', 'Master::proccesseditopds/$1', ['filter' => 'filterauth']);
	// ---------------------------------------------------------
	// Master Routes Bidang opd
	$routes->get('master/bidangs/(:num)', 'Master::bidangs/$1', ['filter' => 'filterauth']);
	$routes->get('master/f_bidangs/(:num)', 'Master::f_bidangs/$1', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahbidangs/(:num)', 'Master::proccesstambahbidangs/$1', ['filter' => 'filterauth']);
	$routes->get('master/f_editbidangs/(:num)', 'Master::f_editbidangs/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditbidangs/(:num)', 'Master::proccesseditbidangs/$1', ['filter' => 'filterauth']);
	$routes->delete('master/hapusbidangs/(:num)', 'Master::hapusbidangs/$1', ['filter' => 'filterauth']);
	//----------------------------------------------------------------
	// Master Routes Sub Bidang Opd
	$routes->get('master/subbidangs/(:num)', 'Master::subbidangs/$1', ['filter' => 'filterauth']);
	$routes->get('master/f_subbidangs/(:num)', 'Master::f_subbidangs/$1', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahsubbidangs/(:num)', 'Master::proccesstambahsubbidangs/$1', ['filter' => 'filterauth']);
	$routes->get('master/f_editsubbidangs/(:num)', 'Master::f_editsubbidangs/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditsubbidangs/(:num)', 'Master::proccesseditsubbidangs/$1', ['filter' => 'filterauth']);
	$routes->delete('master/hapussubbidangs/(:num)', 'Master::hapussubbidangs/$1', ['filter' => 'filterauth']);
	//----------------------------------------------------------------
	// Master Routes Jabatan Opd
	$routes->get('master/jabatans/(:num)', 'Master::jabatans/$1', ['filter' => 'filterauth']);
	$routes->get('master/f_jabatans/(:num)', 'Master::f_jabatans/$1', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahjabatans/(:num)', 'Master::proccesstambahjabatans/$1', ['filter' => 'filterauth']);
	$routes->get('master/f_editjabatans/(:num)', 'Master::f_editjabatans/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditjabatans/(:num)', 'Master::proccesseditjabatans/$1', ['filter' => 'filterauth']);
	$routes->delete('master/hapusjabatans/(:num)', 'Master::hapusjabatans/$1', ['filter' => 'filterauth']);
	// -------------------------------------------------------------------
	// Master Routes Pegawai Super
	$routes->get('master/pegawais', 'Master::pegawais', ['filter' => 'filterauth']);
	$routes->get('master/f_pegawais', 'Master::f_pegawais/$1/$2', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahpegawais', 'Master::proccesstambahpegawais', ['filter' => 'filterauth']);
	$routes->get('master/f_editpegawais/(:num)', 'Master::f_editpegawais/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditpegawais/(:num)', 'Master::proccesseditpegawais/$1', ['filter' => 'filterauth']);
	$routes->delete('master/hapuspegawais/(:num)', 'Master::hapuspegawais/$1', ['filter' => 'filterauth']);

// -------------------------------------------------------------------------------------------------------------------------------
/*
 * --------------------------------------------------------------------
 * Route Definitions Akhir Master admin superuser
 * --------------------------------------------------------------------
 */
// ----------------------------------------------------------------------------------------------------------------------------

/*
 * --------------------------------------------------------------------
 * Route Definitions Master admin pemda
 * --------------------------------------------------------------------
 */

// -----------------------------------------------------------------------------------------------------------------------------

	// Master Routes Bidang pemda
	$routes->get('master/bidangp', 'Master::bidangp', ['filter' => 'filterauth']);
	$routes->get('master/f_bidangp', 'Master::f_bidangp', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahbidangp', 'Master::proccesstambahbidangp', ['filter' => 'filterauth']);
	$routes->get('master/f_editbidangp/(:num)', 'Master::f_editbidangp/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditbidangp', 'Master::proccesseditbidangp', ['filter' => 'filterauth']);
	$routes->delete('master/hapusbidangp/(:num)', 'Master::hapusbidangp/$1', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// Master Routes Jabatan pemda
	$routes->get('master/jabatanp', 'Master::jabatanp', ['filter' => 'filterauth']);
	$routes->get('master/f_jabatanp', 'Master::f_jabatanp', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahjabatanp', 'Master::proccesstambahjabatanp', ['filter' => 'filterauth']);
	$routes->get('master/f_editjabatanp', 'Master::f_editjabatanp', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditjabatanp', 'Master::proccesseditjabatanp', ['filter' => 'filterauth']);
	$routes->delete('master/hapusjabatanp', 'Master::hapusjabatanp', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// Master Routes Pegawai pemda
	$routes->get('master/pegawaip', 'Master::pegawaip', ['filter' => 'filterauth']);
	$routes->get('master/f_pegawaip', 'Master::f_pegawaip', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahpegawaip', 'Master::proccesstambahpegawaip', ['filter' => 'filterauth']);
	$routes->get('master/f_editpegawaip/(:num)', 'Master::f_editpegawaip/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditpegawaip', 'Master::proccesseditpegawaip', ['filter' => 'filterauth']);
	$routes->delete('master/hapuspegawaip/(:num)', 'Master::hapuspegawaip/$1', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// Master Routes Satuan pemda
	$routes->get('master/satuanp', 'Master::satuanp', ['filter' => 'filterauth']);
	$routes->get('master/f_satuanp/(:num)', 'Master::f_satuanp/$1', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahsatuanp', 'Master::proccesstambahsatuanp', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// Master Routes periode pemda
	$routes->get('periode/periodep', 'Periode::periodep', ['filter' => 'filterauth']);
	$routes->get('periode/f_periodep', 'Periode::f_periodep', ['filter' => 'filterauth']);
	$routes->post('periode/proccesstambahperiodep', 'Periode::proccesstambahperiodep', ['filter' => 'filterauth']);
	$routes->get('periode/f_editperiodep/(:num)', 'Periode::f_editperiodep/$1', ['filter' => 'filterauth']);
	$routes->put('periode/proccesseditperiodep', 'Periode::proccesseditperiodep', ['filter' => 'filterauth']);
	$routes->delete('periode/hapusperiodep/(:num)', 'Periode::hapusperiodep/$1', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// Master Routes sub periode pemda
	$routes->get('master/sub_periodep/(:num)', 'Master::sub_periodep/$1', ['filter' => 'filterauth']);
	$routes->get('master/f_sub_periodep/(:num)', 'Master::f_sub_periodep/$1', ['filter' => 'filterauth']);
	$routes->post('master/proccesstambahsub_periodep', 'Master::proccesstambahsub_periodep', ['filter' => 'filterauth']);
	$routes->get('master/f_editperiodep/(:num)', 'Master::f_editperiodep/$1', ['filter' => 'filterauth']);
	$routes->put('master/proccesseditperiodep', 'Master::proccesseditperiodep', ['filter' => 'filterauth']);
	$routes->delete('master/hapusperiodep/(:num)', 'Master::hapusperiodep/$1', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// rpjmd Routes Visi pemda
	$routes->get('rpjmd/visip', 'Rpjmd::visip', ['filter' => 'filterauth']);
	$routes->get('rpjmd/f_visip', 'Rpjmd::f_visip', ['filter' => 'filterauth']);
	$routes->post('rpjmd/proccesstambahvisip', 'Rpjmd::proccesstambahvisip', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// rpjmd Routes Misi pemda
	$routes->get('rpjmd/misip', 'Rpjmd::misip', ['filter' => 'filterauth']);
	$routes->get('rpjmd/f_misip', 'Rpjmd::f_misip', ['filter' => 'filterauth']);
	$routes->post('rpjmd/proccesstambahmisip', 'Rpjmd::proccesstambahmisip', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// rpjmd Routes Tujuan pemda
	$routes->get('rpjmd/tujuanp', 'Rpjmd::tujuanp', ['filter' => 'filterauth']);
	$routes->get('rpjmd/f_tujuanp', 'Rpjmd::f_tujuanp', ['filter' => 'filterauth']);
	$routes->post('rpjmd/proccesstambahtujuanp', 'Rpjmd::proccesstambahtujuanp', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// rpjmd Routes Sasaran pemda
	$routes->get('rpjmd/sasaranp', 'Rpjmd::sasaranp', ['filter' => 'filterauth']);
	$routes->get('rpjmd/f_sasaranp', 'Rpjmd::f_sasaranp', ['filter' => 'filterauth']);
	$routes->post('rpjmd/proccesstambahsasaranp', 'Rpjmd::proccesstambahsasaranp', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// rpjmd Routes Indikator pemda
	$routes->get('rpjmd/indikatorp', 'Rpjmd::indikatorp', ['filter' => 'filterauth']);
	$routes->get('rpjmd/f_indikatortujuanp', 'Rpjmd::f_indikatortujuanp', ['filter' => 'filterauth']);
	$routes->get('rpjmd/f_indikatorsasaranp', 'Rpjmd::f_indikatorsasaranp', ['filter' => 'filterauth']);
	$routes->post('rpjmd/proccesstambahindikatortujuanp', 'Rpjmd::proccesstambahindikatortujuanp', ['filter' => 'filterauth']);
	$routes->post('rpjmd/proccesstambahindikatorsasaranp', 'Rpjmd::proccesstambahindikatorsasaranp', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------
/*
 * --------------------------------------------------------------------
 * Route Definitions Akhir Master admin pemda
 * --------------------------------------------------------------------
 */
// ------------------------------------------------------------------------------------------------------------------------

/*
 * --------------------------------------------------------------------
 * Route Definitions Master admin OPD
 * --------------------------------------------------------------------
 */
// ----------------------------------------------------------------------------------------------------------
	// renstra Routes Tujuan OPD
	$routes->get('renstra/tujuano', 'Renstra::tujuano', ['filter' => 'filterauth']);
	$routes->get('renstra/f_tujuano', 'Renstra::f_tujuano', ['filter' => 'filterauth']);
	$routes->post('renstra/proccesstambahtujuano', 'Renstra::proccesstambahtujuano', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// renstra Routes Sasaran OPD
	$routes->get('renstra/sasarano', 'Renstra::sasarano', ['filter' => 'filterauth']);
	$routes->get('renstra/f_sasarano', 'Renstra::f_sasarano', ['filter' => 'filterauth']);
	$routes->post('renstra/proccesstambahsasarano', 'Renstra::proccesstambahsasarano', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// renstra Routes Indikator sasaran
	$routes->get('renstra/indikatorsasaranopd', 'Renstra::indikatorsasaranopd', ['filter' => 'filterauth']);
	$routes->get('renstra/f_indikatorsasaranopdo', 'Renstra::f_indikatorsasaranopdo', ['filter' => 'filterauth']);
	$routes->get('renstra/proccesstambahindikatorsasaran', 'Renstra::proccesstambahindikatorsasaran', ['filter' => 'filterauth']);

	// ----------------------------------------------------------------------------------------------------------
	// renstra Routes target sasaran OPD
	$routes->get('renstra/targetindikatorsasaran', 'Renstra::targetindikatorsasaran', ['filter' => 'filterauth']);
	$routes->get('renstra/f_targetindikatorsasaran', 'Renstra::f_targetindikatorsasaran', ['filter' => 'filterauth']);
	$routes->post('renstra/proccesstambahtargetindikatorsasaranopdo', 'Renstra::proccesstambahtargetindikatorsasaranopdo', ['filter' => 'filterauth']);
	
	// renstra Routes Program OPD
	$routes->get('renstra/programo', 'Renstra::programo', ['filter' => 'filterauth']);
	$routes->get('renstra/f_programo', 'Renstra::f_programo', ['filter' => 'filterauth']);
	
	// renstra Routes indikator Program OPD
	$routes->get('renstra/indikatorprogramopd', 'Renstra::indikatorprogramopd', ['filter' => 'filterauth']);
	$routes->get('renstra/f_indikatorprogramopd', 'Renstra::f_indikatorprogramopd', ['filter' => 'filterauth']);
	$routes->post('renstra/proccesstambahindikatorprogramopdo', 'Renstra::proccesstambahindikatorprogramopdo', ['filter' => 'filterauth']);
	
	// renstra Routes target Program OPD
	$routes->get('renstra/targetindikatorprogram', 'Renstra::targetindikatorprogram', ['filter' => 'filterauth']);
	$routes->get('renstra/f_targetindikatorprogram', 'Renstra::f_targetindikatorprogram', ['filter' => 'filterauth']);
	$routes->post('renstra/proccesstambahtargetindikatorprogramopdo', 'Renstra::proccesstambahtargetindikatorprogramopdo', ['filter' => 'filterauth']);

// ------------------------------------------------------------------------------------------------------------------------
/*
 * --------------------------------------------------------------------
 * Route Definitions Akhir Master admin OPD
 * --------------------------------------------------------------------
 */
// ------------------------------------------------------------------------------------------------------------------------


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
