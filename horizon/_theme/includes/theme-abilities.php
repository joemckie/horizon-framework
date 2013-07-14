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

if ( function_exists( 'set_post_thumbnail_size' ) ) {
	// Default Thumbnail Size
	set_post_thumbnail_size( 220, 220, true );
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'favicon', 16, 16 );
	add_image_size( 'apple-touch-icon', 57, 57 );
	add_image_size( 'apple-touch-icon-medium', 72, 72 );
	add_image_size( 'apple-touch-icon-large', 114, 114 );

	add_image_size( 'three-columns', 227, 219, true );
	add_image_size( 'four-columns', 460, 170, true );
	add_image_size( 'six-columns', 455, 300, true );
	add_image_size( 'twelve-columns', 960, 300, true );

	add_image_size( 'logo', 120, 60 );
	add_image_size( 'tiny_thumbnail', 65, 65, true );
	add_image_size( 'single_post', 960, 300, true );
	add_image_size( 'flexslider_topslider', 1366, 400, true );
}

// Register custom menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		'left_menu'  => "Left Menu",
		'right_menu' => "Right Menu",
	) );
}

$shortcodes = array(
	"accordion"   => "accordion_shortcode",
	"acc_item"    => "accordion_item_shortcode",
	"button"      => "button_shortcode",
	"code"        => "code_shortcode",
	"column"      => "column_shortcode",
	"divider"     => "divider_shortcode",
	"dropcap"     => "dropcap_shortcode",
	"frame"       => "frame_shortcode",
	"highlight"   => "highlight_shortcode",
	"list"        => "list_shortcode",
	"message"     => "message_shortcode",
	"social"      => "social_shortcode",
	"space"       => "space_shortcode",
	"staff"       => "staff_shortcode",
	"tabs"        => "tabs_shortcode",
	"tab_item"    => "tab_item_shortcode",
	"testimonial" => "testimonial_shortcode",
	"toggle"      => "toggle_shortcode",
	"toggle_item" => "toggle_item_shortcode",
	"quote"       => "quote_shortcode",
	"vimeo"       => "vimeo_shortcode",
	"youtube"     => "youtube_shortcode",
);
function register_mce_buttons( $buttons ) {
	array_push( $buttons, "accordion", "separator" );
	array_push( $buttons, "button", "column", "divider", "dropcap", "highlight", "separator" );
	array_push( $buttons, "quote", "social", "space", "list", "message", "tabs", "separator" );
	array_push( $buttons, "frame", "testimonial", "toggle", "vimeo", "youtube", "separator" );

	return $buttons;
}

function register_external_plugins( $plugin_array ) {
	$plugin_array['accordion'] = ROOT . '/_horizon/js/shortcodes/accordion-plugin.js';
	$plugin_array['button'] = ROOT . '/_horizon/js/shortcodes/button-plugin.js';
	$plugin_array['column'] = ROOT . '/_horizon/js/shortcodes/column-plugin.js';
	$plugin_array['divider'] = ROOT . '/_horizon/js/shortcodes/divider-plugin.js';
	$plugin_array['dropcap'] = ROOT . '/_horizon/js/shortcodes/dropcap-plugin.js';
	$plugin_array['frame'] = ROOT . '/_horizon/js/shortcodes/frame-plugin.js';
	$plugin_array['highlight'] = ROOT . '/_horizon/js/shortcodes/highlight-plugin.js';
	$plugin_array['list'] = ROOT . '/_horizon/js/shortcodes/list-plugin.js';
	$plugin_array['message'] = ROOT . '/_horizon/js/shortcodes/message-plugin.js';
	$plugin_array['quote'] = ROOT . '/_horizon/js/shortcodes/quote-plugin.js';
	$plugin_array['social'] = ROOT . '/_horizon/js/shortcodes/social-plugin.js';
	$plugin_array['space'] = ROOT . '/_horizon/js/shortcodes/space-plugin.js';
	$plugin_array['tabs'] = ROOT . '/_horizon/js/shortcodes/tabs-plugin.js';
	$plugin_array['testimonial'] = ROOT . '/_horizon/js/shortcodes/testimonial-plugin.js';
	$plugin_array['toggle'] = ROOT . '/_horizon/js/shortcodes/toggle-plugin.js';
	$plugin_array['vimeo'] = ROOT . '/_horizon/js/shortcodes/vimeo-plugin.js';
	$plugin_array['youtube'] = ROOT . '/_horizon/js/shortcodes/youtube-plugin.js';

	return $plugin_array;
}