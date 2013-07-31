<div class="video-thumbnail">
	<?php
	global $post_meta, $meta;
	echo horizon_format_youtube_video( $meta['portfolio_meta']['thumbnail_video_url'], '400', get_the_title(), '100%' );
	?>
</div>