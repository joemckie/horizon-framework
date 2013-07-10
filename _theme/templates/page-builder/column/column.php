<?php 
global $attributes; 
extract($attributes);
?>
<div class="horizon-col">
	<?php if($header!=="") { ?>
		<h1><?=$header;?></h1>
	<?php } ?>
	<?=do_shortcode(horizon_filter_content($content));?>
</div>
