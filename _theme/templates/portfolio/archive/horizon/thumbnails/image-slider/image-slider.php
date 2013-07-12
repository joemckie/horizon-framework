<div class="image-slider-thumbnail">
	<?php
	global $post_meta, $image_size, $flexslider_args;
	foreach ( horizon_split_image_string( $post_meta['thumbnail_slider_images'] ) as $image ) {
		$src = wp_get_attachment_image_src( $image, $image_size );
		$full_src = wp_get_attachment_image_src( $image, 'full' );
		$height = isset( $height ) ? $height : $src[2];

		$slides[] = '<li><a href="' . get_permalink() . '"><img height="' . $height . '" src="' . $src[0] . '" /></a></li>';
	}
	$flexslider_args = array(
		"animation" => "fade",
		"area"      => "portfolio",
		"slides"    => $slides,
	);
	do_action( 'horizon_slider_flexslider', $flexslider_args );
	?>
</div>