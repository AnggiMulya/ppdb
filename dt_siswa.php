<?php
session_start();
include("con_db/connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEK STATUS PENDAFTARAN ANDA - SMA NEGERI 2 BANGKINANG KOTA</title>
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
                        <h3><a href="#">FORM CEK DATA CALON SISWA BARU</a></h3>
                        Cek Data Calon Siswa dengan cara mengisikan nomor pendaftaran yang syah:
                    </div>
                    <hr />
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: justify;">
                        <!-- Start class tz-blog-item -->
                        <?php
                        if (isset($_POST['tblogin'])) {
                            $username = $_POST['username'];
                            $ab_qr = mysqli_query($conn, "Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas,status,id_siswa from tb_siswa where no_pendaftaran='$username' ");
                            $cek_data = mysqli_num_rows($ab_qr);
                            if ($cek_data > 0) {


                                $tp_dt_sis = mysqli_fetch_row($ab_qr);
                                $_SESSION['id_s'] = $tp_dt_sis[33];

                                $tp_sis = mysqli_fetch_row(mysqli_query($conn, "select pesan from tb_konfirmasi_pendaftaran where id_siswa='$tp_dt_sis[33]'"));

                                $t_by = mysqli_fetch_row(mysqli_query($conn, "Select status, id_pembayaran from tb_pembayaran where id_siswa='$tp_dt_sis[33]'"));

                                // $t_byr=mysqli_fetch_row(mysqli_query($conn,"Select keterangan from tb_konfirmasi_pembayaran where id_pembayaran='$t_by[1]'"));
                        ?>



                                <div class="tz-map-us">
                                    <article class="tz-blog-item">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <div class="tz-blog-thubnail"><br />
                                                <img src="siswa/foto_pp/<?php echo "$tp_dt_sis[27]"; ?>" style="width: 100%;" class="responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="tz-blog-description">

                                                <h2 class=""> <?php echo "$tp_dt_sis[1]"; ?> </small></h2>
                                                <strong>No. Pendaftaran</strong><br /> <?php echo "$tp_dt_sis[0]"; ?> <br /><br />
                                                <strong>NISN</strong><br /> <?php echo "$tp_dt_sis[2]"; ?> <br /><br />
                                                <strong>Tempat, Tanggal Lahir</strong><br /> <?php echo "$tp_dt_sis[3]"; ?>, <?php $tgfor = date("d-M-Y", strtotime($tp_dt_sis[4]));
                                                                                                                            echo "$tgfor"; ?><br /><br />
                                                <strong>Nama Ayah</strong><br /> <?php echo "$tp_dt_sis[17]"; ?><br /><br />
                                                <strong>Asal Sekolah</strong><br /> <?php echo "$tp_dt_sis[12]"; ?> <br /><br />
                                                <strong>Jumlah Nilai Ujian Sekolah Daerah (USD)</strong><br /> <?php echo "$tp_dt_sis[29]"; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                            <div class="tz-blog-description"><br />
                                                <strong>Status Pendaftaran</strong><br />
                                                <?php
                                                if ($tp_dt_sis[32] == "Baru") {
                                                ?>
                                                    <font style="background-color: yellow">&nbsp;&nbsp;<i class="fa fa-warning"></i> Sedang Diverifikasi&nbsp;&nbsp;</font>
                                                <?php
                                                } elseif ($tp_dt_sis[32] == "Terdaftar") {
                                                ?>
                                                    <font style="background-color: green;color:white">&nbsp;&nbsp;<i class="fa fa-check"></i> Terdaftar&nbsp;&nbsp;</font>

                                                    <br /><br /><strong>Catatan Pendaftaran</strong><br />
                                                <?php
                                                    echo "$tp_sis[0]";
                                                } else {
                                                ?>
                                                    <font style="background-color: blue;color:white">&nbsp;&nbsp;<i class="fa fa-edit"></i> Batal Mendaftar&nbsp;&nbsp;</font>
                                                    <br /><br /><strong>Catatan Pendaftaran</strong><br />
                                                <?php
                                                    echo "$tp_sis[0]";
                                                }
                                                ?>
                                                <hr />
                                            </div>
                                            <div class="tz-blog-description">

                                                <a href="login#fc"><button class="btn btn-success"><i class="fa fa-globe"></i> Dashboard</button></a>
                                                <a href="pdf_siswa?d=o_cr"><button class="btn btn-danger"><i class="fa fa-print"></i> Formulir Pendaftaran</button></a>
                                                <a href="trf_siswa?d=o_cr"><button class="btn btn-danger"><i class="fa fa-print"></i> Formulir Biaya</button></a>
                                            </div><br />
                                            <i class="fa fa-warning"> Bila PDF Tidak Terbaca. Coba Gunakan PDF Reader Lain (Foxit Reader, Slimpdf, dll)</i>
                                        </div>
                                    </article>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="tz-portfolio-project" style="text-align: center;">
                                    <a href="#">Error !! Maaf Nomor Pendaftaran Anda Tidak Ditemukan.</a>
                                </div>
                        <?php
                                include("frm_dt_sis.php");
                            }
                        } else {
                            include("frm_dt_sis.php");
                        }
                        ?>

                        <div class="p25 pt25" style="background-color: white">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-2" style="vertical-align: top"><br />

                                    </div>
                                    <div class="col-md-10" style="vertical-align: top">

                                    </div>

                                </div>
                            </div>
                        </div>


                        <br /><br />
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