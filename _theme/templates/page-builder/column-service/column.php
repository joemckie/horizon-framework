<?php 
global $attributes; 
extract($attributes);
?>
<div class="horizon-col-services">
	<div class="icon">
		<i class="icon-<?=$service_icon;?> icon-2x"></i>
	</div>
	<?php if($header!==""){
		echo '<h3>'.$header.'</h3>';
	} ?>
	<?=do_shortcode(horizon_filter_content($content));?>
	<?php if((string)$button_text !== "" && (string)$button_link !== "") {
		echo '<a class="horizon-button rounded" href="'.$button_link.'" target="_blank">'.$button_text.'</a>';
	} else if((string)$button_text == "" && (string)$button_link !== "") {
		echo '<a class="horizon-button rounded" href="'.$button_link.'" target="_blank">'.$button_link.'</a>';
	} ?>
</div>