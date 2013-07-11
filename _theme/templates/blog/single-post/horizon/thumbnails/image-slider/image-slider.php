<div class="image-slider-thumbnail">
	<?php
		global $post_meta, $image_size, $flexslider_args;
		foreach(horizon_split_image_string($post_meta['thumbnail_slider_images']) as $image) {
			$image_meta = horizon_get_image_meta($image, $image_size);
			$full_src = wp_get_attachment_image_src($image, 'full');
			$height = isset($height) ? $height : $image_meta['height'];
			
			$slides[] = '<li><a class="lightbox" rel="lightbox[slider]" href="'.$full_src[0].'"><img height="'.$height.'" src="'.$image_meta['src'].'" alt="'.$image_meta['alt'].'" /></a></li>';
		}
		$flexslider_args = array(
			"animation" => "fade",
			"area" => "blog",
			"slides" => $slides,
		);
		do_action( 'horizon_slider_flexslider', $flexslider_args );
	?>
</div>