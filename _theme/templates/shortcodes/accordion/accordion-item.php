<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"active" => "",
	"title" => "",
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$active = strtolower($active);	
?>
	
<h6 class="accordion-title <?=$active;?>" role="tab"><?=$title;?></h6>
<div class="accordion-content" role="tabpanel">
	<p><?=$shortcode_atts['content'];?></p>
</div>