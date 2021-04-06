<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>SMP NEGERI 2 MOJO</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">
    <!-- fevicon -->
    <link rel="icon" href="<?= base_url('assets/cssimages/fevicon.png') ?>" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.mCustomScrollbar.min.css') ?>">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css') ?>" media="screen">

</head>

<body>
    <!--header section start -->
    <div class="header_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo"><a href="#"><img src="assets/images/twh.png" style="max-width: 50%;"></a></div>
                </div>
                <div class="col-sm-5">
                    <div class="menu-area">
                        <nav class="navbar navbar-expand-lg ">
                            <!-- <a class="navbar-brand" href="#">Menu</a> -->
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <!-- iki digawe link menu ke halaman lain -->
                                        <a class="nav-link" href="<?= site_url('admin/dashboard/izin') ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.html">Sejarah</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="client.html">Galeri</a>
                                    </li>
                                    <li class="#" href="#">
                                        <a class="nav-link" href="blog.html">Visi Misi</a>
                                    </li>
                                    <!-- <li class="nav-item" href="#">
                                        <a class="nav-link" href="contact.html">Contact Us</a>
                                    </li> -->
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-4">
                    <ul class="top_button_section">
                        <!-- href iki ngelink e file nde njerone controller -->
                        <li><a class="login-bt active" href="<?= site_url('auth') ?>">Login</a></li>
                        <!-- <li><a class="login-bt" href="#">Register</a></li>
                        <li class="search"><a href="#"><img src="assets/images/search-icon.png" alt="#" /></a></li> -->
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="banner_section layout_padding">
                    <section>
                        <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="container">
                                        <div class="row marginii">
                                            <div class="col-md-5 col-sm-12">
                                                <!-- <div class="carousel-sporrt_text "> -->
                                                <!-- <h1 class="banner_taital">Go green</h1> -->
                                                <!-- <p class="lorem_text">It is a long established fact that a reader
                                                        will be distracted by the readable content of a page when
                                                        looking at its layout. The point of using Lorem Ipsum is that it
                                                        has a more-or-less normal distribution of letters,</p> -->
                                                <!-- <div class="ads_bt"><a href="#">Ads Now</a></div>
                                                    <div class="contact_bt"><a href="#">Contact Us</a></div> -->
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-md-7 mr-auto">
                                                <div class="panel-body">
                                                    <figure><img src="assets/images/wel.png" style="max-width: 100%;" />
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="row marginii">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="carousel-sporrt_text ">
                                                    <!-- <h1 class="banner_taital">Classified Ads</h1>
                                                    <p class="lorem_text">It is a long established fact that a reader
                                                        will be distracted by the readable content of a page when
                                                        looking at its layout. The point of using Lorem Ipsum is that it
                                                        has a more-or-less normal distribution of letters,</p> -->
                                                    <!-- <div class="ads_bt"><a href="#">Ads Now</a></div>
                                                    <div class="contact_bt"><a href="#">Contact Us</a></div> -->
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="img-box">
                                                    <figure><img src="assets/images/banner-img1.png" style="max-width: 100%;" /></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="row marginii">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="carousel-sporrt_text ">
                                                    <!-- <h1 class="banner_taital">Classified Ads</h1>
                                                    <p class="lorem_text">It is a long established fact that a reader
                                                        will be distracted by the readable content of a page when
                                                        looking at its layout. The point of using Lorem Ipsum is that it
                                                        has a more-or-less normal distribution of letters,</p> -->
                                                    <!-- <div class="ads_bt"><a href="#">Ads Now</a></div>
                                                    <div class="contact_bt"><a href="#">Contact Us</a></div> -->
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="img-box">
                                                    <figure><img src="assets/images/slid.png" style="max-width: 100%;" /></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
        <!--header section end -->

    </div>
    </div>