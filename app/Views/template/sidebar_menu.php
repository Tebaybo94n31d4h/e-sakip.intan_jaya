<!-- QUERY MENU -->

<!-- Pembungkus Menu -->
<ul class="sidebar-menu" style="font-size: 12px;">


    <!-- Tampilkan Query menu Superuser -->
    <!-- Jika hak akses sama dengan 0, tampilkan menu superuser -->
    <?php if ($get->hakakses == 0) : ?>

        <!-- =============================================================================================== -->
        <!-- Menu Dashboard Superuser -->
        <li class="nav-item dropdown <?= ($urimenu == 'dashboards') ? 'active' : ''; ?>">
            <a onclick="animasi()" href="<?= base_url('admin/dashboards'); ?>" class="nav-link"><i class="ion ion-ios-speedometer-outline"></i><span>DASHBOARD</span></a>
        </li>
        <!-- ================================================================================================================== -->

        <!-- ==================================================================================================== -->
        <!-- Menu Master Superuser -->
        <li class="nav-item dropdown <?= ($urimenu == 'hakakses') || ($urimenu == 'f_hakakses') || ($urimenu == 'f_edithakakses') || ($urimenu == 'users') || ($urimenu == 'f_users') || ($urimenu == 'opds') || ($urimenu == 'f_opds') || ($urimenu == 'f_editopds') || ($urimenu == 'bidangs') || ($urimenu == 'f_bidangs') || ($urimenu == 'f_editbidangs') || ($urimenu == 'subbidangs') || ($urimenu == 'f_subbidangs') || ($urimenu == 'f_editsubbidangs') || ($urimenu == 'jabatans') || ($urimenu == 'f_jabatans') || ($urimenu == 'f_editjabatans') || ($urimenu == 'pegawais') || ($urimenu == 'f_pegawais') || ($urimenu == 'f_editpegawais')  ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion ion-ios-folder-outline"></i> <span>MASTER</span></a>
            <ul class="dropdown-menu">
            <li class="<?= ($urimenu == 'hakakses') || ($urimenu == 'f_hakakses') || ($urimenu == 'f_edithakakses') ? 'active' : ''; ?>"><a onclick="hakakses()" class="nav-link" href="javascript:void()">Hak Akses</a></li>
            <li class="<?= ($urimenu == 'users') || ($urimenu == 'f_users') ? 'active' : ''; ?>"><a onclick="users()" class="nav-link" href="javascript:void()">User</a></li>
            <li class="<?= ($urimenu == 'opds') || ($urimenu == 'f_opds') || ($urimenu == 'f_editopds') || ($urimenu == 'bidangs') || ($urimenu == 'f_bidangs') || ($urimenu == 'f_editbidangs') || ($urimenu == 'subbidangs') || ($urimenu == 'f_subbidangs') || ($urimenu == 'f_editsubbidangs') || ($urimenu == 'jabatans') || ($urimenu == 'f_jabatans') || ($urimenu == 'f_editjabatans') ? 'active' : ''; ?>"><a onclick="opds()" class="nav-link" href="javascript:void()">OPD</a></li>
            <li class="<?= ($urimenu == 'pegawais') || ($urimenu == 'f_pegawais') || ($urimenu == 'f_editpegawais') ? 'active' : ''; ?>"><a onclick="pegawais()" class="nav-link" href="javascript:void()">Pegawai</a></li>
            </ul>
        </li>
        <!-- ==================================================================================================================== -->

    <?php endif; ?>
    <!-- ======================================================================================================================== -->

    <!-- ======================================================================================================================= -->
    <!-- Tampilkan Query Menu Dashboard dan periode berdasrkan hak akses pemda -->
    <?php if ($get->hakakses == 1) : ?>

        <li class="nav-item dropdown <?= ($urimenu == 'dashboardp') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/dashboardp'); ?>" class="nav-link"><i class="ion ion-ios-speedometer-outline"></i><span>DASHBOARD</span></a>
        </li>
        <li class=" nav-item dropdown <?= ($urimenu == 'periodep') || ($urimenu == 'f_periodep') || ($urimenu == 'f_editperiodep') || ($urimenu == 'sub_periodep') || ($urimenu == 'f_sub_periodep')  ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('periode/periodep'); ?>"> <i class="ion ion-ios-calendar-outline"></i> <span>PERIODE</span> </a>
        </li>

    <?php endif; ?>
    <!-- ======================================================================================================================== -->

    <!-- =========================================================================================================== -->
    <!-- Tampilkan Query Menu Dashboard dan Periode berdasrkan hak akses opd -->
    <?php if ($get->hakakses == 2) : ?>

        <li class="nav-item dropdown <?= ($urimenu == 'dashboardo') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/dashboardo'); ?>" class="nav-link"><i class="ion ion-ios-speedometer-outline"></i><span>DASHBOARD</span></a>
        </li>
        <li class=" nav-item dropdown <?= ($urimenu == 'periodep') || ($urimenu == 'f_periodep') || ($urimenu == 'f_editperiodep') || ($urimenu == 'sub_periodep') || ($urimenu == 'f_sub_periodep')  ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('periode/periodep'); ?>"> <i class="ion ion-ios-calendar-outline"></i> <span>PERIODE</span> </a>
        </li>
        
    <?php endif; ?>
    <!-- ==================================================================================================================== -->

    <?php foreach($menu as $menu) : ?>

        
            <!-- ================================================================================================================ -->
            <!-- Tampilkan Query Menu RPJMD -->
            <?php if ($menu->nama_modul == "RPJMD") : ?>

                <!-- Jika Is Aktif sama dengan satu, munculkan menu RPJMD -->
                <?php if ($menu->is_active == 1) : ?>
                    <li class="nav-item dropdown <?= ($urimenu == 'visip') || ($urimenu == 'f_visip') || ($urimenu == 'f_editvisip') || ($urimenu == 'misip') || ($urimenu == 'f_misip') || ($urimenu == 'tujuanp') || ($urimenu == 'f_tujuanp') || ($urimenu == 'sasaranp') || ($urimenu == 'f_sasaranp') || ($urimenu == 'indikatorp') || ($urimenu == 'f_indikatortujuanp') || ($urimenu == 'f_indikatorsasaranp') || ($urimenu == 'programp') || ($urimenu == 'f_programp') ? 'active' : ''; ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="ion ion-ios-paper-outline"></i> <span>RPJMD</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?= ($urimenu == 'visip') || ($urimenu == 'f_visip') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('rpjmd/visip'); ?>">Visi</a></li>
                            <li class="<?= ($urimenu == 'misip') || ($urimenu == 'f_misip') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('rpjmd/misip'); ?>">Misi</a></li>
                            <li class="<?= ($urimenu == 'tujuanp') || ($urimenu == 'f_tujuanp') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('rpjmd/tujuanp'); ?>">Tujuan</a></li>
                            <li class="<?= ($urimenu == 'sasaranp') || ($urimenu == 'f_sasaranp') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('rpjmd/sasaranp'); ?>">Sasaran</a></li>
                            <li class="<?= ($urimenu == 'indikatorp') || ($urimenu == 'f_indikatortujuanp') || ($urimenu == 'f_indikatorsasaranp') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('rpjmd/indikatorp'); ?>">Indikator</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

            <?php endif; ?>
            <!-- ==================================================================================================================== -->
            
            <!-- ==================================================================================================================== -->
            <!-- Tampilkan Query Menu Renstra -->
            <?php if ($menu->nama_modul == "RENSTRA") : ?>

                <!-- Jika Is Aktif sama dengan satu, munculkan menu RENSTRA -->
                <?php if ($menu->is_active == 1) : ?>
                    <li class="nav-item dropdown <?= ($urimenu == 'tujuano') || ($urimenu == 'f_tujuano') || ($urimenu == 'sasarano') || ($urimenu == 'f_sasarano') || ($urimenu == 'indikatorsasaranopd') || ($urimenu == 'f_indikatorsasaranopdo') || ($urimenu == 'targetindikatorsasaran') || ($urimenu == 'f_targetindikatorsasaran') || ($urimenu == 'indikatorprogramopd') || ($urimenu == 'f_indikatorprogramopd') || ($urimenu == 'targetindikatorprogram') || ($urimenu == 'f_targetindikatorprogram') || ($urimenu == 'programo') || ($urimenu == 'f_programo') || ($urimenu == 'indikatorprogramopd') || ($urimenu == 'f_indikatorprogramopd') ? 'active' : ''; ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="ion ion-ios-paper-outline"></i> <span>RENSTRA</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?= ($urimenu == 'tujuano') || ($urimenu == 'f_tujuano') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('renstra/tujuano'); ?>">Tujuan</a></li>
                            <li class="<?= ($urimenu == 'sasarano') || ($urimenu == 'f_sasarano') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('renstra/sasarano'); ?>">Sasaran</a></li>
                            <li class="<?= ($urimenu == 'indikatorsasaranopd') || ($urimenu == 'f_indikatorsasaranopdo') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('renstra/indikatorsasaranopd'); ?>">Indikator Sasaran</a></li>
                            <li class="<?= ($urimenu == 'targetindikatorsasaran') || ($urimenu == 'f_targetindikatorsasaran') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('renstra/targetindikatorsasaran'); ?>">Target Indikator Sasaran</a></li>
                            <li class="<?= ($urimenu == 'programo') || ($urimenu == 'f_programo') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('renstra/programo'); ?>">Program</a></li>
                            <li class="<?= ($urimenu == 'indikatorprogramopd') || ($urimenu == 'f_indikatorprogramopd') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('renstra/indikatorprogramopd'); ?>">Indikator Program</a></li>
                            <li class="<?= ($urimenu == 'targetindikatorprogram') || ($urimenu == 'f_targetindikatorprogram') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('renstra/targetindikatorprogram'); ?>">Target Indikator Program</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                
            <?php endif; ?>
            <!-- ======================================================================================================================== -->
            
            <!-- ==================================================================================================================== -->
            <!-- Tampilkan Query Menu Pengukuran -->
            <?php if ($menu->nama_modul == "PENGUKURAN") : ?>

                <!-- Jika Is Aktif sama dengan satu, munculkan menu PENGUKURAN -->
                <?php if ($menu->is_active == 1) : ?>
                    <li class="nav-item dropdown <?= ($urimenu == 'pengukuran') ? 'active' : ''; ?>">
                        <a href="<?= base_url('/pengukuran'); ?>" class="nav-link"><i class="ion ion-ios-pie-outline"></i><span>PENGUKURAN</span></a>
                    </li>
                <?php endif; ?>
                
            <?php endif; ?>
            <!-- ======================================================================================================================== -->
            
            <!-- ==================================================================================================================== -->
            <!-- Tampilkan Query Menu Pelaporan -->
            <?php if ($menu->nama_modul == "PELAPORAN") : ?>

                <!-- Jika Is Aktif sama dengan satu, munculkan menu PELAPORAN -->
                <?php if ($menu->is_active == 1) : ?>
                    <li class="nav-item dropdown <?= ($urimenu == 'pelaporan') ? 'active' : ''; ?>">
                        <a href="<?= base_url('/pelaporan'); ?>" class="nav-link"><i class="ion ion-ios-printer-outline"></i><span>PELAPORAN</span></a>
                    </li>
                <?php endif; ?>
                
            <?php endif; ?>
            <!-- ======================================================================================================================== -->
            
            <!-- ==================================================================================================================== -->
            <!-- Tampilkan Query Menu Evaluasi -->
            <?php if ($menu->nama_modul == "EVALUASI") : ?>

                <!-- Jika Is Aktif sama dengan satu, munculkan menu EVALUASI -->
                <?php if ($menu->is_active == 1) : ?>
                    <li class="nav-item dropdown <?= ($urimenu == 'evaluasi') ? 'active' : ''; ?>">
                        <a href="<?= base_url('/evaluasi'); ?>" class="nav-link"><i class="fas ion-ios-folder-outline"></i><span>EVALUASI</span></a>
                    </li>
                <?php endif; ?>

            <?php endif; ?>
            <!-- ======================================================================================================================== -->
            
            <!-- ==================================================================================================================== -->
            <!-- Tampilkan Query Menu Master -->
            <?php if ($menu->nama_modul == "MASTER") : ?>

                <?php if ($menu->is_active == 1) : ?>
                    <li class="nav-item dropdown <?= ($urimenu == 'bidangp') || ($urimenu == 'f_editbidangp') || ($urimenu == 'jabatanp') || ($urimenu == 'f_jabatanp') || ($urimenu == 'f_editjabatanp') || ($urimenu == 'pegawaip') || ($urimenu == 'satuanp') || ($urimenu == 'f_satuanp')  ? 'active' : ''; ?>">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion ion-ios-folder-outline"></i> <span>MASTER</span></a>
                    
                        <ul class="dropdown-menu">
                            <li class="<?= ($urimenu == 'bidangp') || ($urimenu == 'f_editbidangp') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('master/bidangp'); ?>">Bidang</a></li>
                            <li class="<?= ($urimenu == 'jabatanp') || ($urimenu == 'f_jabatanp') || ($urimenu == 'f_editjabatanp') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('master/jabatanp'); ?>">Jabatan</a></li>
                            <li class="<?= ($urimenu == 'pegawaip') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('master/pegawaip'); ?>">Pegawai</a></li>
                            <li class="<?= ($urimenu == 'satuanp') || ($urimenu == 'f_satuanp') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('master/satuanp'); ?>">Satuan</a></li>
                        </ul>
                    
                    </li>
                <?php endif; ?>

            <?php endif; ?>
            <!-- ======================================================================================================================== -->

        

    <?php endforeach;?>


</ul>

<!-- Akhir Query Menu -->

<script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>

<script>
  // =======================================================================
  // link superuser
  // ========================================================================
    function hakakses() {
        document.location.href="<?= base_url('master/hakakses') ;?>"
    }
    function users() {
        document.location.href="<?= base_url('master/users') ;?>"
    }
    function opds() {
        document.location.href="<?= base_url('master/opds') ;?>"
    }
    function pegawais() {
        document.location.href="<?= base_url('master/pegawais') ;?>"
    }
    // ===========================================================================
    // akhir link superuser
    // =========================================================================
</script>