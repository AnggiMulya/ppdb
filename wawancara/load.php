<table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 17%">No. Pendaftaran</th>
                                    <th style="width: 26%">Nama Pendaftar</th>
                                    <th style="width: 10%">Kelas</th>
                                    <th style="width: 10%">J. Kelamin</th>
                                    <th style="width: 13%">Pendaftaran</th>
                                    <th style="width: 12%">Pembayaran</th>
                                    <th style="width: 12%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ab_biaya=mysqli_query($conn,"Select id_siswa, no_pendaftaran, nama_siswa, kelas, jenis_kelamin, status, status_pembayaran from tb_siswa $cr order by no_pendaftaran asc $limit");
                                while($tp_biaya=mysqli_fetch_row($ab_biaya))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo"$tp_biaya[1]";?></td>
                                        <td><?php echo"$tp_biaya[2]";?></td>
                                        <td><?php echo"$tp_biaya[3]";?></td>
                                        <td>
                                            <?php
                                                if($tp_biaya[4]==1)
                                                {
                                                    echo"Pria";
                                                }
                                                else
                                                {
                                                    echo "Wanita";   
                                                }
                                            ?>                                                
                                        </td>
                                        <td><?php echo"$tp_biaya[5]";?></td>
                                        <td><?php echo"$tp_biaya[6]";?></td>
                                        <td>
                                            <?php
                                            if($st=="cf")
                                            {
                                                ?>
                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            elseif($st=="rj")
                                            {
                                                ?>
                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            elseif($st=="cd")
                                            {
                                                ?>
                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
                                                    <button class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&u=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>

                                                <a href="trf_siswa?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&d=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>">
                                                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                                                </a>
                                                <a href="lkp_form_byr?proc_es=e&enctype=<?php $now=date("dmyhis");$ha=md5($now);echo"$now";?>&de=<?php echo"$tp_biaya[0]";?>&e_cty=<?php echo"$ha";?>&st=<?php echo"$st";?>">
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