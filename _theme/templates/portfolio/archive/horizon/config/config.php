<?php 
	
	/*
	*	Horizon Style Portfolio - Archive Settings
	*/
	
	global $portfolio_meta_boxes, $portfolio_tabs, $theme_defaults;
	
	// Theme Options Settings	
	$sidebar_array[__("Portfolio")]['menus']['Archive Settings'] = array("id" => "portfolio-archive-settings");	
	$elements_array[__('Portfolio Archive Settings - Horizon Style')] = 
	array(
		"id" => "portfolio-archive-settings",
		"elements" => array(
			__("Title Typography") => array(
				"type" => "typography",
				"name" => THEME_SHORT_NAME. "_options_portfolio_horizon_archive_title",
				"title" => "Title Font",
				"defaults" => array(
					"colour" => $theme_defaults['header_colour'],
					"font" => $theme_defaults['header_font'],
					"size" => "30",
					"size_type" => "px",
					"weight" => "700"
				),
				"selector" => ".search_results.portfolio-results.horizon-style .portfolio-title a",
				"attr" => array(
					"colour" => "color", 
					"font" => "font-family", 
					"size" => "font-size", 
					"weight" => "font-weight"
				),
			),
			__("Title Hover") => array(
				"type" => "typography",
				"name" => THEME_SHORT_NAME. "_options_portfolio_horizon_archive_title_hover",
				"title" => "Title Hover",
				"defaults" => array(
					"colour" => $theme_defaults['header_colour'],
					"decoration" => "none",
				),
				"selector" => ".search_results.portfolio-results.horizon-style .portfolio-title a:hover",
				"attr" => array(
					"colour" => "color",
					"decoration" => "text-decoration",
				),
				"preview" => false
			),
		),
	);
?>