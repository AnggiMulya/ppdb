 <?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas, status from tb_siswa where id_siswa='$fi_id'"));

         $tp_dt_byr=mysqli_fetch_row(mysqli_query($conn,"Select nominal, nama_pengirim, no_rek_pengirim, bank_pengirim, bukti_transfer, tgl_entry, status, status_pb from tb_pembayaran where id_siswa='$fi_id'"));
        if($status=="Siswa")
            {
                if($tp_dt_sis[32]=="Diterima")
                    {
                    ?>
                    <div id="content">
                        <div class="row">
                            <form class="form-horizontal" role="form" method="post" action="lkp_form_byr" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Data Biaya Sekolah</span>
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
                                                    <div class="col-md-4" style="vertical-align: top">
                                                        Bank Mandiri Syariah :
                                                    </div>
                                                    <div class="col-md-8" style="vertical-align: top">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-4" style="vertical-align: top">
                                                        Kode Bank :
                                                    </div>
                                                    <div class="col-md-8" style="vertical-align: top">
                                                        000 (Jika Beda BANK)
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-4" style="vertical-align: top">
                                                        Atas Nama :
                                                    </div>
                                                    <div class="col-md-8" style="vertical-align: top">
                                                       Ris Arini ( Bendahara SMP Muhammadiyah 4 Yogyakarta)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Formulir Pembayaran</span>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            if($tp_dt_byr[6]=="Diterima")
                                            {
                                                ?>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Nominal </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="nominal" value="<?php echo"$tp_dt_byr[0]";?>" placeholder="Inputkan Nominal Yang Di Transfer" disabled title="Pembayaran Sudah Diterima">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Nama Pengirim </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="nama_pengirim" value="<?php echo"$tp_dt_byr[1]";?>" placeholder="Inputkan Nominal Pengirim (Pemilik Rekening)" disabled title="Pembayaran Sudah Diterima">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Nomor Rekening Pengirim</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="no_rek_pengirim" value="<?php echo"$tp_dt_byr[2]";?>" placeholder="Inputkan Nomor Rekening Pengirim" disabled title="Pembayaran Sudah Diterima">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Bank Pengirim </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="bank_pengirim" value="<?php echo"$tp_dt_byr[3]";?>" placeholder="Inputkan Nama Bank Yang Anda Gunakan" disabled title="Pembayaran Sudah Diterima">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Metode Pembayaran</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" name="metode" disabled="disabled">
                                                            <option value="-">PILIH METODE PEMBAYARAN</option>
                                                            <?php
                                                            $ar_metode=array("Lunas","Ditransfer","Langsung Ditempat","dll");
                                                            for($i=0;$i<=3;$i++)
                                                            {
                                                                if($tp_dt_byr[7]==$ar_metode[$i])
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo"$ar_metode[$i]";?>" selected="selected"><?php echo"$ar_metode[$i]";?></option>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo"$ar_metode[$i]";?>"><?php echo"$ar_metode[$i]";?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Bukti Transfer (fotocopy/scan) </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="file" name="bukti_transfer" disabled title="Pembayaran Sudah Diterima">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-12" style="text-align: right;">
                                                     <input type="submit" name="tb_update" value="Pembayaran Anda Sudah Diterima" class="btn btn-success" disabled title="Pembayaran Sudah Diterima">
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Nominal </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="nominal" value="<?php echo"$tp_dt_byr[0]";?>" placeholder="Inputkan Nominal Yang Di Transfer">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Nama Pengirim </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="nama_pengirim" value="<?php echo"$tp_dt_byr[1]";?>" placeholder="Inputkan Nominal Pengirim (Pemilik Rekening)">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Nomor Rekening Pengirim </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="no_rek_pengirim" value="<?php echo"$tp_dt_byr[2]";?>" placeholder="Inputkan Nomor Rekening Pengirim">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Bank Pengirim </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="text" name="bank_pengirim" value="<?php echo"$tp_dt_byr[3]";?>" placeholder="Inputkan Nama Bank Yang Anda Gunakan">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Metode Pembayaran</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" name="metode">
                                                            <option value="-">PILIH METODE PEMBAYARAN</option>
                                                            <?php
                                                            $ar_metode=array("Lunas","Ditransfer","Langsung Ditempat","dll");
                                                            for($i=0;$i<=3;$i++)
                                                            {
                                                                if($tp_dt_byr[7]==$ar_metode[$i])
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo"$ar_metode[$i]";?>" selected="selected"><?php echo"$ar_metode[$i]";?></option>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo"$ar_metode[$i]";?>"><?php echo"$ar_metode[$i]";?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-3 control-label">Bukti Transfer (fotocopy/scan) </label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="disabledInput" type="file" name="bukti_transfer">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-12" style="text-align: right;">
                                                     <input type="submit" name="tb_update" value="Proses Pembayaran" class="btn btn-primary">
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                    </div>
                    <?php
                    }
                else
                    {
                        ?>
                        <div id="content">
                            <div class="row">
                                <p>
                                    <div align="center"><strong>   MAAF !!! MENU PEMBAYARAN DAPAT DIISI SETELAH ORANG TUA SISWA MELAKUKAN WAWANCARA   </strong></div>
                                </p>
                            </div>
                        </div>
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

