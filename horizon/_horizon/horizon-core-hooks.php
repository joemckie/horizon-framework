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

// Get options
add_action( 'init', 'horizon_get_options' );
function horizon_get_options() {
	global $options;

	if ( is_null( $options ) ) {
		$all_options = explode( ",", get_option( 'horizon_all_options' ) );
		$num_options = sizeof( $all_options );
		for ( $i = 0; $i < $num_options - 1; $i++ ) {
			if ( $all_options[$i] !== "" ) {
				$_SESSION['options'][$all_options[$i]] = get_option( THEME_SHORT_NAME . '_options_' . $all_options[$i] );
			}
		}
	}
	$_SESSION['options']['layout_style'] = $_SESSION['options']['enable_full_width'] == "Yes" ? "full-width" : "boxed-style";

	return $options = $_SESSION['options'];
}

// Get post meta
add_action( 'horizon_get_post_meta', 'horizon_get_post_meta' );
function horizon_get_post_meta( $variable ) {
	global $post, $post_meta, $portfolio_meta, $blog_meta, $archive_post_meta, $metas;

	if ( !is_null( $post ) ) {
		foreach ( get_post_custom() as $meta => $args ) {
			if ( strpos( $meta, "post_meta" ) !== false ) {
				$metas[$variable][str_replace( "post_meta_", "", $meta )] = $args[0];
			}
		}
	}

	return $$variable = $metas[$variable];
}

add_action( 'horizon_config', 'horizon_config' );
function horizon_config() {
	global $elements_array, $sidebar_array, $config_array, $page_meta_boxes;
	do_action( 'horizon_set_variable_styles' );
	foreach ( $config_array as $path ) {
		$i = horizon_get_root_directory( $path );
		include( $i . $path );
	}

	return;
}

// Reset WP_Query
add_action( 'horizon_reset_wpquery', 'horizon_reset_wpquery' );
function horizon_reset_wpquery() {
	global $wp_query, $options;

	$wp_query->query_vars['posts_per_page'] = (int) $options['default_blog_count'];
	wp_reset_query();

	return $wp_query = new WP_Query( $wp_query->query_vars );
}

// Get 404
add_action( 'horizon_get_404', 'horizon_get_404' );
function horizon_get_404() {
	get_template_part( TEMPLATE_PATH . '/404/before-404' );
	get_template_part( TEMPLATE_PATH . '/404/404' );
	get_template_part( TEMPLATE_PATH . '/404/after-404' );
}

// Output sidebar layout
add_action( 'horizon_sidebar_layout', 'horizon_sidebar_layout' );
function horizon_sidebar_layout( $echo = true ) {
	global $post_meta;

	switch ( $post_meta['sidebar_type'] ) {
		case "Left Sidebar":
			$s = 'left-sidebar';
			break;
		case "Right Sidebar":
			$s = 'right-sidebar';
			break;
		case "Both Sidebars":
			$s = 'both-sidebar';
			break;
		case "No Sidebars":
			$s = 'no-sidebar';
			break;
	}

	if ( $echo ) {
		echo $s;
	} else {
		return $s;
	}
}


// Output sidebar layout
add_action( 'horizon_get_header_layout', 'horizon_get_header_layout' );
function horizon_get_header_layout( $echo = true ) {
	global $options;

	switch ( $options['site_logo_position'] ) {
		case "Left":
			$s = 'left-logo';
			break;
		case "Right":
			$s = 'right-logo';
			break;
		case "Center":
			$s = 'center-logo';
			break;
	}

	if ( $echo ) {
		echo $s;
	} else {
		return $s;
	}
}

// Output <head> elements
add_action( 'horizon_head', 'horizon_head' );
function horizon_head() {
	return get_template_part( TEMPLATE_PATH . '/meta/head' );
}

// Output Favicon
add_action( 'wp_head', 'horizon_favicon' );
function horizon_favicon() {
	return get_template_part( TEMPLATE_PATH . '/meta/favicon' );
}

// Before Wrapper
add_action( 'horizon_wrapper', 'horizon_wrapper' );
function horizon_wrapper() {
	return get_template_part( TEMPLATE_PATH . '/before-wrapper' );
}

// After Wrapper
add_action( 'horizon_after_wrapper', 'horizon_after_wrapper' );
function horizon_after_wrapper() {
	return get_template_part( TEMPLATE_PATH . '/after-wrapper' );
}

// Output analytics code
add_action( 'wp_head', 'horizon_analytics_code' );
function horizon_analytics_code() {
	global $options;

	echo $options['google_analytics_code'];
}

