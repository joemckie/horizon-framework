<?php

/*
	*
	*	@version: 1.0.0
	*	@author: Joe McKie
	*	@link: http://joemck.ie/
	*	@copyright: Joe McKie 2013
	*
	*	This file is part of the Horizon Framework.
	*
	*   Horizon Framework is free software: you can redistribute it and/or modify
	*   it under the terms of the GNU General Public License as published by
	*   the Free Software Foundation, either version 3 of the License, or
	*   (at your option) any later version.
	*
	*   Horizon Framework is distributed in the hope that it will be useful,
	*   but WITHOUT ANY WARRANTY; without even the implied warranty of
	*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	*   GNU General Public License for more details.
	*
	*   You should have received a copy of the GNU General Public License
	*   along with the Horizon Framework.  If not, see <http://www.gnu.org/licenses/>.
	*
	*	Horizon Framework is built and maintained by Joe McKie (http://joemck.ie/)
	*
	*/

// Variables used here are for quickly setting repeated values.
// You may need to edit individual arrays for your needs!

global $theme_defaults;

$theme_defaults = array(
	'header_font'       => 'Open Sans',
	'body_font'         => 'Helvetica Neue',
	'alternate_font'    => 'PT Sans',

	'header_colour'     => '#333333',
	'body_colour'       => '#333333',
	'link_colour'       => '#333333',
	'link_hover_colour' => '#333333',
);

//**===============================**//

// MAIN MENUS => SUB MENUS
$sidebar_array = array(
	__( "General", 'horizon-framework' ) => array(
		'id' => 'general-settings',
		'menu_icon' => 'general',
		'default' => true,
		'menus' => array(
			__( 'Settings', 'horizon-framework' ) 							=> array( 'id' => "general-settings", "default" => true ),
			__( 'Typography', 'horizon-framework' ) 						=> array( 'id' => "general-typography" ),
			__( 'Colours', 'horizon-framework' ) 								=> array( 'id' => "general-colours" ),
			__( 'Archive / Search Style', 'horizon-framework' ) => array( "id" => "archive-search-style" ),
			__( 'Favicon', 'horizon-framework' ) 								=> array( "id" => "favicon" ),
		)
	),
	__( "Header", 'horizon-framework' ) => array(
		"id" => "header",
		"menu_icon" => "header",
		"menus" => array(
			__( "Settings", 'horizon-framework' ) 							=> array( "id" => "header-settings" ),
			__( "Typography", 'horizon-framework' ) 						=> array( "id" => "header-typography" ),
			__( "Colours", 'horizon-framework' ) 								=> array( "id" => "header-colours" ),
		),
	),
	__( "Footer", 'horizon-framework' ) => array(
		"id" => "footer",
		"menu_icon" => "footer",
		"menus" => array(
			__( "Settings", 'horizon-framework' ) 							=> array( "id" => "footer-settings" ),
			__( "Typography", 'horizon-framework' ) 						=> array( "id" => "footer-typography" ),
			__( "Colours", 'horizon-framework' ) 								=> array( "id" => "footer-colours" ),
		),
	),
	__( "Elements", 'horizon-framework' ) => array(
		"id" => "elements",
		"menu_icon" => "elements",
		"menus" => array(
			__( "Accordion / Toggle", 'horizon-framework' ) 		=> array( "id" => "elements-accordion-toggle" ),
			__( "Blockquote", 'horizon-framework' )         		=> array( "id" => "elements-blockquote" ),
			__( "Button", 'horizon-framework' )             		=> array( "id" => "elements-button" ),
			__( "Column Services", 'horizon-framework' )    		=> array( "id" => "elements-column-services" ),
			__( "Divider", 'horizon-framework' )            		=> array( "id" => "elements-divider" ),
			__( "Full Width Banner", 'horizon-framework' )  		=> array( "id" => "elements-full-width-banner" ),
			__( "Highlight", 'horizon-framework' )          		=> array( "id" => "elements-highlight" ),
			__( "Input", 'horizon-framework' )              		=> array( "id" => "elements-input" ),
			__( "Post Slider", 'horizon-framework' )        		=> array( "id" => "elements-post-slider" ),
			__( "Pre", 'horizon-framework' )                		=> array( "id" => "elements-pre" ),
			__( "Table", 'horizon-framework' )              		=> array( "id" => "elements-table" ),
			__( "Tabs", 'horizon-framework' )               		=> array( "id" => "elements-tabs" ),
			__( "Testimonial", 'horizon-framework' )        		=> array( "id" => "elements-testimonial" ),
		),
	),
	__( "Pages", 'horizon-framework' ) => array(
		"id" => "pages",
		"menu_icon" => "page",
		"menus" => array(
			__( "Search", 'horizon-framework' )     						=> array( "id" => "pages-search" ),
			__( "Categories", 'horizon-framework' ) 						=> array( "id" => "pages-categories" ),
			__( "Author", 'horizon-framework' )    							=> array( "id" => "pages-author" ),
			__( "Typography", 'horizon-framework') 							=> array( "id" => "pages-typography" ),
		),
	),
	__( "Blog", 'horizon-framework' ) => array(
		"id" => "blog",
		"menu_icon" => "blog",
		"menus" => array(
			__( "General Settings", 'horizon-framework' ) 			=> array( "id" => "blog-settings" ),
		),
	),
	__( "Portfolio", 'horizon-framework' )   => array(
		"id" => "portfolio",
		"menu_icon" => "portfolio",
		"menus" => array(
			__( "General Settings", 'horizon-framework' ) 			=> array( "id" => "portfolio-settings" ),
		),
	),
	__( "Comments", 'horizon-framework' ) => array(
		"id" => "comments",
		"menu_icon" => "comments",
		"menus" => array(
			__( "General Settings", 'horizon-framework' ) 			=> array( "id" => "comments-settings" ),
		),
	),
	/*__("Social Networks", 'horizon-framework') => array(
			"id" => "individual-elements",
			"menu_icon" => "social",
			"menus" => array(
				__("Social Networks", 'horizon-framework') => array ("id" => "social-networks"),
			),
		),*/
	__( "Sidebars", 'horizon-framework' ) => array(
		"id" => "custom-sidebars",
		"menu_icon" => "sidebars",
		"menus" => array(
			__( "Custom Sidebars", 'horizon-framework' ) 				=> array( "id" => "custom-sidebars" ),
			__( "Typography", 'horizon-framework' ) 						=> array( "id" => "sidebars-typography" ),
		),
	),
	__( "Custom Code", 'horizon-framework' ) => array(
		"id" => "custom-code",
		"menu_icon" => "custom-code",
		"menus" => array(
			__( "Custom Styles", 'horizon-framework' )  				=> array( "id" => "custom-styles" ),
			__( "Custom Scripts", 'horizon-framework' )	 				=> array( "id" => "custom-scripts" ),
		),
	),
);

do_action( 'horizon_include_theme_config' );

