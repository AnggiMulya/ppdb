<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $u=$_GET['u'];

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select nama_lengkap, email, judul, pesan, tgl_kirim from tb_pesan where id_pesan='$u'"));
        if($status=="Admin")
            {
                ?>
                 <section id="content" class="pn">

                <!-- <div class="p40 bg-background bg-topbar bg-psuedo-tp"> -->
                <div class="p25 pt25" style="background-color: white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                 <strong>Nama Lengkap</strong><br />
                                 <?php echo"$tp_dt_sis[0]";?><br /><br />
                                 <strong>Email</strong><br />
                                 <?php echo"$tp_dt_sis[1]";?><br /><br />
                                 <strong>Judul Pesan</strong><br />
                                 <?php echo"$tp_dt_sis[2]";?><br /><br />
                                 <strong>Isi Pesan</strong><br />
                                 <?php echo"$tp_dt_sis[3]";?><br /><br />
                                 <strong>Tanggal Kirim</strong><br />
                                 <?php $f_dt=date("d-M-Y H:i:s",strtotime($tp_dt_sis[4])); echo"$f_dt";?><br /><br />
                            </div>
                            <div  class="col-md-6">
                                <form method="post" action="pro_mes?proc_es=<?php echo"$proc_es";?>&enctype=<?php echo"$enctype";?>&u=<?php echo"$u";?>&e_cty=<?php echo"$e_cty";?>" enctype="multipart/form_data">
                                    
                                    <strong>Balas Pesan</strong><br />                                    
                                    <textarea class="form-control" name="catatan" placeholder="Harap Input Pesan Balasan Anda"></textarea><br />

                                    <input type="submit" name="tb_con" class="btn btn-success" value="Balas Pesan">
                                </form>
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

