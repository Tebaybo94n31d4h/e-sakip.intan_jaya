<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $judul_web; ?> &mdash; E-Sakip Intan Jaya</title>

   <!-- General CSS Files -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">

</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
                <p style="font-size: 14px;">Halaman yang anda cari tidak ditemukan. <br>
                Anda tidak berhak mengakses halaman ini</p>
            </div>
            <div class="page-search">
              <div class="mt-3">
                <?php if ($get->hakakses == 0) : ?>
                    <a href="<?= base_url('admin/dashboards'); ?>">Kembali to Dashboard</a>
                <?php elseif ($get->hakakses == 1) : ?>
                    <a href="<?= base_url('admin/dashboardp'); ?>">Kembali to Dashboard</a>
                <?php elseif ($get->hakakses == 2) : ?>
                    <a href="<?= base_url('admin/dashboardo'); ?>">Kembali to Dashboard</a>
                <?php endif; ?>
                
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Web Developer 2018
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>/template/node_modules/popper.js/dist/popper.min.js"></script>
  <script src="<?= base_url(); ?>/template/node_modules/moment/min/moment.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>/template/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>/template/assets/js/custom.js"></script>

</body>
</html>
