<?php

/*
*	Horizon Style Portfolio - Section Settings
*/

global $portfolio_meta_boxes, $portfolio_tabs, $theme_defaults;

// Theme Options Settings
$sidebar_array[__( "Portfolio" )]['menus']['Section Settings'] = array( "id" => "portfolio-section-settings" );
$elements_array[__( 'Portfolio Section Settings - Horizon Style' )] =
	array(
		"id"       => "portfolio-section-settings",
		"elements" => array(
			__( "Title Typography" ) => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_portfolio_horizon_section_title",
				"title"    => "Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "30",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".page-builder-portfolio.horizon-style .portfolio-title a",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Title Hover" )      => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_portfolio_horizon_section_title_hover",
				"title"    => "Title Hover",
				"defaults" => array(
					"colour"     => $theme_defaults['header_colour'],
					"decoration" => "none",
				),
				"selector" => ".page-builder-portfolio.horizon-style .portfolio-title a:hover",
				"attr"     => array(
					"colour"     => "color",
					"decoration" => "text-decoration",
				),
				"preview"  => false
			),
		),
	);

$portfolio_tabs['Section Settings'] = 'section-settings';
$portfolio_meta_boxes['section-settings'] = array(
	"Thumbnail Type"     => array(
		"type"         => "select",
		"name"         => "post_meta_thumbnail_type",
		"title"        => __( "THUMBNAIL TYPE" ),
		"default"      => "Featured Image",
		"options"      => array( "Featured Image", "Image Slider", "Audio", "Video" ),
		"no_hr"        => true,
		"slidecontrol" => true
	),
	"Slider Images"      => array(
		"type"       => "mediagallery",
		"name"       => "post_meta_thumbnail_slider_images",
		"title"      => __( "SLIDER IMAGES" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Image Slider" ),
		"image_size" => "post_slider_thumbnail",
		"no_hr"      => true,
	),
	"Audio Open"         => array( "type" => "open", "id" => "post_meta_thumbnail_audio" ),
	"Audio Author"       => array(
		"type"       => "input",
		"name"       => "post_meta_thumbnail_audio_link",
		"title"      => __( "SOUNDCLOUD LINK" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Audio" ),
		"no_hr"      => true,
	),
	"Audio HTML5 Player" => array(
		"type"           => "checktoggle",
		"name"           => "post_meta_thumbnail_audio_html5_player",
		"title"          => __( "SOUNDCLOUD HTML5 PLAYER" ),
		"find_value"     => "thumbnail_type",
		"open_value"     => array( "Audio" ),
		"no_hr"          => true,
		"find_value"     => "thumbnail_type",
		"open_value"     => array( "Audio" ),
		"default"        => "Yes",
		"selected_value" => "Yes"
	),
	"Audio Close"        => array( "type" => "close" ),
	"Video Open"         => array( "type" => "open", "id" => "post_meta_thumbnail_video" ),
	"Video URL"          => array(
		"type"       => "input",
		"name"       => "post_meta_thumbnail_video_url",
		"title"      => __( "VIDEO URL" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Video" ),
		"no_hr"      => true,
	),
	"Video Type"         => array(
		"type"        => "select",
		"name"        => "post_meta_thumbnail_video_type",
		"title"       => __( "VIDEO TYPE" ),
		"no_hr"       => true,
		"default"     => "YouTube",
		"options"     => array( "YouTube", "Vimeo" ),
		"find_value"  => "thumbnail_type",
		"open_value"  => array( "Video" ),
		"description" => "Currently only YouTube and Vimeo are supported"
	),
	"Video Close"        => array( "type" => "close" )
);

// Page Builder Options
$page_meta_boxes['page-builder']['Page Builder']['elements']['Portfolio'] = array(
	"portfolio_size"    => array(
		"title"   => __( "PORTFOLIO SIZE" ),
		"name"    => "page-option-portfolio-size",
		"type"    => "select",
		"default" => get_option( 'post_meta_default_portfolio_size' ),
		"options" => array( "1/2 Width", "Full Width" ),
	),
	"num"               => array(
		"title" => __( "PORTFOLIO COUNT" ),
		"name"  => "page-option-portfolio-count",
		"type"  => "input",
		"value" => get_option( THEME_SHORT_NAME . '_options_default_portfolio_count' ),
	),
	"category"          => array(
		"title"   => __( "PORTFOLIO CATEGORY" ),
		"name"    => "page-option-portfolio-category",
		"type"    => "select",
		"default" => "All",
		"options" => "",
	),
	"enable_pagination" => array(
		"title"          => __( "ENABLE PAGINATION" ),
		"name"           => "page-option-portfolio-enable-pagination",
		"type"           => "checktoggle",
		"default"        => "Yes",
		"selected_value" => "Yes",
	),
);