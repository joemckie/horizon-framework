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

if ( DEV_MODE ) {
	global $start;
	$time = microtime();
	$time = explode( ' ', $time );
	$time = $time[1] + $time[0];
	$start = $time;
	$dev_class = 'dev-mode';
} else {
	$dev_class = '';
}
?>

<?php global $options; ?>

<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]>
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<?php do_action( 'horizon_head' ); ?>
	<?php wp_head(); ?>
</head>

<!-- START BODY -->
<body <?php body_class( $dev_class ); ?>>

<!-- START BODY WRAP -->
<div class="body-wrap">

	<?php do_action( 'horizon_wrapper' ); ?>

	<!-- START HEADER -->
	<?php
	/*
	* @see horizon_header
	*/
	do_action( 'horizon_header' );
	?>
