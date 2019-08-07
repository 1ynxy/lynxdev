<!DOCTYPE html>
<html>
	<?php
		$title = "Home";
		include "bck/head.php";
	?>
	<body>
		<div id="wrapper">
			<?php include 'bck/header.php' ?>

			<div id="content">
				<div id="inner">
					<?php
						$db = new SQLite3('data.db');

						$query = $db->query('SELECT * FROM Home ORDER BY PostID ASC');

						while (true) {
							$post = $query->fetchArray();

							if (!$post) break;

							include "bck/blogpost.php";
						}
					?>
					
					<div class="blog-spacer"></div>
				</div>
			</div>

			<?php include 'bck/footer.php'; ?>
		</div>
	</body>
</html>