<?php 
	
	/*
	*	XXXXX Style Portfolio - Section Settings
	* 	THIS WILL APPEAR IN THE THEME OPTIONS UNDER "SECTION SETTINGS"
	*/
	
	global $portfolio_meta_boxes, $portfolio_tabs;
	
	// Theme Options Settings	
	$sidebar_array[__("Portfolio")]['menus']['Section Settings'] = array("id" => "portfolio-section-settings");	
	$elements_array[__('Portfolio Section Settings - XXXXX Style')] = 
	array(
		"id" => "portfolio-section-settings",
		"elements" => array(
			// ADD ELEMENTS HERE AS YOU WOULD THE THEME OPTIONS PAGE
		),
	);
	
	
	// THESE OPTIONS WILL SHOW IN PORTFOLIO META BOX. THIS IS ONLY USABLE FOR SECTION SETTINGS
	$portfolio_tabs['Section Settings'] = 'section-settings';
	$portfolio_meta_boxes['section-settings'] = array(
		"Thumbnail Type" => array(
			"type" => "select",
			"name" => "post_meta_thumbnail_type",
			"title" => __("THUMBNAIL TYPE"),
			"default" => "Featured Image",
			"options" => array ("Featured Image", "Image Slider", "Audio", "Video"),
			"no_hr" => true,
			"slidecontrol" => true
		),
		"Slider Images" => array(
			"type" => "mediagallery",
			"name" => "post_meta_thumbnail_slider_images",
			"title" => __("SLIDER IMAGES"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Image Slider"),
			"image_size" => "post_slider_thumbnail",
			"no_hr" => true,
		),
		"Audio Open" => array("type" => "open", "id" => "post_meta_thumbnail_audio"),
		"Audio Author" => array(
			"type" => "input",
			"name" => "post_meta_thumbnail_audio_link",
			"title" => __("SOUNDCLOUD LINK"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Audio"),
			"no_hr" => true,
		),
		"Audio HTML5 Player" => array(
			"type" => "checktoggle",
			"name" => "post_meta_thumbnail_audio_html5_player",
			"title" => __("SOUNDCLOUD HTML5 PLAYER"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Audio"),
			"no_hr" => true,
			"find_value" => "thumbnail_type",
			"open_value" => array("Audio"),
			"default" => "Yes",
			"selected_value" => "Yes"
		),
		"Audio Close" => array("type" => "close"),
		"Video Open" => array("type" => "open", "id" => "post_meta_thumbnail_video"),
		"Video URL" => array(
			"type" => "input",
			"name" => "post_meta_thumbnail_video_url",
			"title" => __("VIDEO URL"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Video"),
			"no_hr" => true,
		),
		"Video Type" => array(
			"type" => "select",
			"name" => "post_meta_thumbnail_video_type",
			"title" => __("VIDEO TYPE"),
			"no_hr" => true,
			"default" => "YouTube",
			"options" => array("YouTube", "Vimeo"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Video"),
			"description" => "Currently only YouTube and Vimeo are supported"
		),
		"Video Close" => array("type" => "close")
	);

	// Page Builder Options
	$page_meta_boxes['page-builder']['Page Builder']['elements']['Portfolio'] = array(
		"title" => array(
			"title" => __("PORTFOLIO TITLE"),
			"name" => "page-option-portfolio-title",
			"type" => "input",
		),
		"portfolio_link" => array(
			"title" => __("ALL PORTFOLIO LINK"),
			"name" => "page-option-portfolio-link",
			"type" => "input",
		),
		"portfolio_text" => array(
			"title" => __("ALL PORTFOLIO TEXT"),
			"name" => "page-option-portfolio-text",
			"type" => "input",
		),
		"portfolio_size" => array(
			"title" => __("PORTFOLIO SIZE"),
			"name" => "page-option-portfolio-size",
			"type" => "select",
			"default" => get_option( 'post_meta_default_portfolio_size' ),
			"options" => array("1/3 Width", "1/2 Width", "Full Width"),
		),
		"num" => array(
			"title" => __("PORTFOLIO COUNT"),
			"name" => "page-option-portfolio-count",
			"type" => "input",
			"value" => get_option( THEME_SHORT_NAME. '_options_default_portfolio_count' ),
		),
		"category" => array(
			"title" => __("PORTFOLIO CATEGORY"),
			"name" => "page-option-portfolio-category",
			"type" => "select",
			"default" => "All",
			"options" => "",
		),
		"enable_pagination" => array(
			"title" => __("ENABLE PAGINATION"),
			"name" => "page-option-portfolio-enable-pagination",
			"type" => "checktoggle",
			"default" => "Yes",
			"selected_value" => "Yes",
		),
	);
	
?>