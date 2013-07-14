<?php
global $archive_post_meta, $image_size;
$image_size = 'single_post';

if ( $archive_post_meta['thumbnail_type'] == "Featured Image" ) {
	get_template_part( TEMPLATE_PATH . '/blog/archive/' . BLOG_ARCHIVE_STYLE . '/thumbnails/featured-image/featured-image' );
} else {
	if ( $archive_post_meta['thumbnail_type'] == "Image Slider" ) {
		get_template_part( TEMPLATE_PATH . '/blog/archive/' . BLOG_ARCHIVE_STYLE . '/thumbnails/image-slider/image-slider' );
	} else {
		if ( $archive_post_meta['thumbnail_type'] == "Quote" ) {
			get_template_part( TEMPLATE_PATH . '/blog/archive/' . BLOG_ARCHIVE_STYLE . '/thumbnails/quote/quote' );
		} else {
			if ( $archive_post_meta['thumbnail_type'] == "Audio" ) {
				get_template_part( TEMPLATE_PATH . '/blog/archive/' . BLOG_ARCHIVE_STYLE . '/thumbnails/audio/audio' );
			} else {
				if ( $archive_post_meta['thumbnail_type'] == "Link" ) {
					get_template_part( TEMPLATE_PATH . '/blog/archive/' . BLOG_ARCHIVE_STYLE . '/thumbnails/link/link' );
				} else {
					if ( $archive_post_meta['thumbnail_type'] == "Video" ) {
						if ( $archive_post_meta['thumbnail_video_type'] == "YouTube" ) {
							get_template_part( TEMPLATE_PATH . '/blog/archive/' . BLOG_ARCHIVE_STYLE . '/thumbnails/video/video-youtube' );
						} else {
							get_template_part( TEMPLATE_PATH . '/blog/archive/' . BLOG_ARCHIVE_STYLE . '/thumbnails/video/video-vimeo' );
						}
					}
				}
			}
		}
	}
}