// Output analytics code
add_action( 'wp_head', 'horizon_custom_css' );
function horizon_custom_css() {
	global $options;

	echo '<style type="text/css">' . $options['custom_css_code'] . '</style>';
}

add_action( 'horizon_header', 'horizon_header' );
function horizon_header() {
	global $meta, $options;

	get_template_part( TEMPLATE_PATH . '/header/before-header' );

	switch ( $options['site_logo_position'] ) {
		case "Left":
			get_template_part( TEMPLATE_PATH . '/header/layouts/header-1' );
			break;
		case "Center":
			get_template_part( TEMPLATE_PATH . '/header/layouts/header-2' );
			break;
		case "Right":
			get_template_part( TEMPLATE_PATH . '/header/layouts/header-3' );
			break;
	}

	get_template_part( TEMPLATE_PATH . '/header/after-header' );

	return;
}

// Before Logo
add_action( 'horizon_before_logo', 'horizon_before_logo' );
function horizon_before_logo() {
	get_template_part( TEMPLATE_PATH . '/header/before-logo' );
}

// After Logo
add_action( 'horizon_after_logo', 'horizon_after_logo' );
function horizon_after_logo() {
	return get_template_part( TEMPLATE_PATH . '/header/after-logo' );
}

// Before Menu
add_action( 'horizon_before_menu', 'horizon_before_menu' );
function horizon_before_menu() {
	return get_template_part( TEMPLATE_PATH . '/header/before-menu' );
}

// After Menu
add_action( 'horizon_after_menu', 'horizon_after_menu' );
function horizon_after_menu() {
	return get_template_part( TEMPLATE_PATH . '/header/after-menu' );
}

// Before Search
add_action( 'horizon_before_search', 'horizon_before_search' );
function horizon_before_search() {
	return get_template_part( TEMPLATE_PATH . '/header/before-search' );
}

// After Search
add_action( 'horizon_after_search', 'horizon_after_search' );
function horizon_after_search() {
	return get_template_part( TEMPLATE_PATH . '/header/after-search' );
}

// Output logo
add_action( 'horizon_logo', 'horizon_logo' );
function horizon_logo() {
	return get_template_part( TEMPLATE_PATH . '/meta/logo' );
}

// Output menu
add_action( 'horizon_menu', 'horizon_menu' );
function horizon_menu( $menu = "main_menu" ) {
	echo wp_nav_menu( array(
		'container'      => 'div',
		'container_id'   => '',
		'menu_class'     => 'menu sf-menu',
		'theme_location' => $menu,
		'link_before'    => '',
		'link_after'     => ''
	) );
}

// Output search
add_action( 'horizon_search', 'horizon_search' );
function horizon_search() {
	return get_search_form( false );
}

// Output dropdown menu
add_action( 'horizon_dropdown_menu', 'horizon_dropdown_menu' );
function horizon_dropdown_menu( $menu = 'main_menu' ) {
	return dropdown_menu(
		array(
			'dropdown_title'  => '-- Main Menu --',
			'indent_string'   => '- ',
			'indent_after'    => '',
			'container'       => 'div',
			'container_class' => '',
			'theme_location'  => $menu
		)
	);
}

// Output responsive menu
add_action( 'horizon_responsive_menu', 'horizon_responsive_menu' );
function horizon_responsive_menu() {
	echo wp_nav_menu( array(
		'container'      => 'div',
		'container_id'   => 'responsive-nav',
		'theme_location' => 'main_menu',
		'link_before'    => '',
		'link_after'     => ''
	) );
}

// Loop page
add_action( 'horizon_page', 'horizon_page' );
function horizon_page() {
	global $wp_query, $post, $post_meta;
	if ( have_posts() ) {
		the_post();
		get_template_part( TEMPLATE_PATH . '/pages/page' );
	} else {
		return do_action( 'horizon_get_404' );
	}

	return;
}

// Loop page
add_action( 'horizon_index', 'horizon_index' );
function horizon_index() {
	global $post, $post_meta, $options;

	do_action( 'horizon_reset_wpquery' );

	if ( have_posts() ) {
		if ( $options['default_page_layout'] == "Left Sidebar" || $options['default_page_layout'] == "Both Sidebars" ) {
			get_sidebar( 'left' );
		}
		get_template_part( TEMPLATE_PATH . '/pages/index' );
		if ( $options['default_page_layout'] == "Right Sidebar" || $options['default_page_layout'] == "Both Sidebars" ) {
			get_sidebar( 'right' );
		}
	} else {
		return do_action( 'horizon_get_404' );
	}

	return;
}

