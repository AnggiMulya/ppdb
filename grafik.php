<?php
include("con_db/connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUMPULAN GRAFIK - SMA NEGERI 2 BANGKINANG KOTA</title>
    <!--[if IE 8]>
    <link href="style_ie8.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fonts/awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href='css/owl.carousel.css' rel='stylesheet' type='text/css'>
    <link href='css/owl.theme.css' rel='stylesheet' type='text/css'>
    <link href="style.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>

    <header class="tz-header tz-header-2">
        <div class="tz-sign-in">
            <div class="container">
                <p>SELAMAT DATANG DI APLIKASI PPDB ONLINE SMA NEGERI 2 BANGKINANG KOTA</p>
            </div>
        </div>
        <div class="tz-customer-container">
            <div class="container">
                <div class="tz-header-content">
                    <h3 class="tz-logo pull-left">
                        <a href="#"><img alt="Images Logo" src="logo/LOGOOO.png"></a>
                    </h3>
                    <button type="button" class="tz-button-toggle btn-navbar pull-right" data-target=".nav-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php
                    include("top_menu.php");
                    ?>
                </div>
            </div><!-- End Content Main Header -->
        </div>
    </header>
    <!-- End class tz-header-2 -->

    <section class="tz-banner tz-banner-style2">
        <!-- Begin class banner style-3 -->
        <div class="tz-banner-style2">
            <div class="tz-slider-banner">
                <div class="tz-items">
                    <div class="tz-slider-images">
                        <img src="logo/smanda.jpg" alt="Images">
                    </div>
                    <div class="tz-banner-content">
                        <div class="container">
                            <!-- <small>NUMBER ONE</small> -->
                            <h4>SMA NEGERI 2 BANGKINANG KOTA</h4>
                            <span class="tz-under-line"></span>
                            <h6>Aplikasi PPDB Online</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  class banner style-3 -->
    </section>

    <!-- Begin section tz-introduce-univesity -->
    <section class="tz-introduce-univesity">
        <!-- Start class tzWrap -->
        <?php
        include("btn_4.php");
        ?>
        <div class="tzWrap">

            <div class="container" id="fc">
                <div class="row">
                    <div class="tz-map-us">
                        <h3><a href="#">GRAFIK SMA NEGERI 2 BANGKINANG KOTA</a></h3>
                        Grafik Calon Siswa Baru SMA NEGERI 2 BANGKINANG KOTA terdiri dari pilihan kelas, jumlah pendaftar dan jumlah gender
                        <hr />

                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12" id="fc">
                            <div class="tz-leader-content">
                                <div class="tz-our-leader-image">
                                    <?php
                                    $reg_i = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where kelas='ICT'"));
                                    $reg_r = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where kelas='Regular'"));
                                    ?>
                                    <script type="text/javascript">
                                        google.charts.load("current", {
                                            packages: ["corechart"]
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Task', 'Hours per Day'],
                                                ['ICT', <?php echo "$reg_i"; ?>],
                                                ['Regular', <?php echo "$reg_r"; ?>]
                                            ]);

                                            var options = {
                                                title: '',
                                                is3D: false,
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('piechart_cel'));
                                            chart.draw(data, options);
                                        }
                                    </script>

                                    <div id="piechart_cel" style="width: 100%"></div>
                                </div>
                                <h6>GRAFIK KELAS</h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12">
                            <div class="tz-leader-content">
                                <div class="tz-our-leader-image">
                                    <?php
                                    $reg_new = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where status='Baru'"));
                                    $reg_con = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where status='Terdaftar'"));
                                    $reg_rej = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where status='Batal Mendaftar'"));

                                    ?>
                                    <script type="text/javascript">
                                        google.charts.load("current", {
                                            packages: ["corechart"]
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Task', 'Hours per Day'],
                                                ['Belum Diproses', <?php echo "$reg_new"; ?>],
                                                ['Terdaftar', <?php echo "$reg_con"; ?>],
                                                ['Batal Mendaftar', <?php echo "$reg_rej"; ?>]
                                            ]);

                                            var options = {
                                                title: '',
                                                is3D: false,
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('piechart_pdf'));
                                            chart.draw(data, options);
                                        }
                                    </script>

                                    <div id="piechart_pdf" style="width: 100%"></div>
                                </div>
                                <h6>GRAFIK PENDAFTAR</h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12">
                            <div class="tz-leader-content">
                                <div class="tz-our-leader-image">
                                    <?php
                                    $reg_trm = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where status_pembayaran='Diterima'"));
                                    $reg_cdg = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where status_pembayaran='Cadangan'"));
                                    $reg_blm = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where status_pembayaran='Belum' and status='Terdaftar'"));

                                    ?>
                                    <script type="text/javascript">
                                        google.charts.load("current", {
                                            packages: ["corechart"]
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Task', 'Hours per Day'],
                                                ['Belum Diproses', <?php echo "$reg_blm"; ?>],
                                                ['Diterima', <?php echo "$reg_trm"; ?>],
                                                ['Cadangan', <?php echo "$reg_cdg"; ?>]
                                            ]);

                                            var options = {
                                                title: '',
                                                is3D: false,
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('piechart_pdfa'));
                                            chart.draw(data, options);
                                        }
                                    </script>

                                    <div id="piechart_pdfa" style="width: 100%"></div>
                                </div>
                                <h6>GRAFIK PENERIMAAN</h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12">
                            <div class="tz-leader-content">
                                <div class="tz-our-leader-image">
                                    <?php
                                    $reg_p = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where jenis_kelamin='1'"));
                                    $reg_w = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where jenis_kelamin='2'"));
                                    ?>
                                    <script type="text/javascript">
                                        google.charts.load("current", {
                                            packages: ["corechart"]
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Task', 'Hours per Day'],
                                                ['Pria', <?php echo "$reg_p"; ?>],
                                                ['Wanita', <?php echo "$reg_w"; ?>]
                                            ]);

                                            var options = {
                                                title: '',
                                                is3D: false,
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('piechart_sex'));
                                            chart.draw(data, options);
                                        }
                                    </script>

                                    <div id="piechart_sex" style="width: 100%"></div>
                                </div>
                                <h6>GRAFIK GENDER</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End section tz-introduce-univesity -->

    <!-- Begin section tz-portfolio-wrapper -->

    <!-- End section tz-lastest-event -->

    <!-- Begin section tz-contact-us -->

    <!-- End section tz-contact-us -->

    <!-- Begin Footer -->
    <section class="tz-introduce-univesity" style="width: 100%;background: #334878">
        <div class="tz-cource-services tz-cource-services-style-2">
            <ul>
                <li>
                    <div class="tz-background-color-4" style="text-align: center">
                        <h3 style="color: white">PPDB ONLINE</h3>
                        <hr />
                        <font color="white">Sistem Informasi Penerimaan Siswa Baru SMA NEGERI 2 BANGKINANG KOTA Merupakan sistem informasi berbasis web yang dibangun menggunakan Bahasa Pemrograman PHP database MySQL. Sedangkan Front End dari Sistem Informasi ini menggunakan Framework Materializecss dan Bootstrap agar tampilan terlihat Menarik</font>
                    </div>
                </li>
                <li>
                    <div class="tz-background-color-4" style="text-align: center">
                        <h3 style="color: white">MANFAAT</h3>
                        <hr style="border-color: #334878" />
                        <font color="white">Dengan adanya Sistem Informasi PPDB Online di SMA NEGERI 2 BANGKINANG KOTA diharapkan dapat membantu Calon siswa untuk melakukan Pendaftaran Tanpa harus datang ke sekolah untuk melakukan pendaftaran, menghemat biaya dan Waktu.</font>
                    </div>
                </li>
                <li>
                    <div class="tz-background-color-4" style="text-align: center">
                        <h3 style="color: white">MUPAT JUNIOR</h3>
                        <hr />
                        <font color="white">Merupakan salah satu Sekolah Menengah Keatas yang terletak di Bangkinang, Bangkinang Kota, Kampar. tentu saja sekolah ini tidak akan kalah dengan sekolah-sekolah lainnya yang mempunyai akreditasi lebih baik.</font>
                    </div>
                </li>
                <li>
                    <div class="tz-background-color-4" style="text-align: center">
                        <h3 style="color: white">LOKASI </h3>
                        <hr style="border-color: #334878" />
                        <font color="white">JL. A. Rahman Saleh No. 55<br /> Bangkinang, Bangkinang Kota<br /> Kabupaten Kampar, Riau 28463</font>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <footer class="tz-footer">

        <div class="tz-footer-address-site">
            <address> SMANDA BANGKINANG KOTA @ <?php date_default_timezone_set("Asia/Jakarta");
                                                                $thn = date("Y");
                                                                echo "$thn"; ?>
        </div>
    </footer>
    <!-- End Footer -->

    <script>
        var Desktop = 5,
            tabletportrait = 2,
            mobilelandscape = 1,
            mobileportrait = 1,
            resizeTimer = null;
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/resize.js"></script>
    <script src="js/custom-portfolio.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>