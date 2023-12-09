<?php
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
	{
		$fi_id=$_SESSION['fi_id'];
		$status=$_SESSION['fi_st'];
		if($status=="Admin")
			{
				$tp_dt_sw=mysqli_fetch_row(mysqli_query($conn,"Select nama_lengkap from tb_admin where id_admin='$fi_id'"));
				?>
				<ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
	                        <span><?php echo"$tp_dt_sw[0]";?></span>
	                        <span class="caret caret-tp"></span>
	                    </a>
	                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
	                        <li class="br-t of-h">
	                            <a href="acc_set" class="fw600 p12 animated animated-short fadeInDown">
	                                <span class="fa fa-gear pr5"></span> Account Settings </a>
	                        </li>
	                        <li class="br-t of-h">
	                            <a href="logout" class="fw600 p12 animated animated-short fadeInDown">
	                                <span class="fa fa-power-off pr5"></span> Logout </a>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
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
