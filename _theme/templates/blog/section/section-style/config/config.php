<?php 
	
	/*
	*	Revelio Style Blog - Section Settings
	*/
	
	global $post_meta_boxes;
	
	// Theme Options Settings	
	$sidebar_array[__("Blog")]['menus']['Section Settings'] = array("id" => "blog-section-settings");	
	$elements_array[__('Section Settings - Revelio Style')] = 
	array(
		"id" => "blog-section-settings",
		"elements" => array(
			// Add elements here as you would in theme options
		)
	);
	
	// POST META BOXES
	$post_tabs['Section Settings'] = 'section-settings';
	$post_meta_boxes['section-settings'] = array(
		"Thumbnail Type" => array(
			"type" => "select",
			"name" => "post_meta_thumbnail_type",
			"title" => __("THUMBNAIL TYPE"),
			"default" => "Featured Image",
			"options" => array ("Featured Image", "Image Slider", "Audio", "Quote", "Link", "Video"),
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
		"Quote Open" => array("type" => "open", "id" => "post_meta_thumbnail_quote"),
		"Quote Author" => array(
			"type" => "input",
			"name" => "post_meta_thumbnail_quote_author",
			"title" => __("QUOTE AUTHOR"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Quote"),
			"no_hr" => true,
		),
		"Quote Body" => array(
			"type" => "textarea",
			"name" => "post_meta_thumbnail_quote_body",
			"title" => __("QUOTE BODY"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Quote"),
			"no_hr" => true,
		),
		"Quote Close" => array("type" => "close"),
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
		"Link Open" => array("type" => "open", "id" => "post_meta_thumbnail_link"),
		"Link URL" => array(
			"type" => "input",
			"name" => "post_meta_thumbnail_link_url",
			"title" => __("LINK URL"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Link"),
			"no_hr" => true,
		),
		"Link Text" => array(
			"type" => "input",
			"name" => "post_meta_thumbnail_link_text",
			"title" => __("LINK TEXT"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Link"),
			"no_hr" => true,
		),
		"Link Description" => array(
			"type" => "textarea",
			"name" => "post_meta_thumbnail_link_description",
			"title" => __("LINK DESCRIPTION"),
			"find_value" => "thumbnail_type",
			"open_value" => array("Link"),
			"no_hr" => true,
		),
		"Link Close" => array("type" => "close"),
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
	$page_meta_boxes['page-builder']['Page Builder']['elements']['Blog'] = array(
		"blog_size" => array(
			"title" => __("BLOG SIZE"),
			"name" => "page-option-blog-size",
			"type" => "select",
			"default" => get_option( 'post_meta_default_blog_size' ),
			"options" => array("Full Width"),
		),
		"num" => array(
			"title" => __("BLOG COUNT"),
			"name" => "page-option-blog-count",
			"type" => "input",
			"value" => get_option( THEME_SHORT_NAME. '_options_default_blog_count' ),
		),
		"category" => array(
			"title" => __("BLOG CATEGORY"),
			"name" => "page-option-blog-category",
			"type" => "select",
			"default" => "All",
			"options" => "",
		),
		"enable_pagination" => array(
			"title" => __("ENABLE PAGINATION"),
			"name" => "page-option-blog-enable-pagination",
			"type" => "checktoggle",
			"default" => "Yes",
			"selected_value" => "Yes",
		),
	);
	
?>