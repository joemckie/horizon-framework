<?php
global $post_meta, $image_size;
$image_size = $meta['size'] . '-columns';

if ( $post_meta['thumbnail_type'] == "Featured Image" ) {
	get_template_part( TEMPLATE_PATH . '/portfolio/archive/revelio/thumbnails/featured-image/featured-image' );
} else {
	if ( $post_meta['thumbnail_type'] == "Image Slider" ) {
		get_template_part( TEMPLATE_PATH . '/portfolio/archive/revelio/thumbnails/image-slider/image-slider' );
	} else {
		if ( $post_meta['thumbnail_type'] == "Quote" ) {
			get_template_part( TEMPLATE_PATH . '/portfolio/archive/revelio/thumbnails/quote/quote' );
		} else {
			if ( $post_meta['thumbnail_type'] == "Audio" ) {
				get_template_part( TEMPLATE_PATH . '/portfolio/archive/revelio/thumbnails/audio/audio' );
			} else {
				if ( $post_meta['thumbnail_type'] == "Link" ) {
					get_template_part( TEMPLATE_PATH . '/portfolio/archive/revelio/thumbnails/link/link' );
				} else {
					if ( $post_meta['thumbnail_type'] == "Video" ) {
						if ( $post_meta['thumbnail_video_type'] == "YouTube" ) {
							get_template_part( TEMPLATE_PATH . '/portfolio/archive/revelio/thumbnails/video/video-youtube' );
						} else {
							get_template_part( TEMPLATE_PATH . '/portfolio/archive/revelio/thumbnails/video/video-vimeo' );
						}
					}
				}
			}
		}
	}
}