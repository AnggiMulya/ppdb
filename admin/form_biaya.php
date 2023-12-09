<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
    {
        include ("../con_db/connection.php");
        $status=$_SESSION['fi_st'];
        $fi_id=$_SESSION['fi_id'];

        $tp_dt_sis=mysqli_fetch_row(mysqli_query($conn,"Select no_pendaftaran, nama_siswa, nisn, tempat_lahir, tgl_lahir, jenis_kelamin, agama, anak_ke, dari, status_dalam_keluarga, alamat_siswa, telepon, sekolah_asal, nama_sekolah, alamat, sttb_tahun, sttb_nomor, nama_ayah, nama_ibu, alamat_ortu, telepon_ortu, kerja_ayah, kerja_ibu, nama_wali, alamat_wali, telepon_wali, pekerjaan_wali, foto, foto_skhu, jumlah_nilai, email_aktif, kelas from tb_siswa where id_siswa='$fi_id'"));
        if($status=="Admin")
            {
                ?>
                <div id="content">
                    <div class="row">
                        <form class="form-horizontal" role="form" method="post" action="ip_biaya" enctype="multipart/form-data">
                            <div class="col-md-12">
                                
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Data Biaya Sekolah</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                           <button type="button" onclick="addRow('dataTable')" class="btn btn-success">&nbsp;&nbsp;+&nbsp;&nbsp;</button>
                                            <button type="button" onclick="deleteRow('dataTable')" class="btn btn-purple">&nbsp;&nbsp;-&nbsp;&nbsp;</button>
                                            <br><br>
                                            <table width="100%" border="1" class="table table-striped table-bordered" style="table-layout:fixed">
                                                <tr>
                                                    <td rowspan="2" width="3%"></td>
                                                    <td rowspan="2" width="32.33%">&nbsp;<div align="center">Keterangan</div></td>
                                                    <td rowspan="2" width="32.33%">&nbsp;<div align="center">Biaya</div></td>
                                                    <td rowspan="2" width="32.33%">&nbsp;<div align="center">Status</div></td>
                                                </tr>                        
                                            </table>
                                            
                                            <table width="100%" id="dataTable" border="1" class="table table-striped table-bordered" style="table-layout:fixed">
                                                <tr>
                                                    <td width="3%"><input type="checkbox" name="chek[]" checked="checked" /></td>
                                                    <td width="32.33%"><input type="text" name="keterangan[]" id="keterangan[]" class="form-control" placeholder="Harap Inputkan Keterangan"></td>
                                                    <td width="32.33%"><input type="text" name="biaya[]" id="biaya[]" class="form-control" placeholder="Harap Inputkan Biaya"></td>
                                                    <td width="32.33%">
                                                        <select name="status[]" class="form-control">
                                                            <option value="-">-PILIH STATUS-</option>
                                                            <?php
                                                                $ar_st=array("Pendidikan Putra Kelas Regular", "Pendidikan Putri Kelas Regular", "Infaq Regular No Pendf 1-50","Infaq Regular No Pendf 51-100","Infaq Regular No Pendf 101-dst", "SPP Regular 1", "SPP Regular 2","SPP Regular 3","Pendidikan Putra Kelas ICT","Pendidikan Putri Kelas ICT","Infaq ICT","SPP ICT 1", "SPP ICT 2","SPP ICT 3");
                                                                 for($i=0;$i<=13;$i++)
                                                                 {
                                                                    ?>
                                                                    <option value="<?php echo"$ar_st[$i]";?>"><?php echo"$ar_st[$i]";?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>                       
                                            </table>
                                        </div>
                                        <font size="-2">* Bila data ingin disimpan. Pastikan setiap baris terceklist</font>
                                    </div>
                                </div>

                                
                            </div>

                            
                            <div class="form-group">
                                <div class="col-lg-12" style="text-align: right;">
                                 <input type="submit" name="tb_biaya" value="Tambah Biaya Sekolah" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
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

