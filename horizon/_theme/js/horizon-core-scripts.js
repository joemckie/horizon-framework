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

// Testimonials Function.
function flow( elem ) {
	var el = $( elem );
	el.fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow', function () {
		nextElem = el.is( ':last-child' ) ? el.siblings( ':eq(0)' ) : el.next();
		flow( nextElem );
	} );
}

// Force Full Width
function force_full_width() {
	$( ".force-full-width" ).each( function () {
		$( this ).css( "height", "" );
		var height = $( this ).height(),
			innerHeight = $( this ).innerHeight(),
			outerHeight = $( this ).outerHeight(),
			width = $( this ).outerWidth(),
			wrapper_width = $( ".page-wrapper" ).width(),
			position_left = $( ".page-wrapper" ).offset().left + $( this ).position().left - $( this ).offset().left;
		$( this ).css( {
			left : position_left,
			height : height,
			width : wrapper_width
		} );
		$( this ).parent().height( innerHeight );
		$( this ).children( ".container" ).width( wrapper_width - 40 );
	} );
}

function section_snap() {
	$( ".horizon-section" ).closest( ".row" ).prev( ".row" ).addClass( "mb0" );
}

function sidebar_height() {
	$( ".horizon_sidebar_wrapper" ).css( {
		"min-height" : function () {
			return $( ".horizon_page_item" ).height();
		}
	} );
}

// Togglebox Function.
function togglebox( elem ) {
	el = $( elem );
	el.children( "h6" ).click( function () {
		$( this ).toggleClass( "active" ).next( "div" ).slideToggle();
	} );
}

function horizon_init() {

	// Lightbox
	$( "a[rel^='lightbox']" ).lightbox();

	// Menu Animation
	$( '.sf-menu' ).supersubs( {
		minWidth : 14.5, maxWidth : 27, extraWidth : 1
	} ).superfish( {
			delay : 800,
			speed : 'fast',
			animation : {opacity : 'show', height : 'show'},
		} );

	// Flexslider init
	$( ".flexslider.flexslider-slide" ).flexslider( {
		animation : "slide",
		start : function () {
			return flexslider_start();
		},
		pauseOnHover : true
	} );
	$( ".flexslider.flexslider-fade" ).flexslider( {
		animation : "fade",
		start : function () {
			return flexslider_start();
		},
		pauseOnHover : true
	} );

	// Scroll to top
	$( ".horizon-scroll-to-top" ).click( function () {
		$( "html, body" ).animate( { scrollTop : 0 }, "slow" );
		return false;
	} );

	// Shortcode Button Hover
	$( ".horizon-shortcode-button" ).hover( function () {
		$( this ).removeAttr( "style" );
		$( this ).css( {
			"background-color" : function () {
				return $( this ).attr( "data-hoverbg" );
			},
			"color" : function () {
				return $( this ).attr( "data-hovercolor" );
			}
		} );
	}, function () {
		$( this ).removeAttr( "style" );
		$( this ).css( {
			"background-color" : function () {
				return $( this ).attr( "data-bg" );
			},
			"color" : function () {
				return $( this ).attr( "data-color" );
			}
		} );
	} );

	$( "a" ).click( function ( e ) {
		var $this = $( this );
		var href = $this.attr( "href" );
		if ( (href.indexOf( "#" ) == 0) && (href.length > 0) ) {
			e.preventDefault();
			if ( $this.hasClass( "pagelink" ) ) {
				$( "html, body" ).animate( { scrollTop : $( href ).offset().top - 20 }, "slow" );
			}
		}
	} );

	// testimonials
	$( ".horizon-testimonials div" ).css( "display", "none" );
	$( ".flow" ).each( function () {
		flow( $( this ).children( 'div:eq(0)' ) );
	} );

	// tabs
	$( ".tabs-trigger" ).tabs();

	// accordion
	$( ".accordion-trigger" ).each( function () {
		$( this ).accordion( {
			active : $( this ).find( "h6" ).index( $( this ).find( ".active" ) ),
			heightStyle : "content"
		} );
	} );

	// toggle
	togglebox( ".toggle-trigger" );

	section_snap();
	force_full_width();
	sidebar_height();

}

// Fixes height issues cause by flexslider
function flexslider_start() {
	section_snap();
	force_full_width();
	sidebar_height();
}

$( window ).resize( function () {
	section_snap();
	force_full_width();
	sidebar_height();
} );