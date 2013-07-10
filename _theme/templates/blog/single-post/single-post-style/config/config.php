<?php 

	/*
	*	Revelio Style Blog - Single Post Settings
	*/
	
	global $post_tabs, $post_meta_boxes;

	$sidebar_array[__("Blog")]['menus']['Single Post Style'] = array("id" => "blog-single-post-style");
	$elements_array[__('Single Post Style - Revelio Style')] = 
	array(
		"id" => "blog-single-post-style",
		"elements" => array(
			// Add elements as you would theme options
		),
	);
	
	// POST OPTIONS
	$post_tabs = array(
		"Sidebar" => "sidebar",
		"Single Post Settings" => "single-post-settings",
	);

	$post_meta_boxes = array(
		"single-post-settings" => array(
			"Blog Header" => array(
				"type" => "input",
				"name" => "post_meta_blog_header",
				"title" => __("BLOG HEADER"),
				"default" => "",
			),
			"Blog Caption" => array(
				"type" => "textarea",
				"name" => "post_meta_blog_caption",
				"title" => __("BLOG CAPTION"),
				"default" => "",
			),
			"Inside Thumbnail Type" => array(
				"type" => "select",
				"name" => "post_meta_inside_thumbnail_type",
				"title" => __("INSIDE THUMBNAIL TYPE"),
				"default" => "Featured Image",
				"options" => array ("Featured Image", "Image Slider", "Audio", "Quote", "Link", "Video"),
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
			"Quote Open" => array("type" => "open", "id" => "post_meta_inside_thumbnail_quote"),
			"Quote Author" => array(
				"type" => "input",
				"name" => "post_meta_inside_thumbnail_quote_author",
				"title" => __("QUOTE AUTHOR"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Quote"),
				"no_hr" => true,
			),
			"Quote Body" => array(
				"type" => "textarea",
				"name" => "post_meta_inside_thumbnail_quote_body",
				"title" => __("QUOTE BODY"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Quote"),
				"no_hr" => true,
			),
			"Quote Close" => array("type" => "close"),
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
			"Link Open" => array("type" => "open", "id" => "post_meta_inside_thumbnail_link"),
			"Link URL" => array(
				"type" => "input",
				"name" => "post_meta_inside_thumbnail_link_url",
				"title" => __("LINK URL"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Link"),
				"no_hr" => true,
			),
			"Link Text" => array(
				"type" => "input",
				"name" => "post_meta_inside_thumbnail_link_text",
				"title" => __("LINK TEXT"),
				"find_value" => "thumbnail_type",
				"open_value" => array("Link"),
				"no_hr" => true,
			),
			"Link Description" => array(
				"type" => "textarea",
				"name" => "post_meta_inside_thumbnail_link_description",
				"title" => __("LINK DESCRIPTION"),
				"find_value" => "inside_thumbnail_type",
				"open_value" => array("Link"),
				"no_hr" => true,
			),
			"Link Close" => array("type" => "close"),
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
				"description" => "Currently only YouTube and Vimeo are supported"
			),
			"Video Close" => array("type" => "close"),
			"Show Post Info" => array(
				"type" => "checktoggle",
				"name" => "post_meta_show_post_info",
				"title" => __("SHOW POST INFO"),
				"default" => "Yes",
				"selected_value" => "Yes",
			),
			"Show Author Description" => array(
				"type" => "checktoggle",
				"name" => "post_meta_show_author_description",
				"title" => __("SHOW AUTHOR DESCRIPTION"),
				"default" => "Yes",
				"selected_value" => "Yes",
			),
		),
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
	);

?>