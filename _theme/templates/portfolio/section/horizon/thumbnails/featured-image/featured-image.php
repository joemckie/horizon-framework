<?php global $image_size; ?>
<div class="featured-image-thumbnail">
	<a class="thumb" href="<?=get_permalink();?>">
		<span class="thumb-icon"></span>
	</a>
	<?=get_the_post_thumbnail( $post->ID, $image_size );?>
</div>