// Loop page
add_action( 'horizon_post', 'horizon_post' );
function horizon_post() {
	global $wp_query, $post, $post_meta;
	if ( have_posts() ) {
		the_post();
		get_sidebar( 'left' );
		get_template_part( TEMPLATE_PATH . '/pages/single' );
		get_sidebar( 'right' );
	} else {
		return do_action( 'horizon_get_404' );
	}

	return;
}

// Loop page
add_action( 'horizon_portfolio', 'horizon_portfolio' );
function horizon_portfolio() {
	global $wp_query, $post, $post_meta;
	if ( have_posts() ) {
		the_post();
		get_sidebar( 'left' );
		get_template_part( TEMPLATE_PATH . '/pages/portfolio' );
		get_sidebar( 'right' );
	} else {
		return do_action( 'horizon_get_404' );
	}

	return;
}

// Loop Search
add_action( 'horizon_get_search_page', 'horizon_get_search_page' );
function horizon_get_search_page() {
	global $wp_query, $post, $post_meta;
	if ( have_posts() ) {
		the_post();
		get_sidebar( 'left' );
		get_template_part( TEMPLATE_PATH . '/pages/search' );
		get_sidebar( 'right' );
	} else {
		return do_action( 'horizon_get_404' );
	}

	return;
}

// Loop Search
add_action( 'horizon_get_archive_page', 'horizon_get_archive_page' );
function horizon_get_archive_page() {
	global $wp_query, $post, $post_meta;
	if ( have_posts() ) {
		get_sidebar( 'left' );
		get_template_part( TEMPLATE_PATH . '/pages/archive' );
		get_sidebar( 'right' );
	} else {
		return do_action( 'horizon_get_404' );
	}

	return;
}

// Output search page
add_action( 'horizon_search_page', 'horizon_search_page' );
function horizon_search_page() {
	return get_template_part( TEMPLATE_PATH . '/search/search' );
}

// Output archive page
add_action( 'horizon_archive_page', 'horizon_archive_page' );
function horizon_archive_page() {
	return get_template_part( TEMPLATE_PATH . '/archive/archive' );
}

// Output blog post
add_action( 'horizon_single', 'horizon_single' );
function horizon_single() {
	return get_template_part( TEMPLATE_PATH . '/blog/single-post/' . BLOG_SINGLE_STYLE . '/single-post' );
}

// Set up standard page
add_action( 'horizon_before_page', 'horizon_before_page' );
function horizon_before_page() {
	return do_action( 'horizon_get_sidebar_layout' );
}

// Set up index page
add_action( 'horizon_before_index', 'horizon_before_index' );
function horizon_before_index() {
	global $options, $post_meta, $wp_query;

	$post_meta['sidebar_type'] = $options['default_page_layout'];
	$post_meta['left_sidebar'] = $options['default_left_sidebar'];
	$post_meta['right_sidebar'] = $options['default_right_sidebar'];
	$post_meta['is_index'] = true;

	$posts_page_id = get_option( 'page_for_posts' );
	$post_meta['page_title'] = get_the_title( $posts_page_id );
	$post_meta['page_caption'] = get_post_meta( $posts_page_id, 'post_meta_page_caption', true );

	return do_action( 'horizon_get_sidebar_layout' );
}

// Set up standard post
add_action( 'horizon_before_post', 'horizon_before_post' );
function horizon_before_post() {
	return do_action( 'horizon_get_sidebar_layout' );
}

// Set up single portfolio
add_action( 'horizon_before_single_portfolio', 'horizon_before_single_portfolio' );
function horizon_before_single_portfolio() {
	return do_action( 'horizon_get_sidebar_layout' );
}

// Output blog post
add_action( 'horizon_single_portfolio', 'horizon_single_portfolio' );
function horizon_single_portfolio() {
	return get_template_part( TEMPLATE_PATH . '/portfolio/single-post/' . PORTFOLIO_SINGLE_STYLE . '/single-post' );
}

