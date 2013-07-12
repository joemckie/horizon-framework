<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"align" => "center"
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$align = strtolower( $align );
?>
<blockquote class="<?php echo esc_attr( $align ); ?>">
	<p><?php echo $shortcode_atts['content']; ?></p>
</blockquote>