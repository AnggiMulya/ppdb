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
                            <a href="trf_siswa?d=<?php echo"$fi_id";?>"><button class="btn btn-info"><i class="fa fa-print"></i> PRINT</button></a><br />
                            <i class="fa fa-warning"> Bila PDF Tidak Terbaca. Coba Gunakan PDF Reader Lain (Foxit Reader, Slimpdf, dll)</i>
                        </div><br /><hr />
                        <div class="col-md-12">
                            <div  class="col-md-6" style="vertical-align: top">
                                <p class="fs15 mb20">
                                    <strong>DATA CALON SISWA</strong><hr />
                                    <strong>No. Pendaftaran</strong><br /><?php echo"$tp_dt_sis[0]";?><br /><br />
                                    <strong>Nama Calon Siswa</strong><br /><?php echo"$tp_dt_sis[1]";?><br /><br />
                                    <strong>Nama Orang Tua </strong><br /><?php echo"$tp_dt_sis[17]";?><br /><br />
                                    <strong>Asal SD</strong><br /><?php echo"$tp_dt_sis[12]";?><br /><br />
                                    <strong>Pekerjaan Orang Tua</strong><br /><?php echo"$tp_dt_sis[21]";?><br /><br />
                                    <strong>Nomor Telepon Orang Tua</strong><br /><?php echo"$tp_dt_sis[20]";?><br /><br />
                                </p>
                            </div>
                            <div  class="col-md-6" style="vertical-align: top">
                                <?php
                                $tp_dt_byr=mysqli_fetch_row(mysqli_query($conn,"Select nominal, nama_pengirim, no_rek_pengirim, bank_pengirim, bukti_transfer, tgl_entry, status, id_pembayaran from tb_pembayaran where id_siswa='$fi_id'"));
                                $tp_sis2=mysqli_fetch_row(mysqli_query($conn,"select keterangan from tb_konfirmasi_pembayaran where id_pembayaran='$tp_dt_byr[7]'"));
                                ?>
                                <p class="fs15 mb20">
                                    <strong>DATA BUKTI TRANSFER</strong><hr />
                                    <strong>Nominal</strong><br /><?php echo"$tp_dt_byr[0]";?><br /><br />
                                    <strong>Nama Pengirim</strong><br /><?php echo"$tp_dt_byr[1]";?><br /><br />
                                    <strong>Nama Orang Tua </strong><br /><?php echo"$tp_dt_byr[2]";?><br /><br />
                                    <strong>Nomor Rekening Pengirim </strong><br /><?php echo"$tp_dt_byr[3]";?><br /><br />
                                    <strong>Bank Pengirim</strong><br />
                                    <a href="foto_trf/<?php echo"$tp_dt_byr[4]";?>" target="_blank">LIHAT BUKTI TRANSFER</a><br /><br />
                                    <strong>Status</strong><br />
                                        <?php 
                                            if($tp_dt_byr[6]=="Diterima")
                                            {
                                                ?>
                                                <font style="background-color: green;color:white">&nbsp;&nbsp;<i class="fa fa-check"></i> <?php echo"$tp_dt_byr[6]";?></font>
                                                <?php
                                            }
                                            elseif($tp_dt_byr[6]=="Ditolak")
                                            {
                                                ?>
                                                <font style="background-color: red;color:white">&nbsp;&nbsp;<i class="fa fa-close"></i> <?php echo"$tp_dt_byr[6]";?></font>
                                                <?php
                                            }
                                            elseif($tp_dt_byr[6]=="Baru")
                                            {
                                                ?>
                                                <font style="background-color: yellow">&nbsp;&nbsp;<i class="fa fa-edit"></i> <?php echo"Sedang Verifikasi";?></font>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <font style="background-color: blue;color:white">&nbsp;&nbsp;-</font>
                                                <?php   
                                            }
                                            ?>
                                    <br /><br />
                                    <strong>Catatan Status </strong><br /><?php echo"$tp_sis2[0]";?><br /><br />
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

