<!DOCTYPE html>
<html>
	<?php
		$thisPost = null;
		if (isset($_GET['post'])) {
			$thisPost = $_GET['post'];
			$thisPost = str_replace('-', ' ', $thisPost);
		}
		
		$title = "Projects";
		
		if ($thisPost !== null) {
			$title = $title . " - " . $thisPost;
		}
		
		include "head.php";
	?>
	<body>
		<div id="wrapper">
			<?php include 'header.php' ?>

			<div id="content">
				<div id="inner">
					<?php
						if ($thisPost === null) {
							$db = new SQLite3('data.db');
							$query = $db->query('SELECT * FROM Projects ORDER BY PostID ASC');
							$post = $query->fetchArray();
							while ($post) {
								include "blogpost.php";
								$post = $query->fetchArray();
							}
						} else {
							$db = new SQLite3('data.db');
							$query = $db->query('SELECT * FROM Projects WHERE Name = "' . SQLite3::escapeString($thisPost) . '"');
							$post = $query->fetchArray();
							if ($post) include "blogpost.php";
							else { ?><meta http-equiv="refresh" content="0; blog" /><?php }
						}
					?>

					<div class="blog-spacer"></div>
				</div>
			</div>
			
			<?php include 'footer.php'; ?>
		</div>
	</body>
</html>