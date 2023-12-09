<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        // error_reporting("null");
        $status=$_SESSION['fi_st'];
        if($status=="Siswa")
            {
                ?>
                <!DOCTYPE html>
                <html>

                <head>
                    <!-- Meta, title, CSS, favicons, etc. -->
                   <meta charset="utf-8">
                    <title>Formulir Kelengkapan Data Siswa</title>
                    <meta name="keywords" content="Formulir Kelengkapan Data Siswa" />
                    <meta name="description" content="Formulir Kelengkapan Data Siswa">
                    <meta name="author" content="Formulir Kelengkapan Data Siswa">
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
                                    <li>
                                        <a href="profil">
                                            <span class="glyphicons glyphicons-cup"></span>
                                            <span class="sidebar-title">Profile Sekolah</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-label pt15">Data Siswa</li>
                                    <li class="active">
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
                        <!-- End: Sidebar -->

                        <!-- Start: Content -->
                        <section id="content_wrapper">
                            <!-- Start: Topbar -->
                            <header id="topbar">
                                <div class="topbar-left">
                                    <ol class="breadcrumb">
                                        <li class="crumb-active">
                                            <a href="lkp_form">Formulir Lengkapi Biodata</a>
                                        </li>
                                    </ol>
                                </div>
                                
                            </header>
                            <!-- End: Topbar -->

                            <?php
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
                                    // additional begin
                                    $mtk=$_POST['nilai_bind'];
                                    $bind=$_POST['nilai_matematika'];
                                    $ipa=$_POST['nilai_ipa'];
                                    $asal_ortu=$_POST['asal_ortu'];
                                    $asal_lain=$_POST['asal_lain'];
                                    $domisili_ortu = $_POST['domisili_ortu'];
                                    $domisili_siswa = $_POST['domisili_siswa'];
                                    $goldar = $_POST['goldar'];
                                    // additional end

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

                                    if(empty($namasiswa) || empty($tempatlahir) || empty($tgllahir) || $jk=="-" || $agama=="-" || empty($anakke)|| empty($dari) || $statusdalamkeluarga=="-" || empty($alamatsiswa) || empty($sekolahasal) || empty($namasekolah) || empty($alamatsekolah) || empty($namaayah) || empty($namaibu) || empty($alamatorangtua) || empty($teleponortu) || $kerjaayah=="-" || $kerjaibu=="-" || $pil_kelas=="-")
                                        {
                                            ?>
                                            <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-remove pr10"></i>
                                            <strong>Error</strong> Data Anda Gagal Disimpan
                                            <a href="#" class="alert-link"> Wajib Isi Pada Form Yang Ada Simbol *</a> Silahkan Coba Kembali</div>
                                            <?php
                                            include("form_lkp_sis.php");
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
                                            // additional begin
                                            $query = "update tb_siswa set nama_siswa='$namasiswa', nisn='$nisn', tempat_lahir='$tempatlahir', tgl_lahir='$tgllahir', jenis_kelamin='$jk', agama='$agama', anak_ke='$anakke', dari='$dari', status_dalam_keluarga='$statusdalamkeluarga', alamat_siswa='$alamatsiswa', telepon='$telepon', sekolah_asal='$sekolahasal', nama_sekolah='$namasekolah', alamat='$alamatsekolah', sttb_tahun='$thnsttb', sttb_nomor='$nosttb', bind='$bind', mtk='$mtk', ipa='$ipa', nama_ayah='$namaayah', nama_ibu='$namaibu', asal_ortu='$asal_ortu', asal_lain='$asal_lain', alamat_ortu='$alamatorangtua', telepon_ortu='$teleponortu', kerja_ayah='$kerjaayah', kerja_ibu='$kerjaibu', nama_wali='$namawali', alamat_wali='$alamatwali', telepon_wali='$telepowali', pekerjaan_wali='$kerjawali', foto='$fn_pasfoto', foto_skhu='$fn_skhu', jumlah_nilai='$jumlahnilai', email_aktif='$email', kelas='$pil_kelas', tgl_update='$date_update', asal_ortu='$asal_ortu', asal_lain='$asal_lain', domisili_siswa='$domisili_siswa', domisili_ortu='$domisili_ortu', golongan_darah='$goldar' where id_siswa='$fi_id'";
                                            $exec = mysqli_query($conn,$query);
                                             // additional end
                                            // var_dump($query);
                                            // var_dump($exec);
                                            // var_dump(mysql_error($conn));
                                            // break;
                                            if($ck==1)
                                            {
                                                 move_uploaded_file($pasfoto['tmp_name'], "foto_pp/".$fn_pasfoto);
                                            }
                                            
                                            if($cb==1)
                                            {
                                                 move_uploaded_file($fotoskhu['tmp_name'], "foto_skhu/".$fn_skhu);
                                            }
                                           
                                             ?>
                                            <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-check pr10"></i>
                                            <strong>Sukses!</strong> Selamat Anda Berhasil
                                            <a href="#" class="alert-link">Memperbarui Data Anda.</a>.</div>
                                            <meta http-equiv="refresh" content="5;url=lkp_form">
                                            <?php
                                            include("form_lkp_sis.php");
                                                       
                                                
                                        }

                                }
                            else
                                {
                                     include("form_lkp_sis.php");
                                }
                            ?>
                        </section>
                        <!-- End: Content -->

                        <!-- Start: Right Sidebar -->
                        
                        <!-- End: Right Sidebar -->

                    </div>
                    <!-- End: Main -->

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
                            //additional begin
                            if($('#asl_ortu').val() == 'Lainnya'){
                                $('#asal_lain').show();
                                $('#asal_lbl').show();    
                            }else{
                                $('#asal_lain').hide();
                                $('#asal_lbl').hide();
                                $('#asal_lain').val('');
                            }
                            
                            $('#asl_ortu').on('change', function(){
                                var pilihan = $(this).val();
                                if(pilihan == 'Lainnya'){
                                    $('#asal_lain').show();
                                    $('#asal_lbl').show();
                                }else{
                                    $('#asal_lain').hide();
                                    $('#asal_lbl').hide();
                                    $('#asal_lain').val('');
                                }
                            });
                            //additional end
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
                                    yearRange: "2005:2019"
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

