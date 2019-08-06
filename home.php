<!DOCTYPE html>
<html>
	<?php
		$title = "Home";
		include "head.php";
	?>
	<body>
		<div id="wrapper">
			<?php include 'header.php' ?>

			<div id="content">
				<div id="inner">
					<?php
						$db = new SQLite3('data.db');

						$query = $db->query('SELECT * FROM Home ORDER BY PostID ASC');

						while (true) {
							$post = $query->fetchArray();

							if (!$post) break;

							include "blogpost.php";
						}
					?>
					
					<div class="blog-spacer"></div>
				</div>
			</div>

			<?php include 'footer.php'; ?>
		</div>
	</body>
</html>