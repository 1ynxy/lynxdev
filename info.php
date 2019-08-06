<!DOCTYPE html>
<html>
	<?php
		$title = "PHP Info";
		include "head.php";
	?>
	<body>
		<div id="wrapper">
			<?php include 'header.php' ?>

			<div id="content">
				<div id="inner">
                    <div class="blog-spacer"></div>

					<?php phpinfo(); ?>
					
                    <div class="blog-spacer"></div>
				</div>
			</div>

			<?php include 'footer.php'; ?>
		</div>
	</body>
</html>