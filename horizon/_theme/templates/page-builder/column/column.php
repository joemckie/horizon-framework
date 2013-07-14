<?php
global $attributes;
extract( $attributes );
?>
<div class="horizon-col">
	<?php if ( $header !== "" ) { ?>
		<h1><?php echo $header; ?></h1>
	<?php } ?>
	<?php echo do_shortcode( horizon_filter_content( $content ) ); ?>
</div>
