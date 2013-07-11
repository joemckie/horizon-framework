<?php 
global $shortcode_atts; 
extract( shortcode_atts( array(
	"height" => "30"
), $shortcode_atts['atts'] ) );
?>
<div class="clear" style="height:<?php echo $height;?>px"></div>