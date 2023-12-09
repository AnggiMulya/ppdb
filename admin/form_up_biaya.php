<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];
        if($status=="Admin")
            {
                ?>
                <div class="panel-body pn">
                    <div style="border:1px solid white;width:100%;height:100%;overflow-y:hidden;overflow-x:scroll;">
                        <table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Admin</th>
                                    <th style="width: 35%">Keterangan</th>
                                    <th style="width: 15%">Biaya</th>
                                    <th style="width: 25%">Status</th>
                                    <th style="width: 10%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ab_biaya=mysqli_query($conn,"Select id_biaya, id_admin, keterangan, biaya, status from tb_biaya order by status asc");
                                while($tp_biaya=mysqli_fetch_row($ab_biaya))
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php $tp_admin=mysqli_fetch_row(mysqli_query($conn,"Select nama_lengkap from tb_admin where id_admin='$tp_biaya[1]'")); echo"$tp_admin[0]";?>
                                        </td>
                                        <td><?php echo"$tp_biaya[2]";?></td>
                                        <td><?php echo"$tp_biaya[3]";?></td>
                                        <td><?php echo"$tp_biaya[4]";?></td>
                                        <td>
                                           <a href="up_biaya?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                            </a>

                                            <a href="up_biaya?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                            </a>
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

