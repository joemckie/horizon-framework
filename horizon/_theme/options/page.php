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

$page_tabs = array(
	"Page Builder" => "page-builder",
	"Content"      => "page-content",
	"Sidebar"      => "sidebar",
);
$page_meta_boxes = array(
	"page-builder" => array(
		"Page Builder" => array(
			"no_hr"      => true,
			"type"       => "page-builder-element",
			"identifier" => "page-builder-identifier",
			"size"       => "page-builder-size",
			"element"    => "page-builder-type",
			"name"       => "post_meta_page_layout_xml",
			"title"      => __( "Page Builder" ),
			"elements"   => array(
				"Accordion"         => array(
					"header"   => array(
						"title" => __( "ACCORDION TITLE" ),
						"name"  => "page-option-accordion-title",
						"type"  => "input",
						"value" => "",
					),
					"acc_item" => array(
						"sub_item_count" => array( "type" => "count", "name" => "acc-item-tab-count" ),
						"title"          => array(
							"title" => __( "ACCORDION ITEM TITLE" ),
							"name"  => "page-option-accordion-item-title",
							"type"  => "input",
							"value" => "",
						),
						"content"        => array(
							"title" => __( "ACCORDION ITEM CONTENT" ),
							"name"  => "page-option-accordion-item-content",
							"type"  => "textarea",
							"value" => "",
						),
						"active"         => array(
							"title"          => __( "ACTIVE ITEM" ),
							"name"           => "page-option-accordion-item-active",
							"type"           => "checktoggle",
							"default"        => "No",
							"selected_value" => "Yes",
						),
					),
				),
				"Blog"              => "Populated by the blog config file",
				"Call-To-Action"    => array(
					"header"      => array(
						"title" => __( "CALL TO ACTION TITLE" ),
						"name"  => "page-option-call-to-action-title",
						"type"  => "input",
						"value" => "",
					),
					"content"     => array(
						"title" => __( "CALL TO ACTION CONTENT" ),
						"name"  => "page-option-call-to-action-content",
						"type"  => "textarea",
						"value" => "",
					),
					"button_text" => array(
						"title" => __( "CALL TO ACTION BUTTON TEXT" ),
						"name"  => "page-option-call-to-action-button-text",
						"type"  => "input",
						"value" => "",
					),
					"button_link" => array(
						"title" => __( "CALL TO ACTION BUTTON LINK" ),
						"name"  => "page-option-call-to-action-button-link",
						"type"  => "input",
						"value" => "",
					),
				),
				"Column"            => array(
					"header"  => array(
						"title" => __( "COLUMN TITLE" ),
						"name"  => "page-option-column-title",
						"type"  => "input",
						"value" => "",
					),
					"content" => array(
						"title" => __( "COLUMN CONTENT" ),
						"name"  => "page-option-column-content",
						"type"  => "textarea",
						"value" => "",
					),
				),
				"Column-Service"    => array(
					"service_icon" => array(
						"title"   => __( "SERVICE ICON" ),
						"name"    => "page-option-column-service-icon",
						"type"    => "icon-font-awesome",
						"default" => "-- Select Icon --",
					),
					"header"       => array(
						"title" => __( "COLUMN TITLE" ),
						"name"  => "page-option-column-title",
						"type"  => "input",
						"value" => "",
					),
					"content"      => array(
						"title" => __( "COLUMN CONTENT" ),
						"name"  => "page-option-column-content",
						"type"  => "textarea",
						"value" => "",
					),
					"button_text"  => array(
						"title" => __( "BUTTON TEXT" ),
						"name"  => "page-option-button-text",
						"type"  => "input",
						"value" => "",
					),
					"button_link"  => array(
						"title" => __( "BUTTON LINK" ),
						"name"  => "page-option-button-link",
						"type"  => "input",
						"value" => "",
					),
				),
				"Contact-Form"      => array(
					"email"       => array(
						"title" => __( "RECIPIENT EMAIL" ),
						"name"  => "page-option-contact-form-email",
						"type"  => "input",
						"value" => get_bloginfo( 'admin_email' ),
					),
					"subject"     => array(
						"title" => __( "EMAIL SUBJECT" ),
						"name"  => "page-option-contact-form-subject",
						"type"  => "input",
						"value" => "",
					),
					"button_text" => array(
						"title" => __( "CALL TO ACTION TEXT" ),
						"name"  => "page-option-contact-form-button-text",
						"type"  => "input",
						"value" => "Send Email",
					),
				),
				"Content"           => array(
					"description" => array(
						"title" => __( "DESCRIPTION" ),
						"type"  => "description",
						"value" => "This will display the page content. You can edit this in the main WYSIWYG editor.",
					),
				),
				"Divider"           => array(
					"scroll_text" => array(
						"title"       => __( "SCROLL TEXT" ),
						"type"        => "input",
						"name"        => "page-option-divider-scroll-text",
						"description" => "Leave empty and this will not show"
					),
				),
				"Full-Width-Banner" => array(
					"title"          => array(
						"title" => __( "TITLE" ),
						"name"  => "page-option-full-width-banner-title",
						"type"  => "input",
						"value" => "",
					),
					"content"        => array(
						"title"       => __( "CONTENT" ),
						"name"        => "page-option-full-width-banner-content",
						"type"        => "textarea",
						"description" => "Shortcodes can be used.",
						"cdata"       => true
					),
					"wrapper_colour" => array(
						"title"   => __( "WRAPPER COLOUR" ),
						"name"    => "page-option-full-width-banner-wrapper-colour",
						"type"    => "colourpicker",
						"no_hr"   => true,
						"default" => get_option( THEME_SHORT_NAME . '_options_full_width_banner_default_bg' )
					),
					"content_colour" => array(
						"title"   => __( "CONTENT COLOUR" ),
						"name"    => "page-option-full-width-banner-content-colour",
						"type"    => "colourpicker",
						"default" => get_option( THEME_SHORT_NAME . '_options_full_width_banner_default_color' )
					)
				),
				"Message-Box"       => array(
					"type"    => array(
						"title"   => __( "MESSAGE TYPE" ),
						"name"    => "page-option-message-box-type",
						"type"    => "select",
						"default" => "Info",
						"options" => array( "Alert", "Info", "Success", "Warning" )
					),
					"title"   => array(
						"title" => __( "MESSAGE TITLE" ),
						"name"  => "page-option-message-title",
						"type"  => "input",
						"value" => "",
					),
					"content" => array(
						"title" => __( "MESSAGE CONTENT" ),
						"name"  => "page-option-message-content",
						"type"  => "textarea",
						"value" => "",
					),
					"rounded" => array(
						"title"          => __( "ROUNDED" ),
						"name"           => "page-option-message-rounded",
						"type"           => "checktoggle",
						"selected_value" => " rounded",
						"value"          => "",
					),
				),
				"Portfolio"         => "Populated by config",
				"Post-Slider"       => array(
					"type"        => array(
						"title"   => __( "SLIDER TYPE" ),
						"name"    => "page-option-post-slider-type",
						"type"    => "select",
						"default" => "Flex Slider",
						"options" => array( "Flex Slider" ),
						"no_hr"   => true
					),
					"animation"   => array(
						"title"   => __( "ANIMATION TYPE" ),
						"name"    => "page-option-post-slider-animation",
						"type"    => "select",
						"default" => "slide",
						"options" => array( "slide", "fade" ),
					),
					"width"       => array(
						"title" => __( "SLIDER WIDTH" ),
						"name"  => "page-option-post-slider-width",
						"type"  => "input",
						"value" => "940",
						"no_hr" => true
					),
					"height"      => array(
						"title" => __( "SLIDER HEIGHT" ),
						"name"  => "page-option-post-slider-height",
						"type"  => "input",
						"value" => "360",
					),
					"category"    => array(
						"title" => __( "POST CATEGORY" ),
						"name"  => "page-option-post-slider-category",
						"type"  => "select",
						"value" => "",
					),
					"excerpt_num" => array(
						"title" => __( "EXCERPT NUM" ),
						"name"  => "page-option-post-slider-excerpt-num",
						"type"  => "input",
						"value" => "120",
					),
					"num"         => array(
						"title" => __( "POST COUNT" ),
						"name"  => "page-option-post-slider-post-count",
						"type"  => "input",
						"value" => "4",
					),
				),
				"Section-Start"     => array(
					"background_colour" => array(
						"title" => __( "BACKGROUND COLOUR" ),
						"name"  => "page-option-section-background-colour",
						"type"  => "colourpicker",
					)
				),
				"Section-End"       => array(
					"background_colour" => array(
						"description" => "Ends a section.",
					)
				),
				"Tabs"              => array(
					"header"   => array(
						"title" => __( "TABS TITLE" ),
						"name"  => "page-option-tabs-title",
						"type"  => "input",
						"value" => "",
					),
					"tab_item" => array(
						"sub_item_count" => array( "type" => "count", "name" => "tab-item-tab-count" ),
						"title"          => array(
							"title" => __( "TAB ITEM TITLE" ),
							"name"  => "page-option-tab-item-title",
							"type"  => "input",
							"value" => "",
						),
						"content"        => array(
							"title" => __( "TAB ITEM CONTENT" ),
							"name"  => "page-option-tab-item-content",
							"type"  => "textarea",
							"value" => "",
							"cdata" => true,
						),
					),
				),
				"Testimonial"       => array(
					"title"    => array(
						"title" => __( "TESTIMONIAL TITLE" ),
						"name"  => "page-option-testimonial-title",
						"type"  => "input",
						"value" => "",
					),
					"category" => array(
						"title" => __( "TESTIMONIAL CATEGORY" ),
						"name"  => "page-option-testimonial-category",
						"type"  => "select",
						"value" => "",
					),
					"num"      => array(
						"title" => __( "TESTIMONIAL COUNT" ),
						"name"  => "page-option-testimonial-post-count",
						"type"  => "input",
						"value" => "4",
					),
				),
				"Toggle"            => array(
					"header"      => array(
						"title" => __( "TOGGLE TITLE" ),
						"name"  => "page-option-toggle-title",
						"type"  => "input",
						"value" => "",
					),
					"toggle_item" => array(
						"sub_item_count" => array( "type" => "count", "name" => "toggle-item-tab-count" ),
						"title"          => array(
							"title" => __( "TOGGLE ITEM TITLE" ),
							"name"  => "page-option-toggle-item-title",
							"type"  => "input",
							"value" => "",
						),
						"content"        => array(
							"title" => __( "TOGGLE ITEM CONTENT" ),
							"name"  => "page-option-toggle-item-content",
							"type"  => "textarea",
							"value" => "",
						),
						"active"         => array(
							"title"          => __( "ACTIVE TOGGLE" ),
							"name"           => "page-option-toggle-item-active",
							"type"           => "checktoggle",
							"default"        => "No",
							"selected_value" => " active",
						),
					),
				),
			),
		),
	),
	"page-content" => array(
		"Display Title"                => array(
			"type"           => "checktoggle",
			"name"           => "post_meta_display_title",
			"title"          => __( "DISPLAY TITLE" ),
			"default"        => "Yes",
			"selected_value" => "Yes"
		),
		"Display Content"              => array(
			"type"           => "checktoggle",
			"name"           => "post_meta_display_content",
			"title"          => __( "DISPLAY CONTENT" ),
			"default"        => "Yes",
			"selected_value" => "Yes"
		),
		"Page Caption"                 => array(
			"type"  => "textarea",
			"name"  => "post_meta_page_caption",
			"title" => __( "PAGE CAPTION" ),
		),
		"Slider Type"                  => array(
			"type"         => "select",
			"name"         => "post_meta_slider_type",
			"no_hr"        => true,
			"title"        => __( "SLIDER TYPE" ),
			"default"      => "None",
			"options"      => array( "None", "FlexSlider" ),
			"slidecontrol" => true
		),
		"Flex Slider Open"             => array( "type" => "open", "id" => "post_meta_flexslider_images_wrap" ),
		"Flex Slider Height"           => array(
			"type"       => "input",
			"name"       => "post_meta_flexslider_height",
			"title"      => __( "FLEXSLIDER HEIGHT" ),
			"find_value" => "slider_type",
			"open_value" => array( "FlexSlider" ),
			"default"    => "400",
			"no_hr"      => true
		),
		"Flex Slider Width"            => array(
			"type"        => "input",
			"name"        => "post_meta_flexslider_width",
			"title"       => __( "FLEXSLIDER WIDTH" ),
			"find_value"  => "slider_type",
			"open_value"  => array( "FlexSlider" ),
			"description" => "Ignored if forced full width.",
			"default"     => "960",
			"no_hr"       => true
		),
		"Flex Slider Animation"        => array(
			"type"       => "select",
			"name"       => "post_meta_flexslider_animation",
			"no_hr"      => true,
			"title"      => __( "FLEXSLIDER ANIMATION" ),
			"default"    => "slide",
			"options"    => array( "slide", "fade" ),
			"find_value" => "slider_type",
			"open_value" => array( "FlexSlider" ),
		),
		"Flex Slider Force Full Width" => array(
			"type"           => "checktoggle",
			"name"           => "post_meta_full_width_flexslider",
			"title"          => __( "FORCE FULL WIDTH" ),
			"default"        => "Yes",
			"selected_value" => "Yes",
			"find_value"     => "slider_type",
			"open_value"     => array( "FlexSlider" ),
			"no_hr"          => true
		),
		"Flex Slider"                  => array(
			"type"       => "mediagallery",
			"name"       => "post_meta_flexslider_images",
			"no_hr"      => true,
			"title"      => __( "FLEXSLIDER IMAGES" ),
			"find_value" => "slider_type",
			"open_value" => array( "FlexSlider" ),
		),
		"Flex Slider Close"            => array( "type" => "close" ),
	),
	"sidebar"      => array(
		"Sidebar Type"  => array(
			"type"         => "radio-image",
			"name"         => "post_meta_sidebar_type",
			"no_hr"        => true,
			"title"        => __( "SIDEBAR TYPE" ),
			"default"      => get_option( THEME_SHORT_NAME . '_options_default_page_layout' ),
			"options"      => array(
				"Left Sidebar"  => ROOT . "/_horizon/images/icons/radio-image/left-sidebar.png",
				"Right Sidebar" => ROOT . "/_horizon/images/icons/radio-image/right-sidebar.png",
				"Both Sidebars" => ROOT . "/_horizon/images/icons/radio-image/both-sidebar.png",
				"No Sidebars"   => ROOT . "/_horizon/images/icons/radio-image/no-sidebar.png",
			),
			"slidecontrol" => true
		),
		"Left Sidebar"  => array(
			"type"               => "select",
			"name"               => "post_meta_left_sidebar",
			"no_hr"              => true,
			"title"              => __( "LEFT SIDEBAR" ),
			"default"            => get_option( THEME_SHORT_NAME . '_options_default_left_sidebar' ),
			"options"            => horizon_get_all_sidebars(),
			"find_value"         => "sidebar_type",
			"open_value"         => array( "Left Sidebar", "Both Sidebars" ),
			"default_open_value" => get_option( THEME_SHORT_NAME . '_options_default_page_layout' )
		),
		"Right Sidebar" => array(
			"type"               => "select",
			"name"               => "post_meta_right_sidebar",
			"title"              => __( "RIGHT SIDEBAR" ),
			"default"            => get_option( THEME_SHORT_NAME . '_options_default_right_sidebar' ),
			"options"            => horizon_get_all_sidebars(),
			"find_value"         => "sidebar_type",
			"open_value"         => array( "Right Sidebar", "Both Sidebars" ),
			"no_hr"              => true,
			"default_open_value" => get_option( THEME_SHORT_NAME . '_options_default_page_layout' )
		),
	),
);