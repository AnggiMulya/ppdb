<?php 
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $u=$_GET['d'];
         $tp_byr=mysqli_fetch_row(mysqli_query($conn,"Select id_siswa from tb_pembayaran where id_siswa='$u'"));

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas,status from tb_siswa where id_siswa='$u'"));
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
                                <font style='text-align:center;font-size:25vw'><strong>RINCIAN BIAYA PENDIDIKAN</strong></font><br/>
                                <font style='text-align:center;font-size:20vw'><strong>SMP MUHAMMADIYAH 4 YOGYAKARTA</strong></font><br/>
                                <font style='text-align:center;font-size:17vw'><strong>TAHUN PELAJARAN 2021/2022</strong></font><br/>
                            </div>
                        </td>
                    </tr>
                </table>
                <hr />";

                $isi="
                    <table style='width:100%'>
                        <tr>
                            <td style='width:55%;vertical-align:top'><strong>No. Pendaftaran</strong></td>
                            <td style='width:3%;vertical-align:top'><strong>:</strong></td>
                            <td style='width:42%;vertical-align:top'>$tp_dt_sis[0]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nama Calon Siswa</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[1]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Kelas Yang Dipilih</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[31]</td>
                        </tr> 
                        <tr>
                            <td style='vertical-align:top'><strong>Asal SD</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[12]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nama Orang Tua</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[17]</td>
                        </tr>  
                        <tr>
                            <td style='vertical-align:top'><strong>Pekerjaan Orang Tua</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[21]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Nomor Telepon Orang Tua</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'>$tp_dt_sis[20]</td>
                        </tr>
                       
                        ";

                    $tp_dana=mysqli_fetch_row(mysqli_query($conn,"Select dana_pendidikan, infaq, spp, angsuran1, tgl_angsuran1, angsuran2, tgl_angsuran2, angsuran3, tgl_angsuran3, angsuran4, tgl_angsuran4 from tb_pembayaran where id_siswa='$u'")) ;
                        $dn_pendidikan= preg_replace("/[^0-9]/","", $tp_dana[0]);
                        $spp=preg_replace("/[^0-9]/","", $tp_dana[2]);
                        $inf=preg_replace("/[^0-9]/","", $tp_dana[1]);
                        $jum_tot=number_format($dn_pendidikan+$spp+$inf,0);
                        $angsuran1=preg_replace("/[^0-9]/","", $tp_dana[3]);
                        $jum=number_format(($dn_pendidikan+$spp+$inf)-$angsuran1,0);
                        $sp2=number_format($tp_dana[2],0);
                    $isi.="
                        <tr>
                            <td style='vertical-align:top'>1. Dana Pendidikan</td>
                            <td style='vertical-align:top'>:</td>
                            <td style='vertical-align:top'>$tp_dana[0]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'>2. SPP</td>
                            <td style='vertical-align:top'>:</td>
                            <td style='vertical-align:top'>Rp. $sp2</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'>3. Infaq</td>
                            <td style='vertical-align:top'>:</td>
                            <td style='vertical-align:top'>$tp_dana[1]</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Jumlah Total</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'><strong>Rp. $jum_tot</strong></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Pembayaran Diawal Pada Saat Wawancara</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'><strong>$tp_dana[3]</strong></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Jumlah Yang Masih Harus Dibayarkan</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'><strong>Rp. $jum</strong></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'>4. Rincian Angsuran</td>
                            <td style='vertical-align:top'></td>
                            <td style='vertical-align:top'></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'>Angsuran 1 dibayar pada tanggal $tp_dana[6]</td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'><strong>$tp_dana[5]</strong></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'>Angsuran 2 dibayar pada tanggal $tp_dana[8]</td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'><strong>$tp_dana[7]</strong></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'>Angsuran 3 dibayar pada tanggal $tp_dana[10]</td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'><strong>$tp_dana[9]</strong></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top' colspan='3'>Jika anak saya mengundurkan diri dari SMP Muhammadiyah 4 Yogyakarta atau diterima di
sekolah lain, maka saya akan :</td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top'><strong>Menginfaqkan</strong></td>
                            <td style='vertical-align:top'><strong>:</strong></td>
                            <td style='vertical-align:top'><strong>Rp. 500.000</strong></td>
                        </tr>
                        <tr>
                            <td style='vertical-align:top' colspan='3'><br /><br />Demikian Pernyataan kesepakatan biaya pendidikan ini kami buat dengan sebenarnya.</td>
                        </tr>
                    </table>

                    <br /><br />
                    <table style='width:100%'>
                        <tr>
                            <td style='width:40%;vertical-align:top;text-align:center'>
                                Petugas Wawancara
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
                $lap="Formulir-pembayaran-$tp_dt_sis[0] | Report";
                $mpdf = new mPDF ('c','LEGAL','11','',20,20,12,18,5,5,'');
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

