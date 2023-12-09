<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        
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
                    $cr="where status='Terdaftar' $d_c";
                    $st_s="Terdaftar";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Siswa_Diterima$pd.xls");
                }
                elseif($st=="rj")
                {
                    $cr="where status='Batal Mendaftar' $d_c";
                    $st_s="Batal Mendaftar";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Siswa_Ditolak$pd.xls");
                }
                elseif($st=="cd")
                {
                    $cr="where status='Cadangan' $d_c";
                    $st_s="Cadangan";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Siswa_Cadangan$pd.xls");
                }
                else
                {
                    $cr="where status='Baru' $d_c";
                    $st_s="Baru";
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Siswa_Baru$pd.xls");
                }

                ?>
                <div class="panel-body pn">
                    <div style="border:1px solid white;width:100%;height:100%;overflow-y:hidden;overflow-x:scroll;">
                        <div align="center">
                            <h1>PPDB ONLINE</h1>
                            <h3>SMP MUHAMMADIYAH 4 YOGYAKARTA</h3>
                            <h4>Status: <?php echo"$st_s";?></h4>
                            <h4>Periode: <?php echo"$prd";?></h4>
                        </div>
                        <table border="1" id="datatable2" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <!-- add begin -->
                                    <th>No. Pendaftaran</th>
                                    <th>Nama Pendaftar</th>
                                    <th>NISN</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Anak Ke</th>
                                    <th>Dari</th>
                                    <th>Status Dalam Keluarga</th>
                                    <th>Alamat Siswa</th>
                                    <th>Domisili Siswa</th>
                                    <th>Telepon</th>
                                    <th>Asal SD</th>
                                    <th>Golongan Darah</th>
                                    <!-- <th>Nama Sekolah</th> -->
                                    <th>Alamat Sekolah</th>
                                    <th>Tahun IJAZAH </th>
                                    <th>Nomor IJAZAH </th>
                                    <th>Nilai Bahasa Indonesia</th>
                                    <th>Nilai Matematika</th>
                                    <th>Nilai IPA</th>
                                    <th>Jumlah Nilai</th>
                                    <th>Nama Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Alamat Orang Tua</th>
                                    <th>Domisili Orang Tua</th>
                                    <th>Telepon Orang Tua</th>
                                    <th>Pekerjaan Ayah</th>
                                    <th>Pekerjaan Ibu</th>
                                    <th>Nama Wali</th>
                                    <th>Alamat Wali</th>
                                    <th>Telepon Wali</th>
                                    <th>Pekerjaan Wali</th>
                                    <!-- <th>Jumlah Nilai UN</th> -->
                                    <th>Kelas Yang Dipilih</th>
                                    <!-- add end -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ab_biaya=mysqli_query($conn,"Select * from tb_siswa $cr order by no_pendaftaran asc");
                                while($tp_biaya=mysqli_fetch_row($ab_biaya))
                                {
                                    ?>
                                    <tr>
                                        <!-- add begin -->
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[1]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[2]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[3]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[4]";?></td>
                                        <td style="vertical-align: top"><?php $f_dt=date("d-M-Y",strtotime($tp_biaya[5])); echo"$f_dt";?></td>
                                        <td style="vertical-align: top"><?php if($tp_biaya[6]=="1"){echo"Pria";}elseif($tp_biaya[6]=="2"){echo"wanita";}else{echo"-";}?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[7]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[8]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[9]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[10]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[11]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[46]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[12]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[13]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[48]";?></td> <!-- GOLONAN DARAH -->
                                        <!-- <td style="vertical-align: top"><?php echo"$tp_biaya[14]";?></td> -->
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[15]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[16]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[17]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[41]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[42]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[43]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[30]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[18]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[19]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[20]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[47]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[21]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[22]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[23]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[24]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[25]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[26]";?></td>
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[27]";?></td>
                                        <!-- <td style="vertical-align: top"><img src="../siswa/foto_pp/<?php echo"$tp_biaya[28]";?>" style="width: 100%"></td> -->
                                        <!-- <td style="vertical-align: top"><img src="../siswa/foto_skhu/<?php echo"$tp_biaya[29]";?>" style="width: 100%"></td> -->
                                        <!-- <td style="vertical-align: top"><?php echo"$tp_biaya[30]";?></td> -->
                                        <td style="vertical-align: top"><?php echo"$tp_biaya[32]";?></td>
                                        <!-- add end -->
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

