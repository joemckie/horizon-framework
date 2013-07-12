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
	tinymce.create( 'tinymce.plugins.youtube', {
		init : function ( ed, url ) {
			ed.addButton( 'youtube', {
				title : 'Insert YouTube Video',
				image : url + "/images/youtube.png",
				onclick : function () {
					ed.focus();
					ed.selection.setContent( '[youtube height="315" width="560" title="TITLE"]YOUTUBE VIDEO URL[/youtube]' );
				}
			} );
		},
		createControl : function ( n, cm ) {
			return null;
		}
	} );
	tinymce.PluginManager.add( 'youtube', tinymce.plugins.youtube );
})();
