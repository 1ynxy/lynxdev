<!DOCTYPE html>
<html>
	<?php
		$thisPost = null;
		if (isset($_GET['post'])) {
			$thisPost = $_GET['post'];
			$thisPost = str_replace('-', ' ', $thisPost);
		}
		
		$title = "Blog";
		
		if ($thisPost !== null) {
			$title = $title . " - " . $thisPost;
		}
		
		include "bck/head.php";
	?>
	<body>
		<div id="wrapper">
			<?php include 'bck/header.php' ?>

			<div id="content">
				<div id="inner">
					<?php
						if ($thisPost === null) {
							$db = new SQLite3('data.db');
							$query = $db->query('SELECT * FROM Blog ORDER BY PostID DESC');
							$post = $query->fetchArray();
							while ($post) {
								include "bck/blogpost.php";
								$post = $query->fetchArray();
							}
						} else {
							$db = new SQLite3('data.db');
							$query = $db->query('SELECT * FROM Blog WHERE Name = "' . SQLite3::escapeString($thisPost) . '"');
							$post = $query->fetchArray();
							if ($post) include "bck/blogpost.php";
							else { ?><meta http-equiv="refresh" content="0; blog" /><?php }
						}
					?>
					
					<div class="blog-spacer"></div>
				</div>
			</div>

			<?php include 'bck/footer.php'; ?>
		</div>
	</body>
</html>