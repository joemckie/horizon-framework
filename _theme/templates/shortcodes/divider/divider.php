<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"scroll_text" => ""
), $shortcode_atts['atts'] ) );
?>
	
<div class="horizon-divider">
	<div class="horizon-divider-colour"></div>
	<?php if($scroll_text !== "") { 	
		echo '<div class="horizon-scroll-to-top">'.$scroll_text.'</div>';
	} ?>
</div>