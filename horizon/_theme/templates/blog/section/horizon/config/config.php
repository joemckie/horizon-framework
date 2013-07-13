<?php

/*
*	Horizon Style Blog - Section Settings
*/

global $post_meta_boxes, $theme_defaults;

// Theme Options Settings
$sidebar_array[__( "Blog" )]['menus']['Section Settings'] = array( "id" => "blog-section-settings" );
$elements_array[__( 'Section Settings - Horizon Style' )] =
	array(
		"id"       => "blog-section-settings",
		"elements" => array(
			__( "Title Typography" )                         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_title",
				"title"    => "Title Font",
				"defaults" => array(
					"colour"    => $theme_defaults['header_colour'],
					"font"      => $theme_defaults['header_font'],
					"size"      => "30",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".page-builder-blog.horizon-style .blog-title a",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Title Hover" )                              => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_title_hover",
				"title"    => "Title Hover",
				"defaults" => array(
					"colour"     => $theme_defaults['header_colour'],
					"decoration" => "none",
				),
				"selector" => ".page-builder-blog.horizon-style .blog-title a:hover",
				"attr"     => array(
					"colour"     => "color",
					"decoration" => "text-decoration",
				),
				"preview"  => false
			),

			__( "Post Info Font Colour" )                    => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_post_info_colour",
				"title"    => __( "Post Info Colour" ),
				"default"  => $theme_defaults['link_colour'],
				"attr"     => array( "color" ),
				"selector" => ".page-builder-blog.horizon-style .post-info .post-icon"
			),
			__( "Post Info Hover Font Colour" )              => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_post_info_hover_colour",
				"title"    => __( "Post Info Hover Colour" ),
				"default"  => $theme_defaults['link_hover_colour'],
				"attr"     => array( "color" ),
				"selector" => ".page-builder-blog.horizon-style .post-info .post-icon:hover"
			),

			// Link Thumbnail
			__( "Link Thumbnail Icon Colour" )               => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_icon_colour",
				"title"    => __( "Link Thumbnail Icon Colour" ),
				"default"  => "#d7d7d7",
				"attr"     => array( "color" ),
				"selector" => ".page-builder-blog.horizon-style .link-thumbnail i"
			),
			__( "Link Thumbnail Background Type" )           => array(
				"type"         => "select",
				"name"         => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_bg_type",
				"no_hr"        => true,
				"title"        => __( "Link Thumbnail Background Type" ),
				"default"      => "Pattern",
				"options"      => array( "Block Colour", "Pattern", "Custom Image", "No Background" ),
				"slidecontrol" => true
			),
			__( "Link Thumbnail Background Colour" )         => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_bg_colour",
				"title"              => "Link Thumbnail Background Colour",
				"default"            => "#efefef",
				"selector"           => ".page-builder-blog.horizon-style .link-thumbnail",
				"attr"               => array( "background-color" ),
				"no_hr"              => true,
				"find_value"         => "link_thumbnail_background_type",
				"open_value"         => array( "Block Colour" ),
				"disable_style_save" => true
			),
			__( "Link Thumbnail Background Pattern Open" )   => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_bg_pattern_wrap" ),
			__( "Link Thumbnail Background Pattern" )        => array(
				"type"         => "radio-image",
				"name"         => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_bg_pattern",
				"title"        => "Link Thumbnail Background Pattern",
				"default"      => ROOT . "/_horizon/images/patterns/3.jpg",
				"options"      => array(
					ROOT . "/_horizon/images/patterns/1.jpg" => ROOT . "/_horizon/images/patterns/1.jpg",
					ROOT . "/_horizon/images/patterns/2.jpg" => ROOT . "/_horizon/images/patterns/2.jpg",
					ROOT . "/_horizon/images/patterns/3.jpg" => ROOT . "/_horizon/images/patterns/3.jpg",
				),
				"image_width"  => 100,
				"image_height" => 100,
				"find_value"   => "link_thumbnail_background_type",
				"open_value"   => array( "Pattern" ),
				"default_open" => true,
				"no_hr"        => true
			),
			__( "Link Thumbnail Background Pattern Close" )  => array( "type" => "close" ),
			__( "Link Thumbnail Custom Background Open" )    => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_custom_bg_wrap" ),
			__( "Link Thumbnail Custom Background" )         => array(
				"type"       => "upload",
				"name"       => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_custom_bg",
				"title"      => "Link Thumbnail Custom Background",
				"default"    => "",
				"find_value" => "link_thumbnail_background_type",
				"open_value" => array( "Custom Image" ),
			),
			__( "Link Thumbnail Custom Background Close" )   => array( "type" => "close" ),
			__( "Link Thumbnail Anchor Typography" )         => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb_anchor",
				"title"    => "Link Thumbnail Anchor Typography",
				"defaults" => array(
					"colour"    => "#00cbe9",
					"font"      => "Droid Serif",
					"size"      => "24",
					"size_type" => "px",
					"weight"    => "italic"
				),
				"selector" => ".page-builder-blog.horizon-style .link-thumbnail a",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Link Thumbnail Anchor Hover Typography" )   => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb _anchor_hover",
				"title"    => "Link Thumbnail Anchor Hover Typography",
				"defaults" => array( "colour" => "#3b3b3b" ),
				"selector" => ".page-builder-blog.horizon-style .link-thumbnail a:hover",
				"attr"     => array( "colour" => "color" ),
				"preview"  => false
			),
			__( "Link Thumbnail Typography" )                => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_link_thumb",
				"title"    => "Link Thumbnail Typography",
				"defaults" => array(
					"colour"    => "#666666",
					"font"      => "Consolas",
					"size"      => "16",
					"size_type" => "px",
					"weight"    => "regular"
				),
				"selector" => ".page-builder-blog.horizon-style .link-thumbnail p",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),

			// Quote Thumbnail
			__( "Quote Thumbnail Icon Colour" )              => array(
				"type"     => "colourpicker",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_icon_colour",
				"title"    => __( "Quote Thumbnail Icon Colour" ),
				"default"  => "#d7d7d7",
				"attr"     => array( "color" ),
				"selector" => ".page-builder-blog.horizon-style .quote-thumbnail i"
			),
			__( "Quote Thumbnail Background Type" )          => array(
				"type"         => "select",
				"name"         => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_bg_type",
				"no_hr"        => true,
				"title"        => __( "Quote Thumbnail Background Type" ),
				"default"      => "Pattern",
				"options"      => array( "Block Colour", "Pattern", "Custom Image", "No Background" ),
				"slidecontrol" => true
			),
			__( "Quote Thumbnail Background Colour" )        => array(
				"type"               => "colourpicker",
				"name"               => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_bg_colour",
				"title"              => "Quote Thumbnail Background Colour",
				"default"            => "#efefef",
				"selector"           => ".page-builder-blog.horizon-style .quote-thumbnail",
				"attr"               => array( "background-color" ),
				"no_hr"              => true,
				"find_value"         => "quote_thumbnail_background_type",
				"open_value"         => array( "Block Colour" ),
				"disable_style_save" => true
			),
			__( "Quote Thumbnail Background Pattern Open" )  => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_bg_pattern_wrap" ),
			__( "Quote Thumbnail Background Pattern" )       => array(
				"type"         => "radio-image",
				"name"         => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_bg_pattern",
				"title"        => "Quote Thumbnail Background Pattern",
				"default"      => ROOT . "/_horizon/images/patterns/3.jpg",
				"options"      => array(
					ROOT . "/_horizon/images/patterns/1.jpg" => ROOT . "/_horizon/images/patterns/1.jpg",
					ROOT . "/_horizon/images/patterns/2.jpg" => ROOT . "/_horizon/images/patterns/2.jpg",
					ROOT . "/_horizon/images/patterns/3.jpg" => ROOT . "/_horizon/images/patterns/3.jpg",
				),
				"image_width"  => 100,
				"image_height" => 100,
				"find_value"   => "quote_thumbnail_background_type",
				"open_value"   => array( "Pattern" ),
				"default_open" => true,
				"no_hr"        => true
			),
			__( "Quote Thumbnail Background Pattern Close" ) => array( "type" => "close" ),
			__( "Quote Thumbnail Custom Background Open" )   => array( "type" => "open", "id" => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_custom_bg_wrap" ),
			__( "Quote Thumbnail Custom Background" )        => array(
				"type"       => "upload",
				"name"       => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_custom_bg",
				"title"      => "Quote Thumbnail Custom Background",
				"default"    => "",
				"find_value" => "quote_thumbnail_background_type",
				"open_value" => array( "Custom Image" ),
			),
			__( "Quote Thumbnail Custom Background Close" )  => array( "type" => "close" ),
			__( "Quote Thumbnail Typography" )               => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb",
				"title"    => "Quote Thumbnail Anchor Typography",
				"defaults" => array(
					"colour"    => "#666666",
					"font"      => "Droid Serif",
					"size"      => "24",
					"size_type" => "px",
					"weight"    => "italic"
				),
				"selector" => ".page-builder-blog.horizon-style .quote-thumbnail p",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			),
			__( "Quote Thumbnail Author Typography" )        => array(
				"type"     => "typography",
				"name"     => THEME_SHORT_NAME . "_options_blog_horizon_section_quote_thumb_author",
				"title"    => "Quote Thumbnail Author Typography",
				"defaults" => array(
					"colour"    => "#666666",
					"font"      => "Helvetica Neue",
					"size"      => "18",
					"size_type" => "px",
					"weight"    => "700"
				),
				"selector" => ".page-builder-blog.horizon-style .quote-thumbnail span.author",
				"attr"     => array(
					"colour" => "color",
					"font"   => "font-family",
					"size"   => "font-size",
					"weight" => "font-weight"
				),
			)
		)
	);

