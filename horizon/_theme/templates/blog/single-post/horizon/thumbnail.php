<?php
global $image_size, $post_meta;
$image_size = 'single_post';

if ( $post_meta['inside_thumbnail_type'] == "Featured Image" ) {
	get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/thumbnails/featured-image/featured-image' );
} else {
	if ( $post_meta['inside_thumbnail_type'] == "Image Slider" ) {
		get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/thumbnails/image-slider/image-slider' );
	} else {
		if ( $post_meta['inside_thumbnail_type'] == "Quote" ) {
			get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/thumbnails/quote/quote' );
		} else {
			if ( $post_meta['inside_thumbnail_type'] == "Audio" ) {
				get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/thumbnails/audio/audio' );
			} else {
				if ( $post_meta['inside_thumbnail_type'] == "Link" ) {
					get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/thumbnails/link/link' );
				} else {
					if ( $post_meta['inside_thumbnail_type'] == "Video" ) {
						if ( $post_meta['inside_thumbnail_type'] == "YouTube" ) {
							get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/thumbnails/video/video-youtube' );
						} else {
							get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/thumbnails/video/video-vimeo' );
						}
					}
				}
			}
		}
	}
}