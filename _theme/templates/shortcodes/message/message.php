<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"rounded" 	=> "",
	"type" 		=> "info",
	"title"		=> "",
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$rounded = strtolower($rounded)=="true" ? "rounded" : "";
$style = strtolower($style);	
$type = strtolower($type);	

?>

<div class="horizon-message <?=esc_attr($type);?> <?=$rounded;?>">
	<div class="message-title"><?=$title;?></div>
	<div class="message-content"><?=$shortcode_atts['content'];?></div>
</div>
