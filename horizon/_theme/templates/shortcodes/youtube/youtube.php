<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"height" => "315",
	"title"  => "YouTube",
	"width"  => "560"
), $shortcode_atts['atts'] ) );

echo horizon_format_youtube_video( $shortcode_atts['content'], $height, $title, $width );