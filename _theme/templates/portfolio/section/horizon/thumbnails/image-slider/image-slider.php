<div class="image-slider-thumbnail">
	<?php
	global $meta, $image_size, $flexslider_args;
	foreach ( horizon_split_image_string( $meta['portfolio_meta']['thumbnail_slider_images'] ) as $image ) {
		$image_meta = horizon_get_image_meta( $image, $image_size );
		$height = isset( $height ) ? $height : $image_meta['height'];

		$slides[] = '<li><a href="' . get_permalink() . '"><img height="' . $height . '" src="' . $image_meta['src'] . '" alt="' . $image_meta['alt'] . '" /></a></li>';
	}
	$flexslider_args = array(
		"animation" => "fade",
		"area"      => "portfolio",
		"slides"    => $slides,
	);
	do_action( 'horizon_slider_flexslider', $flexslider_args );
	?>
</div>