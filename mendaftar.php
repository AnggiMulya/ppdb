<?php
include("con_db/connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM PENDAFTARAN PPDB ONLINE - SMA NEGERI 2 BANGKINANG KOTA</title>
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
                        <h3><a href="#">FORM PENDAFTARAN CALON SISWA</a></h3>
                        Lengkapi Form Regristasi Pendaftar Calon Siswa Baru
                        
                        <hr />


                        <?php
                        if (isset($_GET['st'])) {
                        ?>
                            <div class="tz-portfolio-project" style="background: green">
                                <a href="#">SUKSES !! Selamat Anda Berhasil Melakukan Registrasi. Anda Dapat Login Dengan Menggunakan Username dan Password Yang Anda Daftarkan</a>
                            </div>
                            <meta http-equiv="refresh" content="5;url=mendaftar#fc">
                            <?php
                        }


                        if (isset($_POST['tbdaftar'])) {

                            $naleng = str_replace("'", "`", $_POST['naleng']);
                            $email = str_replace("'", "`", $_POST['email']);
                            $username = str_replace("'", "`", $_POST['username']);
                            $password = str_replace("'", "`", $_POST['password']);
                            $repassword = str_replace("'", "`", $_POST['repassword']);
                            if (empty($naleng) || empty($username) || empty($password) || empty($repassword)) {
                            ?>
                                <div class="tz-portfolio-project">
                                    <a href="#">ERROR !! Maaf Data Yang Anda Inputkan Kosong. Wajib Isi Yang Ada Pesan "Requirded"</a>
                                </div>
                                <?php
                            } else {
                                if ($password != $repassword) {
                                ?>
                                    <div class="tz-portfolio-project">
                                        <a href="#">ERROR !! Password dengan Ulangi Password Yang Anda Inputkan Tidak Sama</a>
                                    </div>
                                    <?php
                                } else {
                                    $tpl_us = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where username='$username'"));
                                    if ($tpl_us > 0) {
                                    ?>
                                        <div class="tz-portfolio-project">
                                            <a href="#">ERROR !! Maaf Username Tersebut Telah Ada. Harap Inputkan Username Yang Lain</a>
                                        </div>
                                        <?php
                                    } else {
                                        $tp_id_reg = mysqli_fetch_row(mysqli_query($conn, "Select no_pendaftaran from tb_siswa order by auto_id desc limit 1"));
                                        $pc_id_reg = explode("-", $tp_id_reg[0]);
                                        $hs_id_reg = $pc_id_reg[1];
                                        $jum = $hs_id_reg + 1;
                                        $haskode = 0;
                                        if ($jum >= "001" && $jum <= "009") {
                                            $haskode = "PPDB21-00$jum";
                                        } elseif ($jum >= "010" && $jum <= "099") {
                                            $jum = $hs_id_reg + 1;
                                            $haskode = "PPDB21-0$jum";
                                        } else {
                                            $haskode = "PPDB21-$jum";
                                        }

                                        if (!empty($email)) {
                                            $tp_c_mail = mysqli_num_rows(mysqli_query($conn, "Select * from tb_siswa where email_aktif='$email'"));
                                            if ($tp_c_mail > 0) {
                                        ?>
                                                <div class="tz-portfolio-project">
                                                    <a href="#">ERROR !! Email Yang Anda Input Sudah Pernah Terdaftar. Silahkan Ulangi Kembali</a>
                                                </div>
                                            <?php
                                            } else {
                                                $enc_ps = sha1($password);
                                                $enc_ps2 = md5($enc_ps);

                                                $dt_entry = date("Y-m-d H:i:s");

                                                mysqli_query($conn, "Insert into tb_siswa set no_pendaftaran='$haskode', nama_siswa='$naleng', email_aktif='$email', username='$username', password='$enc_ps2', tgl_entry='$dt_entry', status='Baru', auto_id='$jum'");

                                            ?>
                                                <script type="text/javascript">
                                                    window.location = "mail?m=<?php echo "$email"; ?>&us=<?php echo "$username"; ?>&ps=<?php echo "$password"; ?>";
                                                </script>
                                            <?php
                                            }
                                        } else {
                                            $enc_ps = sha1($password);
                                            $enc_ps2 = md5($enc_ps);

                                            $dt_entry = date("Y-m-d H:i:s");

                                            mysqli_query($conn, "Insert into tb_siswa set no_pendaftaran='$haskode', nama_siswa='$naleng', email_aktif='$email', username='$username', password='$enc_ps2', tgl_entry='$dt_entry', status='Baru', auto_id='$jum'");
                                            ?>
                                            <div class="tz-portfolio-project" style="background: green">
                                                <a href="#">SUKSES !! Selamat Anda Berhasil Melakukan Registrasi. Anda Dapat Login Dengan Menggunakan Username dan Password Yang Anda Daftarkan</a>
                                            </div>
                                            <meta http-equiv="refresh" content="5;url=mendaftar#fc">
                        <?php


                                        }
                                    }
                                }
                            }
                        }
                        ?>

                        <form class="tz-map-form" action="mendaftar#fc" enctype="multipart/form-data" method="post">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>NAMA LENGKAP<span>(Requirded)</span></label>
                                <input type="text" name="naleng" class="tz-username form-control" placeholder="Nama Lengkap Siswa">

                                <label>EMAIL AKTIF<span>(Optional)</span></label>
                                <input type="text" name="email" class="tz-email form-control" placeholder="Email Aktif Siswa/Orang Tua Siswa (Tidak Wajib)">

                                <label>USERNAME<span>(Requirded)</span></label>
                                <input type="text" name="username" class="tz-subject form-control" placeholder="Masukkan Username Anda">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>PASSWORD<span>(Requirded)</span></label>
                                <input type="password" name="password" class="tz-subject form-control" placeholder="Masukkan Password Anda">

                                <label>ULANGI PASSWORD<span>(Requirded)</span></label>
                                <input type="password" name="repassword" class="tz-subject form-control" placeholder="Ulangi Lagi Password">
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" name="tbdaftar" value="DAFTAR" class="btn btn-default" style="background-color: red;color:white">
                            </div>
                        </form>
                        <div align="justify">
                            <font size="-2">* Disarankan email diisi dengan email yang aktif, karena informasi akan dikirim via email</font>
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
                                                                echo "$thn"; ?> </a>
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