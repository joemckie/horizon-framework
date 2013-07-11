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

jQuery( document ).ready( function ( $ ) {
	var element_sizes = [];
	var page_elements = $( "#page_builder_elements" );
	var page_templates = $( "#page_builder_templates" );
	element_sizes["Defaults"] = {
		"Accordion" : "size1-4",
		"Blog" : "size1-1",
		"Call-To-Action" : "size1-1",
		"Column" : "size1-3",
		"Column-Service" : "size1-3",
		"Contact-Form" : "size1-1",
		"Content" : "size1-1",
		"Divider" : "size1-1",
		"Full-Width-Banner" : "size1-1",
		"Gallery" : "size1-1",
		"Message-Box" : "size1-1",
		"Price-Table" : "size1-1",
		"Portfolio" : "size1-1",
		"Post-Slider" : "size1-1",
		"Section-Start" : "size1-1",
		"Section-End" : "size1-1",
		"Sidebar" : "size1-3",
		"Staff" : "size1-1",
		"Tabs" : "size1-3",
		"Testimonial" : "size1-3",
		"Toggle" : "size1-3"
	};
	element_sizes["Accordion"] = ["size1-6", "size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Blog"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Call-To-Action"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Column"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Column-Service"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Contact-Form"] = ["size1-1"];
	element_sizes["Content"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Divider"] = ["size1-1"];
	element_sizes["Full-Width-Banner"] = ["size1-1"];
	element_sizes["Gallery"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Message-Box"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Price-Table"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Portfolio"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Post-Slider"] = ["size1-1"];
	element_sizes["Section-Start"] = ["size1-1"];
	element_sizes["Section-End"] = ["size1-1"];
	element_sizes["Sidebar"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Staff"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Tabs"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Testimonial"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];
	element_sizes["Toggle"] = ["size1-4", "size1-3", "size1-2", "size2-3", "size3-4", "size1-1"];

	$( "#page_builder_elements" ).sortable( {
		connectWith : ".column",
		delay : 100,
	} ).disableSelection();

	$( "#page_builder .column" ).css( "visibility", "visible" );
	$( ".template" ).find( "input, select, textarea" ).removeAttr( "name" );
	$( ".sub_item" ).find( "input, select, textarea" ).attr( "name", function () {
		return $( this ).attr( "id" );
	} );
	$( "#add_element" ).click( function () {
		var type = $( this ).siblings( "select" ).val();
		var clone = $( page_templates ).find( "[rel=" + type + "]" ).clone( true );
		clone.find( "input, select, textarea" ).attr( "name", function () {
			return $( this ).attr( "id" ) + '[]';
		} );
		clone.find( ".template" ).find( "input, select, textarea" ).removeAttr( "name" );
		clone.find( "label" ).removeClass( "checkbox" ).addClass( "subcheckbox" ).removeAttr( "for" );
		clone.find( "#page-builder-size" ).attr( "name", function () {
			return $( this ).attr( "id" ) + '[]';
		} );
		clone.find( "#page-builder-type" ).attr( "name", function () {
			return $( this ).attr( "id" ) + '[]';
		} );
		$( clone ).css( {"visibility" : "visible", "display" : "inline-block"} ).appendTo( page_elements );
	} );
	$( ".element_delete" ).live( 'click', function () {
		if ( confirm( 'This is non-reversible. Are you sure?' ) ) {
			var ID = $( this ).parents( ".page-builder-element" ).attr( "id" );
			$( this ).parents( ".page-builder-element" ).fadeOut( 500, function () {
				$( this ).parents( ".column" ).remove();
			} );
		}
	} );
	$( ".element_edit" ).live( 'click', function () {
		clicked_id = $( this );
		show_pagebuilder_editor();
	} );
	$( ".editor_close" ).click( function () {
		hide_pagebuilder_editor();
	} );
	$( ".editor_save" ).click( function () {
		hide_pagebuilder_editor();
	} );
	$( ".size-changer span" ).live( 'click', function () {
		var column = $( this ).parents( ".column" );
		var ID = column.attr( "rel" );
		var size = column.attr( "class" ).split( "column " )[1];
		if ( $( this ).attr( "class" ) == "smaller" ) {
			var prev = element_sizes[ID].indexOf( size ) - 1;
			if ( prev == -1 ) {
				return;
			}
			column.find( "#page-builder-size" ).attr( "value", function () {
				return element_sizes[ID][prev];
			} );
			column.attr( "class", "column " + element_sizes[ID][prev] );
		} else {
			var next = element_sizes[ID].indexOf( size ) + 1;
			if ( next == element_sizes[ID].length ) {
				return;
			}
			column.find( "#page-builder-size" ).attr( "value", function () {
				return element_sizes[ID][next];
			} );
			column.attr( "class", "column " + element_sizes[ID][next] );
		}
	} );

	function show_pagebuilder_editor() {
		var parent = $( clicked_id ).parents( ".page-builder-element" );
		var cloned_content = $( parent ).siblings( ".page-builder-options" ).clone( true );
		var editor = $( "#page_content_editor" );
		var overlay = $( ".overlay" );
		$( ".editor_content" ).html( cloned_content );
		overlay.fadeIn( 500, function () {
			editor.slideDown( 500 );
		} );
	}

	function hide_pagebuilder_editor() {
		var editor_content = $( ".editor_content" ).children().clone( true );
		cloned_content = $( clicked_id ).parents( ".page-builder-element" ).siblings( ".page-builder-options" ).replaceWith( editor_content );
		clear_pagebuilder_editor();
	}

	function clear_pagebuilder_editor() {
		$( "#page_content_editor" ).slideUp( 500, function () {
			$( ".overlay" ).fadeOut( 500 );
			$( ".editor_content" ).empty();
		} );
		clicked_id = '', parent = '', cloned_content = '';
	}
} );
// Textarea clone bug fix
(function ( original ) {
	jQuery.fn.clone = function () {
		var result = original.apply( this, arguments ),
			my_textareas = this.find( 'textarea, select' ),
			result_textareas = result.find( 'textarea, select' );
		for ( var i = 0, l = my_textareas.length; i < l; ++i ) {
			jQuery( result_textareas[i] ).val( jQuery( my_textareas[i] ).val() );
		}
		return result;
	};
})( jQuery.fn.clone );