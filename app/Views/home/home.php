<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <?= csrf_meta(); ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="esakip intan jaya, esakip intanjaya, esakip intanjayakab">
    <title>e-SAKIP | Kab. Intan Jaya</title>
    <meta name="description" content="e-Sakip Intan Jaya adalah Sistem Akuntabilitas Kinerja Instansi Pemerintah Intan Jaya">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?= htmlentities(base_url('/assets/images/logo_intan_jaya.ico')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/bootstrap5/css/bootstrap.min.css')); ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/progressbar_barfiller.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/gijgo.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/animated-headline.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/style.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/assets_home/css/timeline.css')); ?>">

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url(); ?>/assets_home/assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo" style="color: white; font-weight: bold; font-size: 15px;">
                                    <a href="https://esakip.intanjayakab.go.id/"><img src="<?= base_url(); ?>/assets_home/img/logo/logo_intan_jaya.ico" alt="" width="40" height="40"></a>
                                    KAB. INTAN JAYA
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li class="active" ><a href="#">Home</a></li>
                                                <!-- <li><a href="courses.html">Courses</a></li> -->
                                                <li><a href="#about">About</a></li>
                                                <li><a href="#informasi">Informasi</a>
                                                    <ul class="submenu">
                                                        <!-- <li><a href="cascading.html">Cascading</a></li> -->
                                                        <li><a data-bs-toggle="modal" data-bs-target="#staticBackdropRpjmd">Rpjmd</a></li>
                                                        <li><a data-bs-toggle="modal" data-bs-target="#staticBackdropRenstra">Renstra</a></li>
                                                        <li><a href="pengukuran_kinerja.html">Pengukuran Kinerja</a></li>
                                                        <li><a href="pelaporan.html">Pelaporan</a></li>
                                                        <li><a href="evaluasi.html">Evaluasi</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#alur-esakip">Alur E-sakip</a></li>
                                                <!-- <li><a href="#contact">Contact</a></li> -->
                                                <!-- Button -->
                                                <!-- <li class="button-header margin-left "><a href="#" class="btn">Join</a></li> -->
                                                <li class="button-header"><a onclick="login()" class="btn btn3">Login e-SAKIP</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> 
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 text-center">
                                <div class="hero__caption">
                                    <h1 class="text-center" id="judul-esakip" data-animation="fadeInLeft" data-delay="0.5s">e-SAKIP<br></h1>
                                    <p data-animation="fadeInLeft" data-delay="0.7s">Sistem Akuntabilitas Kinerja
                                        Instansi Pemerintah secara elektronik yang bertujuan untuk memudahkan proses
                                        pemantauan dan pengendalian kinerja Satuan Kerja Perangkat Daerah (SKPD) di
                                        lingkungan Pemerintah Kabupaten Intan Jaya dalam rangka meningkatkan akuntabilitas
                                        dan kinerja SKPD pada khususnya dan kinerja Pemerintah Kabupaten Intan Jaya pada
                                        umumnya.</p>
                                    <!-- <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a> -->
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ed67ff" fill-opacity="1" d="M0,96L60,112C120,128,240,160,360,149.3C480,139,600,85,720,85.3C840,85,960,139,1080,138.7C1200,139,1320,85,1380,58.7L1440,32L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
        
        <!-- ? services-area -->
        <div class="services-area">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 kotak-informasi" data-aos="zoom-in-right"
                                data-aos-delay="100"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="<?= base_url(); ?>/assets_home/img/icon/location.png" width="50" height="50px" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Alamat</h3>
                                <p>Kab. Intan jaya, Provinsi Papua</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 kotak-informasi" data-aos="zoom-in-right"
                                data-aos-delay="200"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="<?= base_url(); ?>/assets_home/img/icon/email.png" width="50" height="50px" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>E-mail</h3>
                                <p>kabintanjaya@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 kotak-informasi" data-aos="zoom-in-left"
                                data-aos-delay="300"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="<?= base_url(); ?>/assets_home/img/icon/fax.png" width="50" height="50px" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Fax</h3>
                                <p>0552-xxxxx</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--? About Area-1 Start -->
        <!-- <section class="about-area1 fix pt-10">
            <div class="support-wrapper align-items-center">
                <div class="left-content1">
                    <div class="about-icon">
                        <img src="assets/img/icon/about.svg" alt="">
                    </div>
                    <div class="section-tittle section-tittle2 mb-55">
                        <div class="front-text">
                            <h2 class="">Learn new skills online with top educators</h2>
                            <p>The automated process all your website tasks. Discover tools and 
                                techniques to engage effectively with vulnerable children and young 
                            people.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Techniques to engage effectively with vulnerable children and young people.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Join millions of people from around the world  learning together.</p>
                        </div>
                    </div>

                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                        </div>
                    </div>
                </div>
                <div class="right-content1">
                    <div class="right-img">
                        <img src="assets/img/gallery/about.png" alt="">

                        <div class="video-icon" >
                            <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- About Area End -->
        <!--? top subjects Area Start -->
        <div class="topic-area section-padding40" id="informasi" style="padding-top: 120px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2 data-aos="fade-down"
                                data-aos-delay="0"
                                data-aos-duration="1000"
                                data-aos-easing="linier"> <span style="color: orange;">Info</span>rmasi</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-right"
                                data-aos-delay="200"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-topic text-center mb-30 kotak-informasi">
                            <div class="topic-img">
                                <img src="<?= base_url(); ?>/assets_home/img/gallery/informasi.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdropRpjmd">RPJMD</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-right"
                                data-aos-delay="400"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-topic text-center mb-30 kotak-informasi">
                            <div class="topic-img">
                                <img src="<?= base_url(); ?>/assets_home/img/gallery/informasi.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdropRenstra">RENSTRA</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-right"
                                data-aos-delay="600"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-topic text-center mb-30 kotak-informasi">
                            <div class="topic-img">
                                <img src="<?= base_url(); ?>/assets_home/img/gallery/informasi.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">PENGUKURAN KINERJA</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-right"
                                data-aos-delay="800"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-topic text-center mb-30 kotak-informasi">
                            <div class="topic-img">
                                <img src="<?= base_url(); ?>/assets_home/img/gallery/informasi.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">PELAPORAN</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-right"
                                data-aos-delay="1000"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <div class="single-topic text-center mb-30 kotak-informasi">
                            <div class="topic-img">
                                <img src="<?= base_url(); ?>/assets_home/img/gallery/informasi.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">EVALUASI</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic6.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic7.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic8.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mt-20">
                            <a href="courses.html" class="border-btn">View More Subjects</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        
        <!-- top subjects End -->
        <!--? About Area-3 Start -->
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(153, 102, 255, 0.2)" fill-opacity="1" d="M0,128L48,112C96,96,192,64,288,85.3C384,107,480,181,576,213.3C672,245,768,235,864,202.7C960,171,1056,117,1152,122.7C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> -->
        
        <section class="about-area3 fix" id="about" style="padding-top: 120px; margin-bottom: 100px;">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2 data-aos="fade-down"
                            data-aos-delay="0"
                            data-aos-duration="1000"
                            data-aos-easing="linier">Tentang <span style="color: orange;">e-SAKIP</span></h2>
                    </div>
                </div>
            </div>
            <div class="support-wrapper align-items-center">
                <div class="right-content3" data-aos="fade-up-right"
                                data-aos-delay="200"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                    <!-- img -->
                    <div class="right-img" style="-webkit-box-shadow: 0 35px 20px #777;
    -moz-box-shadow: 0 35px 20px #777;
    box-shadow: 0 15px 20px rgb(157, 21, 247); border-radius: 100px 0px 100px 130px;">
                        <img src="<?= base_url(); ?>/assets_home/img/gallery/about3.png" alt="">
                    </div>
                </div>
                <div class="left-content3" data-aos="fade-up-left"
                                data-aos-delay="400"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-20">
                        <div class="front-text">
                            <!-- <h2 class="">e-SAKIP</h2> -->
                            <p style="text-align: justify;">E-Sakip adalah aplikasi Sistem Akuntabilitas Kinerja Instansi Pemerintah secara
                                elektronik (E-SAKIP) yang bertujuan untuk memudahkan proses pemantauan dan pengendalian
                                kinerja Satuan Kerja Perangkat Daerah (SKPD) di lingkungan Pemerintah Kabupaten Intan Jaya
                                dalam rangka meningkatkan akuntabilitas dan kinerja SKPD pada khususnya dan kinerja
                                Pemerintah Kabupaten Intan Jaya pada umumnya. </p>
                            <p>Aplikasi E-Sakip ini menampilkan informasi secara waktu sebenarnya (real time) meliputi:
                            </p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">RPJMD (Rencana Pembangunan Jangka Panjang Daerah).</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">Rencana Strategis SKPD.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">Rencana Kinerja Tahunan tingkat SKPD dan kabupaten.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">Indikator Kinerja Utama tingkat SKPD dan kabupaten.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">Perjanjian Kinerja tingkat SKPD dan kabupaten.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">LKjIP (Laporan Kinerja Instansi Pemerintah).</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">Evaluasi Capaian Kinerja tingkat SKPD dan kabupaten.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="<?= base_url(); ?>/assets_home/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p style="text-align: justify;">Hasil Evaluasi dari Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

        <section class="intro" id="alur-esakip" style="padding-top: 120px;" data-aos="zoom-in"
                            data-aos-delay="0"
                            data-aos-duration="1000"
                            data-aos-easing="linier">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2 data-aos="fade-down"
                                data-aos-delay="0"
                                data-aos-duration="1000"
                                data-aos-easing="linier">Alur <span style="color: white;">e-SAKIP</span> &darr;</h2>
                        </div>
                    </div>
                </div>
                <!-- <h1 class="text-center">Vertical Timeline </h1> -->
            </div>
        </section>

        <section class="timeline">
            <ul>
                <li>
                    <div>
                        <time>Mulai</time>
                        <p style="font-weight: bold;">Penetapan perjanjian kinerja</p> <br>
                        <p style="margin-top: -30px; font-size: 14px; text-align: justify;">Masing-masing unit kerja menandatangani perjanjian kinerja.</p> 
                    </div>
                </li>
                <li>
                    <div>
                        <time>Awal Tahun</time>
                         <p style="font-weight: bold;">Menetapkan Target</p> <br>
                        <p style="margin-top: -30px; font-size: 14px; text-align: justify;">Seluruh unitkerja yang telah menandatangani perjanjian kinerja, menetapkan dan menginput target dari masing-masing indikator kinerja yang telah disepakati.</p>
                    </div>
                </li>
                <li>
                    <div>
                        <time>Triwulanan/Tahunan</time>
                         <p style="font-weight: bold;">Melaporkan Capaian</p> <br>
                        <p style="margin-top: -30px; font-size: 14px; text-align: justify;">Seluruh unitkerja yang telah menetapkan target masing-masing indikator kinerja utama, melaporkan capaian masing-masing indikator kinerja tersebut .</p>
                    </div>
                </li>
                <li>
                    <div>
                        <time>Verivikasi</time>
                         <p style="font-weight: bold;">Verifikasi Capaian</p> <br>
                        <p style="margin-top: -30px; font-size: 14px; text-align: justify;">Biro perencanaan memverifikasi capaian yang telah di laporkan oleh masing-masing unitkerja.</p>
                    </div>
                </li>
                <li>
                    <div>
                        <time>Akhir Tahun</time>
                         <p style="font-weight: bold;">Penetapan Nilai Kinerja Unit</p> <br>
                        <p style="margin-top: -30px; font-size: 14px; text-align: justify;">Setelah dilakukan verifikasi data capaian, selanjutnya capaian tersebut dihitung kemudian ditetapkan Nilai kinerja unit tersebut.</p>
                    </div>
                </li>
            </ul>
        </section>


        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(153, 102, 255, 0.2)" fill-opacity="1" d="M0,224L48,197.3C96,171,192,117,288,128C384,139,480,213,576,213.3C672,213,768,139,864,128C960,117,1056,171,1152,181.3C1248,192,1344,160,1392,144L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg> -->
        <!-- About Area End -->

        <!--?  Contact Area start  -->
        <!-- <section class="contact-section" id="contact" style="padding-top: 120px;">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2 data-aos="fade-down"
                                data-aos-delay="0"
                                data-aos-duration="1000"
                                data-aos-easing="linier"> <span style="color: orange;">Con</span>tact</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8" data-aos="fade-down"
                                data-aos-delay="200"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                        <form class="form-contact contact_form" action="contact_process.php" method="post"
                            id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30"
                                            rows="9" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter Message'"
                                            placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                            placeholder="Enter Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-3">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info" data-aos="fade-down"
                                data-aos-delay="300"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Kab. Intan Jaya, Papua.</h3>
                                <p>Kode POS, 98782</p>
                            </div>
                        </div>
                        <div class="media contact-info" data-aos="fade-down"
                                data-aos-delay="400"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+62 823xxxxxxxx</h3>
                                <p>Senin - Jumat 9am - 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info" data-aos="fade-down"
                                data-aos-delay="500"
                                data-aos-duration="1000"
                                data-aos-easing="linier">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>kabupatenintanjaya@gmail.com</h3>
                                <p>Kirimkan pertanyaan Anda kapan saja!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Contact Area End -->

        <!--? Team -->
        <!-- <section class="team-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Community experts</h2>
                        </div>
                    </div>
                </div>
                <div class="team-active">
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src="assets/img/gallery/team1.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Mr. Urela</a></h5>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src="assets/img/gallery/team2.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Mr. Uttom</a></h5>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src="assets/img/gallery/team3.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Mr. Shakil</a></h5>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src="assets/img/gallery/team4.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Mr. Arafat</a></h5>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src="assets/img/gallery/team3.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Mr. saiful</a></h5>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Services End -->
        <!--? About Area-2 Start -->
        <!-- <section class="about-area2 fix pb-padding">
            <div class="support-wrapper align-items-center">
                <div class="right-content2">
                    <div class="right-img">
                        <img src="assets/img/gallery/about2.png" alt="">
                    </div>
                </div>
                <div class="left-content2">
                    <div class="section-tittle section-tittle2 mb-20">
                        <div class="front-text">
                            <h2 class="">Take the next step
                                toward your personal
                                and professional goals
                            with us.</h2>
                            <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                            <a href="#" class="btn">Join now for Free</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- About Area End -->
    </main>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#4255A4" fill-opacity="1"
            d="M0,192L80,213.3C160,235,320,277,480,282.7C640,288,800,256,960,234.7C1120,213,1280,203,1360,197.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>
    <footer>
     <div class="footer-wrappper footer-bg">
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo mb-25">
                                    <a style="font-size: 22px; font-weight: bold;" href="index.html">e-SAKIP</a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p style="text-align: justify;">Sistem Akuntabilitas Kinerja Instansi Pemerintah Kabupaten Intan Jaya secara elektronik.</p>
                                    </div>
                                </div>
                                <!-- social -->
                                <!-- <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Halaman Terkait</h4>
                                <ul>
                                    <li><a href="#">Portal Intan Jaya</a></li>
                                    <li><a href="#">e-SURAT Intan Jaya</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <!-- <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <!-- <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | halaman website e-sakip intan jaya</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer> 
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>


