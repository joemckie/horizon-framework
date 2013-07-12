<?php

global $shortcode_atts;

extract( shortcode_atts( array(
	"background"  => "#00cbe9",
	"color"       => "#ffffff",
	"size"        => "small",
	"href"        => "#",
	"target"      => "_self",
	"rounded"     => "",
	"hover_bg"    => "",
	"hover_color" => ""
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$size = strtolower( $size );

switch ( $size ):
	case "small":
		$font_size = '11px';
		break;
	case "medium":
		$font_size = '13px';
		break;
	case "large":
		$font_size = '15px';
		break;
endswitch;

$hover_bg = $hover_bg !== "" ? ' data-hoverbg="' . $hover_bg . '"' : "";
$hover_color = $hover_color !== "" ? ' data-hovercolor="' . $hover_color . '"' : "";

?>
<a class="<?php echo $rounded; ?> horizon-shortcode-button horizon-button <?php echo esc_attr( $size ); ?>"
   href="<?php echo $href; ?>"
   style="background-color:<?php echo $background; ?> !important; color:<?php echo $color; ?>;"
   target="<?php echo $target; ?>" data-bg="<?php echo $background; ?>"
   data-color="<?php echo $color; ?>" <?php echo $hover_bg . $hover_color; ?>><?php echo $shortcode_atts['content']; ?></a>