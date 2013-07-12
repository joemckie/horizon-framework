<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"rounded" => "",
	"type"    => "info",
	"title"   => "",
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$rounded = strtolower( $rounded ) == "true" ? "rounded" : "";
$style = strtolower( $style );
$type = strtolower( $type );

?>

<div class="horizon-message <?php echo esc_attr( $type ); ?> <?php echo $rounded; ?>">
	<div class="message-title"><?php echo $title; ?></div>
	<div class="message-content"><?php echo $shortcode_atts['content']; ?></div>
</div>
