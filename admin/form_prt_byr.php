<?php 
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];
        
        
        $proc_es=$_GET['proc_es'];
        $enctype=$_GET['enctype'];
        $u=$_GET['u'];
        $e_cty=$_GET['e_cty'];
        $st=$_GET['st'];

        $ekse=mysqli_query($conn,"Select id_siswa, status, id_admin from tb_pembayaran where id_siswa='$u'");
        $t_ba=mysqli_fetch_row($ekse);
        $c_ks=mysqli_num_rows($ekse);
        $tp_id=mysqli_fetch_row(mysqli_query($conn,"Select nama_lengkap from tb_admin where id_admin='$t_ba[2]'"));
        if($c_ks==0)
        {
            mysqli_query($conn,"Insert Into tb_pembayaran set id_admin='$fi_id', id_siswa='$u', status='Sedang Diproses'");
        }

       

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas,status, auto_id from tb_siswa where id_siswa='$u'"));
        if($status=="Admin")
            {
                $tp_sis=mysqli_fetch_row(mysqli_query($conn,"select pesan from tb_konfirmasi_pendaftaran where id_siswa='$fi_id'"));
                
                ?>
                <section id="content" class="pn">

                <div id="content">
                    <div class="row">
                        <?php
                        if($c_ks==0)
                        {
                            $st_disabled="";
                            ?>
                           <!--  <div align="center">
                                <h3>SELESAIKAN PROSES PEMBAYARAN INI. JANGAN KLIK TOMBOL BACK / REFRESH HALAMAN INI. SEBELUM ANDA MENYELESAIKANNYA</h3>
                            </div><br /> -->
                            <form class="form-horizontal" action="lkp_form_byr?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st=<?php echo"$st";?>" role="form" method="post" enctype="multipart/form-data"> 
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
                                                <label for="disabledInput" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Jenis Kelamin </label>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;">
                                                        <?php
                                                         if($tp_dt_sis[2]=="1"){echo"Pria";}else{echo"Wanita";}
                                                         ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Pilihan Kelas</label>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[28]";?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Data Pembayaran</span>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            $dn_pendidikan="0";
                                            $dn_infaq="0";
                                            $ar_spp=array("0");
                                            if($tp_dt_sis[28]=="Regular")
                                            {
                                                if($tp_dt_sis[2]=="1")
                                                {
                                                    $dn_pendidikan="Rp. 3.700.000";
                                                }
                                                else
                                                {
                                                    $dn_pendidikan="Rp. 3.800.000";
                                                }

                                                if($tp_dt_sis[30]>=1 && $tp_dt_sis[30]<=50)
                                                {
                                                    $dn_infaq="Rp. 1.000.000";
                                                }
                                                elseif($tp_dt_sis[30]>=51 && $tp_dt_sis[30]<=100)
                                                {
                                                    $dn_infaq="Rp. 1.500.000";
                                                }
                                                elseif($tp_dt_sis[30]>=101)
                                                {
                                                    $dn_infaq="Rp. 2.000.000";
                                                }
                                                else
                                                {
                                                    $dn_infaq="0";
                                                }
                                                $ar_spp=array("Rp. 300.000","Rp. 350.000","Rp. 400.000");
                                            }
                                            else
                                            {
                                                 if($tp_dt_sis[2]=="1")
                                                {
                                                    $dn_pendidikan="Rp. 3.700.000";
                                                }
                                                else
                                                {
                                                    $dn_pendidikan="Rp. 3.800.000";
                                                }
                                                $dn_infaq="Rp. 3.000.000";
                                                $ar_spp=array("Rp. 400.000","Rp. 450.000","Rp. 500.000");
                                            }

                                            $dn_pendidikan2= preg_replace("/[^0-9]/","", $dn_pendidikan);
                                            $inf2=preg_replace("/[^0-9]/","", $dn_infaq);

                                            $jum_tot=$dn_pendidikan2+$inf2;
                                            ?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Status Verifikasi</label>
                                                <div class="col-lg-10">
                                                    <select name="status_vf" class="form-control">
                                                        <option value="-">PILIH STATUS VERIFIKASI</option>
                                                        <?php 
                                                        $ar_vf=array("Diterima","Cadangan");
                                                        for($b=0;$b<=1;$b++)
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_vf[$b]";?>"><?php echo"$ar_vf[$b]";?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Status Pembayaran</label>
                                                <div class="col-lg-10">
                                                    <select name="status_byr" class="form-control">
                                                        <option value="-">PILIH STATUS PEMBAYARAN</option>
                                                        <?php 
                                                        $ar_by=array("Lunas","Angsuran","Titip Dana");
                                                        for($b=0;$b<=2;$b++)
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_by[$b]";?>"><?php echo"$ar_by[$b]";?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Dana Pendidikan</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="dn_pendidikan" class="form-control" value="<?php echo"$dn_pendidikan";?>" readonly="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Infaq</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="infaq" class="form-control" value="<?php echo"$dn_infaq";?>"  readonly="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">SPP</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control" name="spp" id="mySelect" onchange="myFunction()">
                                                        <option value="-">PILIH SPP</option>
                                                        <?php
                                                        for($i=0;$i<=2;$i++)
                                                        {
                                                            $spp2=preg_replace("/[^0-9]/","", $ar_spp[$i]);
                                                            ?>
                                                            <option value="<?php echo"$spp2";?>"><?php echo"$ar_spp[$i]";?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Jumlah Total</label>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static text-muted" style="vertical-align: top; color:black">
                                                        <div  id="myText"></div>
                                                        <input type="hidden" name="ju_tot" id="jumtot" value="<?php echo"$jum_tot";?>">
                                                        <!-- <input type="hidden" name="ju_tot" id="myText" value="<?php echo"$jumtot";?>"> -->

                                                        <script>
                                                        function myFunction() {
                                                          var jumtot=document.getElementById("jumtot").value;
                                                          var x = document.getElementById("mySelect").value;

                                                          let jutot=jumtot;
                                                          let xa=x;
                                                          document.getElementById("myText").innerHTML = "Rp. " +(Number(jutot)+Number(xa)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                                          
                                                          // document.getElementsByTagName("option")[x].value;
                                                        }
                                                        </script>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Pembayaran Diawal</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran1" class="form-control" placeholder="Masukkan Nominal Pembayaran Diawal"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker1" name="tg_angsuran1" class="form-control" placeholder="Tanggal Pembayaran Diawal" value="<?php echo"$tg_ou1";?>"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Angsuran 1</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran2" class="form-control" placeholder="Masukkan Nominal Angsuran 1"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker2" name="tg_angsuran2" class="form-control" placeholder="Tanggal Angsuran 1" value="<?php echo"$tg_ou1";?>"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Angsuran 2</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran3" class="form-control" placeholder="Masukkan Nominal Angsuran 2"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker3" name="tg_angsuran3" class="form-control" placeholder="Tanggal Angsuran 2" value="<?php echo"$tg_ou1";?>"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Angsuran 3</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran4" class="form-control" placeholder="Masukkan Nominal Angsuran 3"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker4" name="tg_angsuran4" class="form-control" placeholder="Tanggal Angsuran 3" value="<?php echo"$tg_ou1";?>"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;"></label>
                                                <div class="col-lg-12" style="text-align: right;">
                                                   <input type="submit" class="btn btn-info" value="Proses Pembayaran" name="tb_con">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </form>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h3 style="text-align: center;"><i class="fa fa-warning"></i> INFORMASI. DATA YANG ANDA PILIH TELAH DI PROSES OLEH PETUGAS ADMIN / PEWAWANCARA (NAMA: <?php echo"$tp_id[0]";?>)
                            <br /><br />Jika anda ingin melanjutkan, silahkan lanjutkan. Dan jika anda ingin pilih data lain klik <a href="lkp_form_byr?st=<?php echo"$st";?>">[DISINI]</a>
                            </h3><br />
                            <form class="form-horizontal" action="lkp_form_byr?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st=<?php echo"$st";?>" role="form" method="post" enctype="multipart/form-data"> 
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
                                                <label for="disabledInput" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Jenis Kelamin </label>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;">
                                                        <?php
                                                         if($tp_dt_sis[2]=="1"){echo"Pria";}else{echo"Wanita";}
                                                         ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label" style="vertical-align: top;text-align: justify;">Pilihan Kelas</label>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[28]";?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $t_byr=mysqli_fetch_row(mysqli_query($conn,"Select id_admin, status_verifikasi, spp, angsuran1, tgl_angsuran1, angsuran2, tgl_angsuran2, angsuran3, tgl_angsuran3, angsuran4, tgl_angsuran4, angsuran5, tgl_angsuran5, metode_pembayaran, jumlah from tb_pembayaran where id_siswa='$u'"));
                                    ?>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Data Pembayaran</span>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            $dn_pendidikan="0";
                                            $dn_infaq="0";
                                            $ar_spp=array("0");
                                            if($tp_dt_sis[28]=="Regular")
                                            {
                                                if($tp_dt_sis[2]=="1")
                                                {
                                                    $dn_pendidikan="Rp. 3.700.000";
                                                }
                                                else
                                                {
                                                    $dn_pendidikan="Rp. 3.800.000";
                                                }

                                                if($tp_dt_sis[30]>=1 && $tp_dt_sis[30]<=50)
                                                {
                                                    $dn_infaq="Rp. 1.000.000";
                                                }
                                                elseif($tp_dt_sis[30]>=51 && $tp_dt_sis[30]<=100)
                                                {
                                                    $dn_infaq="Rp. 1.500.000";
                                                }
                                                elseif($tp_dt_sis[30]>=101)
                                                {
                                                    $dn_infaq="Rp. 2.000.000";
                                                }
                                                else
                                                {
                                                    $dn_infaq="0";
                                                }
                                                $ar_spp=array("Rp. 300.000","Rp. 350.000","Rp. 400.000");
                                            }
                                            else
                                            {
                                                 if($tp_dt_sis[2]=="1")
                                                {
                                                    $dn_pendidikan="Rp. 3.700.000";
                                                }
                                                else
                                                {
                                                    $dn_pendidikan="Rp. 3.800.000";
                                                }
                                                $dn_infaq="Rp. 3.000.000";
                                                $ar_spp=array("Rp. 400.000","Rp. 450.000","Rp. 500.000");
                                            }

                                            $dn_pendidikan2= preg_replace("/[^0-9]/","", $dn_pendidikan);
                                            $inf2=preg_replace("/[^0-9]/","", $dn_infaq);

                                            $jum_tot=$dn_pendidikan2+$inf2;
                                            ?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Status Verifikasi</label>
                                                <div class="col-lg-10">
                                                    <select name="status_vf" class="form-control">
                                                        <option value="-">PILIH STATUS VERIFIKASI</option>
                                                        <?php 
                                                        $ar_vf=array("Diterima","Cadangan");
                                                        for($b=0;$b<=1;$b++)
                                                        {
                                                            if($t_byr[1]==$ar_vf[$b])
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$ar_vf[$b]";?>" selected="selected"><?php echo"$ar_vf[$b]";?></option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$ar_vf[$b]";?>"><?php echo"$ar_vf[$b]";?></option>
                                                                <?php 
                                                            }
                                                            
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Status Pembayaran</label>
                                                <div class="col-lg-10">
                                                    <select name="status_byr" class="form-control">
                                                        <option value="-">PILIH STATUS PEMBAYARAN</option>
                                                        <?php 
                                                        $ar_by=array("Lunas","Angsuran","Titip Dana");
                                                        for($b=0;$b<=2;$b++)
                                                        {
                                                            if($ar_by[$b]==$t_byr[13])
                                                            {
                                                                 ?>
                                                                <option value="<?php echo"$ar_by[$b]";?>" selected="selected"><?php echo"$ar_by[$b]";?></option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$ar_by[$b]";?>"><?php echo"$ar_by[$b]";?></option>
                                                                <?php 
                                                            }
                                                           
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Dana Pendidikan</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="dn_pendidikan" class="form-control" value="<?php echo"$dn_pendidikan";?>" readonly="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Infaq</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="infaq" class="form-control" value="<?php echo"$dn_infaq";?>"  readonly="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">SPP</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control" name="spp" id="mySelect" onchange="myFunction()">
                                                        <option value="-">PILIH SPP</option>
                                                        <?php
                                                        for($i=0;$i<=2;$i++)
                                                        {
                                                            $spp2=preg_replace("/[^0-9]/","", $ar_spp[$i]);
                                                            $spp_byr=preg_replace("/[^0-9]/","", $t_byr[2]);
                                                            if($spp2==$t_byr[2])
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$spp2";?>" selected="selected"><?php echo"$ar_spp[$i]";?></option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$spp2";?>"><?php echo"$ar_spp[$i]";?></option>
                                                                <?php
                                                            }
                                                            
                                                        }
                                                        ?>
                                                    </select>                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Jumlah Total</label>
                                                <div class="col-lg-10">
                                                    <p class="form-control-static text-muted" style="vertical-align: top; color:black">
                                                        <?php
                                                        $for_spp=number_format($t_byr[14],2);
                                                        ?>
                                                        <div  id="myText"><?php echo"Rp. $for_spp";?></div>
                                                        <input type="hidden" name="ju_tot" id="jumtot" value="<?php echo"$jum_tot";?>">
                                                        <!-- <input type="hidden" name="ju_tot" id="myText" value="<?php echo"$jumtot";?>"> -->

                                                        <script>
                                                        function myFunction() {
                                                          var jumtot=document.getElementById("jumtot").value;
                                                          var x = document.getElementById("mySelect").value;

                                                          let jutot=jumtot;
                                                          let xa=x;
                                                          document.getElementById("myText").innerHTML = "Rp. " +(Number(jutot)+Number(xa)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                                          
                                                          // document.getElementsByTagName("option")[x].value;
                                                        }
                                                        </script>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Pembayaran Diawal</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran1" class="form-control" placeholder="Masukkan Nominal Pembayaran Diawal" value="<?php echo"$t_byr[3]";?>"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker1" name="tg_angsuran1" class="form-control" placeholder="Tanggal Pembayaran Diawal"  value="<?php echo"$t_byr[4]";?>"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Angsuran 1</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran2" class="form-control" placeholder="Masukkan Nominal Angsuran 1" value="<?php echo"$t_byr[5]";?>"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker2" name="tg_angsuran2" class="form-control" placeholder="Tanggal Angsuran 1"  value="<?php echo"$t_byr[6]";?>"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Angsuran 2</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran3" class="form-control" placeholder="Masukkan Nominal Angsuran 2" value="<?php echo"$t_byr[7]";?>"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker3" name="tg_angsuran3" class="form-control" placeholder="Tanggal Angsuran 2" value="<?php echo"$t_byr[8]";?>""></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput" class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;">Angsuran 3</label>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><input type="text" name="angsuran4" class="form-control" placeholder="Masukkan Nominal Angsuran 3" value="<?php echo"$t_byr[9]";?>"></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"> <input type="text" id="datepicker4" name="tg_angsuran4" class="form-control" placeholder="Tanggal Angsuran 3" value="<?php echo"$t_byr[10]";?>"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"  style="vertical-align: top;text-align: justify;"></label>
                                                <div class="col-lg-12" style="text-align: right;">
                                                   <input type="submit" class="btn btn-info" value="Proses Pembayaran" name="tb_con">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </form>
                            <?php
                        }
                    ?>
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

