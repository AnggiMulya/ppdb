<?php 
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];
        if($status=="Admin")
            {
                $st=$_GET['st'];
                if(isset($_POST['tb_src']))
                {
                   if(empty($_POST['tg_i']) || empty($_POST['tg_o']))
                    {
                        $d_c="";
                        $tg_in1="";
                        $tg_ou1="";
                        $limit="";
                    }
                    else
                    {
                        $tg_in1=date("d-M-Y", strtotime($_POST['tg_i']));
                        $tg_ou1=date("d-M-Y", strtotime($_POST['tg_o']));

                        $tg_in=date("Y-m-d 00:00:01", strtotime($_POST['tg_i']));
                        $tg_ou=date("Y-m-d 23:59:59", strtotime($_POST['tg_o']));
                        $d_c=" and (tgl_entry>='$tg_in' and tgl_entry<='$tg_ou')";

                        $limit="limit 50";
                    } 
                }

                if(isset($_POST['tb_prt']))
                {
                   if(empty($_POST['tg_i']) || empty($_POST['tg_o']))
                    {
                        $d_c="";
                        $tg_in1="";
                        $tg_ou1="";
                    }
                    else
                    {
                        $tg_in1=date("d-M-Y", strtotime($_POST['tg_i']));
                        $tg_ou1=date("d-M-Y", strtotime($_POST['tg_o']));

                        $tg_in=date("Y-m-d 00:00:01", strtotime($_POST['tg_i']));
                        $tg_ou=date("Y-m-d 23:59:59", strtotime($_POST['tg_o']));
                        $d_c=" and (tgl_entry>='$tg_in' and tgl_entry<='$tg_ou')";
                    } 
                    ?>
                    <meta http-equiv="refresh" content="0;url=xls_vf_byr?st=<?php echo"$st";?>&tg_in=<?php echo"$tg_in";?>&tg_ou=<?php echo"$tg_ou";?>">
                    <?php
                }
                

                if($st=="cf")
                {
                    $cr="where status='Terdaftar' and status_pembayaran='Diterima' $d_c";
                }
                elseif($st=="rj")
                {
                    $cr="where status='Terdaftar' and status_pembayaran='Cadangan' $d_c";
                }
                elseif($st=="cd")
                {
                    $cr="where status='Cadangan' and status_pembayaran='Cadangan' $d_c";
                }
                else
                {
                    $cr="where status='Terdaftar' and status_pembayaran='Belum' $d_c";
                }
                ?>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="lkp_form_byr?st=<?php echo"$st";?>">
                            <div class="col-md-4" style="vertical-align: top">
                                 <input type="text" id="datepicker1" name="tg_i" class="form-control" placeholder="Tanggal Mulai Pendaftaran" value="<?php echo"$tg_in1";?>">
                            </div>
                            <div class="col-md-4" style="vertical-align: top">
                                 <input type="text" id="datepicker2" name="tg_o" class="form-control" placeholder="Tanggal Akhir Pendaftaran" value="<?php echo"$tg_ou1";?>">
                            </div>
                            <div class="col-md-4" style="vertical-align: top">
                                <button class="btn btn-default" name="tb_src"><i class="fa fa-search"></i></button>
                                <button class="btn btn-default" name="tb_prt" title="Export Excel"><i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div><hr />
                <a href="lkp_form_byr?st=<?php echo"$st";?>"><button class="btn btn-warning"><i class="fa fa-warning"></i> KLIK TOMBOL REFRESH SEBELUM PROSES</button></a>
                <br /><br />
                <div class="panel-body pn">
                    <i class="fa fa-warning"> Bila PDF Tidak Terbaca. Coba Gunakan PDF Reader Lain (Foxit Reader, Slimpdf, dll)</i>
                    <div style="border:1px solid white;width:100%;height:100%;overflow-y:hidden;overflow-x:scroll;">
                        <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 17%">No. Pendaftaran</th>
                                    <th style="width: 20%">Nama Pendaftar</th>
                                    <th style="width: 10%">Kelas</th>
                                    <th style="width: 10%">J. Kelamin</th>
                                    <th style="width: 13%">Pendaftaran</th>
                                    <th style="width: 15%">Pembayaran</th>
                                    <th style="width: 15%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ab_biaya=mysqli_query($conn,"Select id_siswa, no_pendaftaran, nama_siswa, kelas, jenis_kelamin, status, status_pembayaran from tb_siswa $cr order by no_pendaftaran asc $limit");
                                while($tp_biaya=mysqli_fetch_row($ab_biaya))
                                {
                                    $t_k_ses=mysqli_fetch_row(mysqli_query($conn,"Select id_admin, spp, metode_pembayaran from tb_pembayaran where id_siswa='$tp_biaya[0]'"));
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo"$tp_biaya[1]";?></td>
                                        <td><?php echo"$tp_biaya[2]";?></td>
                                        <td><?php echo"$tp_biaya[3]";?></td>
                                        <td>
                                            <?php
                                                if($tp_biaya[4]==1)
                                                {
                                                    echo"Pria";
                                                }
                                                else
                                                {
                                                    echo "Wanita";   
                                                }
                                            ?>                                                
                                        </td>
                                        <td><?php echo"$tp_biaya[5]";?></td>
                                        <td>
                                            <strong>Status Pendaftaran:</strong><br /> 
                                            <?php 
                                                if($tp_biaya[6]=="Belum"){ echo"Belum Diproses";}
                                                else{echo"$tp_biaya[6]";}
                                            ?>
                                            <br /><strong>Metode Pembayaran:</strong><br /> 
                                            <?php 
                                                if(empty($t_k_ses[2]))
                                                {echo"Belum Dipilih";}
                                                else{echo"$t_k_ses[2]";}
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($st=="cf")
                                            {
                                                ?>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            elseif($st=="rj")
                                            {
                                                ?>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            elseif($st=="cd")
                                            {
                                                ?>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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

