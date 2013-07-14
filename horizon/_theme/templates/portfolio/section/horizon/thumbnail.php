<?php
global $meta, $image_size;
$image_size = $meta['size'] . '-columns';

if ( $meta['portfolio_meta']['thumbnail_type'] == "Featured Image" ) {
	get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/thumbnails/featured-image/featured-image' );
} else {
	if ( $meta['portfolio_meta']['thumbnail_type'] == "Image Slider" ) {
		get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/thumbnails/image-slider/image-slider' );
	} else {
		if ( $meta['portfolio_meta']['thumbnail_type'] == "Quote" ) {
			get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/thumbnails/quote/quote' );
		} else {
			if ( $meta['portfolio_meta']['thumbnail_type'] == "Audio" ) {
				get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/thumbnails/audio/audio' );
			} else {
				if ( $meta['portfolio_meta']['thumbnail_type'] == "Link" ) {
					get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/thumbnails/link/link' );
				} else {
					if ( $meta['portfolio_meta']['thumbnail_type'] == "Video" ) {
						if ( $meta['portfolio_meta']['thumbnail_video_type'] == "YouTube" ) {
							get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/thumbnails/video/video-youtube' );
						} else {
							get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/thumbnails/video/video-vimeo' );
						}
					}
				}
			}
		}
	}
}

?>