// Set up archive page
add_action( 'horizon_before_archive_page', 'horizon_before_archive_page' );
function horizon_before_archive_page() {
	global $post_meta, $options, $q, $t, $archive_type;

	if ( is_tag() || is_tax( 'portfolio-tag' ) ) {
		$t = 'Tag';
		$q = single_tag_title( '', false );
	} else {
		if ( is_category() || is_tax( 'portfolio-category' ) ) {
			$t = 'Category';
			$q = single_cat_title( '', false );
		} else {
			if ( is_day() ) {
				$t = 'Day';
				$q = get_the_time( 'F jS, Y' );
			} else {
				if ( is_month() ) {
					$t = 'Month';
					$q = get_the_time( 'F, Y' );
				} else {
					if ( is_year() ) {
						$t = 'Year';
						$q = get_the_time( 'Y' );
					} else {
						if ( is_author() ) {
							$t = 'Author';
							$q = get_query_var( 'author_name' );
						}
					}
				}
			}
		}
	}

	if ( is_tax( 'portfolio-category' ) || is_tax( 'portfolio-tag' ) ) {
		$archive_type = 'portfolio';
	} else {
		if ( is_tag() || is_category() || is_day() || is_month() || is_year() || is_author() ) {
			$archive_type = 'blog';
		}
	}

	$post_meta['sidebar_type'] = $options['archive_page_layout'];
	$post_meta['left_sidebar'] = $options['archive_left_sidebar'];
	$post_meta['right_sidebar'] = $options['archive_right_sidebar'];

	return do_action( 'horizon_get_sidebar_layout' );
}

// Set up search page
add_action( 'horizon_before_search_page', 'horizon_before_search_page' );
function horizon_before_search_page() {
	global $post_meta, $options, $q, $t;

	$t = 'Search Results';
	$q = sprintf( $options['default_search_title'], get_search_query() );

	$post_meta['sidebar_type'] = $options['archive_page_layout'];
	$post_meta['left_sidebar'] = $options['archive_left_sidebar'];
	$post_meta['right_sidebar'] = $options['archive_right_sidebar'];

	return do_action( 'horizon_get_sidebar_layout' );
}

// Switch slider types
add_action( 'horizon_slider', 'horizon_slider' );
function horizon_slider() {
	global $post_meta, $flexslider_args;

	switch ( $post_meta['slider_type'] ) {
		case "None":
			return;
			break;
		case "Layer Slider":
			return do_action( 'horizon_slider_layerslider', $post_meta['layerslider_id'] );
			break;
		case "FlexSlider":
			$full_width = $post_meta['full_width_flexslider'] == "Yes" ? " force-full-width body-width" : "";
			foreach ( horizon_split_image_string( $post_meta['flexslider_images'] ) as $image ) {
				$image_meta = horizon_get_image_meta( $image, 'flexslider_topslider' );
				$slides[] = '<li><img height="' . $post_meta['flexslider_height'] . '" src="' . $image_meta['src'] . '" alt="' . $image_meta['alt'] . '" /></li>';
			}
			$width = $post_meta['full_width_flexslider'] == "Yes" ? "" : " width: " . $post_meta['flexslider_width'] . "px; ";
			$flexslider_args = array(
				"area"       => "top-slider",
				"slides"     => $slides,
				"animation"  => $post_meta['flexslider_animation'],
				"full_width" => $full_width,
				"width"      => $width,
				"height"     => "height: " . $post_meta['flexslider_height'] . "px"
			);


			echo '<div class="' . $flexslider_args['full_width'] . '" style="' . $flexslider_args['height'] . $flexslider_args['width'] . '">';
			do_action( 'horizon_slider_flexslider', $flexslider_args );
			echo '</div>';
			break;
	}
}

add_action( 'horizon_slider_flexslider', 'horizon_slider_flexslider' );
function horizon_slider_flexslider( $flexslider_atts ) {
	return get_template_part( TEMPLATE_PATH . '/sliders/flexslider' );
}

// Before LayerSlider Output
add_action( 'horizon_slider_layerslider', 'horizon_slider_layerslider' );
function horizon_slider_layerslider( $layerslider_id ) {
	global $layerslider_id;

	return get_template_part( TEMPLATE_PATH . '/sliders/layerslider' );
}

// Output page builder
add_action( 'horizon_page_builder', 'horizon_page_builder' );
function horizon_page_builder() {
	global $post_meta;

	$xml = new SimpleXMLElement( $post_meta['page_layout_xml'] );
	echo horizon_page_builder_output( $xml, 'front-end' );
	echo '</div>';
}

// Before Footer
add_action( 'horizon_before_footer', 'horizon_before_footer' );
function horizon_before_footer() {
	return get_template_part( TEMPLATE_PATH . '/footer/before-footer' );
}

