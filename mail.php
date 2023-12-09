<?php
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$nil=$_GET['m'];
$us=$_GET['us'];
$ps=$_GET['ps'];

include "classes/class.phpmailer.php";
$email="$nil";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "srv49.niagahoster.com"; 
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "admin_ppdb@rdigitalpro.com"; //user email
$mail->Password = "sakura@89"; //password email 
$mail->SetFrom("admin_ppdb@rdigitalpro.com","Admin SMA Negeri 2 Bangkinang Kota"); //set email pengirim
$mail->Subject = "Informasi Registrasi"; //subyek email
$mail->AddAddress("$email","nama email tujuan");  //tujuan email
$mail->MsgHTML("Terima kasih anda telah melakukan pendaftaran di SMA Negeri 2 Bangkinang Kota. Berikut adalah data untuk masuk ke panel dashboard anda.<br /><br />

    <h3>Username: $us</h3>
    <h3>Password: $ps</h3>

    Salam Hormat Kami,<br />
    SMA Negeri 2 Bangkinang Kota<br />
    JL. A. Rahman Saleh No. 55 Bangkinang, Bangkinang Kota Kabupaten Kampar, Riau 28463<br />
    (0762) 3240422");
$mail->Send();
?>
<script type="text/javascript">
    window.location="mendaftar?st=ok#fc"
</script>