// Array containing the panels & elements (ID = the ID of the corresponding menu in the array above)
$elements_array = array(
	__( "General Settings", 'horizon-framework' ) => array(
		"default"  => true,
		"id" => "general-settings",
		"elements" => array(
			__( "Enable Full Width", 'horizon-framework' ) => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_enable_full_width",
				"title"          => "Enable Full Width",
				"default"        => "No",
				"selected_value" => "Yes",
			),
			__( "Enable Responsive", 'horizon-framework' )     => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_is_responsive",
				"title"          => "Enable Responsive",
				"default"        => "Yes",
				"description"    => "If the checkbox is checked, your site will adapt to the resolution of the device you are viewing it on.",
				"selected_value" => "Yes",
			),
			__( "Default Page Layout", 'horizon-framework' )   => array(
				"type"    => "radio-image",
				"name"    => THEME_SHORT_NAME . "_options_default_page_layout",
				"title"   => "Default Page Layout",
				"default" => "Right Sidebar",
				"options" => array(
					"Left Sidebar"  => ROOT . "/_horizon/images/icons/radio-image/left-sidebar.png",
					"Right Sidebar" => ROOT . "/_horizon/images/icons/radio-image/right-sidebar.png",
					"Both Sidebars" => ROOT . "/_horizon/images/icons/radio-image/both-sidebar.png",
					"No Sidebars"   => ROOT . "/_horizon/images/icons/radio-image/no-sidebar.png",
				)
			),
			__( "Default Left Sidebar", 'horizon-framework' )  => array(
				"type"    => "select",
				"name"    => THEME_SHORT_NAME . "_options_default_left_sidebar",
				"title"   => "Default Left Sidebar",
				"default" => "Left Sidebar",
				"options" => horizon_get_all_sidebars()
			),
			__( "Default Right Sidebar", 'horizon-framework' ) => array(
				"type"    => "select",
				"name"    => THEME_SHORT_NAME . "_options_default_right_sidebar",
				"title"   => "Default Right Sidebar",
				"default" => "Right Sidebar",
				"options" => horizon_get_all_sidebars()
			),
			__( "Excerpt Length", 'horizon-framework' )        => array(
				"type"        => "input",
				"name"        => THEME_SHORT_NAME . "_options_excerpt_length",
				"title"       => "Excerpt Length",
				"default"     => "55",
				"description" => "The number of words that will appear before showing the 'Read more' link",
				"spinner"     => true,
				"max_value"   => "100",
				"min_value"   => "0"
			),
		),
	),
	__( "General Typography", 'horizon-framework' )          => array(
		"id"       => "general-typography",
		"elements" => array(
			__( "Body Text", 'horizon-framework' )  => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_body_text_typography",
				"title"    => "Body Text",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "15",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => "body",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Link", 'horizon-framework' )       => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_link",
				"title"    => "Links",
				"defaults" => array(
					"colour"     => $theme_defaults['link_colour'],
					"decoration" => "none",
					"weight"     => "regular",
				),
				"selector" => "a",
				"attr"     => array(
					"colour"     => "color",
					"decoration" => "text-decoration",
					"weight"     => "font-weight"
				),
				"preview"  => false
			),
			__( "Link Hover", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_link_hover",
				"title"    => "Links Hover",
				"defaults" => array(
					"colour"     => $theme_defaults['link_hover_colour'],
					"decoration" => "underline",
					"weight"     => "regular",
				),
				"selector" => "a:hover, a:focus",
				"attr"     => array(
					"colour"     => "color",
					"decoration" => "text-decoration",
					"weight"     => "font-weight"
				),
				"preview"  => false
			),
			__( "H1", 'horizon-framework' )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_h1_typography",
				"title"    => "H1",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "50",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "h1",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "H2", 'horizon-framework' )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_h2_typography",
				"title"    => "H2",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "30",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "h2",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "H3", 'horizon-framework' )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_h3_typography",
				"title"    => "H3",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "24",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "h3",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "H4", 'horizon-framework' )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_h4_typography",
				"title"    => "H4",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "21",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "h4",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "H5", 'horizon-framework' )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_h5_typography",
				"title"    => "H5",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "17",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "h5",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "H6", 'horizon-framework' )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_h6_typography",
				"title"    => "H6",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "14",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "h6",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
		),
	),
	__( "General Colours", 'horizon-framework' )             => array(
		"id"       => "general-colours",
		"elements" => array(
			__( "Body Background Type", 'horizon-framework' )          => array(
				"type"         => "select",
				"name"         => THEME_SHORT_NAME . "_options_body_background_type",
				"no_hr"        => true,
				"title"        => __( "Body Background Type", 'horizon-framework' ),
				"default"      => "Block Colour",
				"options"      => array( "Block Colour", "Pattern", "Custom Image", "No Background" ),
				"slidecontrol" => true
			),
			__( "Body Background Colour", 'horizon-framework' )        => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_body_background_colour",
				"title"              => "Background Colour",
				"default"            => "#f0f0f0",
				"selector"           => "html",
				"attr"               => array( "background-color" ),
				"no_hr"              => true,
				"find_value"         => "body_background_type",
				"open_value"         => array( "Block Colour" ),
				"disable_style_save" => true,
				"default_open"       => true,
			),
			__( "Body Background Pattern Open", 'horizon-framework' )  => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_body_background_pattern" ),
			__( "Body Background Pattern", 'horizon-framework' )       => array(
				"type"         => "radio-image",
				"name"         => THEME_SHORT_NAME . "_options_body_background_pattern",
				"title"        => "Background Pattern",
				"default"      => ROOT . "/_horizon/images/patterns/2.jpg",
				"options"      => array(
					ROOT . "/_horizon/images/patterns/1.jpg" => ROOT . "/_horizon/images/patterns/1.jpg",
					ROOT . "/_horizon/images/patterns/2.jpg" => ROOT . "/_horizon/images/patterns/2.jpg",
					ROOT . "/_horizon/images/patterns/3.jpg" => ROOT . "/_horizon/images/patterns/3.jpg",
					ROOT . "/_horizon/images/patterns/4.png" => ROOT . "/_horizon/images/patterns/4.png",
					ROOT . "/_horizon/images/patterns/5.png" => ROOT . "/_horizon/images/patterns/5.png",
				),
				"image_width"  => 100,
				"image_height" => 100,
				"find_value"   => "body_background_type",
				"open_value"   => array( "Pattern" ),
				"no_hr"        => true
			),
			__( "Body Background Pattern Close", 'horizon-framework' ) => array( "type" => "close" ),
			__( "Body Custom Background Open", 'horizon-framework' )   => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_body_custom_background" ),
			__( "Body Custom Background", 'horizon-framework' )        => array(
				"type"       => "upload",
				"name"       => THEME_SHORT_NAME . "_options_body_custom_background",
				"title"      => "Custom Background",
				"default"    => "",
				"find_value" => "body_background_type",
				"open_value" => array( "Custom Image" ),
			),
			__( "Body Custom Background Close", 'horizon-framework' )  => array( "type" => "close" ),
			__( "Selection Background Colour", 'horizon-framework' )   => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_selection_background_colour",
				"title"    => "Selection Background Colour",
				"default"  => "#333333",
				"selector" => "::selection",
				"attr"     => array( "background-color" ),
			),
			__( "Selection Colour", 'horizon-framework' )              => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_selection_colour",
				"title"    => "Selection Colour",
				"default"  => "#ffffff",
				"selector" => "::selection",
				"attr"     => array( "color" ),
			),
			__( "Wrapper Background Colour", 'horizon-framework' )     => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_wrapper_background_colour",
				"title"    => "Wrapper Background Colour",
				"default"  => "#ffffff",
				"selector" => ".page-wrapper",
				"attr"     => array( "background-color" ),
			),
		),
	),
	__( "Archive / Search Style", 'horizon-framework' )      => array(
		"id"       => "archive-search-style",
		"elements" => array(
			__( "Default Layout", 'horizon-framework' )        => array(
				"type"    => "radio-image",
				"name"    => THEME_SHORT_NAME . "_options_archive_page_layout",
				"title"   => "Page Layout",
				"default" => "Right Sidebar",
				"options" => array(
					"Left Sidebar"  => ROOT . "/_horizon/images/icons/radio-image/left-sidebar.png",
					"Right Sidebar" => ROOT . "/_horizon/images/icons/radio-image/right-sidebar.png",
					"Both Sidebars" => ROOT . "/_horizon/images/icons/radio-image/both-sidebar.png",
					"No Sidebars"   => ROOT . "/_horizon/images/icons/radio-image/no-sidebar.png",
				)
			),
			__( "Default Left Sidebar", 'horizon-framework' )  => array(
				"type"    => "select",
				"name"    => THEME_SHORT_NAME . "_options_archive_left_sidebar",
				"title"   => "Left Sidebar",
				"default" => "Left Sidebar",
				"options" => horizon_get_all_sidebars()
			),
			__( "Default Right Sidebar", 'horizon-framework' ) => array(
				"type"    => "select",
				"name"    => THEME_SHORT_NAME . "_options_archive_right_sidebar",
				"title"   => "Right Sidebar",
				"default" => "Right Sidebar",
				"options" => horizon_get_all_sidebars()
			),
		)
	),
	__( "Favicon", 'horizon-framework' )                     => array(
		"id"       => "favicon",
		"elements" => array(
			__( "Enable Custom Favicon", 'horizon-framework' ) => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_enable_custom_favicon",
				"title"          => "Enable Custom Favicon",
				"default"        => "No",
				"selected_value" => "Yes"
			),
			__( "Custom Favicon", 'horizon-framework' )        => array(
				"type"        => "upload",
				"name"        => THEME_SHORT_NAME . "_options_custom_favicon",
				"title"       => "Custom Favicon",
				"default"     => "",
				"description" => "Favicons are 16x16px."
			),
		),
	),
	__( "Header Settings", 'horizon-framework' )             => array(
		"id"       => "header-settings",
		"elements" => array(
			__( "Logo Position", 'horizon-framework' )      => array(
				"type"         => "select",
				"name"         => THEME_SHORT_NAME . "_options_site_logo_position",
				"title"        => "Logo Position",
				"default"      => "Center",
				"options"      => array( "Left", "Center", "Right" ),
				"slidecontrol" => true,
				"no_hr"        => true
			),
			__( "Site Logo", 'horizon-framework' )          => array(
				"type"  => "upload",
				"name"  => THEME_SHORT_NAME . "_options_site_logo",
				"title" => "Logo",
			),
			__( "Logo Top Margin", 'horizon-framework' )    => array(
				"type"      => "input",
				"name"      => THEME_SHORT_NAME . "_options_site_logo_top_margin",
				"title"     => "Logo Top Margin",
				"default"   => "47",
				"spinner"   => true,
				"max_value" => "70",
				"min_value" => "0"
			),
			__( "Logo Bottom Margin", 'horizon-framework' ) => array(
				"type"      => "input",
				"name"      => THEME_SHORT_NAME . "_options_site_logo_bottom_margin",
				"title"     => "Logo Bottom Margin",
				"default"   => "43",
				"spinner"   => true,
				"max_value" => "70",
				"min_value" => "0"
			),
			__( "Nav Top Margin", 'horizon-framework' )     => array(
				"type"      => "input",
				"name"      => THEME_SHORT_NAME . "_options_site_nav_top_margin",
				"title"     => "Nav Top Margin",
				"default"   => "66",
				"spinner"   => true,
				"max_value" => "70",
				"min_value" => "0"
			),
			__( "Nav Bottom Margin", 'horizon-framework' )  => array(
				"type"      => "input",
				"name"      => THEME_SHORT_NAME . "_options_site_nav_bottom_margin",
				"title"     => "Nav Bottom Margin",
				"default"   => "66",
				"spinner"   => true,
				"max_value" => "70",
				"min_value" => "0"
			),
		),
	),
	__( "Header Typography", 'horizon-framework' )           => array(
		"id"       => "header-typography",
		"elements" => array(
			__( "Navigation Typography", 'horizon-framework' )     => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_navigation_typography",
				"title"    => "Navigation Font",
				"defaults" => array(
					"colour"    => $theme_defaults['link_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "14",
					"size_type" => "px",
					"transform" => "none",
					"weight"    => "700"
				),
				"selector" => ".sf-menu > li a",
				"attr"     => array(
					"colour"    => "color",
					"font"      => "font-family",
					"size"      => "font-size",
					"transform" => "text-transform",
					"weight"    => "font-weight"
				),
			),
			__( "Navigation Hover", 'horizon-framework' )          => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_navigation_link_hover",
				"title"    => "Navigation Hover",
				"defaults" => array( "colour" => $theme_defaults['link_hover_colour'] ),
				"selector" => ".sf-menu li a:hover, .sf-menu li.sfHover > a",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Navigation Active", 'horizon-framework' )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_navigation_link_active",
				"title"    => "Navigation Active",
				"defaults" => array( "colour" => $theme_defaults['link_hover_colour'] ),
				"selector" => ".sf-menu li.current-menu-ancestor > a, .sf-menu li.current-menu-item > a, .sf-menu li li.current-menu-item > a, .sf-menu li li.current-menu-ancestor > a, .sf-menu li li.current-menu-ancestor li.current-menu-item > a",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Sub Navigation Typography", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_sub_navigation_typography",
				"title"    => "Sub Navigation Font",
				"defaults" => array(
					"colour"    => $theme_defaults['link_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "14",
					"size_type" => "px",
					"transform" => "none",
					"weight"    => "700"
				),
				"selector" => "sf-menu li ul li a, .sf-menu li ul li a",
				"attr"     => array(
					"colour"    => "color",
					"font"      => "font-family",
					"size"      => "font-size",
					"transform" => "text-transform",
					"weight"    => "font-weight"
				),
			),
			__( "Sub Navigation Hover", 'horizon-framework' )      => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_sub_navigation_link_hover",
				"title"    => "Sub Navigation Hover",
				"defaults" => array( "colour" => $theme_defaults['link_hover_colour'] ),
				"selector" => "sf-menu li ul li a:hover, .sf-menu li ul li a:hover",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Sub Navigation Active", 'horizon-framework' )     => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_sub_navigation_link_active",
				"title"    => "Sub Navigation Active",
				"defaults" => array( "colour" => $theme_defaults['link_hover_colour'] ),
				"selector" => ".sf-menu li.current-menu-ancestor ul li.current-menu-item > a",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Title Typography", 'horizon-framework' )          => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_page_title_typography",
				"title"    => "Page Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "50",
					"size_type" => "px",
					"weight"    => "300"
				),
				"selector" => "#page-header h1",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
		),
	),
	__( "Header Colours", 'horizon-framework' )              => array(
		"id"       => "header-colours",
		"elements" => array(
			__( "Header Background Colour", 'horizon-framework' )         => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_wrapper_header_background_colour",
				"title"    => "Header Background Colour",
				"default"  => "#ffffff",
				"selector" => "header",
				"attr"     => array( "background-color" ),
			),
			__( "Sub Navigation Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_sub_navigation_background_colour",
				"title"    => "Sub-Nav Background Colour",
				"default"  => "#ffffff",
				"selector" => ".sf-menu li ul li a",
				"attr"     => array( "background-color" ),
			),
			__( "Sub Navigation Border Colour", 'horizon-framework' )     => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_sub_navigation_border_colour",
				"title"    => "Sub-Nav Border Colour",
				"default"  => "#ededed",
				"selector" => "header ul.sub-menu li a",
				"attr"     => array( "border-color" ),
			),
		),
	),
	__( "Footer Settings", 'horizon-framework' )             => array(
		"id"       => "footer-settings",
		"elements" => array(
			__( "Enable Footer", 'horizon-framework' )        => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_enable_footer",
				"title"          => "Enable Footer",
				"default"        => "No",
				"selected_value" => "Yes",
			),
			__( "Footer Layout", 'horizon-framework' )        => array(
				"type"    => "radio-image",
				"name"    => THEME_SHORT_NAME . "_options_footer_layout",
				"title"   => "Footer Layout",
				"default" => "1x1x2",
				"options" => array(
					"1col"  => ROOT . "/_horizon/images/icons/radio-image/no-sidebar.png",
					"2col"  => ROOT . "/_horizon/images/icons/radio-image/2-col.png",
					"3col"  => ROOT . "/_horizon/images/icons/radio-image/3-col.png",
					"4col"  => ROOT . "/_horizon/images/icons/radio-image/4-col.png",
					"1x2"   => ROOT . "/_horizon/images/icons/radio-image/footer-left-sidebar.png",
					"2x1"   => ROOT . "/_horizon/images/icons/radio-image/footer-right-sidebar.png",
					"1x2x1" => ROOT . "/_horizon/images/icons/radio-image/footer-both-sidebar.png",
					"1x1x2" => ROOT . "/_horizon/images/icons/radio-image/1x1x2.png",
				)
			),
			__( "Enable Copyright Bar", 'horizon-framework' ) => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_footer_enable_copyright_bar",
				"title"          => "Enable Copyright Bar",
				"default"        => "Yes",
				"selected_value" => "Yes",
			),
			__( "Copyright Left Text", 'horizon-framework' )  => array(
				"type"    => "textarea",
				"name"    => THEME_SHORT_NAME . "_options_footer_copyright_left_text",
				"title"   => "Copyright Left Text",
				"default" => '<a target="_blank"  href="https://github.com/joemckie/horizon-framework">Project Home</a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=joe%40joemck%2eie&lc=GB&item_name=Joe%20McKie&item_number=horizon_demo&no_note=0&currency_code=GBP&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest" target="_blank">Buy me a beer</a>'
			),
			__( "Copyright Right Text", 'horizon-framework' ) => array(
				"type"    => 'textarea',
				"name"    => THEME_SHORT_NAME . "_options_footer_copyright_right_text",
				"title"   => "Copyright Right Text",
				"default" => 'Horizon Framework built and maintained by <a href="http://joemck.ie/" target="_blank">Joe McKie</a> � 2013'
			),
		)
	),
	__( "Footer Typography", 'horizon-framework' )           => array(
		"id"       => "footer-typography",
		"elements" => array(
			__( "Title Typography", 'horizon-framework' )     => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_footer_title_typography",
				"title"    => "Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "14",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "footer #footer h3",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Footer Link", 'horizon-framework' )          => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_footer_link",
				"title"    => "Link Colour",
				"defaults" => array( "colour" => $theme_defaults['link_colour'] ),
				"selector" => "footer #footer a",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Footer Link Hover", 'horizon-framework' )    => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_footer_link_hover",
				"title"    => "Link Hover Colour",
				"defaults" => array( "colour" => $theme_defaults['link_colour'] ),
				"selector" => "footer #footer a:hover, footer #footer a:focus",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Text Typography", 'horizon-framework' )      => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_footer_text_typography",
				"title"    => "Text Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "14",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => "footer #footer",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Copyright Typography", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_footer_copyright_typography",
				"title"    => "Copyright Font",
				"defaults" => array(
					"colour"    => $theme_defaults['link_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "14",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => "footer #copyright",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Copyright Link", 'horizon-framework' )       => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_copyright_link",
				"title"    => "Copyright Link Colour",
				"defaults" => array( "colour" => $theme_defaults['link_colour'] ),
				"selector" => "footer #copyright a",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Copyright Link Hover", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_copyright_link_hover",
				"title"    => "Copyright Link Hover Colour",
				"defaults" => array( "colour" => $theme_defaults['link_hover_colour'] ),
				"selector" => "footer #copyright a:hover, footer #copyright a:focus",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
		),
	),
	__( "Footer Colours", 'horizon-framework' )              => array(
		"id"       => "footer-colours",
		"elements" => array(
			__( "Footer Background Type", 'horizon-framework' )          => array(
				"type"         => "select",
				"name"         => THEME_SHORT_NAME . "_options_footer_background_type",
				"no_hr"        => true,
				"title"        => __( "Footer Background Type", 'horizon-framework' ),
				"default"      => "Block Colour",
				"options"      => array( "Block Colour", "Pattern", "Custom Image", "No Background" ),
				"slidecontrol" => true
			),
			__( "Footer Background Colour", 'horizon-framework' )        => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_footer_background_colour",
				"title"              => "Background Colour",
				"default"            => "#333333",
				"selector"           => "footer",
				"attr"               => array( "background-color" ),
				"no_hr"              => true,
				"find_value"         => "footer_background_type",
				"open_value"         => array( "Block Colour" ),
				"disable_style_save" => true
			),
			__( "Footer Background Pattern Open", 'horizon-framework' )  => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_footer_background_pattern_wrap" ),
			__( "Footer Background Pattern", 'horizon-framework' )       => array(
				"type"         => "radio-image",
				"name"         => THEME_SHORT_NAME . "_options_footer_background_pattern",
				"title"        => "Background Pattern",
				"default"      => ROOT . "/_horizon/images/patterns/2.jpg",
				"options"      => array(
					ROOT . "/_horizon/images/patterns/1.jpg" => ROOT . "/_horizon/images/patterns/1.jpg",
					ROOT . "/_horizon/images/patterns/2.jpg" => ROOT . "/_horizon/images/patterns/2.jpg",
					ROOT . "/_horizon/images/patterns/3.jpg" => ROOT . "/_horizon/images/patterns/3.jpg",
					ROOT . "/_horizon/images/patterns/4.png" => ROOT . "/_horizon/images/patterns/4.png",
					ROOT . "/_horizon/images/patterns/5.png" => ROOT . "/_horizon/images/patterns/5.png",
				),
				"image_width"  => 100,
				"image_height" => 100,
				"find_value"   => "footer_background_type",
				"open_value"   => array( "Pattern" ),
				"default_open" => true,
				"no_hr"        => true
			),
			__( "Footer Background Pattern Close", 'horizon-framework' ) => array( "type" => "close" ),
			__( "Footer Custom Background Open", 'horizon-framework' )   => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_footer_custom_background_wrap" ),
			__( "Footer Custom Background", 'horizon-framework' )        => array(
				"type"       => "upload",
				"name"       => THEME_SHORT_NAME . "_options_footer_custom_background",
				"title"      => "Custom Background",
				"default"    => "",
				"find_value" => "footer_background_type",
				"open_value" => array( "Custom Image" ),
			),
			__( "Footer Custom Background Close", 'horizon-framework' )  => array( "type" => "close" ),
			__( "Bottom Bar Background Colour", 'horizon-framework' )    => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_bottom_bar_background_colour",
				"title"    => "Bottom Bar Background Colour",
				"default"  => "transparent",
				"selector" => "footer #copyright",
				"attr"     => array( "background-color" ),
			),
		),
	),
	__( "Accordion / Toggle Settings", 'horizon-framework' ) => array(
		"id"       => "elements-accordion-toggle",
		"elements" => array(
			__( "Title", 'horizon-framework' )             => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_acc_toggle_title_typography",
				"title"    => "Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "14",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".horizon-accordion h6, .horizon-toggle h6",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Active Title", 'horizon-framework' )      => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_acc_toggle_active_title_typography",
				"title"    => "Active Title Colour",
				"defaults" => array( "colour" => $theme_defaults['header_colour'] ),
				"selector" => ".horizon-accordion h6.ui-accordion-header-active",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_acc_toggle_bg_colour",
				"title"    => "Background Colour",
				"default"  => "#ffffff",
				"selector" => ".horizon-accordion, .horizon-toggle",
				"attr"     => array( "background-color" ),
			),
			__( "Border Colour", 'horizon-framework' )     => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_acc_toggle_border_colour",
				"title"    => "Border Colour",
				"default"  => "#dfdfdf",
				"selector" => ".horizon-accordion, .horizon-accordion h6, .horizon-toggle, .horizon-toggle h6",
				"attr"     => array( "border-color" ),
			),
		),
	),
	__( "Blockquote Settings", 'horizon-framework' )         => array(
		"id"       => "elements-blockquote",
		"elements" => array(
			__( "Blockquote", 'horizon-framework' )               => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blockquote_typography",
				"title"    => "Blockquote Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['alternate_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "italic"
				),
				"selector" => "blockquote",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Blockquote Border Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_blockquote_border_colour",
				"title"    => "Blockquote Border Colour",
				"default"  => "transparent",
				"selector" => "blockquote",
				"attr"     => array( "border-color" ),
			),
		),
	),
	__( "Button Settings", 'horizon-framework' )             => array(
		"id"       => "elements-button",
		"elements" => array(
			__( "Button", 'horizon-framework' )                         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_button_typography",
				"title"    => "Button Font",
				"defaults" => array(
					"colour"    => "#ffffff",
					"font"      => $theme_defaults['alternate_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "italic"
				),
				"selector" => ".horizon-button, #submit",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Button Hover", 'horizon-framework' )                   => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_button_hover_typography",
				"title"    => "Button Hover Colour",
				"defaults" => array( "colour" => "#ffffff" ),
				"selector" => ".horizon-button:hover, #submit:hover",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Button Background Colour", 'horizon-framework' )       => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_button_background_colour",
				"title"    => "Button Background Colour",
				"default"  => "#333333",
				"selector" => ".horizon-button, #submit",
				"attr"     => array( "background-color" ),
			),
			__( "Button Hover Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_button_hover_background_colour",
				"title"    => "Button Hover Background Colour",
				"default"  => "#3a3a3a",
				"selector" => ".horizon-button:hover, #submit:hover",
				"attr"     => array( "background-color" ),
			),
		),
	),
	__( "Column Services Settings", 'horizon-framework' )    => array(
		"id"       => "elements-column-services",
		"elements" => array(
			__( "Icon Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_col_services_icon_background_colour",
				"title"    => "Icon Background Colour",
				"default"  => $theme_defaults['header_colour'],
				"selector" => ".horizon-col-services .icon",
				"attr"     => array( "background-color" ),
			),
			__( "Icon Colour", 'horizon-framework')            => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_col_services_icon_colour",
				"title"    => "Icon Colour",
				"default"  => "#ffffff",
				"selector" => ".horizon-col-services .icon i",
				"attr"     => array( "color" ),
			),
		),
	),
	__( "Divider Settings", 'horizon-framework' )            => array(
		"id"       => "elements-divider",
		"elements" => array(
			__( "Divider Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_divider_background_colour",
				"title"    => "Divider Background Colour",
				"default"  => $theme_defaults['body_colour'],
				"selector" => ".horizon-divider-colour",
				"attr"     => array( "background-color" ),
			),
			__( "Scroll To Top Typography", 'horizon-framework')  => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_divider_scroll_to_top_typography",
				"title"    => "Scroll To Top Typography",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".horizon-scroll-to-top",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
		),
	),
	__( "Full Width Banner Settings", 'horizon-framework' )  => array(
		"id"       => "elements-full-width-banner",
		"elements" => array(
			__( "Default Background Colour", 'horizon-framework' ) => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_full_width_banner_default_bg",
				"title"              => "Default Background Colour",
				"default"            => "#333333",
				"disable_style_save" => true,
			),
			__( "Default Font Colour", 'horizon-framework' )       => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_full_width_banner_default_color",
				"title"              => "Default Font Colour",
				"default"            => "#ffffff",
				"disable_style_save" => true,
			),
		),
	),
	__( "Highlight Settings", 'horizon-framework' )          => array(
		"id"       => "elements-highlight",
		"elements" => array(
			__( "Default Background Colour", 'horizon-framework' ) => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_highlight_default_bg",
				"title"              => "Default Background Colour",
				"default"            => "#ffff00",
				"disable_style_save" => true,
			),
			__( "Default Font Colour", 'horizon-framework' )       => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_highlight_default_color",
				"title"              => "Default Font Colour",
				"default"            => "#383838",
				"disable_style_save" => true,
			),
		),
	),
	__( "Input Settings", 'horizon-framework' )              => array(
		"id"       => "elements-input",
		"elements" => array(
			__( "Input Typography", 'horizon-framework' )    => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_input",
				"title"    => "Input Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['alternate_font'],
					"size"      => "18",
					"size_type" => "px",
					"weight"    => "italic"
				),
				"selector" => ".horizon-form input[type='text'], .horizon-form textarea, #respond input[type='text'], #respond textarea, .horizon_sidebar_wrapper #searchform input.searchbar",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Required (*) Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_form_required_colour",
				"title"    => "Required (*) Colour",
				"default"  => $theme_defaults['link_colour'],
				"selector" => ".horizon-form .required, #respond .required",
				"attr"     => array( "color" ),
			),
		),
	),
	__( "Post Slider Settings", 'horizon-framework' )        => array(
		"id"       => "elements-post-slider",
		"elements" => array(
			__( "Title Font", 'horizon-framework' )           => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_post_slider_title_typography",
				"title"    => "Title Font",
				"defaults" => array(
					"colour"     => $theme_defaults['header_colour'],
					"font"       => $theme_defaults['header_font'],
					"size"       => "50",
					"size_type"  => "px",
					"decoration" => "none",
					"weight"     => "700"
				),
				"selector" => ".horizon-post-scroller .post-item h2 a",
				"attr"     => array(
					"colour"     => "color",
					"decoration" => "text-decoration",
					"font"       => "font-family",
					"size"       => "font-size",
					"weight"     => "font-weight"
				),
			),
			__( "Title Font Hover", 'horizon-framework' )     => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_post_slider_title_hover_typography",
				"title"    => "Title Font Hover",
				"defaults" => array(
					"colour"     => "#3b3b3b",
					"decoration" => "none",
				),
				"selector" => ".horizon-post-scroller .post-item h2 a:hover",
				"attr"     => array(
					"colour"     => "color",
					"decoration" => "text-decoration",
				),
				"preview"  => false
			),
			__( "Metadata Font", 'horizon-framework' )        => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_post_slider_metadata_typography",
				"title"    => "Metadata Font",
				"defaults" => array(
					"colour"     => $theme_defaults['body_colour'],
					"font"       => $theme_defaults['body_font'],
					"size"       => "12",
					"size_type"  => "px",
					"decoration" => "none",
					"weight"     => "700"
				),
				"selector" => ".horizon-post-scroller .post-info, .horizon-post-scroller .post-info a",
				"attr"     => array(
					"colour"     => "color",
					"decoration" => "text-decoration",
					"font"       => "font-family",
					"size"       => "font-size",
					"weight"     => "font-weight"
				),
			),
			__( "Metadata Link Weight", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_post_slider_metadata_link_typography",
				"title"    => "Metadata Link Weight",
				"defaults" => array( "weight" => "700" ),
				"selector" => ".horizon-post-scroller .post-info a",
				"attr"     => array( "weight" => "font-weight" ),
				"preview"  => false
			),
			__( "Metadata Icon Color", 'horizon-framework' )  => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_post_slider_metadata_icon_colour",
				"title"    => "Metadata Icon Colour",
				"defaults" => array( "colour" => $theme_defaults['body_colour'] ),
				"selector" => ".horizon-post-scroller .post-info i",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
		),
	),
	__( "Pre Settings", 'horizon-framework' )                => array(
		"id"       => "elements-pre",
		"elements" => array(
			__( "Pre Background Type", 'horizon-framework' )          => array(
				"type"         => "select",
				"name"         => THEME_SHORT_NAME . "_options_pre_background_type",
				"no_hr"        => true,
				"title"        => __( "Pre Background Type", 'horizon-framework' ),
				"default"      => "Pattern",
				"options"      => array( "Block Colour", "Pattern", "Custom Image", "No Background" ),
				"slidecontrol" => true
			),
			__( "Pre Background Colour", 'horizon-framework' )        => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_pre_background_colour",
				"title"              => "Pre Background Colour",
				"default"            => "#efefef",
				"selector"           => "pre",
				"attr"               => array( "background-color" ),
				"no_hr"              => true,
				"find_value"         => "pre_background_type",
				"open_value"         => array( "Block Colour" ),
				"disable_style_save" => true
			),
			__( "Pre Background Pattern Open", 'horizon-framework' )  => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_pre_background_pattern_wrap" ),
			__( "Pre Background Pattern", 'horizon-framework' )       => array(
				"type"         => "radio-image",
				"name"         => THEME_SHORT_NAME . "_options_pre_background_pattern",
				"title"        => "Pre Background Pattern",
				"default"      => ROOT . "/_horizon/images/patterns/3.jpg",
				"options"      => array(
					ROOT . "/_horizon/images/patterns/1.jpg" => ROOT . "/_horizon/images/patterns/1.jpg",
					ROOT . "/_horizon/images/patterns/2.jpg" => ROOT . "/_horizon/images/patterns/2.jpg",
					ROOT . "/_horizon/images/patterns/3.jpg" => ROOT . "/_horizon/images/patterns/3.jpg",
					ROOT . "/_horizon/images/patterns/4.png" => ROOT . "/_horizon/images/patterns/4.png",
					ROOT . "/_horizon/images/patterns/5.png" => ROOT . "/_horizon/images/patterns/5.png",
				),
				"image_width"  => 100,
				"image_height" => 100,
				"find_value"   => "pre_background_type",
				"open_value"   => array( "Pattern" ),
				"default_open" => true,
				"no_hr"        => true
			),
			__( "Pre Background Pattern Close", 'horizon-framework' ) => array( "type" => "close" ),
			__( "Pre Custom Background Open", 'horizon-framework' )   => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_pre_custom_background_wrap" ),
			__( "Pre Custom Background", 'horizon-framework' )        => array(
				"type"       => "upload",
				"name"       => THEME_SHORT_NAME . "_options_pre_custom_background",
				"title"      => "Pre Custom Background",
				"default"    => "",
				"find_value" => "pre_background_type",
				"open_value" => array( "Custom Image" ),
			),
			__( "Pre Custom Background Close", 'horizon-framework' )  => array( "type" => "close" ),
			__( "Pre Typography", 'horizon-framework' )               => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_pre_typography",
				"title"    => "Pre Typography",
				"defaults" => array(
					"colour"    => "#666666",
					"font"      => "Lekton",
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => "pre",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
		),
	),
	__( "Table Settings", 'horizon-framework' )              => array(
		"id"       => "elements-table",
		"elements" => array(
			__( "Table Border", 'horizon-framework' )                   => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_table_border_colour",
				"title"    => "Table Border Colour",
				"default"  => "#dfdfdf",
				"selector" => "table, table tr, table tr td, table tr th",
				"attr"     => array( "border-color" ),
			),
			__( "Table Header Font", 'horizon-framework' )              => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_table_header_typography",
				"title"    => "Table Header Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => "table th",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Table Header Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_table_header_bg_colour",
				"title"    => "Table Header Background Colour",
				"default"  => "#ffffff",
				"selector" => "table th",
				"attr"     => array( "background-color" ),
			),
		),
	),
	__( "Tabs Settings", 'horizon-framework' )               => array(
		"id"       => "elements-tabs",
		"elements" => array(
			__( "Tab Title", 'horizon-framework' )                     => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_tab_title_typography",
				"title"    => "Tab Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "18",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".horizon-tabs ul.tabs-nav li a",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Tab Background Colour", 'horizon-framework' )         => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_tab_bg_colour",
				"title"    => "Tab Background Colour",
				"default"  => "#ffffff",
				"selector" => ".horizon-tabs ul.tabs-nav li a",
				"attr"     => array( "background-color" ),
			),
			__( "Active Tab Title", 'horizon-framework' )              => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_active_tab_title_typography",
				"title"    => "Active Tab Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "18",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".horizon-tabs ul.tabs-nav li.ui-state-active a",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Active Tab Background Colour", 'horizon-framework' )  => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_active_tab_bg_colour",
				"title"    => "Active Tab Background Colour",
				"default"  => "#ffffff",
				"selector" => ".horizon-tabs ul.tabs-nav li.ui-state-active a",
				"attr"     => array( "background-color" ),
			),
			__( "Tab Content", 'horizon-framework' )                   => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_tab_content_typography",
				"title"    => "Tab Content Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".horizon-tabs .tabs-inner",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Tab Content Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_tab_content_bg_colour",
				"title"    => "Tab Content Background Colour",
				"default"  => "#ffffff",
				"selector" => ".horizon-tabs .tabs-inner",
				"attr"     => array( "background-color" ),
			),
			__( "Tab Border Colour", 'horizon-framework' )             => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_tab_border_colour",
				"title"    => "Tab Border Colour",
				"default"  => "#dfdfdf",
				"selector" => ".horizon-tabs .tabs-inner",
				"attr"     => array( "border-color" ),
			),
		),
	),
	__( "Testimonial Settings", 'horizon-framework' )        => array(
		"id"       => "elements-testimonial",
		"elements" => array(
			__( "Testimonial", 'horizon-framework' )        => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_testimonial_content_typography",
				"title"    => "Testimonial Font",
				"defaults" => array(
					"font"      => $theme_defaults['alternate_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "italic"
				),
				"selector" => ".horizon-testimonials p",
				"attr"     => array(
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Testimonial Author", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_testimonial_author_typography",
				"title"    => "Testimonial Author Font",
				"defaults" => array(
					"font"      => $theme_defaults['body_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".horizon-testimonials strong.author",
				"attr"     => array(
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
		),
	),
	__( "Search Page", 'horizon-framework' )                 => array(
		"id"       => "pages-search",
		"elements" => array(
			__( "Display Title", 'horizon-framework' )          => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_display_search_title",
				"title"          => "Display Search Title",
				"default"        => "Yes",
				"selected_value" => "Yes",
			),
			__( "Display Results", 'horizon-framework' )        => array(
				"type"        => "input",
				"name"        => THEME_SHORT_NAME . "_options_default_search_title",
				"title"       => "Search Title",
				"default"     => '"%s"',
				"description" => "%s will take the place of the search term."
			),
			__( "Content Display", 'horizon-framework' )        => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_default_search_content_display",
				"title"       => "Content Display",
				"default"     => 'excerpt',
				"options"     => array( "content", "excerpt" ),
				"description" => "Warning: Choosing 'content' will display the full post if you don't use the MORE tag to limit this."
			),
			__( "Search Query Highlight", 'horizon-framework' ) => array(
				"type"    => "select",
				"name"    => THEME_SHORT_NAME . "_options_default_search_term_highlight",
				"title"   => "Search Term Highlight",
				"default" => 'highlight',
				"options" => array( "highlight", "bold", "none" )
			),
		),
	),
	__( "Categories Page", 'horizon-framework' )             => array(
		"id"       => "pages-categories",
		"elements" => array(
			__( "Display Title", 'horizon-framework' )   => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_display_categories_title",
				"title"          => "Display Archive Title",
				"default"        => "Yes",
				"selected_value" => "Yes",
			),
			__( "Display Results", 'horizon-framework' ) => array(
				"type"        => "input",
				"name"        => THEME_SHORT_NAME . "_options_default_categories_title",
				"title"       => "Archive Title",
				"default"     => '%s',
				"description" => "%s will take the place of the category name."
			),
			__( "Content Display", 'horizon-framework' ) => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_default_categories_content_display",
				"title"       => "Content Display",
				"default"     => 'excerpt',
				"description" => "Warning: Choosing 'content' will display the full post if you don't use the MORE tag to limit this.",
				"options"     => array( "content", "excerpt" )
			),
		),
	),
	__( "Author Page, 'horizon-framework'" )                 => array(
		"id"       => "pages-author",
		"elements" => array(
			__( "Display Title", 'horizon-framework' )   => array(
				"type"           => "checktoggle",
				"name"           => THEME_SHORT_NAME . "_options_display_author_title",
				"title"          => "Display Author Title",
				"default"        => "Yes",
				"selected_value" => "Yes",
			),
			__( "Display Results", 'horizon-framework' ) => array(
				"type"        => "input",
				"name"        => THEME_SHORT_NAME . "_options_default_author_title",
				"title"       => "Author Title",
				"default"     => '%s',
				"description" => "%s will take the place of the author name."
			),
			__( "Content Display", 'horizon-framework' ) => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_default_author_content_display",
				"title"       => "Content Display",
				"default"     => 'excerpt',
				"description" => "Warning: Choosing 'content' will display the full post if you don't use the MORE tag to limit this.",
				"options"     => array( "content", "excerpt" )
			),
		),
	),
	__( "Pages Typography", 'horizon-framework' )            => array(
		"id"       => "pages-typography",
		"elements" => array(
			__( "Title Typography", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_pages_title_typography",
				"title"    => "Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "30",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".search_results h4 a",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
		),
	),
	__( "Blog Settings", 'horizon-framework' )               => array(
		"id"       => "blog-settings",
		"elements" => array(
			__( "Blog Type", 'horizon-framework' )            => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_blog_type",
				"title"       => "Blog Type",
				"default"     => "horizon",
				"options"     => array( "horizon" ),
				"description" => "Layout style of the blog listings."
			),
			__( "Blog Single Type", 'horizon-framework' )     => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_blog_single_type",
				"title"       => "Blog Single Type",
				"default"     => "horizon",
				"options"     => array( "horizon" ),
				"description" => "Layout style of the single blog posts."
			),
			__( "Blog Archive Type", 'horizon-framework' )    => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_blog_archive_type",
				"title"       => "Blog Archive Type",
				"default"     => "horizon",
				"options"     => array( "horizon" ),
				"description" => "Layout style of the archive blog posts."
			),
			__( "Default Post Title", 'horizon-framework' )   => array(
				"type"    => "input",
				"name"    => THEME_SHORT_NAME . "_options_default_blog_post_title",
				"title"   => "Default Post Title",
				"default" => "Blog Post",
			),
			__( "Default Post Caption", 'horizon-framework' ) => array(
				"type"    => "input",
				"name"    => THEME_SHORT_NAME . "_options_default_blog_post_caption",
				"title"   => "Default Post Caption",
				"default" => "",
			),
			__( "Default Blog Size", 'horizon-framework' )    => array(
				"type"    => "select",
				"name"    => THEME_SHORT_NAME . "_options_default_blog_size",
				"title"   => "Default Blog Size",
				"default" => "Full Width",
				"options" => array( "Full Width" )
			),
			__( "Default Blog Count", 'horizon-framework' )   => array(
				"type"      => "input",
				"name"      => THEME_SHORT_NAME . "_options_default_blog_count",
				"title"     => "Default Blog Count",
				"default"   => "12",
				"spinner"   => true,
				"max_value" => "25",
				"min_value" => "-1"
			),
		),
	),
	__( "Portfolio Settings", 'horizon-framework' )          => array(
		"id"       => "portfolio-settings",
		"elements" => array(
			__( "Portfolio Type", 'horizon-framework' )          => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_portfolio_type",
				"title"       => "Portfolio Type",
				"default"     => "horizon",
				"options"     => array( "horizon" ),
				"description" => "Layout style of the portfolio listings."
			),
			__( "Portfolio Single Type", 'horizon-framework' )   => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_portfolio_single_type",
				"title"       => "Portfolio Single Type",
				"default"     => "horizon",
				"options"     => array( "horizon" ),
				"description" => "Layout style of the single portfolio posts."
			),
			__( "Portfolio Archive Type", 'horizon-framework' )  => array(
				"type"        => "select",
				"name"        => THEME_SHORT_NAME . "_options_portfolio_archive_type",
				"title"       => "Portfolio Archive Type",
				"default"     => "horizon",
				"options"     => array( "horizon" ),
				"description" => "Layout style of the archive portfolio posts."
			),
			__( "Default Post Title", 'horizon-framework' )      => array(
				"type"    => "input",
				"name"    => THEME_SHORT_NAME . "_options_default_portfolio_post_title",
				"title"   => "Default Post Title",
				"default" => "Portfolio Item",
			),
			__( "Default Post Caption", 'horizon-framework' )    => array(
				"type"    => "input",
				"name"    => THEME_SHORT_NAME . "_options_default_portfolio_post_caption",
				"title"   => "Default Post Caption",
				"default" => "",
			),
			__( "Default Portfolio Size", 'horizon-framework' )  => array(
				"type"    => "select",
				"name"    => THEME_SHORT_NAME . "_options_default_portfolio_size",
				"title"   => "Default Portfolio Size",
				"default" => "Full Width",
				"options" => array( "Full Width" )
			),
			__( "Default Portfolio Count", 'horizon-framework' ) => array(
				"type"      => "input",
				"name"      => THEME_SHORT_NAME . "_options_default_portfolio_count",
				"title"     => "Default Portfolio Count",
				"default"   => "12",
				"spinner"   => true,
				"max_value" => "25",
				"min_value" => "-1"
			),
		),
	),
	__( "Comment Settings", 'horizon-framework' )            => array(
		"id"       => "comments-settings",
		"elements" => array(
			__( "Avatar Size", 'horizon-framework' )             => array(
				"type"        => "input",
				"name"        => THEME_SHORT_NAME . "_options_comments_avatar_size",
				"title"       => "Avatar Size",
				"default"     => "60",
				"spinner"     => true,
				"max_value"   => "150",
				"min_value"   => "0",
				"description" => "Sizes are in px. <br />0 will disable avatars for comments."
			),
			__( "Author Typography", 'horizon-framework' )       => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_comments_author_typography",
				"title"    => "Author Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "18",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".vcard h6",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Comment Body Typography", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_comments_body_typography",
				"title"    => "Comment Body Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".comment-body p",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Metadata Typography", 'horizon-framework' )     => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_comments_metadata_typography",
				"title"    => "Metadata Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "15",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".commentmetadata",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Author Reply Typography", 'horizon-framework' ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_comments_authorreply_title",
				"title"    => "Author Reply Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".bypostauthor .vcard h6",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
		),
	),
	/*__("Social Sharing", 'horizon-framework') => array(
			"id" => "social-sharing",
			"elements" => array(
				__("Facebook", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_facebook", "title" => "Facebook", "default" => "No", "description" => "When this box is checked your posts will be shareable via Facebook.", "selected_value" => "Yes"),
				__("Twitter", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_twitter", "title" => "Twitter", "default" => "No", "description" => "When this box is checked your posts will be shareable via Twitter.", "selected_value" => "Yes"),
				__("Pinterest", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_pinterest", "title" => "Pinterest", "default" => "No", "description" => "When this box is checked your posts will be shareable via Pinterest.", "selected_value" => "Yes"),
				__("MySpace", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_myspace", "title" => "MySpace", "default" => "No", "description" => "When this box is checked your posts will be shareable via MySpace.", "selected_value" => "Yes"),
				__("Stumble Upon", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_stumbleupon", "title" => "Stumble Upon", "default" => "No",	"description" => "When this box is checked your posts will be shareable via StumbleUpon.", "selected_value" => "Yes"),
				__("Google+", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_googleplus", "title" => "Google+", "default" => "No", "description" => "When this box is checked your posts will be shareable via Google+.", "selected_value" => "Yes"),
				__("Blogger", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_blogger", "title" => "Blogger", "default" => "No", "description" => "When this box is checked your posts will be shareable via Blogger.", "selected_value" => "Yes"),
				__("Reddit", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_reddit", "title" => "Reddit", "default" => "No", "description" => "When this box is checked your posts will be shareable via Reddit.", "selected_value" => "Yes"),
				__("Digg", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_digg", "title" => "Digg", "default" => "No", "description" => "When this box is checked your posts will be shareable via Digg.", "selected_value" => "Yes"),
				__("Flickr", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_flickr", "title" => "Flickr", "default" => "No", "description" => "When this box is checked your posts will be shareable via Flickr.", "selected_value" => "Yes"),
				__("LinkedIn", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_linkedin", "title" => "LinkedIn", "default" => "No", "description" => "When this box is checked your posts will be shareable via LinkedIn.", "selected_value" => "Yes"),
				__("Delicious", 'horizon-framework') => array("type" => "checktoggle", "name" => THEME_SHORT_NAME. "_options_social_networks_share_delicious", "title" => "Delicious", "default" => "No", "description" => "When this box is checked your posts will be shareable via Delicious.", "selected_value" => "Yes")
			),
		),
		__("Social Networks", 'horizon-framework') => array(
			"id" => "social-networks",
			"elements" => array(
				__("Behance", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_behance", "title" => "Behance", "default" => ""),
				__("Blogger") => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_blogger", "title" => "Blogger", "default" => ""),
				__("Delicious", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_delicious", "title" => "Delicious",	"default" => ""),
				__("DeviantArt", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_deviantart",	"title" => "DeviantArt", "default" => ""),
				__("Digg", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_digg", "title" => "Digg", "default" => ""),
				__("Dribbble", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_dribbble", "title" => "Dribbble", "default" => ""),
				__("Facebook", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_facebook", "title" => "Facebook",	"default" => ""),
				__("Flickr", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_flickr", "title" => "Flickr", "default" => ""),
				__("Google+", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_googleplus", "title" => "Google+", "default" => ""),
				__("LinkedIn", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_linkedin", "title" => "LinkedIn",	"default" => ""),
				__("MySpace", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_myspace", "title" => "MySpace", "default" => ""),
				__("Reddit", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_reddit", "title" => "Reddit", "default" => ""),
				__("Skype", 'horizon-framework') => array("type" => "input",	"name" => THEME_SHORT_NAME. "_options_social_networks_link_skype", "title" => "Skype", "default" => ""),
				__("StumbleUpon", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_stumbleupon", "title" => "StumbleUpon", "default" => ""),
				__("Tumblr", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_tumblr", "title" => "Tumblr", "default" => ""),
				__("Twitter", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_twitter", "title" => "Twitter", "default" => ""),
				__("YouTube", 'horizon-framework') => array("type" => "input", "name" => THEME_SHORT_NAME. "_options_social_networks_link_youtube", "title" => "YouTube", "default" => ""),
			),
		),*/
	__( "Custom Sidebars", 'horizon-framework' )             => array( "id" => "custom-sidebars", "elements" => array( __( "Add Sidebar", 'horizon-framework' ) => array( "type" => "add_sidebar", "name" => THEME_SHORT_NAME . "_options_custom_sidebars", "title" => "Add Sidebars" ) ) ),
	__( "Sidebar Typography", 'horizon-framework' )          => array(
		"id"       => "sidebars-typography",
		"elements" => array(
			__( "Title Typography", 'horizon-framework' )            => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_title_typography",
				"title"    => "Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "14",
					"size_type" => "px",
					"transform" => "uppercase",
					"weight"    => "700"
				),
				"selector" => ".horizon_sidebar_wrapper h3.custom-sidebar-title",
				"attr"     => array(
					"colour"    => "color",
					"font"      => "font-family",
					"size"      => "font-size",
					"transform" => "text-transform",
					"weight"    => "font-weight"
				),
			),
			__( "Body Typography", 'horizon-framework' )             => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_body_typography",
				"title"    => "Body Font",
				"defaults" => array(
					"colour"    => $theme_defaults['body_colour'],
					"font"      => $theme_defaults['body_font'],
					"size"      => "14",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".horizon_sidebar_wrapper",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Tag Typography", 'horizon-framework' )              => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_tag_typography",
				"title"    => "Tag Font",
				"defaults" => array(
					"colour" => $theme_defaults['body_colour'],
					"font"   => $theme_defaults['body_font'],
					"weight" => "regular"
				),
				"selector" => ".horizon_sidebar_wrapper .tagcloud a",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"weight" => "font-weight"
				),
			),
			__( "Tag Background Colour", 'horizon-framework' )       => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_tag_bg_colour",
				"title"    => "Tag Background Colour",
				"default"  => "#ffffff",
				"selector" => ".horizon_sidebar_wrapper .tagcloud a",
				"attr"     => array( "background-color" ),
			),
			__( "Tag Border Colour", 'horizon-framework' )           => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_tag_border_colour",
				"title"    => "Tag Border Colour",
				"default"  => "#e7e7e7",
				"selector" => ".horizon_sidebar_wrapper .tagcloud a",
				"attr"     => array( "border-color" ),
			),
			__( "Tag Hover Font Colour", 'horizon-framework' )       => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_tag_hover_colour",
				"title"    => "Tag Hover Font Colour",
				"default"  => $theme_defaults['body_colour'],
				"selector" => ".horizon_sidebar_wrapper .tagcloud a:hover",
				"attr"     => array( "color" ),
			),
			__( "Tag Hover Background Colour", 'horizon-framework' ) => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_tag_hover_bg_colour",
				"title"    => "Tag Hover Background Colour",
				"default"  => "#ffffff",
				"selector" => ".horizon_sidebar_wrapper .tagcloud a:hover",
				"attr"     => array( "background-color" ),
			),
			__( "Tag Hover Border Colour", 'horizon-framework' )     => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_sidebar_tag_hover_border_colour",
				"title"    => "Tag Hover Border Colour",
				"default"  => "#cecece",
				"selector" => ".horizon_sidebar_wrapper .tagcloud a:hover",
				"attr"     => array( "border-color" ),
			),
		),
	),
	__( "Custom Styles", 'horizon-framework' )               => array(
		"id"       => "custom-styles",
		"elements" => array(
			__( "Custom CSS", 'horizon-framework' ) => array(
				"type"        => "textarea",
				"name"        => THEME_SHORT_NAME . "_options_custom_css_code",
				"title"       => "Custom CSS",
				"default"     => "",
				"description" => "Your custom CSS goes here.",
			),
		),
	),
	__( "Custom Scripts", 'horizon-framework' )              => array(
		"id"       => "custom-scripts",
		"elements" => array(
			__( "Custom JS", 'horizon-framework' )             => array(
				"type"    => "textarea",
				"name"    => THEME_SHORT_NAME . "_options_custom_script_code",
				"title"   => "Custom Scripts",
				"default" => "",
			),
			__( "Google Analytics Code", 'horizon-framework' ) => array(
				"type"        => "textarea",
				"name"        => THEME_SHORT_NAME . "_options_google_analytics_code",
				"title"       => "Google Analytics Code",
				"default"     => "",
				"description" => "Insert the code given to you by Google Analytics here.",
			),
		),
	),
);

$custom_fonts = array(
	'Helvetica Neue' => array( "300", "regular", "700", "italic", "700italic" )
);