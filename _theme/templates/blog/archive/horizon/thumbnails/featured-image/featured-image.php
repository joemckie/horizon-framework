<?php global $image_size; ?>
<div class="featured-image-thumbnail">
	<a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail( $post->ID, $image_size );?></a>
</div>