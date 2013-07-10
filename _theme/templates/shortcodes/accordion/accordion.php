<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"header" => ""
), $shortcode_atts['atts'] ) );
?>

<div class="accordion-trigger horizon-accordion" role="tablist">
	<?php if($header !== ""){?> <h3><?=$header;?></h3> <?php }?>
	<?=do_shortcode($shortcode_atts['content']);?>
</div>