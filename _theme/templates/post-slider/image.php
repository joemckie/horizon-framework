<?php 
	global $blog_atts, $flexslider_args, $meta; 
	$image_size = 'blog-'.$meta['size'].'-columns';

if($meta['blog_meta']['thumbnail_type'] == "Featured Image") {
	echo '<a href="'.get_permalink().'">'.get_the_post_thumbnail( $post->ID, $image_size ).'</a>';
} 

else if ($meta['blog_meta']['thumbnail_type'] == "Image Slider") {
	$flexslider_args = array(
		"area" => "blog",
		"images" => horizon_split_image_string($meta['blog_meta']['thumbnail_slider_images']),
		"image_size" => $image_size,
	);
	do_action( 'horizon_image_flexslider', $flexslider_args, 'blog-slider' );
} ?>
