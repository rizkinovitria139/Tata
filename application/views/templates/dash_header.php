<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/LOGO SMP.png') ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/owl.carousel/assets/dashboard/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/dashboard/css/style.css" rel="stylesheet">
    <!-- <link href="<?= base_url() ?>assets/dashboard/css/styles.css" rel="stylesheet"> -->

    <!-- =======================================================
  * Template Name: Selecao - v2.3.1
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
        <div class="container d-flex align-items-center">

            <div class="logo mr-2">
                <a href="<?= base_url('welcome') ?>">
                    <img src="<?= base_url('assets/images/LOGO SMP.png') ?>" alt="">
                </a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <div class="logo ml-2 mr-auto">
                <a href="<?= base_url('welcome') ?>">
                    <h1 class="text-light">Amoda</h1>
                </a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url('welcome') ?>">Home</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#fasilitas">Fasilitas</a></li>
                    <li><a href="#galery">Galery</a></li>

                    <li><a class="btn btn-info" href="<?= base_url('auth') ?>">Login</a></li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>Amoda</span></h2>
                    <p class="animate__animated fanimate__adeInUp">Desa Kranding, Kec. Mojo, Kab. Kediri Telp : (0354)478338
                        <br>E-Mail : uptdsmpnduamojo@ymail.com
                    </p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Visi</h2>
                    <p class="animate__animated animate__fadeInUp"> UNGGUL DALAM MUTU DILANDASI DISIPLIN, IMAN DAN TAQWA</p>
                    <a href="#visi" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Misi</h2>
                    <p class="animate__animated animate__fadeInUp">UNGGUL DALAM PENGEMBANGAN KURIKULUM</p>
                    <p class="animate__animated animate__fadeInUp">UNGGUL DALAM PROSES PEMBELAJARAN</p>
                    <a href="#visi" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>About</h2>
                <p>SMP Negeri 2 Mojo</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <div class="col-lg-6">
                    <p>
                        UPTD SMP NEGERI 2 MOJO yang diresmikan tanggal 30 Juli 1996 terletak di Desa Kranding, Kec. Mojo, Kab. Kediri.
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Sebelah timur berbatasan dengan perkebunan warga sekitar</li>
                        <li><i class="ri-check-double-line"></i> Sebelah barat berbatasan dengan Desa Ngadi</li>
                        <li><i class="ri-check-double-line"></i> Sebelah selatan berbatasan dengan Sungai Brantas yang merupakan batas antara Kabupaten Kediri dengan Kabupaten Tulungagung</li>
                        <li><i class="ri-check-double-line"></i> Sebelah utara berbatasan dengan Desa Maesan</li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Siswa yang bersekolah di UPTD SMP NEGERI 2 MOJO dari awal diresmikan sampai sekarang terus mengalami peningkatan yang signifikan. Dari situ, bisa kita simpulkan bahwa UPTD SMP NEGERI 2 MOJO terus melakukan perbaikan untuk memenuhi Standar Pelayanan Minimal (SPM) sehingga anak didiknya bisa belajar dengan tenang dan nyaman.
                        Di bawah ini profil lengkap UPTD SMP NEGERI 2 MOJO.
                    </p>
                    <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Visi Section ======= -->
    <section id="visi" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <p>SMP Negeri 2 Mojo</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <div class="col-lg-6">
                    <div class="section-title" data-aos="zoom-out">
                        <h2>Visi</h2>
                    </div>
                    <p>
                        UNGGUL DALAM MUTU DILANDASI DISIPLIN, IMAN DAN TAQWA
                    </p>
                    <br>
                    <div class="section-title" data-aos="zoom-out">
                        <h2>Misi</h2>
                    </div>
                    <ul>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM PENGEMBANGAN KURIKULUM</li>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM PROSES PEMBELAJARAN</li>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM KOMPETENSI LULUSAN</li>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM SDM PENDIDIKAN</li>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM SARANA DAN PRASARANA</li>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM MANAJEMEN SEKOLAH</li>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM STANDAR PENDIDIKAN SEKOLAH</li>
                        <li><i class="ri-check-double-line"></i>UNGGUL DALAM PENILAIAN PEMBELAJARAN</li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End Visi Section -->

    <!-- ======= Fasilitas Section ======= -->
    <section id="fasilitas" class="fasilitas">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Services</h2>
                <p>INFO</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box" data-aos="zoom-in-left">
                        <div class="icon"><i class="las la-basketball-ball" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href="http://sekolah.data.kemdikbud.go.id/index.php/chome/profil/C06371F4-8B18-E111-ACA6-F337A9676322">Profil Sekolah</a></h4>
                        <p class="description">Profil SMP Negeri 2 Mojo di website Kemendikbud</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                        <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
                        <h4 class="title"><a href="https://www.facebook.com/smpn2mojo/">Facebook</a></h4>
                        <p class="description">Halaman Facebook SMP Negeri 2 Mojo</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                        <div class="icon"><i class="las la-file-alt" style="color: #3fcdc7;"></i></div>
                        <h4 class="title"><a href="https://www.youtube.com/channel/UCQkNGzjCyHF1PFsgCzMFRxA">Youtube</a></h4>
                        <p class="description">Official Account Youtube SMP Negeri 2 Mojo</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Fasilitas Section -->

    <!-- ======= Galery Section ======= -->
    <section id="galery" class="galery">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Gallery</h2>
                <p>Gallery Sekolah</p>
            </div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/G.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/G.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/B.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/B.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/J.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/J.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/D.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/D.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/E.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/E.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/F.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/F.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/C.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/C.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/H.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/H.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/I.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/I.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('assets/images/A.jpg') ?>" title="Project Name">
                            <img class="img-fluid" src="<?= base_url('assets/images/A.jpg') ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pramuka</div>
                                <div class="project-name">Latihan Rutin Pramuka</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Galery Section -->


</body>