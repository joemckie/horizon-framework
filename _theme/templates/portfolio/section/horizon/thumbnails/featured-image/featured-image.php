<?php global $image_size; ?>
<div class="featured-image-thumbnail">
	<a class="thumb" href="<?php echo get_permalink();?>">
		<span class="thumb-icon"></span>
		<?php echo get_the_post_thumbnail( $post->ID, $image_size );?>
	</a>
</div>