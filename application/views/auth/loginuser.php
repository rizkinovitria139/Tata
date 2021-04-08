<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url("assets/img/apple-icon.png") ?>">
    <link rel="icon" type="image/png" href="<?= base_url("assets/img/favicon.png") ?>">
    <title>
        SMP NEGERI 2 MOJO
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="<?= base_url("assets/css/nucleo-icons.css") ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="<?= base_url("assets/css/blk-design-system.css?v=1.0.0") ?>" rel="stylesheet" />


<body class="register-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent ">
        <div class="container">
            <div class="navbar-translate">
                <!-- <a class="navbar-brand" href="https://demos.creative-tim.com/blk-design-system/index.html" rel="tooltip"
                    title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                    <span>BLK•</span> Design System
                </a> -->
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <!-- <a>
                                BLK•
                            </a> -->
                        </div>
                        <div class="col-6 collapse-close text-right">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header">
            <div class="page-header-image"></div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 mx-auto">
                            <div id="square7" class="square square-7"></div>
                            <div id="square8" class="square square-8"></div>
                            <div class="card card-register">
                                <div class="card-header">
                                    <img class="card-img" src="<?= base_url("assets/img/square1.png") ?>" alt="Card image">
                                    <h3 class="card-title ml-2">Login</h3>
                                </div>
                                <div class="card-body">

                                    <?= $this->session->flashdata('message'); ?>


                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <!-- <input id="btn_guru" class="btn btn-success" type="button" onclick="changeLogin('guru')" value="Guru">
                                        <input id="btn_siswa" class="btn btn-warning" type="button" onclick="changeLogin('siswa')" value="Siswa"> -->
                                        <!-- <input id="btn_bk" class="btn btn-info" type="button" onclick="changeLogin('guru_bk')" value="Guru BK"> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan username Anda" value="<?= set_value('username'); ?>">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tim-icons icon-lock-circle"></i>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-block btn-lg">Login</button>
                                    </form>
                                    <div class="text-center">
                                        <a href="<?= site_url('/'); ?>" class="btn btn-primary btn-block">Beranda</a>
                                    </div>
                                    <hr>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="register-bg"></div>
                        <div id="square1" class="square square-1"></div>
                        <div id="square2" class="square square-2"></div>
                        <div id="square3" class="square square-3"></div>
                        <div id="square4" class="square square-4"></div>
                        <div id="square5" class="square square-5"></div>
                        <div id="square6" class="square square-6"></div>
                    </div>
                </div>
            </div>

        </div>
        <!--   Core JS Files   -->
        <script src="<?= base_url("assets/js/core/jquery.min.js") ?>" type="text/javascript"></script>
        <script src="<?= base_url("assets/js/core/popper.min.js") ?>" type="text/javascript"></script>
        <script src="<?= base_url("assets/js/core/bootstrap.min.js") ?>" type="text/javascript"></script>
        <script src="<?= base_url("assets/js/plugins/perfect-scrollbar.jquery.min.js") ?>"></script>
        <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
        <script src="<?= base_url("assets/js/plugins/bootstrap-switch.js") ?>"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="<?= base_url("assets/js/plugins/nouislider.min.js") ?> " type="text/javascript"></script>
        <!-- Chart JS -->
        <script src="<?= base_url("assets/js/plugins/chartjs.min.js") ?>"></script>
        <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
        <script src="<?= base_url("assets/js/plugins/moment.min.js") ?>"></script>
        <script src="<?= base_url("assets/js/plugins/bootstrap-datetimepicker.js") ?>" type="text/javascript"></script>
        <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
        <script src="<?= base_url("assets/js/blk-design-system.min.js?v=1.0.0") ?>" type="text/javascript"></script>

        <!-- <script>
            $(document).ready(function() {

            });


            function changeLogin(btn) {
                if (btn == 'siswa') {
                    $('#btn_siswa').attr('class', 'btn btn-warning');
                    $('#btn_guru').attr('class', 'btn btn-info');
                    $('#form').attr('action', "<?= base_url('siswa') ?>");
                } else if (btn == 'guru') {
                    $('#btn_siswa').attr('class', 'btn btn-info');
                    $('#btn_guru').attr('class', 'btn btn-warning');
                    $('#form').attr('action', "<?= base_url('guru') ?>");
                }
            }
        </script> -->
</body>

</html>