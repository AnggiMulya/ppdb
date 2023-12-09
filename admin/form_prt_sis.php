<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];
        $st=$_GET['st'];
        
        $u=$_GET['u'];

        $ekse=mysqli_query($conn,"Select id_siswa, status, id_admin, pesan from  tb_konfirmasi_pendaftaran where id_siswa='$u'");
        $t_ba=mysqli_fetch_row($ekse);

        $c_ks=mysqli_num_rows($ekse);
        $tp_id=mysqli_fetch_row(mysqli_query($conn,"Select nama_lengkap from tb_admin where id_admin='$t_ba[2]'"));
        if($c_ks==0)
        {
            mysqli_query($conn,"Insert Into   tb_konfirmasi_pendaftaran set id_admin='$fi_id', id_siswa='$u', status='Sedang Diproses'");
        }

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, bind, mtk, ipa, nama_ayah, nama_ibu, asal_ortu, asal_lain, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas, status, golongan_darah, domisili_siswa, domisili_ortu from tb_siswa where id_siswa='$u'"));
        if($status=="Admin")
            {
                ?>
                 <section id="content" class="pn">

                <!-- <div class="p40 bg-background bg-topbar bg-psuedo-tp"> -->
                <?php
                if($c_ks==0)
                {
                ?>
                        <div class="p25 pt25" style="background-color: white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <img src="../siswa/foto_pp/<?php echo"$tp_dt_sis[27]";?>" style="width: 100%;" class="responsive">
                                    </div>
                                    <div  class="col-md-10">

                                        <h2 class=""> <?php echo"$tp_dt_sis[1]";?> </small></h2>
                                        <p class="fs15 mb20">
                                            <?php
                                            if($tp_dt_sis[32]=="Baru")
                                            {
                                                ?>
                                                <strong>No. Pendaftaran</strong><br /> <?php echo"$tp_dt_sis[0]";?> <br />
                                                <form method="post" action="vf_siswa?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st=<?php echo"$st";?>" enctype="multipart/form_data">
                                                    <strong>Status Pendaftaran</strong><br />
                                                    <select name="status" class="form-control">
                                                        <option value="-">-PILIH STATUS-</option>
                                                    <?php
                                                        $ar_st=array("Terdaftar","Batal Mendaftar");
                                                        for($i=0;$i<=1;$i++)
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_st[$i]";?>">
                                                                <?php echo"$ar_st[$i]";?>
                                                            </option>
                                                            <?php
                                                        }
                                                    ?> 
                                                    </select><br />

                                                    <strong>Catatan</strong><br />                                    
                                                    <textarea class="form-control" name="catatan" placeholder="Harap Inputkan Catatan Terkait Status Yang Dipilih"></textarea><br />

                                                    <input type="submit" name="tb_con" class="btn btn-success" value="Konfirmasi">
                                                </form>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <strong>No. Pendaftaran</strong><br /> <?php echo"$tp_dt_sis[0]";?> <br />
                                                <form method="post" action="#" enctype="multipart/form_data">
                                                    <strong>Status Pendaftaran</strong><br />
                                                    <select name="status" class="form-control" disabled="disabled">
                                                        <option value="-">-PILIH STATUS-</option>
                                                    <?php
                                                        $ar_st=array("Terdaftar","Batal Mendaftar");
                                                        for($i=0;$i<=1;$i++)
                                                        {
                                                            ?>
                                                            <option value="<?php echo"$ar_st[$i]";?>">
                                                                <?php echo"$ar_st[$i]";?>
                                                            </option>
                                                            <?php
                                                        }
                                                    ?> 
                                                    </select><br />

                                                    <strong>Catatan</strong><br />                                    
                                                    <textarea class="form-control" name="catatan" placeholder="Harap Inputkan Catatan Terkait Status Yang Dipilih" disabled="disabled"></textarea><br />

                                                    <input type="submit" name="tb_con" class="btn btn-danger" value="SUDAH DIKONFIRMASI ADMIN LAIN" disabled="disabled">
                                                </form>
                                                <?php
                                            }
                                            ?>
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="content">
                            <div class="row">
                                <form class="form-horizontal" role="form" method="post" action="vf_siswa" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <span class="panel-title">DATA PENDAFTAR</span>
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
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[36]";?></p>
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
                                                    <label for="inputStandard" class="col-lg-2 control-label">Nama Calon Siswa</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[1]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-2 control-label">Email Aktif</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[35]";?></p>
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
                                                    <label class="col-lg-2 control-label" for="textArea1">Tanggal Lahir</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php $tgfor=date("d-M-Y",strtotime($tp_dt_sis[4])); echo"$tgfor";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Jenis Kelamin</label>
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
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[38]";?></p>
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
                                                    <label class="col-lg-2 control-label" for="textArea2">Status Keluarga</label>
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
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[39]";?></p>
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
                                                <span class="panel-title">DATA SEKOLAH</span>
                                            </div>
                                            <div class="panel-body">
                                               <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-2 control-label">Asal SD </label>
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
                                                <span class="panel-title">DATA SURAT TANDA TAMAT BELAJAR</span>
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
                                                    <label for="disabledInput" class="col-lg-2 control-label">Bahasa Indonesia </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[17]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Matematika </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[18]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">IPA </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[19]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Jumlah Nilai</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[34]";?></p>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Lihat USD</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;">
                                                            <a href="../siswa/foto_skhu/<?php echo"$tp_dt_sis[28]";?>" target="_blank">Lihat USD</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <span class="panel-title">DATA ORANG TUA DAN WALI</span>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Nama Ayah </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[20]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Nama Ibu </label>
                                                    <div class="col-lg-10">
                                                       <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[21]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Asal Orang Tua </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[22]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Alamat Orang Tua (Sesuai C1/KK) </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[24]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Alamat Domisili Orang Tua </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[40]";?></p>
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
                                                       <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[26]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Ibu </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php
                                                            echo"$tp_dt_sis[27]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Nama Wali </label>
                                                    <div class="col-lg-10"><p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[28]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Alamat Wali </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[29]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Telepon Wali</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[30]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Wali </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[31]";?></p>
                                                    </div>
                                                </div>
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
                        <div class="p25 pt25" style="background-color: white">
                            <div class="row">
                                <h3 style="text-align: center;"><i class="fa fa-warning"></i> INFORMASI. DATA YANG ANDA PILIH TELAH DI PROSES OLEH PETUGAS ADMIN / PEWAWANCARA (NAMA: <?php echo"$tp_id[0]";?>)
                                <br /><br />Jika anda ingin melanjutkan, silahkan lanjutkan. Dan jika anda ingin pilih data lain klik <a href="vf_siswa?st=<?php echo"$st";?>">[DISINI]</a>
                                </h3><br />
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <img src="../siswa/foto_pp/<?php echo"$tp_dt_sis[27]";?>" style="width: 100%;" class="responsive">
                                    </div>
                                    <div  class="col-md-10">

                                        <h2 class=""> <?php echo"$tp_dt_sis[1]";?> </small></h2>
                                        <p class="fs15 mb20">
                                            <?php
                                            if($tp_dt_sis[32]=="Baru")
                                            {
                                                ?>
                                                <strong>No. Pendaftaran</strong><br /> <?php echo"$tp_dt_sis[0]";?> <br />
                                                <form method="post" action="vf_siswa?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st=<?php echo"$st";?>" enctype="multipart/form_data">
                                                    <strong>Status Pendaftaran</strong><br />
                                                    <select name="status" class="form-control">
                                                        <option value="-">-PILIH STATUS-</option>
                                                    <?php
                                                        $ar_st=array("Terdaftar","Batal Mendaftar");
                                                        for($i=0;$i<=1;$i++)
                                                        {
                                                            if($t_ba[1]==$ar_st[$i])
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$ar_st[$i]";?>" selected="selected">
                                                                    <?php echo"$ar_st[$i]";?>
                                                                </option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$ar_st[$i]";?>">
                                                                    <?php echo"$ar_st[$i]";?>
                                                                </option>
                                                                <?php 
                                                            }
                                                            
                                                        }
                                                    ?> 
                                                    </select><br />

                                                    <strong>Catatan</strong><br />                                    
                                                    <textarea class="form-control" name="catatan" placeholder="Harap Inputkan Catatan Terkait Status Yang Dipilih"></textarea><br />

                                                    <input type="submit" name="tb_con" class="btn btn-success" value="Konfirmasi">
                                                </form>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <strong>No. Pendaftaran</strong><br /> <?php echo"$tp_dt_sis[0]";?> <br />
                                                <form method="post" action="vf_siswa?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st=<?php echo"$st";?>" enctype="multipart/form_data">
                                                    <strong>Status Pendaftaran</strong><br />
                                                    <select name="status" class="form-control">
                                                        <option value="-">-PILIH STATUS-</option>
                                                    <?php
                                                        $ar_st=array("Terdaftar","Batal Mendaftar");
                                                        for($i=0;$i<=1;$i++)
                                                        {
                                                            if($t_ba[1]==$ar_st[$i])
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$ar_st[$i]";?>" selected="selected">
                                                                    <?php echo"$ar_st[$i]";?>
                                                                </option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?php echo"$ar_st[$i]";?>">
                                                                    <?php echo"$ar_st[$i]";?>
                                                                </option>
                                                                <?php 
                                                            }
                                                            
                                                        }
                                                    ?> 
                                                    </select><br />

                                                    <strong>Catatan</strong><br />                                    
                                                    <textarea class="form-control" name="catatan" placeholder="Harap Inputkan Catatan Terkait Status Yang Dipilih"><?php echo"$t_ba[3]";?></textarea><br />

                                                    <input type="submit" name="tb_con" class="btn btn-success" value="Konfirmasi">
                                                </form>
                                                <?php
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
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[36]";?></p>
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
                                                    <label for="inputStandard" class="col-lg-2 control-label">Nama Calon Siswa</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[1]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-2 control-label">Email Aktif</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[35]";?></p>
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
                                                    <label class="col-lg-2 control-label" for="textArea1">Tanggal Lahir</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php $tgfor=date("d-M-Y",strtotime($tp_dt_sis[4])); echo"$tgfor";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Jenis Kelamin</label>
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
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[38]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Anak Ke </label>
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
                                                    <label class="col-lg-2 control-label" for="textArea2">Status Keluarga</label>
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
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[39]";?></p>
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
                                                    <label for="inputStandard" class="col-lg-2 control-label">Sekolah Asal </label>
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
                                                      <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[17]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Nilai Matematika </label>
                                                    <div class="col-lg-10">
                                                      <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[18]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Nilai IPA </label>
                                                    <div class="col-lg-10">
                                                      <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[19]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Jumlah Nilai </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[34]";?></p>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Lihat USD</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;">
                                                            <a href="../siswa/foto_skhu/<?php echo"$tp_dt_sis[28]";?>" target="_blank">Lihat USD</a></p>
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
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[20]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Nama Ibu </label>
                                                    <div class="col-lg-10">
                                                       <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[21]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Asal Orang Tua </label>
                                                    <div class="col-lg-10">
                                                       <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[22]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Alamat Orang Tua (Sesuai C1/KK) </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[24]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Alamat Domisili Orang Tua </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[40]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Telepon Orang Tua</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[25]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Ayah </label>
                                                    <div class="col-lg-10">
                                                       <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[26]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Ibu </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php
                                                            echo"$tp_dt_sis[27]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Nama Wali </label>
                                                    <div class="col-lg-10"><p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[28]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Alamat Wali </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[29]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledInput" class="col-lg-2 control-label">Telepon Wali</label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[30]";?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="textArea2">Pekerjaan Wali </label>
                                                    <div class="col-lg-10">
                                                        <p class="form-control-static text-muted" style="vertical-align: top;"><?php echo"$tp_dt_sis[31]";?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

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

