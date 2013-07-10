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

	do_action( 'horizon_set_variable_styles' );
	function horizon_theme_styles() {
		global $import_styles;
		if(DEV_MODE){			
			wp_deregister_style('style');
			foreach($import_styles as $style_no => $path) {
				wp_deregister_style( 'style'.$style_no );
				wp_register_style( 'style'.$style_no , ROOT. '/'.$path, false, '1.0', 'all' );
				wp_enqueue_style( 'style'.$style_no );
			}
		}
		
		wp_deregister_style( 'superfish' );
		wp_register_style( 'superfish', ROOT.'/_theme/plugins/superfish/superfish.css', false, '1.0', 'all' );
		wp_enqueue_style( 'superfish' );
	}

	function horizon_theme_scripts() {
		wp_deregister_script( 'jquery-tools' );
		wp_register_script( 'jquery-tools', ROOT. '/_theme/js/jquery.tools.min.js', false, '1.0', true );
		wp_enqueue_script( 'jquery-tools' );
		
		wp_deregister_script( 'jquery-ui-core' );
		wp_register_script( 'jquery-ui-core', ROOT. '/_horizon/plugins/jquery/ui/jquery.ui.core.js', false, '1.0', true );
		
		wp_deregister_script( 'jquery-ui-widget' );
		wp_register_script( 'jquery-ui-widget', ROOT. '/_horizon/plugins/jquery/ui/jquery.ui.widget.js', false, '1.0', true );
		
		wp_deregister_script( 'jquery-ui-mouse' );
		wp_register_script( 'jquery-ui-mouse', ROOT. '/_horizon/plugins/jquery/ui/jquery.ui.mouse.js', false, '1.0', true );
		
		wp_deregister_script( 'jquery-ui-position' );
		wp_register_script( 'jquery-ui-position', ROOT. '/_horizon/plugins/jquery/ui/jquery.ui.position.js', false, '1.0', true );
		
		// Used for tabs shortcode
		wp_deregister_script( 'jquery-ui-tabs' );
		wp_register_script( 'jquery-ui-tabs', ROOT. '/_horizon/plugins/jquery/ui/jquery.ui.tabs.js', array('jquery-ui-core', 'jquery-ui-widget'), '1.0', true );
		
		// Used for accordion shortcode
		wp_deregister_script( 'jquery-ui-accordion' );
		wp_register_script( 'jquery-ui-accordion', ROOT. '/_horizon/plugins/jquery/ui/jquery.ui.accordion.js', array('jquery-ui-core', 'jquery-ui-widget'), '1.0', true );
		
		wp_deregister_script( 'horizon-core-scripts' );
		wp_register_script( 'horizon-core-scripts', ROOT. '/_theme/js/horizon-core-scripts.js', array('jquery-ui-mouse', 'jquery-ui-position', 'jquery-ui-tabs', 'jquery-ui-accordion'), '1.0', true );
		wp_enqueue_script( 'horizon-core-scripts' );
		
		wp_deregister_script( 'horizon-scripts' );
		wp_register_script( 'horizon-scripts', ROOT. '/_theme/js/horizon-scripts.js', array('horizon-core-scripts'), '1.0', true );
		wp_enqueue_script( 'horizon-scripts' );
	}
?>