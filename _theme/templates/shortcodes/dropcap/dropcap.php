<?php	
global $shortcode_atts;
extract( shortcode_atts( array(
	"background" => "transparent",
	"color" => "inherit",
	"type" => ""
), $shortcode_atts['atts'] ) );
	
// Standardise text inputs
$type = strtolower($type);
?>
		
<div class="shortcode-dropcap  <?=esc_attr($type);?>" style="background-color:<?=$background;?>; color:<?=$color;?>;"><?=$shortcode_atts['content'];?></div>