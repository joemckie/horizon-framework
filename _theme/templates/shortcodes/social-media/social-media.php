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
<a href="<?php echo $shortcode_atts['content'];?>"><img src="<?php echo ROOT;?>/_theme/images/icons/social-media/<?php echo $size;?>/<?php echo $media;?>.png" /></a>