// Before Footer Widgets
add_action( 'horizon_before_footer_widgets', 'horizon_before_footer_widgets' );
function horizon_before_footer_widgets() {
	return get_template_part( TEMPLATE_PATH . '/footer/before-footer-widgets' );
}

// Output footer
add_action( 'horizon_footer', 'horizon_footer' );
function horizon_footer() {
	global $options;

	switch ( $options['footer_layout'] ) {
		case "1":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-1' );
			break;
		case "2col":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-2' );
			break;
		case "3col":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-3' );
			break;
		case "4col":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-4' );
			break;
		case "1x2":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-5' );
			break;
		case "2x1":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-6' );
			break;
		case "1x2x1":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-7' );
			break;
		case "1x1x2":
			return get_template_part( TEMPLATE_PATH . '/footer/layouts/footer-8' );
			break;
	}
}

// After Footer Widgets
add_action( 'horizon_after_footer_widgets', 'horizon_after_footer_widgets' );
function horizon_after_footer_widgets() {
	return get_template_part( TEMPLATE_PATH . '/footer/after-footer-widgets' );
}

// After Footer
add_action( 'horizon_after_footer', 'horizon_after_footer' );
function horizon_after_footer() {
	return get_template_part( TEMPLATE_PATH . '/footer/after-footer' );
}

// Output copyright bar
add_action( 'horizon_copyright_bar', 'horizon_copyright_bar' );
function horizon_copyright_bar() {
	return get_template_part( TEMPLATE_PATH . '/footer/copyright-bar' );
}

// Output Pagination
add_action( 'horizon_pagination', 'horizon_pagination' );
function horizon_pagination() {
	return get_template_part( TEMPLATE_PATH . '/pagination/pagination' );
}

// Output Comment
add_action( 'horizon_comment', 'horizon_comment', 10, 3 );
function horizon_comment( $comment, $args, $depth ) {
	global $comment_args;
	$comment_args = array(
		"args"  => $args,
		"depth" => $depth
	);

	return get_template_part( TEMPLATE_PATH . '/comments/single-comment/comment' );
}

// Output Comment
add_action( 'horizon_comment_form', 'horizon_comment_form' );
function horizon_comment_form() {
	return get_template_part( TEMPLATE_PATH . '/comments/comment-form' );
}

// Blog
add_action( 'horizon_before_blog', 'horizon_before_blog' );
function horizon_before_blog() {
	return get_template_part( TEMPLATE_PATH . '/blog/section/' . BLOG_STYLE . '/before-blog' );
}

add_action( 'horizon_after_blog', 'horizon_after_blog' );
function horizon_after_blog() {
	return get_template_part( TEMPLATE_PATH . '/blog/section/' . BLOG_STYLE . '/after-blog' );
}

// Gallery
add_action( 'horizon_before_gallery', 'horizon_before_gallery' );
function horizon_before_gallery() {
	return get_template_part( TEMPLATE_PATH . '/gallery/' . GALLERY_STYLE . '/before-gallery' );
}

add_action( 'horizon_after_gallery', 'horizon_after_gallery' );
function horizon_after_gallery() {
	return get_template_part( TEMPLATE_PATH . '/gallery/' . GALLERY_STYLE . '/after-gallery' );
}

// Portfolio
add_action( 'horizon_before_portfolio', 'horizon_before_portfolio' );
function horizon_before_portfolio() {
	return get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/before-portfolio' );
}

add_action( 'horizon_after_portfolio', 'horizon_after_portfolio' );
function horizon_after_portfolio() {
	return get_template_part( TEMPLATE_PATH . '/portfolio/section/' . PORTFOLIO_STYLE . '/after-portfolio' );
}

// Post Slider
add_action( 'horizon_before_post_slider', 'horizon_before_post_slider' );
function horizon_before_post_slider() {
	return get_template_part( TEMPLATE_PATH . '/post-slider/before-post-slider' );
}

add_action( 'horizon_after_post_slider', 'horizon_after_post_slider' );
function horizon_after_post_slider() {
	return get_template_part( TEMPLATE_PATH . '/post-slider/after-post-slider' );
}

// Testimonials
add_action( 'horizon_before_testimonials', 'horizon_before_testimonials' );
function horizon_before_testimonials() {
	return get_template_part( TEMPLATE_PATH . '/page-builder/testimonial/before-testimonials' );
}

add_action( 'horizon_after_testimonials', 'horizon_after_testimonials' );
function horizon_after_testimonials() {
	return get_template_part( TEMPLATE_PATH . '/page-builder/testimonial/after-testimonials' );
}