<!DOCTYPE html>
<html>
	<?php
		$title = "PHP Info";
		include "bck/head.php";
	?>
	<body>
		<div id="wrapper">
			<?php include 'bck/header.php' ?>

			<div id="content">
				<div id="inner">
                    <div class="blog-spacer"></div>

					<?php phpinfo(); ?>
					
                    <div class="blog-spacer"></div>
				</div>
			</div>

			<?php include 'bck/footer.php'; ?>
		</div>
	</body>
</html>