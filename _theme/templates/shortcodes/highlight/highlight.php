<?php
global $shortcode_atts;
extract( shortcode_atts( array(
	"background" => get_option(THEME_SHORT_NAME."_options_highlight_default_bg"),
	"color" => get_option(THEME_SHORT_NAME."_options_highlight_default_color")
), $shortcode_atts['atts'] ) );
?>	

<span class="horizon-highlight" style="background-color:<?=$background;?>; color:<?=$color;?>;"><?=$shortcode_atts['content'];?></span>