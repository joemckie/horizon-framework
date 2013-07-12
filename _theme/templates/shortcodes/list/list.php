<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"type" => "check",
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$type = strtolower( $type );
?>

<div class="horizon-shortcode-list <?php echo esc_attr( $type ); ?>"><?php echo $shortcode_atts['content']; ?></div>
