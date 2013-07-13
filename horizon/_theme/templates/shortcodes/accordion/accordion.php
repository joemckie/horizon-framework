<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"header" => ""
), $shortcode_atts['atts'] ) );
?>

<div class="accordion-trigger horizon-accordion" role="tablist">
	<?php if ( $header !== "" ) { ?> <h3><?php echo $header; ?></h3> <?php } ?>
	<?php echo do_shortcode( $shortcode_atts['content'] ); ?>
</div>