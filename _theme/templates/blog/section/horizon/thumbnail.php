<?php 
global $meta, $image_size;
$image_size = $meta['size'].'-columns';

if($meta['blog_meta']['thumbnail_type'] == "Featured Image") {
	get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnails/featured-image/featured-image' );
} 

else if ($meta['blog_meta']['thumbnail_type'] == "Image Slider") {
	get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnails/image-slider/image-slider' );
} 

else if ($meta['blog_meta']['thumbnail_type'] == "Quote") {
	get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnails/quote/quote' );
} 

else if ($meta['blog_meta']['thumbnail_type'] == "Audio") {
	get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnails/audio/audio' );
} 

else if ($meta['blog_meta']['thumbnail_type'] == "Link") {
	get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnails/link/link' );
} 

else if ($meta['blog_meta']['thumbnail_type'] == "Video") {
	if($meta['blog_meta']['thumbnail_video_type'] == "YouTube") {
		get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnails/video/video-youtube' );
	} else {
		get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnails/video/video-vimeo' );
	}
} 

?>