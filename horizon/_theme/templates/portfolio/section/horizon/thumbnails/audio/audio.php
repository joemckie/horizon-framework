<div class="audio-thumbnail">
	<?php
	global $meta;
	$uri = horizon_format_soundcloud_link( $meta['portfolio_meta']['thumbnail_audio_link'] );

	if ( $meta['portfolio_meta']['thumbnail_audio_html5_player'] == "Yes" ) {
		echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . $uri . '"></iframe>';
	} else {
		echo '<object height="81" width="100%">
			  <param name="movie" 
			    value="http://player.soundcloud.com/player.swf?url=' . $uri . '"></param>
			  <param name="allowscriptaccess" value="always"></param>
			  <embed 
			    src="http://player.soundcloud.com/player.swf?url=' . $uri . ' allowscriptaccess="always" height="81"  type="application/x-shockwave-flash" width="100%">
			  </embed>
			</object>';
	}
	?>
</div>