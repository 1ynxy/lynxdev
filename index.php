<html>
	<?php
		$title = "TemplarGames";
		include "bck/head.php";
		
		//This file is used as a placeholder to redirect users to the homepage.
		
		$temps = explode('/', explode('?', ($_SERVER['REQUEST_URI']))[0]);

		$temp = $temps[count($temps) - 1];

		if ($temp == '') {
	?>
	
		<meta http-equiv="refresh" content="0; home" />
	
	<?php } ?>

	<meta http-equiv="refresh" content="0; ./home" />
</html>