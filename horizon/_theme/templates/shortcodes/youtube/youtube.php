<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"height" => "315",
	"title"  => "YouTube",
	"width"  => "560"
), $shortcode_atts['atts'] ) );

echo horizon_filter_id_youtube( $shortcode_atts['content'], $height, $title, $width );