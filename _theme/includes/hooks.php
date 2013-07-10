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
	
	add_action( 'init', 'horizon_set_variable_styles' );
	add_action( 'horizon_set_variable_styles', 'horizon_set_variable_styles' );
	function horizon_set_variable_styles() {
		global $config_array;
	
		define( 'BLOG_STYLE', horizon_create_slug(get_option( THEME_SHORT_NAME.'_options_blog_type', '' )) );
		define( 'BLOG_ARCHIVE_STYLE', horizon_create_slug(get_option( THEME_SHORT_NAME.'_options_blog_archive_type', '' )) );
		define( 'BLOG_SINGLE_STYLE', horizon_create_slug(get_option( THEME_SHORT_NAME.'_options_blog_single_type', '' )) );
		define( 'PORTFOLIO_STYLE', horizon_create_slug(get_option( THEME_SHORT_NAME.'_options_portfolio_type', '' )) );
		define( 'PORTFOLIO_ARCHIVE_STYLE', horizon_create_slug(get_option( THEME_SHORT_NAME.'_options_portfolio_archive_type', '' )) );
		define( 'PORTFOLIO_SINGLE_STYLE', horizon_create_slug(get_option( THEME_SHORT_NAME.'_options_portfolio_single_type', '' )) );
		
		$config_array = array(
			TEMPLATE_PATH.'/blog/single-post/'.BLOG_SINGLE_STYLE.'/config/config.php',
			TEMPLATE_PATH.'/blog/section/'.BLOG_STYLE.'/config/config.php',
			TEMPLATE_PATH.'/blog/archive/'.BLOG_ARCHIVE_STYLE.'/config/config.php',
			TEMPLATE_PATH.'/portfolio/single-post/'.PORTFOLIO_SINGLE_STYLE.'/config/config.php',
			TEMPLATE_PATH.'/portfolio/section/'.PORTFOLIO_STYLE.'/config/config.php',
			TEMPLATE_PATH.'/portfolio/archive/'.PORTFOLIO_ARCHIVE_STYLE.'/config/config.php',
		);
		
		return $config_array;

	}
	
	add_action('horizon_include_theme_admin_scripts', 'horizon_include_theme_admin_scripts');
	function horizon_include_theme_admin_scripts(){
		$js_array = array(
			TEMPLATE_PATH.'/blog/single-post/'.BLOG_SINGLE_STYLE.'/config/config.js',
			TEMPLATE_PATH.'/blog/section/'.BLOG_STYLE.'/config/config.js',
			TEMPLATE_PATH.'/blog/archive/'.BLOG_ARCHIVE_STYLE.'/config/config.js',
		);
		$i=0;
		foreach($js_array as $path){
			wp_enqueue_script('script-'.$i, ROOT.'/'.$path, false, '1.0', true);
			$i++;
		}
	}
	
	// Get sidebar layout
	add_action( 'horizon_get_sidebar_layout', 'horizon_get_sidebar_layout' );
	function horizon_get_sidebar_layout() {
		global $post_meta;
		
		switch($post_meta['sidebar_type']){
			case "Left Sidebar":
				$post_meta['content_meta'] = array("width" => "eight", "padding" => "");
				break;
			case "Right Sidebar":
				$post_meta['content_meta'] = array("width" => "eight", "padding" => "");
				break;
			case "Both Sidebars":
				$post_meta['content_meta'] = array("width" => "six",  "padding" => "");
				break;
			case "No Sidebars":
				$post_meta['content_meta'] = array("width" => "twelve",  "padding" => "");
				break;
		}

		return $post_meta;
	}
	
	add_filter( 'additional_class', 'horizon_get_page_builder_additional_class' );
	function horizon_get_page_builder_additional_class() {
		global $node;
		switch($node->getName()){
		}
	}

	add_filter( 'additional_row_class', 'horizon_get_page_builder_additional_row_class' );
	function horizon_get_page_builder_additional_row_class() {
		global $node;
		switch($node->getName()){
			case "Section-Start": return ' mb0';
		}
	}

		
?>