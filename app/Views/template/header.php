    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <img src="<?= base_url('/assets/images/logo_intan_jaya.ico'); ?>" width="40px" class="mr-2" alt="logo kabupaten">
          </ul>
          
          <div class="search-element">
            <h6 class="text-white" style="font-size: 13px;">PEMERINTAH KABUPATEN INTAN JAYA</h6>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url() ;?>/assets/images/avatars/default.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $get->username; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in</div>
              <?php if(session()->hakakses == 0) : ?>
                <a href="<?= base_url('user/profiles'); ?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
                <a href="<?= base_url('setting') ;?>" class="dropdown-item has-icon">
                  <i class="fas fa-cog"></i> Settings
                </a>
              <?php elseif(session()->hakakses == 1) : ?>
                <a href="<?= base_url('user/profilep'); ?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
              <?php elseif(session()->hakakses == 2) : ?>
                <a href="<?= base_url('user/profileo'); ?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
              <?php endif; ?>
              <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
    </nav>