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

function horizon_custom_theme_styles() {

	$blog_style = horizon_create_slug( get_option( THEME_SHORT_NAME . '_options_blog_type' ) );
	$blog_single_style = horizon_create_slug( get_option( THEME_SHORT_NAME . '_options_blog_single_type' ) );
	$blog_archive_style = horizon_create_slug( get_option( THEME_SHORT_NAME . '_options_blog_archive_type' ) );
	$portfolio_style = horizon_create_slug( get_option( THEME_SHORT_NAME . '_options_portfolio_type' ) );
	$portfolio_single_style = horizon_create_slug( get_option( THEME_SHORT_NAME . '_options_portfolio_single_type' ) );

	$custom_styles_array = array(
		STYLES_PATH . '/blog/single-post/' . $blog_single_style . '/config/custom-styles.php',
		STYLES_PATH . '/blog/section/' . $blog_style . '/config/custom-styles.php',
		STYLES_PATH . '/blog/archive/' . $blog_archive_style . '/config/custom-styles.php',
		STYLES_PATH . '/portfolio/single-post/' . $portfolio_single_style . '/config/custom-styles.php',
		STYLES_PATH . '/portfolio/section/' . $portfolio_style . '/config/custom-styles.php'
	);

	foreach ( $custom_styles_array as $path ) {
		$i = horizon_get_root_directory( $path );
		include( $i . $path );
	}

	/*
		Add custom styles (if using px or em, don't forget to add this on!):

		$temp_att = horizon_style_attribute( 'YOUR ATTRIBUTE HERE', get_option( THEME_SHORT_NAME. '_options_YOUR_OPTION_NAME'));
		horizon_build_selector ( 'YOUR SELECTOR NAME', $temp_att );

		EXAMPLE:

		$temp_att = horizon_style_attribute( 'margin-top', get_option( THEME_SHORT_NAME. '_options_site_logo_top_margin', '0') . 'px' );
		horizon_build_selector ( '#logo', $temp_att );
	*/

	// Logo
	$temp_att = horizon_style_attribute( 'margin-top', get_option( THEME_SHORT_NAME . '_options_site_logo_top_margin', '0' ) . 'px' );
	horizon_build_selector( '#logo', $temp_att );
	$temp_att = horizon_style_attribute( 'margin-bottom', get_option( THEME_SHORT_NAME . '_options_site_logo_bottom_margin', '0' ) . 'px' );
	horizon_build_selector( '#logo', $temp_att );

	// Nav
	$temp_att = horizon_style_attribute( 'margin-top', get_option( THEME_SHORT_NAME . '_options_site_nav_top_margin', '0' ) . 'px' );
	horizon_build_selector( '.top-menu', $temp_att );
	$temp_att = horizon_style_attribute( 'margin-bottom', get_option( THEME_SHORT_NAME . '_options_site_nav_bottom_margin', '0' ) . 'px' );
	horizon_build_selector( '.top-menu', $temp_att );

	// Full width page-wrapper
	if ( get_option( THEME_SHORT_NAME . '_options_enable_full_width', 'Yes' ) == "Yes" ) {
		horizon_write_css( "div.layout-style{margin:0 auto; max-width:100%;}" );
		horizon_write_css( ".page-wrapper{background:transparent;}" );
	} else {
		horizon_write_css( ".page-wrapper{-webkit-box-shadow:0 0 8px rgba(0,0,0,0.4);}" );
		horizon_write_css( ".body-wrap{padding:20px 0;}" );
		horizon_write_css( ".layout-style{margin:0 auto; max-width:1000px;}" );
	}

	// Body Background
	if ( get_option( THEME_SHORT_NAME . '_options_body_background_type', 'Pattern' ) == "Block Colour" ) {
		$temp_att = horizon_style_attribute( 'background-color', get_option( THEME_SHORT_NAME . '_options_body_background_colour', '#ffffff' ) );
		horizon_build_selector( 'html', $temp_att );
	} else {
		if ( get_option( THEME_SHORT_NAME . '_options_body_background_type', 'Pattern' ) == "Pattern" ) {
			$temp_att = horizon_style_attribute( 'background-image', 'url(' . get_option( THEME_SHORT_NAME . '_options_body_background_pattern', ROOT . "/_horizon/images/patterns/1.jpg" ) . ')' );
			horizon_build_selector( 'html', $temp_att );
		} else {
			if ( get_option( THEME_SHORT_NAME . '_options_body_background_type', 'Pattern' ) == "Custom Image" ) {
				$src = wp_get_attachment_image_src( get_option( THEME_SHORT_NAME . '_options_body_custom_background' ), 'full' );
				$temp_att = horizon_style_attribute( 'background-image', 'url(' . $src[0] . ')' );
				horizon_build_selector( 'html', $temp_att );
			}
		}
	}

	// Footer Background
	if ( get_option( THEME_SHORT_NAME . '_options_footer_background_type', 'Pattern' ) == "Block Colour" ) {
		$temp_att = horizon_style_attribute( 'background-color', get_option( THEME_SHORT_NAME . '_options_footer_background_colour', '#ffffff' ) );
		horizon_build_selector( 'footer', $temp_att );
	} else {
		if ( get_option( THEME_SHORT_NAME . '_options_footer_background_type', 'Pattern' ) == "Pattern" ) {
			$temp_att = horizon_style_attribute( 'background-image', 'url(' . get_option( THEME_SHORT_NAME . '_options_footer_background_pattern', ROOT . "/_horizon/images/patterns/1.jpg" ) . ')' );
			horizon_build_selector( 'footer', $temp_att );
		} else {
			if ( get_option( THEME_SHORT_NAME . '_options_footer_background_type', 'Pattern' ) == "Custom Image" ) {
				$src = wp_get_attachment_image_src( get_option( THEME_SHORT_NAME . '_options_footer_custom_background' ), 'full' );
				$temp_att = horizon_style_attribute( 'background-image', 'url(' . $src[0] . ')' );
				horizon_build_selector( 'footer', $temp_att );
			}
		}
	}

	// Comments
	$temp_att = horizon_style_attribute( 'margin-left', ( get_option( THEME_SHORT_NAME . '_options_comments_avatar_size', '60' ) + 20 ) . 'px' );
	horizon_build_selector( '.depth-2, .depth-3, .depth-4, .depth-5', $temp_att );
	$temp_att = horizon_style_attribute( 'padding-left', ( get_option( THEME_SHORT_NAME . '_options_comments_avatar_size', '60' ) + 20 ) . 'px' );
	horizon_build_selector( '.horizon-comment', $temp_att );
}