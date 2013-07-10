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
	
		$blog_style = horizon_create_slug(get_option(THEME_SHORT_NAME.'_options_blog_type'));
		$blog_single_style = horizon_create_slug(get_option(THEME_SHORT_NAME.'_options_blog_single_type'));
		$blog_archive_style = horizon_create_slug(get_option(THEME_SHORT_NAME.'_options_blog_archive_type'));
		$portfolio_style = horizon_create_slug(get_option(THEME_SHORT_NAME.'_options_portfolio_type'));
		$portfolio_single_style = horizon_create_slug(get_option(THEME_SHORT_NAME.'_options_portfolio_single_type'));
		
		$custom_styles_array = array(
			TEMPLATE_PATH.'/blog/single-post/'.$blog_single_style.'/config/custom-styles.php',
			TEMPLATE_PATH.'/blog/section/'.$blog_style.'/config/custom-styles.php',
			TEMPLATE_PATH.'/blog/archive/'.$blog_archive_style.'/config/custom-styles.php',
			TEMPLATE_PATH.'/portfolio/single-post/'.$portfolio_single_style.'/config/custom-styles.php',
			TEMPLATE_PATH.'/portfolio/section/'.$portfolio_style.'/config/custom-styles.php'
		);
		
		foreach($custom_styles_array as $path){
			$i = horizon_get_root_directory($path);
			include($i . $path);
		}
		
		/* 
			Add custom styles (if using px or em, don't forget to add this on!):
			
			$temp_att = horizon_style_attribute( 'YOUR ATTRIBUTE HERE', get_option( THEME_SHORT_NAME. '_options_YOUR_OPTION_NAME'));
			horizon_build_selector ( 'YOUR SELECTOR NAME', $temp_att );
			
			EXAMPLE:
							
			$temp_att = horizon_style_attribute( 'margin-top', get_option( THEME_SHORT_NAME. '_options_site_logo_top_margin', '0') . 'px' );
			horizon_build_selector ( '#logo', $temp_att );
		*/
	
	} 
			
?>