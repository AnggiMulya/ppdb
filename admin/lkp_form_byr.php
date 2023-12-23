<?php 
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $fi_id=$_SESSION['fi_id'];
        $status=$_SESSION['fi_st'];
        if($status=="Admin")
            {
                ?>
                <!DOCTYPE html>
                <html>

                <head>
                    <!-- Meta, title, CSS, favicons, etc. -->
                   <meta charset="utf-8">
                    <title>Verifikasi Data Pendaftar</title>
                    <meta name="keywords" content="Verifikasi Data Pendaftar" />
                    <meta name="description" content="Verifikasi Data Pendaftar">
                    <meta name="author" content="Verifikasi Data Pendaftar">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                    <!-- Required Plugin CSS -->
                    <link rel="stylesheet" type="text/css" href="assets/js/utility/highlight/styles/googlecode.css">

                    <!-- Required Plugin CSS -->
                    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
                    <link rel="stylesheet" type="text/css" href="vendor/plugins/daterange/daterangepicker.css">
                    <link rel="stylesheet" type="text/css" href="vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">
                    <link rel="stylesheet" type="text/css" href="vendor/plugins/tagmanager/tagmanager.css">

                    <!-- Theme CSS -->
                    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

                    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
                    <!-- Favicon -->
                    <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/media/css/dataTables.bootstrap.css">
                    <link rel="shortcut icon" href="assets/img/favicon.ico">

                    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                    <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                    <![endif]-->
                </head>

                <body class="form-input-page">

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
                                    
                                    <!-- <li class="sidebar-label pt15">Data Biaya Sekolah</li>
                                    <li>
                                        <a href="ip_biaya">
                                            <span class="glyphicons glyphicons-book"></span> 
                                            <span class="sidebar-title">Input Biaya</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="up_biaya">
                                            <span class="glyphicons glyphicons-delete"></span> 
                                            <span class="sidebar-title">Update Biaya</span>
                                        </a>
                                    </li> -->

                                    <li class="sidebar-label pt15">Data Pendaftar</li>
                                    <li>
                                        <a href="vf_siswa">
                                            <span class="glyphicons glyphicons-edit"></span> 
                                            <span class="sidebar-title">Verifikasi Pendaftar</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-label pt15">Data Pembayaran</li>
                                    <li class="active">
                                        <a href="lkp_form_byr">
                                            <span class="glyphicons glyphicons-edit"></span> 
                                            <span class="sidebar-title">Verifikasi Pembayaran</span>
                                        </a>
                                    </li>


                                    <li class="sidebar-label pt15">Data Pesan</li>
                                    <li>
                                        <a href="pro_mes">
                                            <span class="glyphicons glyphicons-envelope"></span> 
                                            <span class="sidebar-title">Proses Pesan</span>
                                        </a>
                                    </li>


                                    <li class="sidebar-label pt15">Proses Informasi</li>
                                    <li>
                                        <a href="in_info">
                                            <span class="glyphicons glyphicons-notes"></span> 
                                            <span class="sidebar-title">Input Informasi</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="up_info">
                                            <span class="glyphicons glyphicons-list"></span> 
                                            <span class="sidebar-title">List Informasi</span>
                                        </a>
                                    </li>

                                    <hr />
                                    <!-- <li>
                                        <a href="lg_user">
                                            <span class="glyphicons glyphicons-bell"></span>
                                            <span class="sidebar-title">Log User</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="logout">
                                            <span class="glyphicons glyphicons-pen"></span>
                                            <span class="sidebar-title">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="sidebar-toggle-mini">
                                    <a href="#">
                                        <span class="fa fa-sign-out"></span>
                                    </a>
                                </div>
                            </div>
                        </aside>
                        <!-- End: Sidebar -->

                        <!-- Start: Content -->
                        <section id="content_wrapper">
                            <!-- Start: Topbar -->
                            <header id="topbar">
                                <div class="topbar-left">
                                    <ol class="breadcrumb">
                                        <li class="crumb-active">
                                            <a href="lkp_form_byr">Verifikasi Data Pembayaran</a>
                                        </li>
                                    </ol>
                                </div>
                                
                            </header>
                            <!-- End: Topbar -->
                            <div id="content">
                                <div class="row">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Proses Verifikasi Data Pembayaran</span>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            if(isset($_GET['r_e']))
                                            {
                                                $r_e=$_GET["r_e"];
                                                $st3=$_GET['st'];
                                                mysqli_query($conn,"Update  tb_siswa set status_pembayaran='Belum' where id_siswa='$r_e'");
                                                mysqli_query($conn,"Delete From tb_pembayaran where id_siswa='$r_e'");
                                                  ?>
                                                
                                                <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <i class="fa fa-check pr10"></i>
                                                <strong>Selamat</strong> Anda Membuka 
                                                <a href="#" class="alert-link"> Verifikasi Kembali</a>.</div>
                                                <meta http-equiv="refresh" content="5;url=lkp_form_byr">
                                                <?php
                                            }

                                            if(isset($_GET['up']))
                                            {
                                                $up=$_GET['up'];
                                                 $st2=$_GET['st'];
                                               if(isset($_POST['tb_update']))
                                                    {
                                                        $namasiswa=str_replace("'", "`", $_POST['namasiswa']); 
                                                        $nisn=str_replace("'", "`", $_POST['nisn']);
                                                        $tempatlahir=str_replace("'", "`", $_POST['tempatlahir']);
                                                        $tgllahir=date("Y-m-d",strtotime($_POST['tgllahir']));
                                                        

                                                        if(isset($_POST['jk']))
                                                        {
                                                            $jk=$_POST['jk'];
                                                        }
                                                        else
                                                        {
                                                            $jk="-";
                                                        }
                                                        $agama=$_POST['agama'];
                                                        $anakke=$_POST['anakke'];
                                                        $dari=$_POST['dari'];
                                                        $statusdalamkeluarga=$_POST['statusdalamkeluarga'];
                                                        $alamatsiswa=str_replace("'", "`", nl2br($_POST['alamatsiswa']));
                                                        $telepon=str_replace("'", "`",$_POST['telepon']);
                                                        
                                                        $sekolahasal=str_replace("'", "`", $_POST['sekolahasal']);
                                                        $namasekolah="-";
                                                        $alamatsekolah=str_replace("'", "`", nl2br($_POST['alamatsekolah']));
                                                        $thnsttb=str_replace("'", "`", $_POST['thnsttb']);
                                                        $nosttb=str_replace("'", "`", $_POST['nosttb']);
                                                        
                                                        $namaayah=str_replace("'", "`", $_POST['namaayah']);
                                                        $namaibu=str_replace("'", "`", $_POST['namaibu']);
                                                        $alamatorangtua=str_replace("'", "`", nl2br($_POST['alamatorangtua']));
                                                        $teleponortu=str_replace("'", "`",$_POST['teleponortu']);
                                                        $kerjaayah=$_POST['kerjaayah'];
                                                        $kerjaibu=$_POST['kerjaibu'];
                                                        $namawali=str_replace("'", "`", $_POST['namawali']);
                                                        $alamatwali=str_replace("'", "`", nl2br($_POST['alamatwali']));
                                                        $telepowali=str_replace("'", "`",$_POST['telepowali']);
                                                        $kerjawali=$_POST['kerjawali'];

                                                        $pasfoto=str_replace("'", "`", $_FILES['pasfoto']);
                                                            $pasfotonm=str_replace("'", "`", $_FILES['pasfoto']['name']);
                                                            $pasfototy=str_replace("'", "`", $_FILES['pasfoto']['type']);
                                                            $pasfotosz=str_replace("'", "`", $_FILES['pasfoto']['size']);
                                                        $fotoskhu=str_replace("'", "`", $_FILES['fotoskhu']);
                                                            $fotoskhunm=str_replace("'", "`", $_FILES['fotoskhu']['name']);
                                                            $fotoskhuty=str_replace("'", "`", $_FILES['fotoskhu']['type']);
                                                            $fotoskhusz=str_replace("'", "`", $_FILES['fotoskhu']['size']);                                      
                                                        $jumlahnilai=str_replace("'", "`", $_POST['jumlahnilai']);
                                                        $email=str_replace("'", "`", $_POST['email']);

                                                        $pil_kelas=$_POST['pil_kelas'];

                                                        if(empty($nisn) || empty($namasiswa) || empty($tempatlahir) || empty($tgllahir) || $jk=="-" || $agama=="-" || empty($anakke)|| empty($dari) || $statusdalamkeluarga=="-" || empty($alamatsiswa) || empty($sekolahasal) || empty($namasekolah) || empty($alamatsekolah) || empty($namaayah) || empty($namaibu) || empty($alamatorangtua) || empty($teleponortu) || $kerjaayah=="-" || $kerjaibu=="-" || $pil_kelas=="-")
                                                            {
                                                                ?>
                                                                <div class="alert alert-danger alert-dismissable">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                <i class="fa fa-remove pr10"></i>
                                                                <strong>Error</strong> Data Siswa Anda Pilih Gagal Diupdate
                                                                <a href="#" class="alert-link"> Wajib Isi Pada Form Yang Ada Simbol *</a> Silahkan Coba Kembali</div>
                                                                <?php
                                                                include("form_lkp_sis_byr.php");
                                                            }
                                                        else
                                                            {
                                                                $tp_dt_ft=mysqli_fetch_row(mysqli_query($conn,"Select foto, foto_skhu from tb_siswa where id_siswa='$fi_id'"));
                                                                $ck=0;
                                                                if($pasfototy=="image/jpeg" || $pasfototy=="image/jpg" || $pasfototy=="image/png")
                                                                {
                                                                    $ck=1;
                                                                    $fn_pasfoto=$pasfotonm;
                                                                }
                                                                else
                                                                {
                                                                    $ck=2;
                                                                    $fn_pasfoto=$tp_dt_ft[0];
                                                                }


                                                                $cb=0;
                                                                if($fotoskhuty=="image/jpeg" || $fotoskhuty=="image/jpg" || $fotoskhuty=="image/png")
                                                                {
                                                                    $cb=1;
                                                                    $fn_skhu=$fotoskhunm;
                                                                }
                                                                else
                                                                {
                                                                    $cb=2;
                                                                     $fn_skhu=$tp_dt_ft[1];
                                                                }


                                                                // if($p_s=="ok")
                                                                $date_update=date("Y-m-d H:i:s");
                                                                 mysqli_query($conn,"update tb_siswa set nama_siswa='$namasiswa', nisn='$nisn', tempat_lahir='$tempatlahir', tgl_lahir='$tgllahir', jenis_kelamin='$jk', agama='$agama', anak_ke='$anakke', dari='$dari', status_dalam_keluarga='$statusdalamkeluarga', alamat_siswa='$alamatsiswa', telepon='$telepon', sekolah_asal='$sekolahasal', nama_sekolah='$namasekolah', alamat='$alamatsekolah', sttb_tahun='$thnsttb', sttb_nomor='$nosttb', nama_ayah='$namaayah', nama_ibu='$namaibu', alamat_ortu='$alamatorangtua', telepon_ortu='$teleponortu', kerja_ayah='$kerjaayah', kerja_ibu='$kerjaibu', nama_wali='$namawali', alamat_wali='$alamatwali', telepon_wali='$telepowali', pekerjaan_wali='$kerjawali', foto='$fn_pasfoto', foto_skhu='$fn_skhu', jumlah_nilai='$jumlahnilai', email_aktif='$email', kelas='$pil_kelas', tgl_update='$date_update' where id_siswa='$up'");

                                                                if($ck==1)
                                                                {
                                                                     move_uploaded_file($pasfoto['tmp_name'], "../siswa/foto_pp/".$fn_pasfoto);
                                                                }
                                                                
                                                                if($cb==1)
                                                                {
                                                                     move_uploaded_file($fotoskhu['tmp_name'], "../siswa/foto_skhu/".$fn_skhu);
                                                                }
                                                               
                                                                 ?>
                                                                <div class="alert alert-success alert-dismissable">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                <i class="fa fa-check pr10"></i>
                                                                <strong>Sukses!</strong> Selamat Data Siswa Yang Anda Pilih Berhasil Diupdate
                                                                <a href="#" class="alert-link">Silahkan Update Data Siswa Lain.</a>.</div>
                                                                <meta http-equiv="refresh" content="5;url=lkp_form_byr?st=<?php echo"$st2";?>">
                                                                <?php
                                                                include("form_lkp_sis_byr.php");
                                                            }

                                                    }
                                                else
                                                    {
                                                         include("form_lkp_sis_byr.php");
                                                    }
                                            }
                                            else
                                            {
                                                 if(isset($_GET['de']))
                                                {
                                                    $de=$_GET['de'];
                                                    $st=$_GET['st'];
                                                   
                                                    $tpl_pb=mysqli_fetch_row(mysqli_query($conn,"Select id_siswa from tb_pembayaran where id_siswa='$de'"));
                                                    mysqli_query($conn,"Delete From tb_siswa where id_siswa='$tpl_pb[0]'");
                                                    mysqli_query($conn,"Delete From tb_konfirmasi_pendaftaran where id_siswa='$tpl_pb[0]'");
                                                   
                                                    // mysqli_query($conn,"Delete From tb_konfirmasi_pembayaran where id_pembayaran='$de'");    
                                                    mysqli_query($conn,"Delete From tb_pembayaran where id_siswa='$de'");
                                                      ?>
                                                    <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <i class="fa fa-check pr10"></i>
                                                    <strong>Selamat</strong> Anda Berhasil Hapus Data Pendaftar
                                                    <a href="#" class="alert-link"> Silahkan Hapus yang Lain</a>.</div>
                                                    <meta http-equiv="refresh" content="5;url=lkp_form_byr?st=<?php echo"$st";?>">
                                                    <?php
                                                    // include("form_prt_sis.php");
                                                }

                                                if(isset($_GET['st_a']))
                                                {
                                                    $st=$_GET['st'];
                                                     ?>
                                                    <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <i class="fa fa-check pr10"></i>
                                                    <strong>Selamat</strong> Anda Berhasil Konfirmasi Data Pembayaran
                                                    <a href="#" class="alert-link"> Silahkan Konfirmasi yang Lain</a>.</div>
                                                    <meta http-equiv="refresh" content="5;url=lkp_form_byr?st=<?php echo"$st";?>">
                                                    <?php
                                                    // include("form_prt_byr.php");
                                                }

                                                if(isset($_GET['u']))
                                                {
                                                    $st=$_GET['st'];
                                                    $proc_es=$_GET['proc_es'];
                                                    $enctype=$_GET['enctype'];
                                                    $u=$_GET['u'];
                                                    $t_bu=mysqli_fetch_row(mysqli_query($conn,"Select id_siswa from tb_pembayaran where id_pembayaran='$u'"));
                                                    $e_cty=$_GET['e_cty'];
                                                    if(isset($_POST['tb_con']))
                                                    {
                                                        $tg_up=date("Y-m-d H:i:s");

                                                        $status_vf=$_POST['status_vf'];
                                                        $status_byr=$_POST['status_byr'];
                                                        $dn_pendidikan=str_replace("'", "`", $_POST['dn_pendidikan']);
                                                        $infaq=str_replace("'", "`", $_POST['infaq']);
                                                        $spp=str_replace("'", "`", $_POST['spp']);
                                                        $angsuran1=str_replace("'", "`", $_POST['angsuran1']);
                                                            $tg_angsuran1=$_POST['tg_angsuran1'];
                                                        $angsuran2=str_replace("'", "`", $_POST['angsuran2']);
                                                            $tg_angsuran2=$_POST['tg_angsuran2'];
                                                        $angsuran3=str_replace("'", "`", $_POST['angsuran3']);
                                                            $tg_angsuran3=$_POST['tg_angsuran3'];
                                                        $angsuran4=str_replace("'", "`", $_POST['angsuran4']);
                                                            $tg_angsuran4=$_POST['tg_angsuran4'];

                                                        if($status_vf=="-" || $status_byr=="-" || $spp=="-")
                                                        {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <i class="fa fa-check pr10"></i>
                                                            <strong>Error!</strong> Anda Gagal Konfirmasi Data Pembayaran (Harap Pastikan Isi Status dan SPP)
                                                            <a href="#" class="alert-link"> Silahkan Ulangi Kembali</a>.</div>
                                                            <meta http-equiv="refresh" content="5;url=lkp_form_byr?st=<?php echo"$st";?>">
                                                            <?php
                                                            include("form_prt_byr.php");
                                                        }
                                                        else
                                                        {
                                                            $spp3=preg_replace("/[^0-9]/","", $spp);
                                                            $ju_tot=$_POST['ju_tot'];
                                                             $jul=$ju_tot+$spp3;
                                                            mysqli_query($conn,"Update tb_pembayaran set id_admin='$fi_id', status_verifikasi='$status_vf', dana_pendidikan='$dn_pendidikan', infaq='$infaq', spp='$spp', angsuran1='$angsuran1', tgl_angsuran1='$tg_angsuran1', angsuran2='$angsuran2', tgl_angsuran2='$tg_angsuran2', angsuran3='$angsuran3', tgl_angsuran3='$tg_angsuran3', angsuran4='$angsuran4', tgl_angsuran4='$tg_angsuran4', tgl_entry='$tg_up', status='Sudah Diproses', status_pembayaran='Diproses', metode_pembayaran='$status_byr', jumlah='$jul' where id_siswa='$u'");

                                                            mysqli_query($conn,"Update tb_siswa set status_pembayaran='$status_vf' where id_siswa='$u'");
                                                           
                                                            $t_em=mysqli_fetch_row(mysqli_query($conn,"Select email_aktif from tb_siswa where id_siswa='$u'"));
                                                            if(empty($t_em[0]))
                                                            {
                                                                ?>
                                                                <div class="alert alert-success alert-dismissable">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                <i class="fa fa-check pr10"></i>
                                                                <strong>Selamat</strong> Anda Berhasil Konfirmasi Data Pembayaran
                                                                <a href="#" class="alert-link"> Silahkan Konfirmasi yang Lain</a>.</div>
                                                                <meta http-equiv="refresh" content="5;url=lkp_form_byr?st=<?php echo"$st";?>">
                                                                <?php
                                                                include("form_prt_byr.php");
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <script type="text/javascript">
                                                                    window.location="mail_byr?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st=<?php echo"$st";?>";
                                                                </script>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        include("form_prt_byr.php");
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4">
                                                                <a href="lkp_form_byr"><button class="btn btn-info" style="width: 100%"><i class="fa fa-plus"></i> Baru</button></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="lkp_form_byr?st=cf"><button class="btn btn-success" style="width: 100%"><i class="fa fa-check"></i> Diterima</button></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="lkp_form_byr?st=rj"><button class="btn btn-danger" style="width: 100%"><i class="fa fa-close"></i> Cadangan</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    include("form_vs_byr.php");
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End: Content -->

                        <!-- Start: Right Sidebar -->
                        
                        <!-- End: Right Sidebar -->

                    </div>
                    <!-- End: Main -->

                    <script type="text/javascript">  

                            

                            function addRow(tableID) {

                                var table = document.getElementById(tableID);

                                var rowCount = table.rows.length;
                                var row = table.insertRow(rowCount);

                                var colCount = table.rows[0].cells.length;

                                for (var i = 0; i < colCount; i++) {

                                    var newcell = row.insertCell(i);

                                    newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                                    //alert(newcell.childNodes);
                                    switch (newcell.childNodes[0].type) {
                                        case "text":
                                            newcell.childNodes[0].value = "";
                                            break;
                                        case "checkbox":
                                            newcell.childNodes[0].checked = true;
                                            break;
                                        case "select-one":
                                            newcell.childNodes[0].selectedIndex = 0;
                                            break;
                                        case "radio":
                                            newcell.childNodes[0].checked= false;
                                            break;
                                        case "textarea":
                                            newcell.childNodes[0].selectedIndex = 0;
                                            break;
                                    }

                                }
                            }

                            function deleteRow(tableID) {
                                try {
                                    var table = document.getElementById(tableID);
                                    var rowCount = table.rows.length;

                                    for (var i = 0; i <rowCount; i++) {
                                        var row = table.rows[i];
                                        var chkbox = row.cells[0].childNodes[0];
                                        if (null != chkbox && true == chkbox.checked) {
                                            if (rowCount <= 1) {
                                                alert("Tidak Dapat Mengapus Semua Row");
                                                break;
                                            }
                                            table.deleteRow(i);
                                            rowCount--;
                                            i--;
                                        }
                                    }
                                } catch (e) {
                                    alert(e);
                                }
                            }

                        </script>

                    <!-- Google Map API -->
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

                    <!-- jQuery -->
                    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
                    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

                    <!-- Bootstrap -->
                    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

                    <!-- Page Plugins via CDN -->
                    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
                    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

                     <!-- Datatables -->
                    <script type="text/javascript" src="vendor/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
                    <script type="text/javascript" src="vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

                    <!-- via local files 
                    <script type="text/javascript" src="vendor/plugins/globalize/src/core.js"></script>
                    <script type="text/javascript" src="vendor/plugins/moment/moment.min.js"></script> -->

                    <!-- Page Plugins -->
                    <script type="text/javascript" src="vendor/plugins/daterange/daterangepicker.js"></script>
                    <script type="text/javascript" src="vendor/plugins/datepicker/js/bootstrap-datetimepicker.js"></script>
                    <script type="text/javascript" src="vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
                    <script type="text/javascript" src="vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
                    <script type="text/javascript" src="vendor/plugins/tagmanager/tagmanager.js"></script>

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

                            // daterange plugin options
                            var rangeOptions = {
                                ranges: {
                                    'Today': [moment(), moment()],
                                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                                },
                                startDate: moment().subtract('days', 29),
                                endDate: moment()
                            }

                            // Init daterange plugin
                              $("#datepicker1").datepicker({
                                    prevText: '<i class="fa fa-chevron-left"></i>',
                                    nextText: '<i class="fa fa-chevron-right"></i>',
                                    dateFormat: 'dd-M-yy',
                                    showButtonPanel: false,
                                    changeYear:true,
                                    yearRange: "2020:2025"
                                });

                               $("#datepicker2").datepicker({
                                    prevText: '<i class="fa fa-chevron-left"></i>',
                                    nextText: '<i class="fa fa-chevron-right"></i>',
                                    dateFormat: 'dd-M-yy',
                                    showButtonPanel: false,
                                    changeYear:true,
                                    yearRange: "2020:2025"
                                });

                               $("#datepicker3").datepicker({
                                    prevText: '<i class="fa fa-chevron-left"></i>',
                                    nextText: '<i class="fa fa-chevron-right"></i>',
                                    dateFormat: 'dd-M-yy',
                                    showButtonPanel: false,
                                    changeYear:true,
                                    yearRange: "2020:2025"
                                });

                               $("#datepicker4").datepicker({
                                    prevText: '<i class="fa fa-chevron-left"></i>',
                                    nextText: '<i class="fa fa-chevron-right"></i>',
                                    dateFormat: 'dd-M-yy',
                                    showButtonPanel: false,
                                    changeYear:true,
                                    yearRange: "2020:2025"
                                });

                            $('#daterangepicker1').daterangepicker();

                            // Init daterange plugin
                            $('#daterangepicker2').daterangepicker(
                                rangeOptions,
                                function(start, end) {
                                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                }
                            );

                            // Init daterange plugin
                            $('#inline-daterange').daterangepicker(
                                rangeOptions,
                                function(start, end) {
                                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                }
                            );

                            // Init datetimepicker - fields
                            $('#datetimepicker1').datetimepicker();
                            $('#datetimepicker2').datetimepicker();


                            // Init datetimepicker - inline + range detection
                            $('#datetimepicker3').datetimepicker({
                                defaultDate: "9/4/2014",
                                inline: true,
                            });

                            // Init datetimepicker - fields + Date disabled (only time picker)
                            $('#datetimepicker5').datetimepicker({
                                defaultDate: "9/25/2014",
                                pickDate: false,
                            });
                            // Init datetimepicker - fields + Date disabled (only time picker)
                            $('#datetimepicker6').datetimepicker({
                                defaultDate: "9/25/2014",
                                pickDate: false,
                            });
                            // Init datetimepicker - inline + Date disabled (only time picker)
                            $('#datetimepicker7').datetimepicker({
                                defaultDate: "9/25/2014",
                                pickDate: false,
                                inline: true
                            });

                            // Init colorpicker plugin
                            $('#demo_apidemo').colorpicker({
                                color: bgPrimary
                            });
                            $('.demo-auto').colorpicker();

                            // Init jQuery Tags Manager 
                            $(".tm-input").tagsManager({
                                tagsContainer: '.tags',
                                prefilled: ["Miley Cyrus", "Apple", "A Long Tag", "Na uh"],
                                tagClass: 'tm-tag-info',
                            });

                            // Init Boostrap Multiselect
                            $('#multiselect1').multiselect();
                            $('#multiselect2').multiselect({
                                includeSelectAllOption: true
                            });
                            $('#multiselect3').multiselect();
                            $('#multiselect4').multiselect({
                                enableFiltering: true,
                            });
                            $('#multiselect5').multiselect({
                                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-primary'
                            });
                            $('#multiselect6').multiselect({
                                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-info'
                            });
                            $('#multiselect7').multiselect({
                                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-success'
                            });
                            $('#multiselect8').multiselect({
                                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-warning'
                            });

                            // Init jQuery spinner init - default
                            $("#spinner1").spinner();
                             $("#spinner1a").spinner();

                            // Init jQuery spinner init - currency 
                            $("#spinner2").spinner({
                                min: 5,
                                max: 2500,
                                step: 25,
                                start: 1000,
                                //numberFormat: "C"
                            });

                            // Init jQuery spinner init - decimal  
                            $("#spinner3").spinner({
                                step: 0.01,
                                numberFormat: "n"
                            });

                            // jQuery Time Spinner settings
                            $.widget("ui.timespinner", $.ui.spinner, {
                                options: {
                                    // seconds
                                    step: 60 * 1000,
                                    // hours
                                    page: 60
                                },
                                _parse: function(value) {
                                    if (typeof value === "string") {
                                        // already a timestamp
                                        if (Number(value) == value) {
                                            return Number(value);
                                        }
                                        return +Globalize.parseDate(value);
                                    }
                                    return value;
                                },

                                _format: function(value) {
                                    return Globalize.format(new Date(value), "t");
                                }
                            });
                            // Init jQuery Time Spinner
                            $("#spinner4").timespinner();


                            // Init jQuery masked inputs
                            $('.date').mask('99/99/9999');
                            $('.time').mask('99:99:99');
                            $('.date_time').mask('99/99/9999 99:99:99');
                            $('.zip').mask('99999-999');
                            $('.phone').mask('(999) 999-9999');
                            $('.phoneext').mask("(999) 999-9999 x99999");
                            $(".money").mask("999,999,999.999");
                            $(".product").mask("999.999.999.999");
                            $(".tin").mask("99-9999999");
                            $(".ssn").mask("999-99-9999");
                            $(".ip").mask("9ZZ.9ZZ.9ZZ.9ZZ");
                            $(".eyescript").mask("~9.99 ~9.99 999");
                            $(".custom").mask("9.99.999.9999");

                        });
                    </script>
                     <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS   
            Demo.init();

            // Init Highlight.js Plugin
            $('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
            });

            // Select all text in CSS Generate Modal
            $('#modal-close').click(function(e) {
                e.preventDefault();
                $('.datatables-demo-modal').modal('toggle');
            });

            $('.datatables-demo-code').on('click', function() {
                var modalContent = $(this).prev();
                var modalContainer = $('.datatables-demo-modal').find('.modal-body')

                // Empty Modal of Existing Content
                modalContainer.empty();

                // Clone Content and Place in Modal
                modalContent.clone(modalContent).appendTo(modalContainer);

                // Toggle Modal
                $('.datatables-demo-modal').modal({
                    backdrop: 'static'
                })
            });

            // Init Datatables with Tabletools Addon    
            $('#datatable').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": 't<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

            $('#datatable2').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

            $('#datatable3').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": 'T<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

            $('#datatable4').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": 'T<"panel-menu dt-panelmenu"lfr><"clearfix">tip',

                "oTableTools": {
                    "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

            // Multi-Column Filtering
            $('#datatable5 thead th').each(function() {
                var title = $('#datatable5 tfoot th').eq($(this).index()).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            });

            // DataTable
            var table5 = $('#datatable5').DataTable({
                "sDom": 't<"dt-panelfooter clearfix"ip>',
                "ordering": false
            });

            // Apply the search
            table5.columns().eq(0).each(function(colIdx) {
                $('input', table5.column(colIdx).header()).on('keyup change', function() {
                    table5
                        .column(colIdx)
                        .search(this.value)
                        .draw();
                });
            });


            // ABC FILTERING
            var table6 = $('#datatable6').DataTable({
                "sDom": 't<"dt-panelfooter clearfix"ip>',
                "ordering": false
            });

            var alphabet = $('<div class="dt-abc-filter"/>').append('<span class="abc-label">Search: </span> ');
            var columnData = table6.column(0).data();
            var bins = bin(columnData);

            $('<span class="clear active"/>')
                .data('letter', '')
                .data('match-count', columnData.length)
                .html('None')
                .appendTo(alphabet);

            for (var i = 0; i < 26; i++) {
                var letter = String.fromCharCode(65 + i);

                $('<span/>')
                    .data('letter', letter)
                    .data('match-count', bins[letter] || 0)
                    .addClass(!bins[letter] ? 'empty' : '')
                    .html(letter)
                    .appendTo(alphabet);
            }

            $('#datatable6').parents('.panel').find('.panel-menu').html(alphabet);

            alphabet.on('click', 'span', function() {
                alphabet.find('.active').removeClass('active');
                $(this).addClass('active');

                _alphabetSearch = $(this).data('letter');
                table6.draw();
            });

            var info = $('<div class="alphabetInfo"></div>')
                .appendTo(alphabet);

            var _alphabetSearch = '';

            $.fn.dataTable.ext.search.push(function(settings, searchData) {
                if (!_alphabetSearch) {
                    return true;
                }
                if (searchData[0].charAt(0) === _alphabetSearch) {
                    return true;
                }
                return false;
            });


            function bin(data) {
                var letter, bins = {};
                for (var i = 0, ien = data.length; i < ien; i++) {
                    letter = data[i].charAt(0).toUpperCase();

                    if (bins[letter]) {
                        bins[letter] ++;
                    } else {
                        bins[letter] = 1;
                    }
                }
                return bins;
            }

            // ROW GROUPING
            var table7 = $('#datatable7').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "sDom": 't<"dt-panelfooter clearfix"ip>',
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="row-label ' + group.replace(/ /g, '').toLowerCase() + '"><td colspan="5">' + group + '</td></tr>'
                            );
                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#datatable7 tbody').on('click', 'tr.row-label', function() {
                var currentOrder = table7.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table7.order([2, 'desc']).draw();
                } else {
                    table7.order([2, 'asc']).draw();
                }
            });

            // MISC DATATABLE HELPER FUNCTIONS

            // Add Placeholder text to datatables filter bar
            $('.dataTables_filter input').attr("placeholder", "Enter Filter Terms Here....");

            // Manually Init Chosen on Datatables Filters
            // $("select[name='datatable2_length']").chosen();
            // $("select[name='datatable3_length']").chosen();
            // $("select[name='datatable4_length']").chosen();

            // Init Xeditable Plugin
            $.fn.editable.defaults.mode = 'popup';
            $('.xedit').editable();

        });
    </script>
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

