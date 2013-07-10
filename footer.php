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
	
	global $options;
	do_action( 'horizon_before_footer' ); 

	// Footer
	if ($options['enable_footer'] == "Yes") {
		do_action( 'horizon_before_footer_widgets' ); 
		do_action( 'horizon_footer' );
		do_action( 'horizon_after_footer_widgets' ); 
	}
	
	// Copyright bar
	if($options['footer_enable_copyright_bar'] == "Yes") {
		do_action( 'horizon_copyright_bar' );
	}
	
	do_action( 'horizon_after_footer' );
	do_action( 'horizon_after_wrapper' ); 
	
?>

<?php
	if(DEV_MODE){
		global $start;
		
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $start), 4);
		echo 'Page generated in '.$total_time.' seconds.';
	}
?>