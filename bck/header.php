<?php
	$temps = explode('/', explode('?', ($_SERVER['REQUEST_URI']))[0]);
	$temp = $temps[count($temps) - 1];
?>
<div id="header">
	<div id="banner"><img src="https://i.imgur.com/etUUc9i.png"></div>
	<div id="header-bar">
		<p id="title">lynxdev</p>
		<p id="description">Games & Stuff</p>
		<ul id="navbar">
			<?php 
				$links = ['HOME', 'BLOG', 'PROJECTS'];
				
				foreach ($links as $link) { ?>
					<li>
						<a href="<?php echo strtolower ($link) ?>">
							<?php if (strtolower ($temp) == strtolower ($link)) { ?>
								<div class="nav-item" id="active"><p><?php echo $link ?></p></div>
							<?php } else { ?>
								<div class="nav-item"><p><?php echo $link ?></p></div>
							<?php } ?>
						</a>
					</li>
				<?php }
			?>
		</ul>
	</div>
</div>