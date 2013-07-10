<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"align" => "left",
	"caption" => "",
	"height" => "",
	"lightbox" => false,
	"group" => false,
	"rounded" => "",
	"src" => "#",
	"video_thumbnail" => "",
	"width" => "",
), $shortcode_atts['atts'] ) );

$thumbnail = $video_thumbnail == "" ? $src : $video_thumbnail;
$rounded = strtolower($rounded);

if($lightbox && $group){$rel = 'rel="lightbox['.$group.']"';}
else if($lightbox){$rel = 'rel="lightbox"';}

?>
<div class="horizon-shortcode-frame <?=$align;?>">
	<?php if($lightbox) { ?>
		<a href="<?=$src;?>" <?=$rel;?> title="<?=$caption;?>"><img class="<?=$rounded;?>" alt="<?=$caption;?>" height="<?=$height;?>" src="<?=$thumbnail;?>" title="<?=$caption;?>" width="<?=$width;?>" /></a>
	<?php } else { ?>
		<img alt="<?=$caption;?>" height="<?=$height;?>" src="<?=$thumbnail;?>" title="<?=$caption;?>" width="<?=$width;?>" />
	<?php } ?>
</div>