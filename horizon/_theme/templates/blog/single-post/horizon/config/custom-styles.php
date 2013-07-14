<?php
$temp_att = horizon_style_attribute( 'opacity', get_option( THEME_SHORT_NAME . '_options_single_blog_ultrapin_lb_hover_opacity' ) );
horizon_build_selector( '.single-blog-post .blog-image a.lightbox img:hover', $temp_att );
$temp_att = horizon_style_attribute( 'background-color', get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_post_info_bg_colour' ) );
horizon_build_selector( '.single-blog-post.horizon-style .blog-line', $temp_att );
$temp_att = horizon_style_attribute( 'background-color', get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_post_info_hover_bg_colour' ) );
horizon_build_selector( '.single-blog-post.horizon-style span.tooltip', $temp_att );
$temp_att = horizon_style_attribute( 'color', get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_post_info_hover_colour' ) );
horizon_build_selector( '.single-blog-post.horizon-style span.tooltip', $temp_att );

// Link Thumbnail Background
if ( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_link_thumb_bg_type', 'Pattern' ) == "Block Colour" ) {
	$temp_att = horizon_style_attribute( 'background-color', get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_link_thumb_bg_colour', '#efefef' ) );
	horizon_build_selector( '.single-blog-post.horizon-style .link-thumbnail', $temp_att );
} else {
	if ( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_link_thumb_bg_type', 'Pattern' ) == "Pattern" ) {
		$temp_att = horizon_style_attribute( 'background-image', 'url(' . get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_link_thumb_bg_pattern', ROOT . "/_horizon/images/patterns/1.jpg" ) . ')' );
		horizon_build_selector( '.single-blog-post.horizon-style .link-thumbnail', $temp_att );

	} else {
		if ( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_link_thumb_bg_type', 'Pattern' ) == "Custom Image" ) {
			$src = wp_get_attachment_image_src( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_link_thumb_custom_bg' ), 'full' );
			$temp_att = horizon_style_attribute( 'background-image', 'url(' . $src[0] . ')' );
			horizon_build_selector( '.single-blog-post.horizon-style .link-thumbnail', $temp_att );
		}
	}
}

// Quote Thumbnail Background
if ( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_quote_thumb_bg_type', 'Pattern' ) == "Block Colour" ) {
	$temp_att = horizon_style_attribute( 'background-color', get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_quote_thumb_bg_colour', '#efefef' ) );
	horizon_build_selector( '.single-blog-post.horizon-style .quote-thumbnail', $temp_att );
} else {
	if ( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_quote_thumb_bg_type', 'Pattern' ) == "Pattern" ) {
		$temp_att = horizon_style_attribute( 'background-image', 'url(' . get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_quote_thumb_bg_pattern', ROOT . "/_horizon/images/patterns/1.jpg" ) . ')' );
		horizon_build_selector( '.single-blog-post.horizon-style .quote-thumbnail', $temp_att );

	} else {
		if ( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_quote_thumb_bg_type', 'Pattern' ) == "Custom Image" ) {
			$src = wp_get_attachment_image_src( get_option( THEME_SHORT_NAME . '_options_blog_horizon_single_quote_thumb_custom_bg' ), 'full' );
			$temp_att = horizon_style_attribute( 'background-image', 'url(' . $src[0] . ')' );
			horizon_build_selector( '.single-blog-post.horizon-style .quote-thumbnail', $temp_att );
		}
	}
}