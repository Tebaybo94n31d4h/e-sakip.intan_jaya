<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/aos-master/dist/aos.css">
<link rel="stylesheet" href="<?= base_url(); ?>/switalert/animate.min.css">

      <div class="section-header">
          <h1>Dashboard</h1>
      </div>
        <div class="row ">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 animate__animated animate__fadeInDown" id="dashboard">
              <div class="card card-primary card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas ion-ios-home"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Data OPD</h4>
                  </div>
                  <div class="card-body">
                      <?php 
                          $db      = \Config\Database::connect();
                          $builder = $db->table('opd_hdr','oh');
                          echo $builder->countAll('oh');
                      ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 animate__animated animate__fadeInDown">
              <div class="card card-danger card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-folder"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Data Jabatan</h4>
                  </div>
                  <div class="card-body">
                      <?php 
                          $db      = \Config\Database::connect();
                          $builder = $db->table('jabatan','j');
                          echo $builder->countAll('j');
                      ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 animate__animated animate__fadeInDown">
              <div class="card card-warning card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far ion-cube"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Data Bidang</h4>
                  </div>
                  <div class="card-body">
                      <?php 
                          $db      = \Config\Database::connect();
                          $builder = $db->table('bidang','b');
                          echo $builder->countAll('b');
                      ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 animate__animated animate__fadeInDown">
              <div class="card card-success card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas ion-cube"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Data Sub Bidang</h4>
                  </div>
                  <div class="card-body">
                      <?php 
                          $db      = \Config\Database::connect();
                          $builder = $db->table('sub_bidang','sb');
                          echo $builder->countAll('sb');
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <script src="<?= base_url(); ?>/bootstrap5/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(); ?>/jquery/jquery-3.6.0.js"></script>
        <script src="<?= base_url(); ?>/aos-master/dist/aos.js"></script>
        <script>
            function login() {
                document.location.href="<?= base_url('auth/login') ;?>"
            }
        </script>

        <script>
            AOS.init({
                easing: 'ease-in-out-sine'
            });
        </script>

<?= $this->endSection() ;?>