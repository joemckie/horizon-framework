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
		
<div class="shortcode-dropcap  <?php echo esc_attr($type);?>" style="background-color:<?php echo $background;?>; color:<?php echo $color;?>;"><?php echo $shortcode_atts['content'];?></div>