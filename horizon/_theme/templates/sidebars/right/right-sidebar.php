<?php global $post_meta; ?>

<div class="horizon_sidebar_wrapper four columns border-left">
	<?php dynamic_sidebar( $post_meta['right_sidebar'] ); ?>
</div>