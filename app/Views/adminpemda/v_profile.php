<?= $this->extend('template/default'); ?>

<?= $this->section('content'); ?>

<div class="section-header">
    <h1><?= $subtitle; ?></h1>
    
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <?php if(session()->hakakses == 0) : ?>
            <a href="<?= base_url('admin/dashboards'); ?>">Dashboard</a>
          <?php elseif(session()->hakakses == 1) : ?>
            <a href="<?= base_url('admin/dashboardp'); ?>">Dashboard</a>
          <?php elseif(session()->hakakses == 2) : ?>
            <a href="<?= base_url('admin/dashboardo'); ?>">Dashboard</a>
          <?php endif; ?>  
          
        </div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $subtitle; ?></div>
    </div>
    <div class="section-header-button">
        <!-- <form action="</?= base_url('master/f_users'); ?>" method="post">
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>TAMBAH BARU</span>
            </button>
        </form> -->
<!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-tambah" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-user"></i> Edit Profile
        </button>
    </div>
</div>
<div class="section-body">
              <h2 class="section-title">Hi, <?= $get->username ;?>!</h2>
              <p class="section-lead">
                Informasi tentang diri anda di halaman ini.
              </p>

              <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                  <div class="card profile-widget">
                    <div class="profile-widget-header text-center">
                      <img
                        alt="image"
                        src="<?= base_url() ;?>/assets/images/avatars/default.png"
                        class="rounded-circle profile-widget-picture"
                      />
                    </div>
                    <div class="profile-widget-description">
                      <div class="profile-widget-name">
                      <?= $get->username ;?>
                        <div class="text-muted d-inline font-weight-normal">
                          <div class="slash"></div>
                          Web Developer
                        </div>
                      </div>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non iste nemo repellendus commodi ipsum dignissimos, consectetur hic temporibus! Quo, assumenda!
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

<?= $this->endSection() ;?>
