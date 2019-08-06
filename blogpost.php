<?php
	$preview = true;
	$postNum = null;
	$postTitle = null;
	$tempContent = null;
	$postContent = null;
	$postDate = null;
	
	$argCount = count($post) / 2;
	
	if ($argCount > 0) {
		if (isset($thisPost)) $preview = false;
		else $preview = $post[0];
	}
	if ($argCount > 1) $postNum = '#' . $post[1];
	if ($argCount > 2) $postTitle = $post[2];
	if ($argCount > 3) $postDescription = $post[3];
	if ($argCount > 4) $postThumbnail = $post[4];
	if ($argCount > 5) $postContent = preg_split('@(?s)((?<!\/)\[(?:img|code|video|youtube|download)\].+?(?=\[\/\])\[\/])@', $post[5], 0, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
	if ($argCount > 6) $postDate = $post[6];
?>
<div class="blog-spacer"></div>
<div class="blog-post">
	<div class="blog-title"><p><?php echo $postTitle ?></p></div>
	<div class="content-spacer-top"></div>
	<?php
		if (!$preview) {
			foreach ($postContent as $thisContent) {
				$thisContent = trim($thisContent);
				if (strlen($thisContent) > 0) {
					if (substr($thisContent, 0, 5) === '[img]') {
						$thisContent = trim(substr($thisContent, 5, -3));
						?><div class="blog-media"><img src="<?php echo $thisContent ?>"></div><?php
					} else if (substr($thisContent, 0, 7) === '[video]') {
						$thisContent = trim(substr($thisContent, 7, -3));
						?><div class="blog-media">
							<video class="blog-video" controls autoplay loop>
								<source src="<?php echo $thisContent ?>" type="video/mp4">
								Your browser does not support the video tag.
							</video></div><?php
					} else if (substr($thisContent, 0, 9) === '[youtube]') {
						$thisContent = trim(substr($thisContent, 9, -3));
						?><div class="blog-media">
							<iframe class="blog-youtube" src="<?php echo $thisContent ?>" frameborder="0" allowfullscreen></iframe>
						</div><?php
					} else if (substr($thisContent, 0, 10) == '[download]') {
						$thisContent = trim(substr($thisContent, 10, -3));
						?><div class="blog-media"><a title="<?php echo $thisContent ?>" href="<?php echo $thisContent ?>"><img class="blog-download" src="Download.png"></a></div><?php
					} else if (substr($thisContent, 0, 6) === '[code]') {
						$thisContent = trim(substr($thisContent, 6, -3));
						?><div class="code"><div class="blog-content"><p><?php echo preg_replace('#\n\/#', "\n", $thisContent) ?></p></div></div><?php
					} else {
						$thisContent = trim($thisContent);
						$contentSplit = preg_split('@(?s)(\/?\[link\].+?(?=\[\/])\[\/])@', $thisContent, 0, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
						?><div class="blog-content"><p><?php
						foreach ($contentSplit as $temp) {
							if (substr($temp, 0, 6) === '[link]') {
								$link = substr($temp, 6, -3);
								$tagCheck = preg_split('@\((.*)\)@', $link, 0, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
								if (count($tagCheck) == 1) {
									?><a href="<?php echo $link ?>"><?php echo $link ?></a><?php
								} else {
									?><a href="<?php echo $tagCheck[1] ?>"><?php echo $tagCheck[0] ?></a><?php
								}
							} else {
								echo $temp;
							}
						}
						?></p></div><?php
					}
				}
			}
		} else {
			?>
				<div class="blog-content"><?php echo $postDescription ?></div>
				<div class="blog-media"><a title="<?php echo str_replace(' ', '-', $postTitle) ?>" href="?post=<?php echo str_replace(' ', '-', $postTitle) ?>"><img src="<?php echo $postThumbnail ?>"></a></div>
				<div class="blog-expand"><a href="?post=<?php echo str_replace(' ', '-', $postTitle) ?>"><div class="expand-button"><p>READ MORE</div></p></a></div>
			<?php
		}
		
	?>
	<div class="content-spacer-bottom"></div>
	<?php
		if ($postDate !== null) { ?>
			<div class="blog-footer">
				<div class="blog-date"><p><?php echo $postDate ?></p></div>
				<div class="blog-num"><p><?php echo $postNum ?></p></div>
			</div><?php
		}
	?>
</div>