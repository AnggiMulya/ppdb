<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
	{
		include ("../con_db/connection.php");
		$status=$_SESSION['fi_st'];
		$fi_id=$_SESSION['fi_id'];
		if($status=="Siswa")
			{
				?>
				<!DOCTYPE html>
				<html>

				<head>
				    <!-- Meta, title, CSS, favicons, etc. -->
				    <meta charset="utf-8">
				    <title>Panel Dashboard</title>
				    <meta name="keywords" content="Panel Dashboard" />
				    <meta name="description" content="Panel Dashboard">
				    <meta name="author" content="Panel Dashboard">
				    <meta name="viewport" content="width=device-width, initial-scale=1.0">

				    <!-- Theme CSS -->
				    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

				    <!-- Admin Panels CSS -->
				    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-plugins/admin-panels/adminpanels.css">

				    <!-- Admin Forms CSS -->
				    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

				    <!-- Favicon -->
				    <link rel="shortcut icon" href="assets/img/favicon.ico">
				     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

				    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				    <!--[if lt IE 9]>
				   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
				   <![endif]-->
				</head>

				<body class="dashboard-page sb-l-o sb-r-c">

				    
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
				                    <!-- <li class="sidebar-label pt15">Rincian Biaya</li>
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

				            <!-- Start: Topbar -->
				            <header id="topbar">
				                <div class="topbar-left">
				                    <ol class="breadcrumb">
				                        <li class="crumb-active">
				                            <a href="index">Halaman Dashboard</a>
				                        </li>
				                    </ol>
				                </div>
				            </header>
				            <!-- End: Topbar -->

				            <!-- Begin: Content -->
				            <section id="content">
				                <div class="row">
				                    <div class="col-md-12">
				                         <div class="panel">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                     <?php
								                    	$reg_new=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where status='Baru'"));
								                    	$reg_con=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where status='Terdaftar'"));
								                    	$reg_rej=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where status='Batal Mendaftar'"));
								                    	$reg_trm=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where status_pembayaran='Diterima'"));
								                    	$reg_cdg=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where status_pembayaran='Cadangan'"));
								                    	$reg_blm=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where status_pembayaran='Belum' and status='Terdaftar'"));
								                    	$msg_new=mysqli_num_rows(mysqli_query($conn,"Select * from tb_pesan where status='Baru'"));

								                    ?>
                				                    <div class="row">
				                                    	<div class="col-md-3">
				                                    		<h5 class="mt5 mbn ph10 pb5 br-b fw700">Grafik Kelas</h5>

				                                    		<?php
				                                    		$reg_i=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where kelas='ICT'"));
				                                    		$reg_r=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where kelas='Regular'"));
				                                    		?>
				                                    		<script type="text/javascript">
														      google.charts.load("current", {packages:["corechart"]});
														      google.charts.setOnLoadCallback(drawChart);
														      function drawChart() {
														        var data = google.visualization.arrayToDataTable([
														          ['Task', 'Hours per Day'],
														          ['ICT', <?php echo"$reg_i";?>],
														          ['Regular', <?php echo "$reg_r";?>]
														        ]);

														        var options = {
														          title: '',
														          is3D: false,
														          legend:'none'
														        };

														        var chart = new google.visualization.PieChart(document.getElementById('piechart_cel'));
														        chart.draw(data, options);
														      }
														    </script>
														    
														    <div id="piechart_cel" style="width: 100%"></div>
				                                    	</div>
				                                    	<div class="col-md-3">
				                                    		<h5 class="mt5 mbn ph10 pb5 br-b fw700">Grafik Pendaftar</h5>
				                                    		
				                                    		<script type="text/javascript">
														      google.charts.load("current", {packages:["corechart"]});
														      google.charts.setOnLoadCallback(drawChart);
														      function drawChart() {
														        var data = google.visualization.arrayToDataTable([
														          ['Task', 'Hours per Day'],
														          ['Belum Diproses', <?php echo"$reg_new";?>],
														          ['Terdaftar', <?php echo"$reg_con";?>],
														          ['Batal Mendaftar', <?php echo "$reg_rej";?>]
														        ]);

														        var options = {
														          title: '',
														          is3D: false,
														          legend:'none'
														        };

														        var chart = new google.visualization.PieChart(document.getElementById('piechart_pdf'));
														        chart.draw(data, options);
														      }
														    </script>
														    
														    <div id="piechart_pdf" style="width: 100%"></div>

				                                    	</div>
				                                    	<div class="col-md-3">
				                                    		<h5 class="mt5 mbn ph10 pb5 br-b fw700">Grafik Penerimaan</h5>
				                                    		
				                                    		<script type="text/javascript">
														      google.charts.load("current", {packages:["corechart"]});
														      google.charts.setOnLoadCallback(drawChart);
														      function drawChart() {
														        var data = google.visualization.arrayToDataTable([
														          ['Task', 'Hours per Day'],
														          ['Belum Diproses', <?php echo "$reg_blm";?>],
														          ['Diterima', <?php echo "$reg_trm";?>],
														          ['Cadangan', <?php echo "$reg_cdg";?>]
														        ]);

														        var options = {
														          title: '',
														          is3D: false,
														          legend:'none'
														        };

														        var chart = new google.visualization.PieChart(document.getElementById('piechart_pdfa'));
														        chart.draw(data, options);
														      }
														    </script>
														    
														    <div id="piechart_pdfa" style="width: 100%"></div>

				                                    	</div>
				                                    	<div class="col-md-3">
				                                    		<h5 class="mt5 mbn ph10 pb5 br-b fw700">Grafik Gender</h5>
				                                    		<?php
				                                    		$reg_p=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where jenis_kelamin='1'"));
				                                    		$reg_w=mysqli_num_rows(mysqli_query($conn,"Select * from tb_siswa where jenis_kelamin='2'"));
				                                    		?>
				                                    		<script type="text/javascript">
														      google.charts.load("current", {packages:["corechart"]});
														      google.charts.setOnLoadCallback(drawChart);
														      function drawChart() {
														        var data = google.visualization.arrayToDataTable([
														          ['Task', 'Hours per Day'],
														          ['Pria', <?php echo"$reg_p";?>],
														          ['Wanita', <?php echo "$reg_w";?>]
														        ]);

														        var options = {
														          title: '',
														          is3D: false,
														          legend:'none'
														        };

														        var chart = new google.visualization.PieChart(document.getElementById('piechart_sex'));
														        chart.draw(data, options);
														      }
														    </script>
														    
														    <div id="piechart_sex" style="width: 100%"></div>
				                                    	</div>
				                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="panel">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-6 br-r">
			                                            <h5 class="mt5 mbn ph10 pb5 br-b fw700"><i class="fa fa-warning"></i> Informasi Pendaftaran Anda</h5>
			                                            <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last" border="0">
			                                                <thead>
			                                                    <tr class="hidden">
			                                                        <!-- <th>Source</th> -->
			                                                        <th>Count</th>
			                                                        <th>Count</th>
			                                                    </tr>
			                                                </thead>
			                                                <tbody>
			                                                    <?php
			                                                	$d_en=mysqli_fetch_row(mysqli_query($conn,"Select nama_siswa, tgl_entry from tb_siswa where id_siswa='$fi_id' order by tgl_entry desc"));		
			                                                	$f_da=date("d-M-Y H:i",strtotime($d_en[1]));
			                                                		?>
			                                                		<tr>
				                                                        <!-- <td><?php echo"$d_en[0]";?></td> -->
				                                                        <td style="width: 30%" style="vertical-align: top">Mendaftar</td>
				                                                        <td style="width: 70%" style="vertical-align: top"><?php echo"$f_da";?></td>
				                                                    </tr>

				                                                <?php
				                                                $d_kl=mysqli_fetch_row(mysqli_query($conn,"Select nama_siswa, tgl_update from tb_siswa where id_siswa='$fi_id' order by tgl_entry desc"));		
			                                                	
			                                                		?>
			                                                		<tr>
				                                                        <!-- <td><?php echo"$d_kl[0]";?></td> -->
				                                                        <td style="vertical-align: top">Melengkapi Biodata</td>
				                                                        <td style="vertical-align: top">
				                                                        	<?php 
				                                                        	if($d_kl[1]=="0000-00-00 00:00:00")
				                                                        	{
				                                                        		echo"-";
				                                                        	}
					                                                        else
					                                                        {
					                                                        	$f_da=date("d-M-Y H:i",strtotime($d_kl[1]));
					                                                        	echo"$f_da";
					                                                        }
				                                                        	?>
				                                                        </td>
				                                                    </tr>

				                                                <?php
				                                                $d_kl=mysqli_fetch_row(mysqli_query($conn,"Select nama_siswa, status from tb_siswa where id_siswa='$fi_id' order by tgl_entry desc"));		
			                                                	$f_da=date("d-M-Y H:i",strtotime($d_kl[1]));
			                                                		?>
			                                                		<tr>
				                                                        <!-- <td><?php echo"$d_kl[0]";?></td> -->
				                                                        <td style="vertical-align: top">Status Pendaftaran</td>
				                                                        <td style="vertical-align: top">
				                                                        	<?php 
				                                                        	if($d_kl[1]=="Terdaftar")
				                                                        	{
				                                                        		?>
				                                                        		<i class="fa fa-check"></i> <?php echo"$d_kl[1]";?>
				                                                        		<?php
				                                                        	}
				                                                        	elseif($d_kl[1]=="Batal Mendaftar")
				                                                        	{
				                                                        		?>
				                                                        		<i class="fa fa-close"></i> <?php echo"$d_kl[1]";?>
				                                                        		<?php
				                                                        	}
				                                                        	elseif($d_kl[1]=="Baru")
				                                                        	{
				                                                        		?>
				                                                        		<i class="fa fa-edit"></i> <?php echo"Sedang Verifikasi";?>
				                                                        		<?php
				                                                        	}
					                                                        else
					                                                        {
					                                                        	?>
				                                                        		<i class="fa fa-edit"></i> <?php echo"Sedang Verifikasi";?>
				                                                        		<?php
					                                                        }
				                                                        	?>
				                                                        </td>
				                                                    </tr>
				                                                    <?php
				                                                	$d_en=mysqli_fetch_row(mysqli_query($conn,"Select pesan from tb_konfirmasi_pendaftaran where id_siswa='$fi_id'"));	
				                                                		?>
				                                                		<tr>
					                                                        <!-- <td><?= isset($d_en) && isset($d_en[0]) ? $d_en[0] : "";?></td> -->
					                                                        <td style="vertical-align: top">Catatan</td>
					                                                        <td style="vertical-align: top"><?= isset($d_en) && isset($d_en[0]) ? $d_en[0] : "";?></td>
					                                                    </tr>
			                                                </tbody>
			                                            </table>
			                                        </div>

			                                        <!-- Multi Text Column -->
			                                        <div class="col-md-6 br-r">
			                                            <h5 class="mt5 mbn ph10 pb5 br-b fw700"><i class="fa fa-warning"></i> Informasi Pembayaran Anda</h5>
			                                            <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
			                                                <thead>
			                                                    <tr class="hidden">
			                                                        <th>Source</th>
			                                                        <th>Count</th>
			                                                    </tr>
			                                                </thead>
			                                                <tbody>
			                                                    <?php
			                                                	$p_n_r=mysqli_query($conn,"Select id_siswa, tgl_entry, status, id_pembayaran, metode_pembayaran from tb_pembayaran where id_siswa='$fi_id' order by tgl_entry desc limit 5");
			                                                	$s_n_r=mysqli_fetch_row($p_n_r);
			                                                		if(empty($s_n_r[1]))
			                                                		{
																		$f_dn="-";
			                                                		}
				                                                	else
				                                                	{
				                                                		$f_dn=date("d-M-Y H:i",strtotime($s_n_r[1]));
				                                                	}
			                                                		
			                                                		?>
			                                                		<tr>
				                                                        <td style="width: 30%">Pembayaran</td>
				                                                        <td style="width: 70%"><?php echo"$f_dn";?></td>
				                                                    </tr>
			                                                		<tr>
				                                                        <!-- <td><?php echo"$d_kl[0]";?></td> -->
				                                                        <td style="vertical-align: top">Metode Pembayaran</td>
				                                                        <td style="vertical-align: top">
				                                                        	<?= isset($s_n_r) && isset($s_n_r[4]) ? $s_n_r[4] : ""?>
				                                                        </td>
				                                                    </tr>
			                                                		<tr>
				                                                        <!-- <td><?php echo"$d_en[0]";?></td> -->
				                                                        <td style="vertical-align: top">Cetak Formulir Pembayaran</td>
				                                                        <td style="vertical-align: top">
				                                                        	<a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$fi_id";?>&e_cty=<?php echo"$ha";?>">
						                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
						                                                </a>
				                                                        </td>
				                                                    </tr>
			                                                </tbody>
			                                            </table>
			                                        </div>
                                                </div>
                                            </div>
                                        </div>
				                    </div>
				                </div>

				              


				              
				                </div>
				            </section>
				            <!-- End: Content -->

				        </section>
				        <!-- End: Content-Wrapper -->

				        <!-- Start: Right Sidebar -->
				       
				        <!-- End: Right Sidebar -->

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

				    <!-- Sparklines CDN -->
				    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>

				    <!-- Chart Plugins -->
				    <script type="text/javascript" src="vendor/plugins/highcharts/highcharts.js"></script>
				    <script type="text/javascript" src="vendor/plugins/circles/circles.js"></script>
				    <script type="text/javascript" src="vendor/plugins/raphael/raphael.js"></script>

				    <!-- Holder js  -->
				    <script type="text/javascript" src="assets/js/bootstrap/holder.min.js"></script>

				    <!-- Theme Javascript -->
				    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
				    <script type="text/javascript" src="assets/js/main.js"></script>
				    <script type="text/javascript" src="assets/js/demo.js"></script>

				    <!-- Admin Panels  -->
				    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/json2.js"></script>
				    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js"></script>
				    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>

				    <!-- Page Javascript -->
				    <script type="text/javascript" src="assets/js/pages/widgets.js"></script>
				    <script type="text/javascript">
				        jQuery(document).ready(function() {

				            "use strict";

				            // Init Theme Core      
				            Core.init({
				                sbm: "sb-l-c",
				            });

				            // Init Demo JS
				            Demo.init();

				            // Init Widget Demo JS
				            // demoHighCharts.init();

				            // Because we are using Admin Panels we use the OnFinish 
				            // callback to activate the demoWidgets. It's smoother if
				            // we let the panels be moved and organized before 
				            // filling them with content from various plugins

				            // Init plugins used on this page
				            // HighCharts, JvectorMap, Admin Panels

				            // Init Admin Panels on widgets inside the ".admin-panels" container
				            $('.admin-panels').adminpanel({
				                grid: '.admin-grid',
				                draggable: true,
				                mobile: true,
				                callback: function() {
				                    bootbox.confirm('<h3>A Custom Callback!</h3>', function() {});
				                },
				                onFinish: function() {
				                    $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onLoad');

				                    // Init the rest of the plugins now that the panels
				                    // have had a chance to be moved and organized.
				                    // It's less taxing to organize empty panels
				                    demoHighCharts.init();
				                    runVectorMaps();

				                    // We also refresh any "in-view" waypoints to ensure
				                    // the correct position is being calculated after the 
				                    // Admin Panels plugin moved everything
				                    Waypoint.refreshAll();

				                },
				                onSave: function() {
				                    $(window).trigger('resize');
				                }
				            });

				            // Widget VectorMap
				            function runVectorMaps() {

				                // Jvector Map Plugin
				                var runJvectorMap = function() {
				                    // Data set
				                    var mapData = [900, 700, 350, 500];
				                    // Init Jvector Map
				                    $('#WidgetMap').vectorMap({
				                        map: 'us_lcc_en',
				                        //regionsSelectable: true,
				                        backgroundColor: 'transparent',
				                        series: {
				                            markers: [{
				                                attribute: 'r',
				                                scale: [3, 7],
				                                values: mapData
				                            }]
				                        },
				                        regionStyle: {
				                            initial: {
				                                fill: '#E5E5E5'
				                            },
				                            hover: {
				                                "fill-opacity": 0.3
				                            }
				                        },
				                        markers: [{
				                            latLng: [37.78, -122.41],
				                            name: 'San Francisco,CA'
				                        }, {
				                            latLng: [36.73, -103.98],
				                            name: 'Texas,TX'
				                        }, {
				                            latLng: [38.62, -90.19],
				                            name: 'St. Louis,MO'
				                        }, {
				                            latLng: [40.67, -73.94],
				                            name: 'New York City,NY'
				                        }],
				                        markerStyle: {
				                            initial: {
				                                fill: '#a288d5',
				                                stroke: '#b49ae0',
				                                "fill-opacity": 1,
				                                "stroke-width": 10,
				                                "stroke-opacity": 0.3,
				                                r: 3
				                            },
				                            hover: {
				                                stroke: 'black',
				                                "stroke-width": 2
				                            },
				                            selected: {
				                                fill: 'blue'
				                            },
				                            selectedHover: {}
				                        },
				                    });
				                    // Manual code to alter the Vector map plugin to 
				                    // allow for individual coloring of countries
				                    var states = ['US-CA', 'US-TX', 'US-MO',
				                        'US-NY'
				                    ];
				                    var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
				                    var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
				                    $.each(states, function(i, e) {
				                        $("#WidgetMap path[data-code=" + e + "]").css({
				                            fill: colors[i]
				                        });
				                    });
				                    $('#WidgetMap').find('.jvectormap-marker')
				                        .each(function(i, e) {
				                            $(e).css({
				                                fill: colors2[i],
				                                stroke: colors2[i]
				                            });
				                        });
				                }

				                if ($('#WidgetMap').length) {
				                    runJvectorMap();
				                }
				            }

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
