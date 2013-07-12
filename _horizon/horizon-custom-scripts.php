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

add_action( 'init', 'horizon_custom_scripts' );
function horizon_custom_scripts() {
	if ( is_admin() ) {
		add_action( 'admin_print_scripts', 'horizon_output_admin_scripts' );
		add_action( 'admin_print_styles', 'horizon_output_admin_styles' );
		add_action( 'admin_footer', 'horizon_load_colour_picker' );
	} else {
		add_action( 'wp_print_scripts', 'horizon_output_scripts' );
		add_action( 'wp_print_styles', 'horizon_output_styles' );
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ROOT . '/_horizon/plugins/jquery/jquery.min.js' );
		wp_enqueue_script( 'jquery' );
	}
}

function horizon_output_admin_scripts() {
	global $post_type;

	wp_deregister_script( 'font-preview' );
	wp_register_script( 'font-preview', ROOT . '/_horizon/js/font-preview.js', false, '1.0', true );

	wp_deregister_script( 'admin-scripts' );
	wp_register_script( 'admin-scripts', ROOT . '/_horizon/js/admin-scripts.js', array( 'jquery-ui-spinner', 'font-preview' ), '1.0', true );
	wp_enqueue_script( 'admin-scripts' );

	wp_deregister_script( 'pretty-select' );
	wp_register_script( 'pretty-select', ROOT . '/_horizon/js/selectbox.js', array( 'jquery-ui-widget' ), '1.0', true );
	wp_enqueue_script( 'pretty-select' );

	if ( $post_type == "page" || $post_type == "post" ) {
		wp_deregister_script( 'page-builder' );
		wp_register_script( 'page-builder', ROOT . '/_horizon/js/page-builder.js', false, '1.0', true );
		wp_enqueue_script( 'page-builder' );

		horizon_localise_meta();
	}

	if ( $post_type == NULL ) {
		wp_enqueue_script( 'thickbox' );

		wp_deregister_script( 'ajax' );
		wp_register_script( 'ajax', ROOT . '/_horizon/js/ajax.js', false, '1.0', false );
		wp_enqueue_script( 'ajax' );
		wp_localize_script( 'ajax', 'page_data',
			array(
				'ajaxurl'          => admin_url( 'admin-ajax.php' ),
				'root'             => ROOT,
				'theme_short_name' => THEME_SHORT_NAME,
				'nonce'            => wp_nonce_field( plugin_basename( __FILE__ ), 'horizon_nonce', true, false ),
				'nonce_secure'     => wp_create_nonce( plugin_basename( __FILE__ ) )
			)
		);
	}
	horizon_load_colour_picker();

	do_action( 'horizon_include_theme_admin_scripts' );
}

function horizon_output_scripts() {
	wp_deregister_script( 'superfish' );
	wp_register_script( 'superfish', ROOT . '/_horizon/plugins/superfish/js/superfish.js', false, '1.0', true );
	wp_enqueue_script( 'superfish' );

	wp_deregister_script( 'supersubs' );
	wp_register_script( 'supersubs', ROOT . '/_horizon/plugins/superfish/js/supersubs.js', false, '1.0', true );
	wp_enqueue_script( 'supersubs' );

	wp_deregister_script( 'hoverintent' );
	wp_register_script( 'hoverintent', ROOT . '/_horizon/plugins/superfish/js/hoverIntent.js', false, '1.0', true );
	wp_enqueue_script( 'hoverintent' );

	wp_deregister_script( 'lightbox' );
	wp_register_script( 'lightbox', ROOT . '/_horizon/plugins/lightbox/js/lightbox.js', false, '1.0', true );
	wp_enqueue_script( 'lightbox' );

	wp_deregister_script( 'isotope' );
	wp_register_script( 'isotope', ROOT . '/_horizon/plugins/isotope/jquery.isotope.min.js', false, '1.0', true );
	wp_enqueue_script( 'isotope' );

	wp_deregister_script( 'flexslider' );
	wp_register_script( 'flexslider', ROOT . '/_theme/plugins/flexslider/js/jquery.flexslider-min.js', false, '1.0', true );
	wp_enqueue_script( 'flexslider' );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	horizon_theme_scripts();

}

