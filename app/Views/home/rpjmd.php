<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url(); ?>/bootstrap5/css/bootstrap.min.css">
        <!-- animasi style sweet alert -->
        <link rel="stylesheet" href="<?= base_url(); ?>/aos-master/dist/aos.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/switalert/animate.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/ionicons201/css/ionicons.min.css">
        
        <title>Home</title>
        <script>
            window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
            ga('create', 'UA-146052-10', 'getbootstrap.com');
            ga('set', 'anonymizeIp', true);
            ga('send', 'pageview');
        </script>
    </head>
    <body>
    
        <!-- Navbar -->
        <!-- =================================================================================================================== -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand p-0 m-2" href="#">
                    <img src="<?= base_url() ;?>/assets/images/logo_intan_jaya.ico" alt="" width="50" height="50">
                </a>
                <a class="navbar-brand" href="#">Intan Jaya</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Aplikasi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laporan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Dokumentasi</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- ======================================================================================================================== -->
        <!-- Akhir Navbar -->


        <!-- jumbotron -->
        <style>
            .jumbotron {
                /* background: #232526; 
                background: -webkit-linear-gradient(to bottom, #414345, #232526); 
                background: linear-gradient(to bottom, #414345, #232526); */
                color: cornsilk;

                /* background: #AA076B;  
                background: -webkit-linear-gradient(to bottom, #61045F, #AA076B);  
                background: linear-gradient(to bottom, #61045F, #AA076B);  */

                /* background: #00416A; 
                background: -webkit-linear-gradient(to bottom, #FFE000, #799F0C, #00416A); 
                background: linear-gradient(to bottom, #FFE000, #799F0C, #00416A);  */

                /* background: #c31432; 
                background: -webkit-linear-gradient(to bottom, #240b36, #c31432); 
                background: linear-gradient(to bottom, #240b36, #c31432);  */

                background: #0f0c29;  
                background: -webkit-linear-gradient(to bottom, #24243e, #302b63, #0f0c29);  
                background: linear-gradient(to bottom, #24243e, #302b63, #0f0c29); 
            }
        </style>
        <!-- ========================================================================================================================== -->
        <section class="jumbotron bg-light aos-all" id="transcroller-body">
            <!-- <div class="p-5 mb-4"> -->
                <div class="aos-item py-5 aos-item__inner">
                    <h1 class="display-5 fw-bold text-center" data-aos="zoom-in">E-Sakip</h1>
                    <p class="col-md fs-3 mt-2 text-center" data-aos="fade-up">
                        Sistem Akuntabilitas Kinerja Instansi Pemerintahan
                    </p>
                    <p class="col-md fs-3 text-center" data-aos="zoom-in" style="margin-top: -7px;">
                        Pemerintah Kabupaten Intan Jaya
                    </p>
                    <div class="mx-auto d-grid col-1 aos-item__inner" data-aos="zoom-in">
                        <button type="button" onclick="login()" class="btn btn-outline-primary btn-lg"> <i class="fas fa-sign"></i> Login</button>
                    </div>
                </div>
                <!-- </div> -->
            </section>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0f0c29" fill-opacity="1" d="M0,64L60,96C120,128,240,192,360,208C480,224,600,192,720,149.3C840,107,960,53,1080,58.7C1200,64,1320,128,1380,160L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
        <!-- ========================================================================================================================== -->
        <!-- Akhir jumbotron -->

       <section class="container m-auto">
            <div class="aos-all" id="transcroller-body">

                <div class="row align-items-md-stretch aos-item">
                    <div class="col-md-3" data-aos="fade-right">
                        <div class="h-100 p-5 text-white bg-dark rounded-3 aos-item__inner">
                            <h2>RPJMD</h2>
                            <p></p>
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModalRpjmd">
                                Klik disini
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-down">
                        <div class="h-100 p-5 bg-light border rounded-3 aos-item__inner">
                            <h2>RENSTRA</h2>
                            <p></p>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalRenstra">
                                Klik disini
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-down">
                        <div class="h-100 p-5 text-white bg-dark rounded-3 aos-item__inner">
                            <h2>PK</h2>
                            <p>Perjanjian Kerja.</p>
                            <button class="btn btn-outline-light" type="button">Klik disini</button>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-left">
                        <div class="h-100 p-5 bg-light border rounded-3 aos-item__inner">
                            <h2>PELAPORAN</h2>
                            <p></p>
                            <button class="btn btn-outline-secondary" type="button">Klik disini</button>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3" data-aos="fade-left">
                        <div class="h-100 p-5 bg-light border rounded-3 aos-item__inner">
                            <h2>EVALUASI</h2>
                            <p></p>
                            <button class="btn btn-outline-secondary" type="button">Klik disini</button>
                        </div>
                    </div>
                </div>
            </div>
       </section>

       
        <section>
            <footer class="bd-footer py-5 mt-5 bg-light">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-3 mb-3">
                        <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
                        <img src="<?= base_url() ;?>/assets/images/logo_intan_jaya.ico" alt="" width="30" height="30">
                            <span class="fs-5"> Kabupaten Intan Jaya</span>
                        </a>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2">Designed and built with all the love in the world by the <a href="/docs/5.1/about/team/">Bootstrap team</a> with the help of <a href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.</li>
                            <li class="mb-2">Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a>, docs <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>.</li>
                            <li class="mb-2">Currently v5.1.3.</li>
                        </ul>
                        </div>
                        <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                        <h5>Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="/">Home</a></li>
                            <li class="mb-2"><a href="/docs/5.1/">Docs</a></li>
                            <li class="mb-2"><a href="/docs/5.1/examples/">Examples</a></li>
                            <li class="mb-2"><a href="https://themes.getbootstrap.com/">Themes</a></li>
                            <li class="mb-2"><a href="https://blog.getbootstrap.com/">Blog</a></li>
                        </ul>
                        </div>
                        <div class="col-6 col-lg-2 mb-3">
                        <h5>Guides</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="/docs/5.1/getting-started/">Getting started</a></li>
                            <li class="mb-2"><a href="/docs/5.1/examples/starter-template/">Starter template</a></li>
                            <li class="mb-2"><a href="/docs/5.1/getting-started/webpack/">Webpack</a></li>
                            <li class="mb-2"><a href="/docs/5.1/getting-started/parcel/">Parcel</a></li>
                        </ul>
                        </div>
                        <div class="col-6 col-lg-2 mb-3">
                        <h5>Projects</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap">Bootstrap 5</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev">Bootstrap 4</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/icons">Icons</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/rfs">RFS</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap-npm-starter">npm starter</a></li>
                        </ul>
                        </div>
                        <div class="col-6 col-lg-2 mb-3">
                        <h5>Community</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues">Issues</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions">Discussions</a></li>
                            <li class="mb-2"><a href="https://github.com/sponsors/twbs">Corporate sponsors</a></li>
                            <li class="mb-2"><a href="https://opencollective.com/bootstrap">Open Collective</a></li>
                            <li class="mb-2"><a href="https://bootstrap-slack.herokuapp.com/">Slack</a></li>
                            <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5">Stack Overflow</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </section>

        <!-- Modal Rpjmd -->
        <div class="modal fade" id="exampleModalRpjmd" tabindex="-1" aria-labelledby="exampleModalRpjmd" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalRpjmdLabel">RPJMD</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="periode" id="periode" aria-label="Default select example">
                                    <option selected>Pilih Periode</option>
                                    <option value="1">2021-2025</option>
                                    <option value="2">2025-2030</option>
                                    <option value="3">2030-2035</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Pilih</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Renstra -->
        <div class="modal fade" id="exampleModalRenstra" tabindex="-1" aria-labelledby="exampleModalRenstra" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalRenstraLabel">RENSTRA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="periode" id="periode" aria-label="Default select example">
                                    <option selected>Pilih Periode</option>
                                    <option value="1">2021-2025</option>
                                    <option value="2">2025-2030</option>
                                    <option value="3">2030-2035</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="tahun" id="tahun" aria-label="Default select example">
                                    <option selected>Pilih Tahun</option>
                                    <option value="1">2021</option>
                                    <option value="2">2022</option>
                                    <option value="3">2023</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Pilih</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

    </body>
</html>
