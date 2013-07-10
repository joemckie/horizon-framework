<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"active" => "",
	"title" => "",
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$active = strtolower($active);	
?>
	
<h6 class="toggle-title <?=$active;?>" role="tab"><?=$title;?></h6>
<div class="toggle-content <?=$active;?>" role="tabpanel">
	<p><?=$shortcode_atts['content'];?></p>
</div>