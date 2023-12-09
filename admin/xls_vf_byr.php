<?php 
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        error_reporting("null");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];
        if($status=="Admin")
            {
                $st=$_GET['st'];
               if(empty($_GET['tg_in']) || empty($_GET['tg_in']))
                {
                    $d_c="";
                    $pd="";
                    $prd="all";
                }
                else
                {
                    $tg_in=date("Y-m-d 00:00:01", strtotime($_GET['tg_in']));
                    $tg_ou=date("Y-m-d 23:59:59", strtotime($_GET['tg_ou']));
                    $d_c=" and (tgl_entry>='$tg_in' and tgl_entry<='$tg_ou')";
                    $pd="$tg_in-$tg_ou";
                    $prd=date("d-M-Y", strtotime($_GET['tg_in']))." s/d ".date("d-M-Y", strtotime($_GET['tg_ou']));
                } 

               
                

                if($st=="cf")
                {
                    $cr="where status='Terdaftar' and status_pembayaran='Diterima'  $d_c";
                    $st_s="Diterima";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Pembayaran_Siswa_Diterima$pd.xls");
                }
                elseif($st=="rj")
                {
                    $cr="where status='Terdaftar' and status_pembayaran='Cadangan'  $d_c";
                    $st_s="Cadangan";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Pembayaran_Siswa_Ditolak$pd.xls");
                }
                elseif($st=="cd")
                {
                    $cr="where status='Cadangan' and status_pembayaran='Cadangan'  $d_c";
                    $st_s="Cadangan";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Pembayaran_Siswa_Cadangan$pd.xls");
                }
                else
                {
                    $cr="where status='Terdaftar' and status_pembayaran='Belum'  $d_c";
                    $st_s="Belum Diproses";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Pembayaran_Siswa_Baru$pd.xls");
                }

                ?>
                <div class="panel-body pn">
                    <div style="border:1px solid white;width:100%;height:100%;overflow-y:hidden;overflow-x:scroll;">
                        <div align="center">
                            <font style="font-size: 25vw">DATA PEMBAYARAN PPDB ONLINE</font><br />
                            <font style="font-size: 15vw">SMP MUHAMMADIYAH 4 YOGYAKARTA</font><br />
                            <font style="font-size: 15vw">Status Pembayaran: <?php echo"$st_s";?></font><br />
                            <font style="font-size: 15vw">Periode: <?php echo"$prd";?></font><br />
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" style="width: 100%" border="1">
                            <thead>
                                <tr>
                                    <th>No. Pendaftaran</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Kelas</th>
                                    <th>J. Kelamin</th>
                                    <th>Status Pendaftaran</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Dana Pendidikan</th>
                                    <th>Infaq</th>
                                    <th>SPP</th>
                                    <th>Pembayaran Diawal</th>
                                    <th>Tanggal Awal Pembayaran</th>
                                    <th>Angsuran 1</th>
                                    <th>Tanggal Angsuran 1</th>
                                    <th>Angsuran 2</th>
                                    <th>Tanggal Angsuran 2</th>
                                    <th>Angsuran 3</th>
                                    <th>Tanggal Angsuran 3</th>
                                    <th>Tanggal Proses</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ab_biaya=mysqli_query($conn,"Select id_siswa, no_pendaftaran, nama_siswa, kelas, jenis_kelamin, status, status_pembayaran from tb_siswa $cr order by no_pendaftaran asc");
                                while($tp_biaya=mysqli_fetch_row($ab_biaya))
                                {
                                    $tp_byr=mysqli_fetch_row(mysqli_query($conn,"Select dana_pendidikan, infaq, spp, angsuran1, tgl_angsuran1, angsuran2, tgl_angsuran2, angsuran3, tgl_angsuran3, angsuran4, tgl_angsuran4, tgl_entry, status_verifikasi, metode_pembayaran, jumlah from tb_pembayaran where id_siswa='$tp_biaya[0]'"));
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
                                        <td><?php echo"$tp_byr[12]";?></td>
                                        <td><?php echo"$tp_byr[13]";?></td>
                                        <td><?php echo"$tp_byr[0]";?></td>
                                        <td><?php echo"$tp_byr[1]";?></td>
                                        <td>
                                            <?php $nm_frt=number_format($tp_byr[2],0);echo"Rp. $nm_frt";?>
                                        </td>
                                        <td><?php echo"$tp_byr[3]";?></td>
                                        <td><?php echo"$tp_byr[4]";?></td>
                                        <td><?php echo"$tp_byr[5]";?></td>
                                        <td><?php echo"$tp_byr[6]";?></td>
                                        <td><?php echo"$tp_byr[7]";?></td>
                                        <td><?php echo"$tp_byr[8]";?></td>
                                        <td><?php echo"$tp_byr[9]";?></td>
                                        <td><?php echo"$tp_byr[10]";?></td>
                                        <td><?php echo"$tp_byr[11]";?></td>
                                        <td><?php echo("Rp " . number_format($tp_byr[14],0));?></td>
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

