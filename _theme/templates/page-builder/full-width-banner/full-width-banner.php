<?php 
global $attributes;
extract($attributes);
$content = apply_filters('', str_replace("&gt;", "<", $content));
?>

<div class="force-full-width horizon-full-width-wrapper" style="background-color:<?=$wrapper_colour;?>; color:<?=$content_colour;?>">
	<div class="container">
		<div class="twelve columns">
			<h1 style="color:<?=$content_colour;?>"><?=$title;?></h1>
			<?=do_shortcode($content);?>
		</div>
	</div>
</div>