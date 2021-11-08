<!doctype html>
<html lang="en">
  <head>
    <?= csrf_meta(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Kab. Intan_jaya</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">
    <link rel="stylesheet" href="<?= base_url(); ?>/bootstrap5/css/bootstrap.min.css">

    

    <!-- Bootstrap core CSS -->
    <!-- Favicons -->
<link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/ionicons201/css/ionicons.min.css">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo_intan_jaya.ico" type="image/x-icon">
<link rel="icon" href="<?= base_url(); ?>/assets/images/logo_intan_jaya.ico" type="image/x-icon">

<script type="text/javascript" src="<?= base_url() ;?>/chart/Chart.js"></script>

<script>
  window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
  ga('create', 'UA-146052-10', 'getbootstrap.com');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');
</script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      nav{
        display: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        .navbar-toggler{
          display:none;
        }
        h1{
          text-shadow: 1px 2px 1px indigo;
          /* font-size: 40px; */
        }
        .card{
          box-shadow: 20px 10px 20px -5px #94a6af;
        }
        .tombolLogin{
          position: relative;
          height: 60px;
          width: 200px;
          border: none;
          outline: none;
          color: white;
          background: #002bff;
          box-shadow: 20px 10px 20px 5px #94a6af;
          cursor: pointer;
          border-radius: 5px;
          font-size: 18px;
          font-family: 'Raleway', sans-serif;
        }
        .tombolLogin:before{
          position: absolute;
          content: '';
          top: -2px;
          left: -2px;
          height: calc(100% + 4px);
          width: calc(100% + 4px);
          border-radius: 5px;
          z-index: -1;
          opacity: 0;
          filter: blur(5px);
          background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
          background-size: 400%;
          transition: opacity .3s ease-in-out;
          animation: animate 20s linear infinite;
        }
        .tombolLogin:hover:before{
          opacity: 1;
        }
        .tombolLogin:hover:active{
          background: none;
        }
        .tombolLogin:hover:active:before{
          filter: blur(2px);
        }

        .btn-navigasi{
          position: relative;
          height: 30px;
          width: 80px;
          border: none;
          outline: none;
          color: white;
          background: rgb(108, 69, 250);
          cursor: pointer;
          border-radius: 5px;
          font-size: 15px;
          font-family: 'Raleway', sans-serif;
        }
        .btn-navigasi:before{
          position: absolute;
          content: '';
          top: -2px;
          left: -2px;
          height: calc(100% + 4px);
          width: calc(100% + 4px);
          border-radius: 5px;
          z-index: -1;
          opacity: 0;
          filter: blur(5px);
          background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
          background-size: 400%;
          transition: opacity .3s ease-in-out;
          animation: animate 20s linear infinite;
        }
        .btn-navigasi:hover:before{
          opacity: 1;
        }
        .btn-navigasi:hover:active{
          background: none;
        }
        .btn-navigasi:hover:active:before{
          filter: blur(2px);
        }

        .btn-menu{
          position: relative;
          text-align: center;
          height: 40px;
          width: 100px;
          border: none;
          outline: none;
          color: white;
          background: rgb(108, 69, 250);
          cursor: pointer;
          border-radius: 5px;
          font-size: 18px;
          font-family: 'Raleway', sans-serif;
        }
        .btn-menu:before{
          position: absolute;
          content: '';
          top: -2px;
          left: -2px;
          height: calc(100% + 4px);
          width: calc(100% + 4px);
          border-radius: 5px;
          z-index: -1;
          opacity: 0;
          filter: blur(5px);
          background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
          background-size: 400%;
          transition: opacity .3s ease-in-out;
          animation: animate 20s linear infinite;
        }
        .btn-menu:hover:before{
          opacity: 1;
        }
        .btn-menu:hover:active{
          background: none;
        }
        .btn-menu:hover:active:before{
          filter: blur(2px);
        }
        @keyframes animate {
          0% { background-position: 0 0; }
          50% { background-position: 400% 0; }
          100% { background-position: 0 0; }
        }
        
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="collapse" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark shadow-sm fixed-top" style="background: rgb(108, 69, 250);">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="<?= base_url() ;?>/assets/images/logo_intan_jaya.ico" width="40" height="40" alt="">
        <strong style="margin-left: 10px;">e-SAKIP</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <nav class="collapse d-inline-flex mt-2 mt-md-0 ms-md-auto" id="navbarSupportedContent">
          <a class="me-3 py-2 text-dark text-decoration-none text-white btn-menu" href="#home">Home</a>
          <a class="me-3 py-2 text-dark text-decoration-none text-white btn-menu" href="#navigasi">Navigasi</a>
          <a class="me-3 py-2 text-dark text-decoration-none text-white btn-menu" href="#indikator">Indikator</a>
          <a class="py-2 text-dark text-decoration-none text-white btn-menu" href="#about">About</a>
        </nav>
    </div>
  </div>
</header>

<main id="home">

  <section class="py-5 text-center container-fluid text-white" style="background: rgb(108, 69, 250);">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light mt-5" data-aos="fade-down"
            data-aos-delay="0"
            data-aos-duration="1000"
            data-aos-easing="linier">KAB. <span style="color: yellow; font-weight: bold;">INTAN JAYA</span> </h1>
        <p class="lead" data-aos="fade-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-easing="linier">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p data-aos="flip-left"
            data-aos-delay="1000"
            data-aos-easing="ease-out-cubic"
            data-aos-duration="1000">
          <button onclick="login()" type="button" class="btn btn-primary my-5 tombolLogin">LOGIN</button>
        </p>
      </div>
    </div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgb(108, 69, 250)" fill-opacity="1" d="M0,224L48,197.3C96,171,192,117,288,128C384,139,480,213,576,213.3C672,213,768,139,864,128C960,117,1056,171,1152,181.3C1248,192,1344,160,1392,144L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

  <div class="album py-5" style="background-color: white;" id="navigasi">
    <div class="container pt-5" style="background-color: white;">
      <h2 class="display-6 text-center mb-4" data-aos="fade-down"> <span style="color: slateblue; font-weight: bold;">Nav</span>igasi</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3" data-aos="fade-down">
        <div class="col-sm-3"
            data-aos="fade-down"
            data-aos-delay="0"
            data-aos-duration="1000"
            ata-aos-easing="linear"
          >
          <div class="card shadow">
            <!-- <img src="</?= base_url() ;?>/assets/images/navigasi/event.png" height="150" alt="image"> -->

            <div class="card-body">
              <p class="card-text">RPJMD.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-navigasi" data-bs-toggle="modal" data-bs-target="#staticBackdropRpjmd">Lihat</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3"
            data-aos="fade-down"
            data-aos-delay="200"
            ata-aos-easing="linear"
            data-aos-duration="1000"
          >
          <div class="card shadow">
            <!-- <img src="</?= base_url() ;?>/assets/images/navigasi/planning.png" height="150" width="140" alt="image"> -->

            <div class="card-body">
              <p class="card-text">RENSTRA.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-navigasi" data-bs-toggle="modal" data-bs-target="#staticBackdropRenstra">Lihat</button>
                  <!-- <button type="button">Edit</button> -->
                </div>
                <!-- <small class="text-muted">9 mins</small> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3"
            data-aos="fade-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-easing="linier"
          >
          <div class="card shadow">
            <!-- <img src="</?= base_url() ;?>/assets/images/navigasi/pie-chart.png" height="140" alt="image"> -->

            <div class="card-body">
              <p class="card-text">PENGUKURAN KINERJA.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-navigasi">Lihat</button>
                  <!-- <button type="button">Edit</button> -->
                </div>
                <!-- <small class="text-muted">9 mins</small> -->
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3"
            data-aos="fade-down"
            data-aos-delay="600"
            data-aos-duration="1000"
            data-aos-easing="linier"
          >
          <div class="card shadow">
            <!-- <img src="</?= base_url() ;?>/assets/images/navigasi/seo-report.png" height="150" alt="image"> -->

            <div class="card-body">
              <p class="card-text">PELAPORAN.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-navigasi">Lihat</button>
                  <!-- <button type="button">Edit</button> -->
                </div>
                <!-- <small class="text-muted">9 mins</small> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3"
            data-aos="fade-down"
            data-aos-delay="800"
            data-aos-duration="1000"
            data-aos-easing="linier"
          >
          <div class="card shadow">
            <!-- <img src="</?= base_url() ;?>/assets/images/navigasi/question.png" height="150" alt="image"> -->

            <div class="card-body">
              <p class="card-text">EVALUASI.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-navigasi">Lihat</button>
                  <!-- <button type="button">Edit</button> -->
                </div>
                <!-- <small class="text-muted">9 mins</small> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="album py-5" style="background-color: white;" id="indikator">
    <div class="container pt-5">
      <h2 class="display-6 text-center mb-4" data-aos="fade-down"
            data-aos-delay="200"
            data-aos-duration="1000"
            data-aos-easing="linier" id="navigasi">Indi<span style="color: slateblue; font-weight: bold;">kator</span></h2>
          <div class="card mb-3 shadow" data-aos="fade-down"
            data-aos-delay="800"
            data-aos-duration="1000"
            data-aos-easing="linier">
            <div class="row g-0 p-5">
              	<div class="col" data-aos="fade-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-easing="linier">
                  <p class="card-title">Iindikator Tujuan</p>
                    <canvas id="myChart1"></canvas>
                </div>
              	<div class="col" data-aos="fade-down"
            data-aos-delay="1000"
            data-aos-duration="1000"
            data-aos-easing="linier">
                  <p class="card-title">Iindikator Sasaran</p>
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
          </div>
      </div>
  </div>

  <div class="album py-5" style="background-color: white;" id="about">
    <div class="container pt-5">
      <h2 class="display-6 text-center mb-4" data-aos="fade-down"
            data-aos-delay="100"
            data-aos-duration="1000"
            data-aos-easing="linier" id="navigasi">A<span style="color: slateblue; font-weight: bold;">bout</span> </h2>
          <div class="card mb-3 shadow" style="background-color: #E0E1DD;" data-aos="fade-down"
            data-aos-delay="400"
            data-aos-duration="1000"
            data-aos-easing="linier">
            <div class="row g-0">
              <div class="col" data-aos="fade-down"
            data-aos-delay="1500"
            data-aos-duration="1000"
            data-aos-easing="linier">
                <img src="<?= base_url() ;?>/assets/images/about/about.jpg" class="img-fluid" alt="...">
              </div>
              <div class="col" data-aos="fade-down"
            data-aos-delay="1000"
            data-aos-duration="1000"
            data-aos-easing="linier">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: bold;">e-SAKIP</h5>
                  <p class="card-text">E-Sakip adalah aplikasi Sistem Akuntabilitas Kinerja Instansi Pemerintah secara elektronik (E-SAKIP) yang bertujuan untuk memudahkan proses pemantauan dan pengendalian kinerja Satuan Kerja Perangkat Daerah (SKPD) di lingkungan Pemerintah Kabupaten Kudus dalam rangka meningkatkan akuntabilitas dan kinerja SKPD pada khususnya dan kinerja Pemerintah Kabupaten Kudus pada umumnya. Informasi yang dihasilkan dari aplikasi E-Sakip ini dapat diakses oleh publik, dengan harapan masyarakat dapat turut serta memantau, menilai dan memberikan masukan kepada Pemerintah Kabupaten Kudus bilamana terdapat SKPD yang kinerjanya kurang maksimal.</p>
                  <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Design &copy; website e-SAKIP, Kab. Intan Jaya</p>
  </div>
</footer>

<!--================================================ Modul ===========================================-->

<!-- Modal RPJMD-->
<div class="modal fade" id="staticBackdropRpjmd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropRpjmdLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropRpjmdLabel">RPJMD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-4 row">
          <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Awal</label>
          <div class="col-sm-8">
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select date</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal Akhir</label>
          <div class="col-sm-8">
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select date</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Pilih</button>
      </div>
    </div>
  </div>
</div>

<!-- Akhir Modul RPJMD -->


<!-- Modal RENSTRA-->
<div class="modal fade" id="staticBackdropRenstra" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropRenstraLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropRenstraLabel">RENSTRA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-4 row">
          <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Awal</label>
          <div class="col-sm-8">
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select date</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal Akhir</label>
          <div class="col-sm-8">
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select date</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Pilih</button>
      </div>
    </div>
  </div>
</div>

<!-- Akhir Modul RENSTRA -->


    <script src="<?= base_url(); ?>/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>

    <script>
      function login() {
        document.location.href="<?= base_url('auth/login') ;?>"
      }
    </script>
    <script>
      var ctx = document.getElementById("myChart1").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 23, 2, 3],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });
	</script>

  <script>
      var ctx = document.getElementById("myChart2").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 23, 2, 3],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });
	</script>
      
  </body>
</html>
