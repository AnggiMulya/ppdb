<?php
session_start();
if(isset($_SESSION['fi_id']) && isset($_SESSION['fi_us']) && isset($_SESSION['fi_ps']))
	{
		$status=$_SESSION['fi_st'];
		if($status=="Admin")
			{
				session_destroy();
				?>
				<script type="text/javascript">
					window.location="../index";
				</script>
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
