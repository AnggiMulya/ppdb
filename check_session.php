<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
	{
		$status=$_SESSION['fi_st'];
		if($status=="Admin")
			{
				?>
				<script type="text/javascript">
					window.location="admin/index";
				</script>
				<?php
			}
		elseif($status=="Wawancara")
			{
				?>
				<script type="text/javascript">
					window.location="wawancara/index";
				</script>
				<?php
			}
		elseif($status=="Siswa")
			{
				?>
				<script type="text/javascript">
					window.location="siswa/index";
				</script>
				<?php
			}
		else
			{
				?>
				<script type="text/javascript">
					window.location="index";
				</script>
				<?php
			}
	}
else
	{
		?>
		<script type="text/javascript">
			window.location="index";
		</script>
		<?php
	}
?>