$post_tabs['Section Settings'] = 'section-settings';
$post_meta_boxes['section-settings'] = array(
	"Thumbnail Type"     => array(
		"type"         => "select",
		"name"         => "post_meta_thumbnail_type",
		"title"        => __( "THUMBNAIL TYPE" ),
		"default"      => "Featured Image",
		"options"      => array( "Featured Image", "Image Slider", "Audio", "Quote", "Link", "Video" ),
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
	"Quote Open"         => array( "type" => "open", "id" => "post_meta_thumbnail_quote" ),
	"Quote Author"       => array(
		"type"       => "input",
		"name"       => "post_meta_thumbnail_quote_author",
		"title"      => __( "QUOTE AUTHOR" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Quote" ),
		"no_hr"      => true,
	),
	"Quote Body"         => array(
		"type"       => "textarea",
		"name"       => "post_meta_thumbnail_quote_body",
		"title"      => __( "QUOTE BODY" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Quote" ),
		"no_hr"      => true,
	),
	"Quote Close"        => array( "type" => "close" ),
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
	"Link Open"          => array( "type" => "open", "id" => "post_meta_thumbnail_link" ),
	"Link URL"           => array(
		"type"       => "input",
		"name"       => "post_meta_thumbnail_link_url",
		"title"      => __( "LINK URL" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Link" ),
		"no_hr"      => true,
	),
	"Link Text"          => array(
		"type"       => "input",
		"name"       => "post_meta_thumbnail_link_text",
		"title"      => __( "LINK TEXT" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Link" ),
		"no_hr"      => true,
	),
	"Link Description"   => array(
		"type"       => "textarea",
		"name"       => "post_meta_thumbnail_link_description",
		"title"      => __( "LINK DESCRIPTION" ),
		"find_value" => "thumbnail_type",
		"open_value" => array( "Link" ),
		"no_hr"      => true,
	),
	"Link Close"         => array( "type" => "close" ),
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
$page_meta_boxes['page-builder']['Page Builder']['elements']['Blog'] = array(
	"blog_size"         => array(
		"title"   => __( "BLOG SIZE" ),
		"name"    => "page-option-blog-size",
		"type"    => "select",
		"default" => get_option( 'post_meta_default_blog_size' ),
		"options" => array( "Full Width" ),
	),
	"num"               => array(
		"title" => __( "BLOG COUNT" ),
		"name"  => "page-option-blog-count",
		"type"  => "input",
		"value" => get_option( THEME_SHORT_NAME . '_options_default_blog_count' ),
	),
	"category"          => array(
		"title"   => __( "BLOG CATEGORY" ),
		"name"    => "page-option-blog-category",
		"type"    => "select",
		"default" => "All",
		"options" => "",
	),
	"enable_pagination" => array(
		"title"          => __( "ENABLE PAGINATION" ),
		"name"           => "page-option-blog-enable-pagination",
		"type"           => "checktoggle",
		"default"        => "Yes",
		"selected_value" => "Yes",
	),
);