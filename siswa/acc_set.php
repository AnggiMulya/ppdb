<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        error_reporting("null");
        $fi_id=$_SESSION['fi_id'];
        $status=$_SESSION['fi_st'];
        if($status=="Siswa")
            {
                ?>
                <!DOCTYPE html>
                <html>

                <head>
                    <!-- Meta, title, CSS, favicons, etc. -->
                   <meta charset="utf-8">
                    <title>Input Informasi</title>
                    <meta name="keywords" content="Input Informasi" />
                    <meta name="description" content="Input Informasi">
                    <meta name="author" content="Input Informasi">
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
                                    <li class="active">
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
                        <!-- End: Sidebar -->

                        <!-- Start: Content -->
                        <section id="content_wrapper">
                            <!-- Start: Topbar -->
                            <header id="topbar">
                                <div class="topbar-left">
                                    <ol class="breadcrumb">
                                        <li class="crumb-active">
                                            <a href="lkp_form">Ubah Akun</a>
                                        </li>
                                    </ol>
                                </div>
                                
                            </header>
                            <!-- End: Topbar -->

                            <div id="content">
                                <div class="row">
                                    <?php
                                    $tp_acc=mysqli_fetch_row(mysqli_query($conn,"Select nama_siswa, username, password from tb_siswa where id_siswa='$fi_id'"));
                                    if(isset($_POST['tb_biaya']))
                                    {
                                        $naleng=str_replace("'", "`", $_POST['naleng']);
                                        $username=str_replace("'", "`", $_POST['username']);
                                        $password=str_replace("'", "`", $_POST['pwd']);
                                            $enc_ps=sha1($password);
                                            $enc_ps2=md5($enc_ps);
                                        if(empty($naleng))
                                        {
                                            $na=$tp_acc[0];
                                        }
                                        else
                                        {
                                            $na=$naleng;
                                        }

                                        if(empty($password))
                                        {
                                            $ps=$tp_acc[2];
                                        }
                                        else
                                        {
                                            $ps=$enc_ps2;
                                        }

                                        if(empty($username))
                                        {
                                            mysqli_query($conn,"Update tb_siswa set nama_siswa='$na', username='$tp_acc[1]', password='$ps' where id_siswa='$fi_id'");
                                            ?>
                                            <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-check pr10"></i>
                                            <strong>Sukses !</strong> Anda Berhasil 
                                            <a href="#" class="alert-link"> Update Data Akun</a>.</div>
                                            <meta http-equiv="refresh" content="5;url=acc_set">
                                            <?php
                                        }
                                        else
                                        {
                                            $cek_user=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where username='$username' and id_siswa!='$fi_id'"));
                                            if($cek_user>0)
                                            {
                                                ?>
                                                <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <i class="fa fa-check pr10"></i>
                                                <strong>Eror !</strong> Maaf Username Yang Anda Inputkan Sudah Ada
                                                <a href="#" class="alert-link"> Silahkan Gunakan Username Yang Lain</a>.</div>
                                                <meta http-equiv="refresh" content="5;url=acc_set">
                                                <?php
                                            }
                                            else
                                            {
                                                mysqli_query($conn,"Update tb_siswa set nama_siswa='$na', username='$username', password='$ps' where id_siswa='$fi_id'");
                                                ?>
                                                <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <i class="fa fa-check pr10"></i>
                                                <strong>Sukses !</strong> Anda Berhasil 
                                                <a href="#" class="alert-link"> Update Data Akun</a>.</div>
                                                <meta http-equiv="refresh" content="5;url=acc_set">
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <form class="form-horizontal" role="form" method="post" action="acc_set" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Proses Ubah Akun</span>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label for="disabledInput" class="col-lg-2 control-label">Nama Lengkap</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="naleng" class="form-control" value="<?php echo"$tp_acc[0]";?>"></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="disabledInput" class="col-lg-2 control-label">Username</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="username" class="form-control" " value="<?php echo"$tp_acc[1]";?>"></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="disabledInput" class="col-lg-2 control-label">Password</label>
                                                        <div class="col-lg-10">
                                                            <input type="password" name="pwd" class="form-control" placeholder="Input Password Baru Anda"></p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="col-lg-12" style="text-align: right;">
                                             <input type="submit" name="tb_biaya" value="Update Account" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
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
                                    showButtonPanel: false
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

