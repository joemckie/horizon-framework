<div class="video-thumbnail">
	<?php 
		global $post_meta;
		echo horizon_filter_id_youtube($post_meta['thumbnail_video_url'], '400', get_the_title(), '100%');	
	?>
</div>