<!--================================================ Modul ===========================================-->

<!-- Modal RPJMD-->
<div class="modal fade" id="staticBackdropRpjmd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropRpjmdLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropRpjmdLabel">RPJMD</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="card">
             <div class="card-body">
                 <div class="mb-4 row">
                    <label for="tgl-awal" class="col-sm-4 col-form-label">Tanggal Awal</label>
                    <div class="col-sm-8">
                        <select class="form-control">
                            <option>Pilih Tanggal Awal</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-8">
                        <select class="form-control">
                        <option selected>Pilih Tanggal Akhir</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select>
                    </div>
                </div>
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn">Pilih</button>
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
        <h3 class="modal-title" id="staticBackdropRenstraLabel">RENSTRA</h3>
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
        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn">Pilih</button>
      </div>
    </div>
  </div>
</div>

<!-- Akhir Modul RENSTRA -->


<script src="<?= htmlentities(base_url('/bootstrap5/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- JS here -->
<script src="<?= htmlentities(base_url('/assets_home/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= htmlentities(base_url('/assets_home/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/popper.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/bootstrap.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/timeline.js')); ?>"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.slicknav.min.js')); ?>"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= htmlentities(base_url('/assets_home/js/owl.carousel.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/slick.min.js')); ?>"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?= htmlentities(base_url('/assets_home/js/wow.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/animated.headline.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.magnific-popup.js')); ?>"></script>

<!-- Date Picker -->
<script src="<?= htmlentities(base_url('/assets_home/js/gijgo.min.js')); ?>"></script>
<!-- Nice-select, sticky -->
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.nice-select.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.sticky.js')); ?>"></script>
<!-- Progress -->
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.barfiller.js')); ?>"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.counterup.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/waypoints.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.countdown.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/hover-direction-snake.min.js')); ?>"></script>

<!-- contact js -->
<script src="<?= htmlentities(base_url('/assets_home/js/contact.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.form.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.validate.min.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/mail-script.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/jquery.ajaxchimp.min.js')); ?>"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="<?= htmlentities(base_url('/assets_home/js/plugins.js')); ?>"></script>
<script src="<?= htmlentities(base_url('/assets_home/js/main.js')); ?>"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src="<?= base_url() ;?>/vanilla-tilt/vanilla-tilt.min.js"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelectorAll(".kotak-informasi"), {
        max: 35,
        speed: 400,
    });
</script>

<script>
  AOS.init();
</script>

<script>
  function login() {
    document.location.href="<?= htmlentities(base_url('auth/login')) ;?>"
  }
</script>

</body>
</html>