<div class="author-info">
	<?php if(get_the_author_meta('user_url') == "") {
		echo get_avatar(get_the_author_meta('ID'), 90);;
	} else {
		echo '<a href="'.get_the_author_meta('user_url').'">'.get_avatar(get_the_author_meta('ID'), 90).'</a>';
	} ?>
	<h6>AUTHOR</h6>
	<div class="author-name"><?php echo get_the_author_link();?></div>
	<?php echo the_author_meta('description'); ?>
	<div class="clear"></div>
</div>