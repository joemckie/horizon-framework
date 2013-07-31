<div class="video-thumbnail">
	<?php
	global $post_meta;
	echo horizon_format_youtube_video( $post_meta['inside_thumbnail_video_url'], '400', get_the_title(), '100%' );
	?>
</div>