<?php 

	/*
	*	Horizon Style Portfolio - Single Post Settings
	*/
	
	global $portfolio_tabs, $portfolio_meta_boxes, $theme_defaults;

	$sidebar_array[__("Portfolio")]['menus']['Single Post Style'] = array("id" => "portfolio-single-portfolio-style");
	$elements_array[__('Single Portfolio Style - Horizon Style')] = 
	array(
		"id" => "portfolio-single-portfolio-style",
		"elements" => array(
			"Lightbox Hover Opacity" => array(
				"type" => "input",
				"spinner" => true,
				"decimal" => true,
				"name" => THEME_SHORT_NAME.'_options_portfolio_horizon_single_lightbox_opacity',
				"title" => "Lightbox Hover Opacity",
				"default" => "0.85",
				"min_value" => "0.00",
				"max_value" => "1.00"
			),
		),
	);
	
	// POST OPTIONS
	
	$portfolio_tabs = array(
		"Sidebar" => "sidebar",
		"Single Post Settings" => "single-post-settings",
	);

	$portfolio_meta_boxes = array(
		"sidebar" => array(
			"Sidebar Type" => array(
				"type" => "radio-image",
				"name" => "post_meta_sidebar_type",
				"no_hr" => true,
				"title" => __("SIDEBAR TYPE"),
				"default" => get_option( THEME_SHORT_NAME. '_options_default_page_layout' ),
				"options" => array(
					"Left Sidebar" => ROOT."/_horizon/images/icons/radio-image/left-sidebar.png",
					"Right Sidebar" => ROOT."/_horizon/images/icons/radio-image/right-sidebar.png",
					"Both Sidebars" => ROOT."/_horizon/images/icons/radio-image/both-sidebar.png",
					"No Sidebars" => ROOT."/_horizon/images/icons/radio-image/no-sidebar.png",
				),
				"slidecontrol" => true
			),
			"Left Sidebar" => array(
				"type" => "select",
				"name" => "post_meta_left_sidebar",
				"title" => __("LEFT SIDEBAR"),
				"default" => get_option( THEME_SHORT_NAME. '_options_default_left_sidebar' ),
				"options" => horizon_get_all_sidebars(),
				"find_value" => "sidebar_type",
				"open_value" => array("Left Sidebar", "Both Sidebars"),
				"no_hr" => true,
			),
			"Right Sidebar" => array(
				"type" => "select",
				"name" => "post_meta_right_sidebar",
				"title" => __("RIGHT SIDEBAR"),
				"default" => get_option( THEME_SHORT_NAME. '_options_default_right_sidebar' ),
				"options" => horizon_get_all_sidebars(),
				"find_value" => "sidebar_type",
				"open_value" => array("Right Sidebar", "Both Sidebars"),
				"no_hr" => true,
			),
		),
		"single-post-settings" => array(
			"Client Name" => array(
				"type" => "input",
				"name" => "post_meta_client_name",
				"title" => __("CLIENT NAME"),
				"default" => ""
			),
			"Client Website" => array(
				"type" => "input",
				"name" => "post_meta_client_website",
				"title" => __("CLIENT WEBSITE"),
				"default" => ""
			),
			"Services Provided" => array(
				"type" => "input",
				"name" => "post_meta_services_provided",
				"title" => __("SERVICES PROVIDED"),
				"default" => "",
			),
			"Inside Thumbnail Type" => array(
				"type" => "select",
				"name" => "post_meta_inside_thumbnail_type",
				"title" => __("INSIDE THUMBNAIL TYPE"),
				"default" => "Featured Image",
				"options" => array ("Featured Image", "Image Slider", "Audio", "Video"),
				"no_hr" => true,
				"slidecontrol" => true
			),
			"Inside Slider Images" => array(
				"type" => "mediagallery",
				"name" => "post_meta_inside_thumbnail_slider_images",
				"title" => __("INSIDE SLIDER IMAGES"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Image Slider"),
				"image_size" => "post_slider_thumbnail",
				"no_hr" => true
			),
			"Audio Open" => array("type" => "open", "id" => "post_meta_inside_thumbnail_audio"),
			"Audio Author" => array(
				"type" => "input",
				"name" => "post_meta_inside_thumbnail_audio_link",
				"title" => __("SOUNDCLOUD LINK"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Audio"),
				"no_hr" => true,
			),
			"Audio HTML5 Player" => array(
				"type" => "checktoggle",
				"name" => "post_meta_inside_thumbnail_audio_html5_player",
				"title" => __("SOUNDCLOUD HTML5 PLAYER"),
				"find_value" => "thumbnail_type",
				"open_value" => array("Audio"),
				"no_hr" => true,
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Audio"),
				"default" => "Yes",
				"selected_value" => "Yes"
			),
			"Audio Close" => array("type" => "close"),
			"Video Open" => array("type" => "open", "id" => "post_meta_inside_thumbnail_video"),
			"Video URL" => array(
				"type" => "input",
				"name" => "post_meta_inside_thumbnail_video_url",
				"title" => __("VIDEO URL"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Video"),
				"no_hr" => true,
			),
			"Video Type" => array(
				"type" => "select",
				"name" => "post_meta_inside_thumbnail_video_type",
				"title" => __("VIDEO TYPE"),
				"default" => "YouTube",
				"options" => array("YouTube", "Vimeo"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Video"),
				"description" => "Currently only YouTube and Vimeo are supported",
			),
			"Video Close" => array("type" => "close"),
			"Project Image Size" => array(
				"type" => "select",
				"name" => "post_meta_project_image_size",
				"title" => __("PROJECT IMAGE SIZE"),
				"default" => "1/3 Width",
				"options" => array ("1/4 Width", "1/3 Width", "1/2 Width", "Full Width"),
				"no_hr" => true
			),
			"Project Images" => array(
				"type" => "mediagallery",
				"name" => "post_meta_project_images",
				"title" => __("PROJECT IMAGES"),
				"image_size" => "",
			),
			"Portfolio Header" => array(
				"type" => "input",
				"name" => "post_meta_portfolio_header",
				"title" => __("PORTFOLIO HEADER"),
				"default" => "",
			),
			"Portfolio Caption" => array(
				"type" => "textarea",
				"name" => "post_meta_portfolio_caption",
				"title" => __("PORTFOLIO CAPTION"),
				"default" => "",
				"no_hr" => true
			),
		),
	);

?>