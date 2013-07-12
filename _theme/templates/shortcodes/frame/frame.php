<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"align"           => "left",
	"caption"         => "",
	"height"          => "",
	"lightbox"        => false,
	"group"           => false,
	"rounded"         => "",
	"src"             => "#",
	"video_thumbnail" => "",
	"width"           => "",
), $shortcode_atts['atts'] ) );

$thumbnail = $video_thumbnail == "" ? $src : $video_thumbnail;
$rounded = strtolower( $rounded );

if ( $lightbox && $group ) {
	$rel = 'rel="lightbox[' . $group . ']"';
} else {
	if ( $lightbox ) {
		$rel = 'rel="lightbox"';
	}
}

?>
<div class="horizon-shortcode-frame <?php echo $align; ?>">
	<?php if ( $lightbox ) { ?>
		<a href="<?php echo $src; ?>" <?php echo $rel; ?> title="<?php echo $caption; ?>"><img
				class="<?php echo $rounded; ?>" alt="<?php echo $caption; ?>" height="<?php echo $height; ?>"
				src="<?php echo $thumbnail; ?>" title="<?php echo $caption; ?>" width="<?php echo $width; ?>"/></a>
	<?php } else { ?>
		<img alt="<?php echo $caption; ?>" height="<?php echo $height; ?>" src="<?php echo $thumbnail; ?>"
			 title="<?php echo $caption; ?>" width="<?php echo $width; ?>"/>
	<?php } ?>
</div>