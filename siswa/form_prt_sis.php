<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas, status, golongan_darah, mtk, bind, ipa, domisili_siswa, domisili_ortu, asal_ortu, asal_lain from tb_siswa where id_siswa='$fi_id'"));
        if($status=="Siswa")
            {
                $tp_sis=mysqli_fetch_row(mysqli_query($conn,"select pesan from tb_konfirmasi_pendaftaran where id_siswa='$fi_id'"));
                ?>
                 <section id="content" class="pn">

                <!-- <div class="p40 bg-background bg-topbar bg-psuedo-tp"> -->
                <div class="p25 pt25" style="background-color: white">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="pdf_siswa?d=<?php echo"$fi_id";?>"><button class="btn btn-info"><i class="fa fa-print"></i> PRINT</button></a><br />
                            <i class="fa fa-warning"> Bila PDF Tidak Terbaca. Coba Gunakan PDF Reader Lain (Foxit Reader, Slimpdf, dll)</i>
                            
                        </div><br /><hr />
                        <div class="col-md-12">

                            <div class="col-md-2">
                                <img src="foto_pp/<?php echo"$tp_dt_sis[27]";?>" style="width: 100%;" class="responsive">
                            </div>
                            <div  class="col-md-10">

                                <h2 class=""> <?php echo"$tp_dt_sis[1]";?> </small></h2>
                                <p class="fs15 mb20">
                                    <strong>No. Pendaftaran</strong><br /> <?php echo"$tp_dt_sis[0]";?> <br /><br />
                                    <strong>Status Pendaftaran</strong><br />
                                    <?php
                                    if($tp_dt_sis[32]=="Baru")
                                        {
                                            ?>
                                                <font style="background-color: yellow">&nbsp;&nbsp;<i class="fa fa-warning"></i> Sedang Diverifikasi&nbsp;&nbsp;</font>
                                            <?php    
                                        }
                                    elseif($tp_dt_sis[32]=="Terdaftar")
                                        {
                                           ?>
                                           <font style="background-color: green;color:white">&nbsp;&nbsp;<i class="fa fa-check"></i> Terdaftar&nbsp;&nbsp;</font>

                                           <br /><br /><strong>Catatan Pendaftaran</strong><br />
                                           <?php   
                                           echo"$tp_sis[0]";
                                        }
                                    elseif($tp_dt_sis[32]=="Batal Mendaftar")
                                        {
                                           ?>
                                           <font style="background-color: red;color:white">&nbsp;&nbsp;<i class="fa fa-close"></i> Batal Mendaftar&nbsp;&nbsp;</font>
                                           <br /><br /><strong>Catatan Pendaftaran</strong><br />
                                           <?php   
                                           echo"$tp_sis[0]";
                                        }
                                    else
                                        {
                                           ?>
                                           <font style="background-color: blue;color:white">&nbsp;&nbsp;<i class="fa fa-edit"></i> Cadangan&nbsp;&nbsp;</font>
                                           <br /><br /><strong>Catatan Pendaftaran</strong><br />
                                           <?php   
                                           echo"$tp_sis[0]";
                                        }
                                    ?> 

                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="content">
                    <div class="row">
                        <form class="form-horizontal" role="form" method="post" action="lkp_form" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Pendaftar</span>
                                    </div>
                                    <div class="panel-body">
                                       <div class="form-group">
                                            <label class="col-lg-2 control-label" style="vertical-align: top;">No. Pendaftaran</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[0]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Pilihan Kelas</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[31]";?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Siswa</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label">Nama Siswa</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[1]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label">Email Aktif</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[30]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-lg-2 control-label">NISN</label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[2]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Tempat Lahir </label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[3]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea1">Tanggal Lahir </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php $tgfor=date("d-M-Y",strtotime($tp_dt_sis[4])); echo"$tgfor";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Jenis Kelamin </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php if($tp_dt_sis[5]==1){$f_j="Pria";}else{$f_j="Wanita";} echo"$f_j";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Agama </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[6]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Golongan Darah </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[33]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Anak ke </label>
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[7]";?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Dari </label>
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[8]";?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Status Keluarga </label>
                                            <div class="col-lg-10"><p class="form-control-static text-muted" style="vertical-align: top;">
                                                    <?php echo"$tp_dt_sis[9]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Alamat Siswa (Sesuai C1/KK) </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[10]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Alamat Domisili Siswa </label>
                                            <div class="col-lg-10"><p class="form-control-static text-muted" style="vertical-align: top;">
                                                    <?php echo"$tp_dt_sis[37]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Telepon</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[11]";?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Sekolah</span>
                                    </div>
                                    <div class="panel-body">
                                       <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label">Asal SD</label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[12]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Alamat Sekolah </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[14]";?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Surat Tanda Tamat Belajar</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Nomor IJAZAH </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[16]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Tahun IJAZAH </label>
                                            <div class="col-lg-10">
                                              <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[15]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Nilai Bahasa Indonesia </label>
                                            <div class="col-lg-10">
                                              <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[35]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Nilai Matematika </label>
                                            <div class="col-lg-10">
                                              <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[34]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Nilai IPA </label>
                                            <div class="col-lg-10">
                                              <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[36]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Jumlah Nilai </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[29]";?></p>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Lihat USD </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;">
                                                    <a href="foto_skhu/<?php echo"$tp_dt_sis[28]";?>" target="_blank">Lihat USD</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Orang Tua dan Wali</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Nama Ayah </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[17]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Nama Ibu </label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[18]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Asal Orang Tua </label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[39]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Alamat Orang Tua (Sesuai C1/KK) </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[19]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Alamat Domisili Orang Tua </label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[38]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Telepon Orang Tua</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[20]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Ayah </label>
                                            <div class="col-lg-10">
                                               <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[21]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Ibu </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php
                                                    echo"$tp_dt_sis[22]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Nama Wali </label>
                                            <div class="col-lg-10"><p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[23]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Alamat Wali </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[24]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledInput" class="col-lg-2 control-label">Telepon Wali</label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[25]";?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Wali </label>
                                            <div class="col-lg-10">
                                                <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[26]";?></p>
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

