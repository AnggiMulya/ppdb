<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];
        if($status=="Admin")
            {
                $st=$_GET['st'];
                if($st=="cf")
                {
                    $cr="where status!='Baru'";
                }
                else
                {
                    $cr="where status='Baru'";
                }
                ?>
                <div class="panel-body pn">
                    <div style="border:1px solid white;width:100%;height:100%;overflow-y:hidden;overflow-x:scroll;">
                        <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Nama Pendaftar</th>
                                    <th style="width: 19%">Email</th>
                                    <th style="width: 10%">Judul</th>
                                    <th style="width: 21%">Pesan</th>
                                    <th style="width: 10%">T.Kirim</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ab_biaya=mysqli_query($conn,"Select id_pesan, nama_lengkap, email, judul, pesan, tgl_kirim, status from tb_pesan $cr order by tgl_kirim desc ");
                                while($tp_biaya=mysqli_fetch_row($ab_biaya))
                                {
                                    ?>
                                    <tr>
                                        <td style="vertical-align: top;"><?php echo"$tp_biaya[1]";?></td>
                                        <td style="vertical-align: top;"><?php echo"$tp_biaya[2]";?></td>
                                        <td style="vertical-align: top;"><?php echo"$tp_biaya[3]";?></td>
                                        <td style="vertical-align: top;"><?php echo"$tp_biaya[4]";?></td>
                                        <td style="vertical-align: top;"><?php $fo_date=date("d-M-Y H:i:s",strtotime($tp_biaya[5])); echo"$fo_date";?></td>
                                        <td style="vertical-align: top;"><?php echo"$tp_biaya[6]";?></td>
                                        <td style="vertical-align: top;">
                                            <?php
                                            if($st=="cf")
                                            {
                                                ?>
                                                <a href="#">
                                                    <button class="btn btn-info" disabled="disabled"><i class="fa fa-check"></i></button>
                                                </a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="pro_mes?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>

                                                <a href="pro_mes?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                          

                                            
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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