function horizon_output_admin_styles() {
	wp_deregister_style( 'meta-css' );
	wp_register_style( 'meta-css', ROOT . '/_horizon/css/meta.css', false, '1.0', false );
	wp_enqueue_style( 'meta-css' );

	wp_deregister_style( 'theme-options-css' );
	wp_register_style( 'theme-options-css', ROOT . '/_horizon/css/theme-options.css', false, '1.0', false );
	wp_enqueue_style( 'theme-options-css' );

	wp_deregister_style( 'selectboxit' );
	wp_register_style( 'selectboxit', ROOT . '/_horizon/css/selectbox.css', false, '1.0', false );
	wp_enqueue_style( 'selectboxit' );

	wp_enqueue_style( 'thickbox' );

	wp_deregister_style( 'font-awesome' );
	wp_register_style( 'font-awesome', ROOT . '/_horizon/plugins/font-awesome/css/font-awesome.min.css', false, '1.0', false );
	wp_enqueue_style( 'font-awesome' );

}

function horizon_output_styles() {

	wp_deregister_style( 'base' );
	wp_register_style( 'base', ROOT . '/_theme/css/base.css', false, '1.0', 'all' );
	wp_enqueue_style( 'base' );

	wp_deregister_style( 'custom-styles' );
	wp_register_style( 'custom-styles', ROOT . '/custom-styles.css', false, '1.0', 'all' );
	wp_enqueue_style( 'custom-styles' );

	wp_deregister_style( 'lightbox' );
	wp_register_style( 'lightbox', ROOT . '/_horizon/plugins/lightbox/css/lightbox.css', false, '1.0', 'all' );
	wp_enqueue_style( 'lightbox' );

	wp_deregister_style( 'flexslider' );
	wp_register_style( 'flexslider', ROOT . '/_theme/plugins/flexslider/css/flexslider.css', false, '1.0', 'all' );
	wp_enqueue_style( 'flexslider' );

	wp_deregister_style( 'style' );
	wp_register_style( 'style', get_stylesheet_uri(), false, '1.0', 'all' );
	wp_enqueue_style( 'style' );

	wp_deregister_style( 'google-web-fonts' );
	wp_register_style( 'google-web-fonts', get_option( 'google_web_font_string' ), false, '1.0', 'all' );
	wp_enqueue_style( 'google-web-fonts' );

	wp_deregister_style( 'font-awesome' );
	wp_register_style( 'font-awesome', ROOT . '/_horizon/plugins/font-awesome/css/font-awesome.min.css', false, '1.0', 'all' );
	wp_enqueue_style( 'font-awesome' );

	$responsive = get_option( THEME_SHORT_NAME . '_options_is_responsive', '0' ) == '' ? '' : '-responsive';
	wp_deregister_style( 'skeleton-style' . $responsive );
	wp_register_style( 'skeleton-style' . $responsive, ROOT . '/_theme/css/skeleton' . $responsive . '.css', false, '1.0', 'all' );
	wp_enqueue_style( 'skeleton-style' . $responsive );

	horizon_theme_styles();

}

function horizon_localise_meta() {
	global $page_meta_boxes;
	wp_localize_script( 'page-builder', 'meta', $page_meta_boxes['page-builder']["Page Builder"] );
}

function horizon_load_colour_picker() {
	wp_deregister_script( 'colorpicker' );
	wp_register_script( 'colorpicker', ROOT . '/_horizon/js/colourpicker.js', false, '1.0', true );
	wp_enqueue_script( 'colorpicker' );

	wp_deregister_style( 'colorpicker' );
	wp_register_style( 'colorpicker', ROOT . '/_horizon/css/colourpicker.css', false, '1.0', false );
	wp_enqueue_style( 'colorpicker' );
}

?>