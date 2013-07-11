/*
 *
 *  @copyright 2013 Joe McKie
 *  @version 1.0
 *  @author Joe McKie
 * 	@link http://joemck.ie/
 *
 *	This file is part of the Horizon Framework.
 *
 *  Horizon Framework is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  Horizon Framework is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with the Horizon Framework.  If not, see <http://www.gnu.org/licenses/>.
 *
 *	Horizon Framework is built and maintained by Joe McKie (http://joemck.ie/)
 *
 */

(function () {
	tinymce.create( 'tinymce.plugins.button', {
		init : function ( ed, url ) {
			ed.addButton( 'button', {
				title : 'Insert Button',
				image : url + "/images/button.png",
				onclick : function () {
					ed.focus();
					ed.selection.setContent( '[button background="#BACKGROUND_HEX" colour="#TEXT_COLOUR_HEX" rounded="rounded" size="SMALL | MEDIUM | LARGE" hover_bg="#HOVER_BG_HEX" hover_color="#HOVER_COLOR_HEX"]BUTTON_TEXT[/button]' );
				}
			} );
		},
		createControl : function ( n, cm ) {
			return null;
		}
	} );
	tinymce.PluginManager.add( 'button', tinymce.plugins.button );
})();
