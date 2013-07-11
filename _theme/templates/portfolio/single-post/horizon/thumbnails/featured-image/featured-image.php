<?php 
global $image_size;
$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>
<div class="featured-image-thumbnail">
	<a class="lightbox" rel="lightbox[project_images]" href="<?=$src[0];?>"><?=get_the_post_thumbnail( $post->ID, $image_size );?></a>
</div>