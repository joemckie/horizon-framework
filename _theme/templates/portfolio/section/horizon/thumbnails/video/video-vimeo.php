<div class="video-thumbnail">
	<?php
	global $post_meta, $meta;
	echo horizon_filter_id_vimeo( $meta['portfolio_meta']['thumbnail_video_url'], '168', get_the_title(), '100%' );
	?>
</div>