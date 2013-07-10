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

	get_header();
	do_action( 'horizon_before_single_portfolio' );
	get_template_part( TEMPLATE_PATH.'/titles/portfolio');
?>
   	<div class="container">
   		<div class="row">
   			<!-- START CONTENT -->
	        <div id="post-<?php the_ID(); ?>" <?php post_class('content clearfix ' . horizon_sidebar_layout(false) ); ?>>
	        
				<?php do_action( 'horizon_portfolio' );	?>
				
	        </div>
	    </div>
    </div><!-- end container -->
<?php 
	do_action( 'horizon_after_single_portfolio' );
	get_footer(); 
?>