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

                <!-- <div class="p40 bg-background bg-topbar bg-psuedo-tp"> -->
                <div class="p25 pt25" style="background-color: white">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="pdf_siswa?d=<?php echo"$fi_id";?>"><button class="btn btn-info"><i class="fa fa-print"></i> PRINT</button></a><br />
                            <i class="fa fa-warning"> Bila PDF Tidak Terbaca. Coba Gunakan PDF Reader Lain (Foxit Reader, Slimpdf, dll)</i>
                        </div><br /><hr />
                        <div class="col-md-12">

                            <div class="col-md-2" style="vertical-align: top"><br />
                                <img src="foto_pp/<?php echo"$tp_dt_sis[27]";?>" style="width: 100%;" class="responsive">
                            </div>
                            <div  class="col-md-10" style="vertical-align: top">
                                <h2 class=""> <?php echo"$tp_dt_sis[1]";?> </small></h2>
                                <p class="fs15 mb20">
                                    <strong>No. Pendaftaran</strong><br /> <?php echo"$tp_dt_sis[0]";?> <br /><br />
                                    <strong>NISN</strong><br /> <?php echo"$tp_dt_sis[2]";?> <br /><br />
                                    <strong>Tempat, Tanggal Lahir</strong><br /> <?php echo"$tp_dt_sis[3]";?>, <?php $tgfor=date("d-M-Y",strtotime($tp_dt_sis[4])); echo"$tgfor";?><br /><br />
                                    <strong>Nama Ayah</strong><br /> <?php echo"$tp_dt_sis[17]";?><br /><br />
                                    <strong>Asal Sekolah</strong><br /> <?php echo"$tp_dt_sis[12]";?> <br /><br />
                                    <strong>Jumlah Nilai Akhir USD</strong><br /> <?php echo"$tp_dt_sis[29]";?> <br /><br />
                                    <strong>Status Pendaftaran</strong><br />
                                    <?php
                                    if($tp_dt_sis[32]=="Baru")
                                        {
                                            ?>
                                                <font style="background-color: yellow">&nbsp;&nbsp;<i class="fa fa-warning"></i> Sedang Diverifikasi&nbsp;&nbsp;</font>
                                            <?php    
                                        }
                                    elseif($tp_dt_sis[32]=="Diterima")
                                        {
                                           ?>
                                           <font style="background-color: green;color:white">&nbsp;&nbsp;<i class="fa fa-check"></i> Diterima&nbsp;&nbsp;</font>

                                           <br /><br /><strong>Catatan Pendaftaran</strong><br />
                                           <?php   
                                           echo"$tp_sis[0]";
                                        }
                                    elseif($tp_dt_sis[32]=="Ditolak")
                                        {
                                           ?>
                                           <font style="background-color: red;color:white">&nbsp;&nbsp;<i class="fa fa-close"></i> Ditolak&nbsp;&nbsp;</font>
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

