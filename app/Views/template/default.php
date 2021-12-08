<!DOCTYPE html>
<html lang="en">
<head>
  <?= csrf_meta(); ?>
  <meta charset="UTF-8">
  <meta name="keywords" content="administrator esakip intan jaya, administrator esakip intanjaya, administrator esakip intanjayakab">
  <meta name="description" content="Login Administrator e-Sakip kabupaten Intan Jaya">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= htmlentities($judul_web); ?> &mdash; e-SAKIP Intan Jaya</title>
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/node_modules/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
 <link rel="stylesheet" href="<?= htmlentities(base_url('/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>">

  <!-- animasi style sweet alert -->
  <link rel="stylesheet" href="<?= htmlentities(base_url('/switalert/animate.min.css')); ?>">
  <link rel="stylesheet" href="<?= htmlentities(base_url('/switalert/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/bootstrap5/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/template/node_modules/ionicons201/css/ionicons.min.css')); ?>">

    <!-- CSS Libraries -->
    <link rel="shortcut icon" href="<?= htmlentities(base_url('/assets/images/logo_intan_jaya.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?= htmlentities(base_url('/assets/images/logo_intan_jaya.ico')); ?>" type="image/x-icon">
    <link
      rel="stylesheet"
      href="<?= htmlentities(base_url('/template/node_modules/bootstrap-social/bootstrap-social.css')); ?>"
    />
    <link
      rel="stylesheet"
      href="<?= htmlentities(base_url('/template/node_modules/summernote/dist/summernote-bs4.css')); ?>"
    />

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/assets/css/style.css')); ?>">
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/assets/css/components.css')); ?>">

  <style>
    /* body{
      text-transform: uppercase;
    } */
  </style>
  
</head>

<body style="font-size: 12px;">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <!-- header -->
      <?= $this->include('template/header'); ?>
      <!-- akhir header -->
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
                <?php if ($get->hakakses == 0) : ?>
                    <a href="<?= htmlentities(base_url('admin/dashboards')); ?>" class="text-white" style="font-size: 18px;">E-SAKIP</a>
                <?php elseif ($get->hakakses == 1) : ?>
                    <a href="<?= htmlentities(base_url('admin/dashboardp')); ?>" class="text-white" style="font-size: 18px;">E-SAKIP</a>
                <?php elseif ($get->hakakses == 2) : ?>
                    <a href="<?= htmlentities(base_url('admin/dashboardo')); ?>" class="text-white" style="font-size: 18px;">E-SAKIP</a>
                <?php endif; ?>
            <!-- <a href="index.html">E-Sakip</a> -->
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
                <?php if ($get->hakakses == 0) : ?>
                    <a href="<?= htmlentities(base_url('admin/dashboards')); ?>">ES</a>
                <?php elseif ($get->hakakses == 1) : ?>
                    <a href="<?= htmlentities(base_url('admin/dashboardp')); ?>">ES</a>
                <?php elseif ($get->hakakses == 2) : ?>
                    <a href="<?= htmlentities(base_url('admi/dashboardo')); ?>">ES</a>
                <?php endif; ?>
            <!-- <a href="index.html">ES</a> -->
          </div>
          
          <!-- sidebar menu -->
          <?= $this->include('template/sidebar_menu'); ?>
          <!-- akhir sidebar menu -->

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <!-- <div class="section-header">
            <h1>Dashboard</h1>
          </div> -->

          <!-- <div class="section-body"> -->
                <!-- conten -->
                <?= $this->renderSection('content') ?>
                <!-- akhir conten -->
          <!-- </div> -->
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By Developer
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= htmlentities(base_url('/template/node_modules/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js')); ?>"></script>
  <!-- <script src="</?= base_url(); ?>/template/node_modules/popper.js/dist/popper.min.js"></script> -->
  <script src="<?= htmlentities(base_url('/template/node_modules/moment/min/moment.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/assets/js/stisla.js')); ?>"></script>

  <script src="<?= htmlentities(base_url('/template/node_modules/summernote/dist/summernote-bs4.js')); ?>"></script>

  <script src="<?= htmlentities(base_url('/template/node_modules/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
  <!-- Template JS File -->
  <script src="<?= htmlentities(base_url('/template/assets/js/scripts.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/assets/js/custom.js')); ?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?= htmlentities(base_url('/template/assets/js/page/modules-datatables.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/bootstrap5/js/bootstrap.bundle.min.js')); ?>"></script>

  <!-- Page Specific JS File -->

<script src="<?= htmlentities(base_url('/switalert/sweetalert2.min.js')); ?>"></script>

<script>
    var  berhasil = $('#berhasil').data('berhasil');
        if (berhasil) {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: berhasil
            })
        }
</script>
<script>
    var  sudah_ada = $('#sudah_ada').data('sudah_ada');
        if (sudah_ada) {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'warning',
            title: sudah_ada
            })
        }
</script>
<script>
    var  no_jabatan = $('#no_jabatan').data('no_jabatan');
        if (no_jabatan) {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'warning',
            title: no_jabatan
            })
        }
</script>
<script>
    var  update = $('#update').data('update');
        if (update) {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: update
            })
        }
</script>
<script>
    var  gagal = $('#gagal').data('gagal');
        if (gagal) {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'warning',
            title: gagal
            })
        }
</script>
<script>
    var  hapus = $('#hapus').data('hapus');
        if (hapus) {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: hapus
            })
        }

        $(document).on('click', '.btn-hapus', function(e){
        // hentikan aksi default
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang telah dihapus tidak dapat dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
        
    });
</script>
  
  
</body>
</html>
