<!DOCTYPE html>
<html lang="en">
<head>
  <?= csrf_meta(); ?>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; E-Sakip Intan Jaya</title>

  <!-- General CSS Files -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/node_modules/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/node_modules/bootstrap-social/bootstrap-social.css')); ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/assets/css/style.css')); ?>">
  <link rel="stylesheet" href="<?= htmlentities(base_url('/template/assets/css/components.css')); ?>">

    <!-- animasi style sweet alert -->
    <link rel="stylesheet" href="<?= htmlentities(base_url('/switalert/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/switalert/sweetalert2.min.css')); ?>">

    <link rel="shortcut icon" href="<?= htmlentities(base_url('/assets/images/logo_intan_jaya.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?= htmlentities(base_url('/assets/images/logo_intan_jaya.ico')); ?>" type="image/x-icon">

    <script>
      window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
      ga('create', 'UA-146052-10', 'getbootstrap.com');
      ga('set', 'anonymizeIp', true);
      ga('send', 'pageview');
    </script>

    <style>
      
      .card-login{
        background-color: rgb(108, 69, 250);
      }
      h4{
        color: whitesmoke;
      }
      span{
        color: yellow;
        font-weight: bold;
      }
      label{
        color: whitesmoke!important;
      }
      .footer-login{
        color: whitesmoke!important;
      }
    </style>

</head>

<body id="login">
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 card-login">
          <div class="p-4 pl-5 pr-5 m-3 text-center">
            <img src="<?= htmlentities(base_url('/assets/images/logo_intan_jaya.ico')); ?>" alt="logo" width="80" class="shadow-light rounded-circle mb-4 mt-2 animate__animated animate__fadeInDown">
            <h4 class="font-weight-normal animate__animated animate__zoomIn">LogIn <span>Administrator</span></h4>
            <p class="text-title animate__animated animate__zoomIn">Gunakan akun anda untuk login?</p>

            <div id="user_tdk_aktif" data-user_tdk_aktif="<?= session()->getFlashdata('user_tdk_aktif');  ?>"></div>
            <div id="belum_regis" data-belum_regis="<?= session()->getFlashdata('belum_regis');  ?>"></div>
            <div id="password_salah" data-password_salah="<?= session()->getFlashdata('password_salah');  ?>"></div>
            <div id="belum_login" data-belum_login="<?= session()->getFlashdata('belum_login');  ?>"></div>
            <div id="logout" data-logout="<?= session()->getFlashdata('Logout');  ?>"></div>


            <form method="POST" action="<?= htmlentities(base_url('auth/prosesslogin')); ?>" class="needs-validation" novalidate="">
            <?= csrf_field(); ?>  
              <div class="form-group text-left animate__animated animate__zoomIn">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" tabindex="1" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
              </div>

              <div class="form-group text-left animate__animated animate__zoomIn" style="margin-top: -13px;">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div> -->

              <div class="form-group text-left">
                <a onclick="home()" style="cursor: pointer;" class="float-left mt-2 text-white animate__animated animate__zoomIn">
                  Back Home
                </a>
                <!-- <a onclick="home()" type="button" class="btn btn-light btn-lg btn-icon icon-right float-left  animate__animated animate__zoomIn">
                   <i class="fas fa-globe"></i> Home
                </a> -->
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right float-right animate__animated animate__zoomIn" tabindex="4">
                      Login
                </button>
              </div>

              <!-- <div class="mt-5 text-center">
                Don't have an account? <a href="auth-register.html">Create new one</a>
              </div> -->
            </form>

            <div class="text-center text-small footer-login animate__animated animate__zoomIn" style="margin-top: 121px;">
              Copyright &copy; Your Company. Made with 💙 by development
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" style="background-image: url(<?= base_url('assets/images/login/login3.jpg') ;?>);">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Welcome to E-Sakip</h1>
                <h5 class="font-weight-normal text-muted-transparent">Kabupaten Intan Jaya, Papua</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= htmlentities(base_url('/template/node_modules/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/node_modules/popper.js/dist/popper.min.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/assets/js/stisla.js')); ?>"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= htmlentities(base_url('/template/assets/js/scripts.js')); ?>"></script>
  <script src="<?= htmlentities(base_url('/template/assets/js/custom.js')); ?>"></script>

  <!-- Page Specific JS File -->

<!-- animasi sweet alert -->
<script src="<?= htmlentities(base_url('/switalert/jquery.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/switalert/sweetalert2.min.js')); ?>"></script>

<script>
    function home() {
        document.location.href="https://esakip.intanjayakab.go.id"
    }
</script>

<script>
var  password_salah = $('#password_salah').data('password_salah');
    if (password_salah) {
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
        title: password_salah
        })
    }
</script>
<script>
    var  user_tdk_aktif = $('#user_tdk_aktif').data('user_tdk_aktif');
        if (user_tdk_aktif) {
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
            title: user_tdk_aktif
            })
        }
</script>
<script>
    var  belum_regis = $('#belum_regis').data('belum_regis');
        if (belum_regis) {
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
            title: belum_regis
            })
        }
</script>
<script>
    var  belum_login = $('#belum_login').data('belum_login');
        if (belum_login) {
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
            title: belum_login
            })
        }
</script>



</body>
</html>
