<?php 
 error_reporting("null");
date_default_timezone_set("Asia/Jakarta");
  include ("../con_db/connection.php");
$proc_es=$_GET['proc_es'];
$enctype=$_GET['enctype'];
$u=$_GET['u'];
$e_cty=$_GET['e_cty'];
$st=$_GET['st'];
$t_be=mysqli_fetch_row(mysqli_query($conn,"Select id_siswa, status_verifikasi, metode_pembayaran, jumlah from tb_pembayaran where id_siswa='$u'"));
	$e_mail=mysqli_fetch_row(mysqli_query($conn,"Select email_aktif from tb_siswa where id_siswa='$u'"));
	// $e_cof=mysqli_fetch_row(mysqli_query($conn,"Select status, keterangan from tb_pembayaran where id_pembayaran='$u'"));

$nu_for=number_format($t_be[3],0);
include "classes/class.phpmailer.php";
$email="$e_mail[0]";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "srv49.niagahoster.com"; 
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "admin_ppdb@rdigitalpro.com"; //user email
$mail->Password = "sakura@89"; //password email 
$mail->SetFrom("admin_ppdb@rdigitalpro.com","Admin SMP Muhammadiyah 4 Yogyakarta"); //set email pengirim
$mail->Subject = "Informasi Konfirmasi Pembayaran Anda"; //subyek email
$mail->AddAddress("$email","nama email tujuan");  //tujuan email
$mail->MsgHTML("Terima kasih anda telah melakukan pembayaran di SMP Muhammadiyah 4 Yogyakarta dan Bersabar Menunggu Hingga Kami Selesai Melakukan Verifikasi Data Anda. Berikut Adalah Hasil Verifikasi Data Pembayaran Anda:<br /><br />

    <h3>Status Anda: $t_be[1]</h3>
    <h3>Metode Pembayaran: $t_be[2]</h3>
    <h3>Jumlah: Rp. $nu_for</h3>

    Anda Dapat Melihat Informasi Ini Juga Di Panel Dashboard Anda.<br /><br />

    Salam Hormat Kami,<br/>
    SMP MUHAMMADIYAH 4 YOGYAKARTA<br/>
    Jl. Ki Mangunsarkoro No. 43, Gunungketur, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55111<br/>
    (0274) 554623");
$mail->Send();
?>
<script type="text/javascript">
    window.location="lkp_form_byr?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>&st=<?php echo"$st";?>&st_a=ok#fc";
</script>