<?php
	global $shortcode_atts;
	extract( shortcode_atts( array(
		"media" => "",
		"size" => "small",
	), $shortcode_atts['atts'] ) );
	
	// Standardise text inputs
	$content = strtolower($content);
	$content = empty($content) ? '#' : $content;	
	$media = strtolower($media);
	$size = strtolower($size);
?>
<a href="<?=$shortcode_atts['content'];?>"><img src="<?=ROOT;?>/_theme/images/icons/social-media/<?=$size;?>/<?=$media;?>.png" /></a>