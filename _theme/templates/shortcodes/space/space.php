<?php 
global $shortcode_atts; 
extract( shortcode_atts( array(
	"height" => "30"
), $shortcode_atts['atts'] ) );
?>
<div class="clear" style="height:<?=$height;?>px"></div>