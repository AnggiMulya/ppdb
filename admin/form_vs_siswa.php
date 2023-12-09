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
                    <meta http-equiv="refresh" content="0;url=xls_vf_siswa?st=<?php echo"$st";?>&tg_in=<?php echo"$tg_in";?>&tg_ou=<?php echo"$tg_ou";?>">
                    <?php
                }
                

                if($st=="cf")
                {
                    $cr="where status='Terdaftar' $d_c";
                }
                elseif($st=="rj")
                {
                    $cr="where status='Batal Mendaftar' $d_c";
                }
                elseif($st=="cd")
                {
                    $cr="where status='Cadangan' $d_c";
                }
                else
                {
                    $cr="where status='Baru' $d_c";
                }
                ?>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="vf_siswa?st=<?php echo"$st";?>">
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
                <a href="vf_siswa?st=<?php echo"$st";?>"><button class="btn btn-warning"><i class="fa fa-warning"></i> KLIK TOMBOL REFRESH SEBELUM PROSES</button></a>
                <br /><br />
                <div class="panel-body pn">
                    <i class="fa fa-warning"> Bila PDF Tidak Terbaca. Coba Gunakan PDF Reader Lain (Foxit Reader, Slimpdf, dll)</i>
                    <div style="border:1px solid white;width:100%;height:100%;overflow-y:hidden;overflow-x:scroll;">
                        <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 15%">No. Pendaftaran</th>
                                    <th style="width: 25%">Nama Pendaftar</th>
                                    <th style="width: 10%">Kelas</th>
                                    <th style="width: 10%">Nilai</th>
                                    <th style="width: 15%">Asal Sekolah</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 15%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ab_biaya=mysqli_query($conn,"Select id_siswa, no_pendaftaran, nama_siswa, kelas, jumlah_nilai, sekolah_asal, status from tb_siswa $cr order by no_pendaftaran asc $limit");
                                while($tp_biaya=mysqli_fetch_row($ab_biaya))
                                {
                                    $t_k_ses=mysqli_fetch_row(mysqli_query($conn,"Select id_admin, tgl_konfirmasi from  tb_konfirmasi_pendaftaran where id_siswa='$tp_biaya[0]'"));
                                    
                                        ?>
                                        <tr>
                                            <td><?php echo"$tp_biaya[1]";?></td>
                                            <td><?php echo"$tp_biaya[2]";?></td>
                                            <td><?php echo"$tp_biaya[3]";?></td>
                                            <td><?php echo"$tp_biaya[4]";?></td>
                                            <td><?php echo"$tp_biaya[5]";?></td>
                                            <td><?php echo"$tp_biaya[6]";?></td>
                                            <td>
                                                <?php
                                                if($st=="cf")
                                                {
                                                    ?>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                    </a>                                                    
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <a href="pdf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                        <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                    </a>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                    </a>
                                                    <?php
                                                }
                                                elseif($st=="rj")
                                                {
                                                    ?>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                    </a>                                                    
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <a href="pdf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                        <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                    </a>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                    </a>
                                                    <?php
                                                }
                                                elseif($st=="cd")
                                                {
                                                    ?>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                    </a>                                                    
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <a href="pdf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                        <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                    </a>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                    </a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                    </a>                                                    
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&up=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                        <button class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <a href="pdf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                        <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                    </a>
                                                    <a href="vf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
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

