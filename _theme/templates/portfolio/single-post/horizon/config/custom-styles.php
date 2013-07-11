<?php
	$temp_att = horizon_style_attribute('opacity', get_option( THEME_SHORT_NAME. '_options_portfolio_horizon_single_lightbox_opacity' ));
	horizon_build_selector('.single-portfolio-post .portfolio-thumbnail a.lightbox img:hover, .single-portfolio-post .project-images a.lightbox img:hover', $temp_att);
?>