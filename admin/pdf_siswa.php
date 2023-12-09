<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $u=$_GET['d'];

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, bind, mtk, ipa, nama_ayah, nama_ibu, asal_ortu, asal_lain, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas, status, domisili_siswa, domisili_ortu, golongan_darah from tb_siswa where id_siswa='$u'"));
        if($status=="Admin")
            {
                $fortg=date("d-M-Y",strtotime($tp_dt_sis[4]));
                if($tp_dt_sis[5]=="1"){$je_k="Pria";}elseif($tp_dt_sis[5]=="2"){$je_k="Wanita";}else{$je_k="-";}
                $tp_st_s=mysqli_fetch_row(mysqli_query($conn,"Select pesan from tb_konfirmasi_pendaftaran where id_siswa='$u'"));
                $header="

                <table style='width:100%'>
                    <tr>
                        <td style='width:13%' style='text-align:center'><img src='../logo/logo.png' style='width:13%'></td>
                        <td style='width:40%' style='text-align:center'>
                            <div align='center'>
                            <font style='text-align:center;font-size:25vw'><strong>FORMULIR PENDAFTARAN</font><br/>
                            <font style='text-align:center;font-size:20vw'><strong>PESERTA DIDIK BARU TAHUN PELAJARAN 2021/2022</strong></font><br/>
                            <font style='text-align:center;font-size:17vw'><strong>SMP MUHAMMADIYAH 4 YOGYAKARTA</strong></font><br>
                            </div>
                        </td>
                    </tr>
                </table>
                <hr />";

                $isi="<table style='width:100%'>
                        <tr>
                            <td style='width:20%;vertical-align:top'>
                                <img src='../siswa/foto_pp/$tp_dt_sis[32]' width='3cm' height='4cm'>
                            </td>
                            <td style='width:80%;vertical-align:top'>
                                <table>
                                    <tr>
                                        <td style='width:37%;vertical-align:top'><strong>No. Pendaftaran</strong></td>
                                        <td style='width:3%;vertical-align:top'><strong>:</strong></td>
                                        <td style='width:60%;vertical-align:top'>$tp_dt_sis[0]</td>
                                    </tr>
                                    <tr>
                                        <td style='vertical-align:top'><strong>Status Pendaftaran</strong></td>
                                        <td style='vertical-align:top'><strong>:</strong></td>
                                        <td style='vertical-align:top'>$tp_dt_sis[37]</td>
                                    </tr>
                                    <tr>
                                        <td style='vertical-align:top'><strong>Catatan Status</strong></td>
                                        <td style='vertical-align:top'><strong>:</strong></td>
                                        <td style='vertical-align:top'>$tp_st_s[0]</td>
                                    </tr>
                                    <tr>
                                        <td style='vertical-align:top'><strong>Pilihan Kelas</strong></td>
                                        <td style='vertical-align:top'><strong>:</strong></td>
                                        <td style='vertical-align:top'>$tp_dt_sis[36]</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table style='width:100%'>
                        <tr>
                            <td style='width:37%;vertical-align:top'><strong>Nama Calon Siswa</strong></td>
                            <td style='width:3%;vertical-align:top'><strong>:</strong></td>
                            <td style='width:60%;vertical-align:top'>$tp_dt_sis[1]</td>
                        </tr>   
                        <tr>
                            <td style='vertical-align:top'><strong>NISN</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[2]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Tempat, Tanggal Lahir</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[3], $fortg </td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Jenis Kelamin</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$je_k</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Agama</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[6]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Golongan Darah</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[40]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Anak ke</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[7] dari : $tp_dt_sis[8] Bersaudara</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Status Keluarga</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[9]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Alamat Siswa (Sesuai C1/KK)</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[10]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Alamat Domisili Siswa</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[38]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Telepon Siswa</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[11]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Asal Sekolah</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[12]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Alamat Sekolah</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[14]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nomor IJAZAH</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[16]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Tahun IJAZAH</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[15]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nilai Bahasa Indonesia</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[17]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nilai Matematika</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[18]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nilai IPA</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[19]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Jumlah Nilai</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[34]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nama Ayah</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[20]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nama Ibu</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[21]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Asal Orang Tua</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[22]</td>
                        </tr>";
                        if($tp_dt_sis[22] == "Lainnya"){
                            $isi.= "<tr>
                                <td style='vertical-align:top'><strong></strong></td>
                                <td style='vertical-align:top'><strong></strong></td>
                                <td style='vertical-align:top'>$tp_dt_sis[23]</td>
                            </tr>";
                        }
                        
                        $isi .= "<tr>
                            <td style='vertical-align:top'><strong>Alamat Orang Tua (Sesuai C1/KK)</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[24]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Alamat Domisili Orang Tua</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[39]</td>
                        </tr>
                         <tr>
                            <td style='vertical-align:top'><strong>Telepon Orang Tua</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[25]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Pekerjaan Ayah</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[26]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Pekerjaan Ibu</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[27]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nama Wali</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[28]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Alamat Wali</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[29]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Telepon Wali</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[30]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Pekerjaan Wali</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[31]</td>
                        </tr>
                    </table><br /><br />
                    <table style='width:100%'>
                        <tr>
                            <td style='width:40%;vertical-align:top;text-align:center'>
                                Panitia PPDB
                            </td>
                            <td style='width:20%;vertical-align:top;text-align:center'></td>
                            <td style='width:40%;vertical-align:top;text-align:center'>
                                Yogyakarta,...............................
                            </td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top;text-align:center'>
                                
                            </td>
                            <td style='vertical-align:top;text-align:center'></td>
                            <td style='vertical-align:top;text-align:center'>
                                Orang Tua Siswa/Wali
                            </td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top;text-align:center'>
                                <br /><br /><br /><br />
                                (...............................................)
                            </td>
                            <td style='vertical-align:top;text-align:center'></td>
                            <td style='vertical-align:top;text-align:center'>
                                <br /><br /><br /><br />
                                (...............................................)
                            </td>
                        </tr>
                    </table>";

                include('../MPDF54/mpdf.php');
                $lap="Formulir-pendaftaran-$tp_dt_sis[0] | Report";
                $mpdf = new mPDF ('c','LEGAL','11','',20,20,12,18,5,5,'');
                // var_dump($tp_dt_sis);
                // var_dump($isi);
                $mpdf ->WriteHTML($header.$isi);
                $mpdf ->Output($lap.'.pdf','I');
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

