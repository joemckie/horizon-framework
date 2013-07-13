</div>
<?php
global $blog_atts;
if ( (string) $blog_atts['enable_pagination'] == "Yes" ) {
	do_action( 'horizon_pagination' );
} ?>