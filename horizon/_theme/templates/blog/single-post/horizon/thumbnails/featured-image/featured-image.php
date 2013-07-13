<?php global $image_size; ?>
<div class="featured-image-thumbnail">
	<a href="<?=get_permalink();?>"><?=get_the_post_thumbnail( $post->ID, $image_size );?></a>
</div>