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

// SET CONSTANTS
define( 'ROOT', get_template_directory_uri() );
define( 'SERVER_PATH', get_template_directory() );
define( 'TEMPLATE_PATH', '_theme/templates' );

// Theme
define( 'THEME_NAME', 'Horizon' );
define( 'THEME_SHORT_NAME', 'hor' );
define( 'THEME_VERSION', '1.0' );

// Development mode
define( 'DEV_MODE', false );

if ( !function_exists( 'horizon_get_root_directory' ) ) {
	function horizon_get_root_directory( $path ) {
		if ( file_exists( get_stylesheet_directory() . '/' . $path ) ) {
			return get_stylesheet_directory() . '/';
		} else {
			return SERVER_PATH . '/';
		}
	}
}

$include_array = array(
	// Include Horizon
	"_horizon/horizon-bootstrap.php",
	// Custom theme files
	"_theme/includes/hooks.php",
	"_theme/includes/custom-styles.php",
	"_theme/includes/custom-scripts.php",
	"_theme/includes/theme-abilities.php",
	"_theme/options/page.php",
	"_theme/options/theme-options.php",
);

foreach ( $include_array as $include ) {
	$t = horizon_get_root_directory( $include );
	include_once( $t . $include );
}

// All the template CSS goes here!
$import_styles = array(
	'_theme/css/header.css',
	TEMPLATE_PATH . '/style.css',
	TEMPLATE_PATH . '/pages/css/style.css',
	TEMPLATE_PATH . '/meta/css/style.css',
	TEMPLATE_PATH . '/comments/css/style.css',
	TEMPLATE_PATH . '/footer/css/style.css',
	TEMPLATE_PATH . '/header/css/style.css',
	TEMPLATE_PATH . '/pagination/css/style.css',
	TEMPLATE_PATH . '/sidebars/css/style.css',
	TEMPLATE_PATH . '/search/css/style.css',
	TEMPLATE_PATH . '/archive/css/style.css',
	TEMPLATE_PATH . '/titles/css/style.css',
	TEMPLATE_PATH . '/sliders/css/style.css',
	TEMPLATE_PATH . '/page-builder/style.css',
	TEMPLATE_PATH . '/shortcodes/style.css',
	TEMPLATE_PATH . '/post-slider/css/style.css',
	TEMPLATE_PATH . '/widgets/style.css',
	TEMPLATE_PATH . '/blog/section/' . BLOG_STYLE . '/css/style.css',
	TEMPLATE_PATH . '/blog/archive/' . BLOG_STYLE . '/css/style.css',
	TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/css/style.css',
	TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/css/style.css',
	TEMPLATE_PATH . '/portfolio/archive/' . PORTFOLIO_ARCHIVE_STYLE . '/css/style.css',
	TEMPLATE_PATH . '/portfolio/single-post/' . PORTFOLIO_SINGLE_STYLE . '/css/style.css'
);

do_action( 'horizon_config' );

add_action( 'wp_ajax_nopriv_do_ajax', 'horizon_ajax_function' );
add_action( 'wp_ajax_do_ajax', 'horizon_ajax_function' );


?>