<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas,status from tb_siswa where id_siswa='$fi_id'"));
        if($status=="Siswa")
            {
                $tp_sis=mysqli_fetch_row(mysqli_query($conn,"select pesan from tb_konfirmasi_pendaftaran where id_siswa='$fi_id'"));
                ?>
                 <section id="content" class="pn">

                <div id="content">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="trf_siswa?d=<?php echo"$fi_id";?>"><button class="btn btn-info"><i class="fa fa-print"></i> PRINT</button></a><br />
                            <i class="fa fa-warning"> Bila PDF Tidak Terbaca. Coba Gunakan PDF Reader Lain (Foxit Reader, Slimpdf, dll)</i>
                        </div><br /><hr />
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"> 
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Calon Siswa</span>
                                    </div>
                                    <div class="panel-body">
                                       <div class="form-group">
                                            <label class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">No. Pendaftaran</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[0]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Nama Calon Siswa</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[1]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Nama Orang Tua </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[17]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Asal SD</label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[12]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2" style="vertical-align: top;text-align: justify;">Pekerjaan Orang Tua</label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[21]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Nomor Telepon Orang Tua</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[20]";?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Formulir Pembayaran</span>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        // dana
                                        $dn="";
                                        $a_dana=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Dana'");
                                        while($t_dana=mysqli_fetch_row($a_dana))
                                        {
                                            $as_dn=$t_dana[1];
                                            $dn= preg_replace("/[^0-9]/","", $as_dn)+$dn;
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                        <?php echo"$t_dana[0]";?>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                        <?php echo"$t_dana[1]";?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                        
                                        // SPP
                                        $a_spp=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='SPP $tp_dt_sis[31]'");
                                        while($t_spp=mysqli_fetch_row($a_spp))
                                        {
                                            $sp= preg_replace("/[^0-9]/","", $t_spp[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                        <?php echo"$t_spp[0]";?>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                        <?php echo"$t_spp[1]";?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                         // Katering
                                        $a_kat=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Katering'");
                                        while($t_kat=mysqli_fetch_row($a_kat))
                                        {
                                            $kt= preg_replace("/[^0-9]/","", $t_kat[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                       <?php echo"$t_kat[0]";?>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                        <?php echo"$t_kat[1]";?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }

                                         // tabungan wisata
                                        $a_wt=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Wisata'");
                                        while($t_wt=mysqli_fetch_row($a_wt))
                                        {
                                            $wi= preg_replace("/[^0-9]/","", $t_wt[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                        <?php echo"$t_wt[0]";?>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                        <?php echo"$t_wt[1]";?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-8" style="vertical-align: top">
                                                     <strong>Jumlah Total Yang Harus Dibayar</strong>
                                                </div>
                                                <div class="col-md-4" style="vertical-align: top">
                                                    <?php $j_tot=number_format($dn+$sp+$kt+$wi,0); echo"<strong>Rp. $j_tot</strong>";?>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        // angsuran
                                        $a_ang1=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Angsuran 1 $tp_dt_sis[31]'");
                                        while($t_ang1=mysqli_fetch_row($a_ang1))
                                        {
                                            $ang1= preg_replace("/[^0-9]/","", $t_ang1[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                         <strong><?php echo"$t_ang1[0]";?></strong>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                         <strong><?php echo"$t_ang1[1]";?></strong>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-8" style="vertical-align: top">
                                                     <strong>Jumlah Yang Masih Harus Dibayar</strong>
                                                </div>
                                                <div class="col-md-4" style="vertical-align: top">
                                                    <?php $j_tot=number_format(($dn+$sp+$kt+$wi)-$ang1,0); echo"<strong>Rp. $j_tot</strong>";?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-8" style="vertical-align: top">
                                                     Angsuran Kekurangan
                                                </div>
                                                <div class="col-md-4" style="vertical-align: top">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        // angsuran2
                                        $a_ang2=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Angsuran 2 $tp_dt_sis[31]'");
                                        while($t_ang2=mysqli_fetch_row($a_ang2))
                                        {
                                            $ang2= preg_replace("/[^0-9]/","", $t_ang2[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                         <?php echo"$t_ang2[0]";?>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                         <?php echo"$t_ang2[1]";?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                        // angsuran3
                                        $a_ang3=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Angsuran 3 $tp_dt_sis[31]'");
                                        while($t_ang3=mysqli_fetch_row($a_ang3))
                                        {
                                            $ang3= preg_replace("/[^0-9]/","", $t_ang3[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                         <?php echo"$t_ang3[0]";?>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                         <?php echo"$t_ang3[1]";?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                        // angsuran4
                                        $a_ang4=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Angsuran 4 $tp_dt_sis[31]'");
                                        while($t_ang4=mysqli_fetch_row($a_ang4))
                                        {
                                            $ang4= preg_replace("/[^0-9]/","", $t_ang4[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                         <?php echo"$t_ang4[0]";?>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                         <?php echo"$t_ang4[1]";?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                         // hangus
                                        $a_hang=mysqli_query($conn,"Select keterangan, biaya from tb_biaya where status='Uang Hangus'");
                                        while($t_hang=mysqli_fetch_row($a_hang))
                                        {
                                            $ahang= preg_replace("/[^0-9]/","", $t_hang[1]);
                                            ?>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-8" style="vertical-align: top">
                                                         <strong><?php echo"$t_hang[0]";?></strong>
                                                    </div>
                                                    <div class="col-md-4" style="vertical-align: top">
                                                         <strong><?php echo"$t_hang[1]";?></strong>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <hr />
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12" style="vertical-align: top">
                                                    Nomer Rekening PPDB SMP Muhammadiyah 4 Yogyakarta<br />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-2" style="vertical-align: top">
                                                    Bank Mandiri Syariah
                                                </div>
                                                <div class="col-md-8" style="vertical-align: top">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-2" style="vertical-align: top">
                                                    Kode Bank
                                                </div>
                                                <div class="col-md-8" style="vertical-align: top">
                                                     : 000 (Jika Beda BANK)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-2" style="vertical-align: top">
                                                    Atas Nama
                                                </div>
                                                <div class="col-md-8" style="vertical-align: top">
                                                    : Ris Arini ( Bendahara SMP Muhammadiyah 4 Yogyakarta)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Bukti Pembayaran</span>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        $tp_dt_byr=mysqli_fetch_row(mysqli_query($conn,"Select nominal, nama_pengirim, no_rek_pengirim, bank_pengirim, bukti_transfer, tgl_entry, status, status_pb from tb_pembayaran where id_siswa='$fi_id'"));
                                        ?>
                                         <div class="form-group">
                                            <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Metode Pembayaran</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_byr[7]";?></p>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Nominal</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_byr[0]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Nama Pengirim</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_byr[1]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Nomor Rekening Pengirim </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_byr[2]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Bank Pengirim</label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_byr[3]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2"  style="vertical-align: top;text-align: justify;">Bukti Transfer</label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><a href="foto_trf/<?php echo"$tp_dt_byr[4]";?>" target="_blank">LIHAT BUKTI TRANSFER</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </form>
                    </div>
                </div>

            </section>
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

