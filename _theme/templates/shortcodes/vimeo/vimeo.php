<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"height" => "315",
	"title" => "Vimeo",
	"width" => "560"
), $shortcode_atts['atts'] ) );
	
echo horizon_filter_id_vimeo($shortcode_atts['content'], $height, $title, $width);
?>