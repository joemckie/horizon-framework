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
?>


<form method="get" id="searchform" class="mb0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="searchbar field mb0" name="s" id="s" placeholder="<?php esc_attr_e( 'Search' ); ?>"/>
</form>