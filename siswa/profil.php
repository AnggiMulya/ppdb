<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        if($status=="Siswa")
            {
                ?>
                <!DOCTYPE html>
                <html>

                <head>
                    <!-- Meta, title, CSS, favicons, etc. -->
                    <meta charset="utf-8">
                    <title>Profil Sekolah</title>
                    <meta name="keywords" content="Panel Dashboard" />
                    <meta name="description" content="Panel Dashboard">
                    <meta name="author" content="Panel Dashboard">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                    <!-- Theme CSS -->
                    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

                    <!-- Favicon -->
                    <link rel="shortcut icon" href="assets/img/favicon.ico">

                    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                    <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                <![endif]-->

                </head>

                <body class="faq-page">


                    <!-- Start: Main -->
                    <div id="main">

                        <!-- Start: Header -->
                        <header class="navbar navbar-fixed-top bg-light">
                            <div class="navbar-branding">
                                <a class="navbar-brand" href="index"> <b>Panel</b>Dashboard
                                </a>
                                <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
                                <ul class="nav navbar-nav pull-right hidden">
                                    <li>
                                        <a href="#" class="sidebar-menu-toggle">
                                            <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <?php
                                include("top_acc.php");
                            ?>
                        </header>
                        <!-- End: Header -->

                        <!-- Start: Sidebar -->
                        <aside id="sidebar_left" class="nano nano-primary">
                            <div class="nano-content">
                                <!-- sidebar menu -->
                                <ul class="nav sidebar-menu">
                                    <li>
                                        <a href="index">
                                            <span class="glyphicons glyphicons-home"></span>
                                            <span class="sidebar-title">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="profil">
                                            <span class="glyphicons glyphicons-cup"></span>
                                            <span class="sidebar-title">Profile Sekolah</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-label pt15">Data Siswa</li>
                                    <li>
                                        <a href="lkp_form">
                                            <span class="glyphicons glyphicons-book"></span> 
                                            <span class="sidebar-title">Lengkapi Biodata</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="prt_form">
                                            <span class="glyphicons glyphicons-print"></span> 
                                            <span class="sidebar-title">Cetak Formulir</span>
                                        </a>
                                    </li>

                                   <!--  <li class="sidebar-label pt15">Rincian Biaya</li>
                                    <li>
                                        <a href="rc_by">
                                            <span class="glyphicons glyphicons-list"></span>
                                            <span class="sidebar-title">Rincian Biaya Masuk Sekolah</span>
                                        </a>
                                    </li> -->

                                    <!-- <li class="sidebar-label pt15">Data Pembayaran</li>
                                    <li>
                                        <a href="lkp_form_byr">
                                            <span class="glyphicons glyphicons-book"></span> 
                                            <span class="sidebar-title">Formulir Pembayaran</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="prt_form_byr">
                                            <span class="glyphicons glyphicons-print"></span> 
                                            <span class="sidebar-title">Cetak Pembayaran</span>
                                        </a>
                                    </li> -->


                                    <!-- <li class="sidebar-label pt15">Informasi Status</li>
                                    <li>
                                        <a href="sts_reg">
                                            <span class="glyphicons glyphicons-warning_sign"></span> 
                                            <span class="sidebar-title">Status Pendaftaran</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="sts_byr">
                                            <span class="glyphicons glyphicons-warning_sign"></span> 
                                            <span class="sidebar-title">Status Pembayaran</span>
                                        </a>
                                    </li>

                                    <hr />
                                    <li>
                                        <a href="logout">
                                            <span class="glyphicons glyphicons-pen"></span>
                                            <span class="sidebar-title">Logout</span>
                                        </a>
                                    </li> -->
                                </ul>
                                <div class="sidebar-toggle-mini">
                                    <a href="#">
                                        <span class="fa fa-sign-out"></span>
                                    </a>
                                </div>
                            </div>
                        </aside>

                        <!-- Start: Content -->
                        <section id="content_wrapper">

                                        <!-- Start: Topbar-Dropdown -->
                            <header id="topbar">
                                <div class="topbar-left">
                                    <ol class="breadcrumb">
                                        <li class="crumb-active">
                                            <a href="profil">Profile Sekolah</a>
                                        </li>
                                    </ol>
                                </div>
                                
                            </header>
                            <!-- End: Topbar -->

                            <!-- Begin: Content -->
                            <section id="content">

                                <div class="row mt30 center-block">
                                    <div class="col-md-9">
                                        <div class="panel br-t bw5 br-grey mn">
                                            <div class="panel-heading hidden">
                                                <span class="panel-icon"><i class="fa fa-pencil"></i>
                                                </span>
                                                <span class="panel-title"> Title</span>
                                            </div>

                                            <div class="panel-body pn">
                                                <div class="p25 br-b">
                                                    <div class="input-group input-group-merge input-hero mb30" style="text-align: justify;">
                                                        <h1><b>SMA NEGERI 2 BANGKINANG KOTA</b></h1>
                                                        Merupakan salah satu sekolah yang terletak di Kecamatan Bangkinang Kota, Kabupaten Kampar, Riau. Tentu saja sekolah ini tidak akan kalah dengan sekolah-sekolah lainnya yang mempunyai akreditasi lebih baik, hal ini bisa saja kita lihat dari bagaimana prestasi yang pernah dicapai oleh masing-masing sekolah, bisa saja sekolah yang mempunyai akreditas dibawah A bisa mencapai prestasi yang lebih banyak dibandingkan dengan yang pernah dicapai oleh sekolah yang mempunyai akreditasi yang lebih bagus, sehingga bagi adik-adik yang ingin masuk dalam sekolah ini harus mempunyai kepercayaan dan keyakinan bahwa sekolah ini mampu untuk mendatangkan prestasi yang ada untuk sekolah mereka masing-masing, dimana tentu saja juga harus menyesuaikan kemampuan dari peserta didik masing-masing.<br />
                                                        <h3><b>Profil Sekolah</b></h3>
                                                        SMA NEGERI 2 BANGKINANG KOTA merupakan salah satu sekolah yang terletak di Jalan Dr. A. Rahman Saleh No. 55 Bangkinang, sekolah ini sendiri dilengkapi dengan berbagai fasilitas yang ada dan juga melengkapi sekolah ini bagaimana layaknya sekolah ini sendiri. berbagai kegiatan sekolah yang juga ada dalam sekolah ini melengkapi kelengkapan sekolah ini sendiri, dimana hal itu adalah termasuk dalam kegiatan akademis maupun kegiatan yang berupa non akademis. Dimana semuanya itu adalah termasuk dari bagaimana sistem pengajaran yang ada dalam sekolah ini, juga bagaimana sistem guru yang ada dalam sekolah ini sendiri, sistem guru yang ada disini sendiri mampu melakukan beberapa hal yang sangat baik bagi prestasi sekolah maupun beberapa siswa yang ada disini sehingga membuat sekolah ini menjadi lebih baik dan lebih bagus lagi.<br />

                                                        <h3><b>Prestasi</b></h3>
                                                        Prestasi merupakan suatu hal yang sangat membanggakan sekolah, karena hal ini dapat membuat suatu nama sekolah menjadi baik atau bisa juga membuat nama suatu sekolah menjadi buruk, pada SMA NEGERI 2 BANGKINANG KOTA ini sendiri mempunyai beberapa prestasi, walaupun nama sekolah ini sangat jarang tersebut dalam lingkungan sekolah yang ada di seluruh Indonesia, tapi para adik-adik tidak boleh berkecil hati atau kecewa, karena pada dasarnya sekolah ini memiliki beberapa sistem pengajaran yang baik dan juga dapat membuat nilai ujian nasional menjadi sangat baik. Hal ini sendiri adalah berdasarkan dari bagaimana pengajaran yang ada pada sekolah ini yang membuat prestasi dari peserta didik menjadi meningkat. Prestasi yang pernah dicapai dalam sekolah ini sendiri adalah dalam bidang pelajaran seperti pada halnya olimpiade sains, cerdas cermat dan bidang-bidang akademis lainnya, sedangkan dalam bidang non akademis sendiri lebih mengutamakan bagaimana melakukan kegiatan olahraga, karena dalam hal ini sekolah ini sendiri sangat mengutamakan bagaimana kegiatan olahraga yang ada dalam sekolah ini sendiri, sehingga kita dapat melihat bahwa prestasi banyak dihasilkan dari kegiatan olahraga dan juga dapat menunjang berbagai prestasi yang ada dalam sekolah ini sendiri, sehingga membuat sekolah ini menjadi lebih baik lagi dan semakin baik lagi setiap tahunnya. 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                        <div class="panel mb10">
                                            <div class="panel-heading">
                                                <span class="panel-icon"><i class="fa fa-life-ring"></i>
                                                </span>
                                                <span class="panel-title">Informasi</span>
                                            </div>
                                            <div class="panel-body text-muted p10">
                                                <?php
                                                $ab_info=mysqli_query($conn,"Select informasi from tb_informasi order by tgl_input desc limit 5");
                                                while ($tp_info=mysqli_fetch_row($ab_info))
                                                {
                                                    ?>
                                                    <ul class="list-unstyled">
                                                        <i class="fa fa-warning"></i> <?php echo"$tp_info[0]";?>
                                                    </ul>
                                                    <?php
                                                }   
                                                ?>
                                            </div>
                                        </div>

                                        <div class="panel mb10">
                                            <div class="panel-heading">
                                                <span class="panel-icon"><i class="fa fa-life-ring"></i>
                                                </span>
                                                <span class="panel-title"> Kontak Kami</span>
                                            </div>

                                            <div class="list-group fs14 fw600">
                                                <a class="list-group-item" href="#"><i class="fa fa-globe fa-fw text-primary"></i>&nbsp; sman2bangkinangkota.sch.id</a>
                                                <a class="list-group-item" href="#"><i class="fa fa-phone fa-fw text-primary"></i>&nbsp;(0762) 3240422</a>
                                                <a class="list-group-item" href="#"><i class="fa fa-home fa-fw text-primary"></i>&nbsp; 
                                                JL. A. Rahman Saleh No. 55 Bangkinang, Bangkinang Kota, Kabupaten Kampar, Riau 28463</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </section>
                            <!-- End: Content -->

                        </section>

                        
                    </div>
                    <!-- End: Main -->

                    <!-- BEGIN: PAGE SCRIPTS -->

                    <!-- Google Map API -->
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

                    <!-- jQuery -->
                    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
                    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

                    <!-- Bootstrap -->
                    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

                    <!-- Theme Javascript -->
                    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
                    <script type="text/javascript" src="assets/js/main.js"></script>
                    <script type="text/javascript" src="assets/js/demo.js"></script>
                    <script type="text/javascript">
                        jQuery(document).ready(function() {

                            "use strict";

                            // Init Theme Core    
                            Core.init();

                            // Init Demo JS    
                            Demo.init();

                        });
                    </script>
                    <!-- END: PAGE SCRIPTS -->

                </body>

                </html>
     <?php
            }
        else
            {
                ?>
                <script type="text/javascript">
                    window.location="../index";
                </script>
                <?php
            }
    }
else
    {
        ?>
        <script type="text/javascript">
            window.location="../index";
        </script>
        <?php
    }
?>


