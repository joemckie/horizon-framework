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

$include_array = array(
	// Include Horizon
	"_horizon/horizon-register-functions.php",
	"_horizon/horizon-core-hooks.php",
	"_horizon/horizon-core-filters.php",
	"_horizon/horizon-core-functions.php",
	"_horizon/horizon-page-builder.php",
	"_horizon/horizon-ajax-functions.php",
	"_horizon/horizon-shortcodes.php",
	"_horizon/horizon-custom-scripts.php",
	// plugins
	"_horizon/plugins/dropdown-menus.php",
	// Custom Post Types
	"_horizon/custom-pt/testimonial.php",
	"_horizon/custom-pt/portfolio.php",
	// Custom Widgets
	"_horizon/custom-widgets/recent-portfolios.php",
	"_horizon/custom-widgets/twitter-feed.php",
);
$admin_array = array(
	"_horizon/horizon-theme-options.php",
	"_horizon/meta/meta-print-templates.php",
	"_horizon/meta/page-meta.php",
	"_horizon/meta/post-meta.php",
	"_horizon/horizon-custom-styles.php",
);

foreach ( $include_array as $include ) {
	$t = horizon_get_root_directory( $include );
	require_once( $t . $include );
}

if ( is_admin() ) {
	foreach ( $admin_array as $include ) {
		$t = horizon_get_root_directory( $include );
		require_once( $t . $include );
	}
}

?>