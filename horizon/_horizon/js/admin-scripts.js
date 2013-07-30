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

	var panel = $( "#horizon-theme-options-main-panel form" );
	var sidebar = $( "#horizon-theme-options-sidebar" );
	var sidebar_link = $( sidebar ).children( "li" ).find( "a.parent" );
	var checkbox = $( "label.checkbox" );
	var subcheckbox = $( "label.subcheckbox" );
	var radio = $( "label.radio" );
	var icon_trigger = $( ".trigger-icon" );
	
	// Switch between sidebars
	$( sidebar_link ).parent().click( function ( e ) {
		e.preventDefault();
		// Find active tab
		var sidebar_active = sidebar.children( "li.active" );
		var menu_active = sidebar_active.children( "ul.active" );
		var active_menu_link = sidebar.find( "a.active" );
		var panel_active = panel.children( ".panel.active" );

		if ( $( this ).parents( "li" ).attr( "class" ) == sidebar_active.attr( "class" ) ) {
			return;
		}

		var first_link = $( this ).siblings( "ul" ).children( "li:first" ).children( "a" );

		active_menu_link.removeClass( "active" );
		first_link.addClass( "active" );
		panel_active.removeClass( "active" );
		$( "#" + first_link.attr( "rel" ) ).addClass( "active" );

		// Toggle the active class to show current tab
		$( this ).parents( "li" ).toggleClass( "active" );
		sidebar_active.removeClass( "active" );
		menu_active.slideUp( 400, function () {
			menu_active.removeClass( "active" );
		} );
		$( this ).siblings( "ul" ).slideDown( 400 ).addClass( "active" );
	} );

	// Switch individual panels
	$( ".panel_link" ).click( function ( e ) {
		e.preventDefault();
		// Find active tab
		var sidebar_active = sidebar.children( "li.active" );
		var menu_active = sidebar_active.children( "ul.active" );
		var active_menu_link = menu_active.children( "li" ).children( "a.active" );

		// Switch between panels
		var requested_tab = $( this ).attr( "rel" );
		var panel_active = panel.children( ".panel.active" );

		active_menu_link.removeClass( "active" );
		$( this ).addClass( "active" );
		panel_active.removeClass( "active" );
		$( "#" + requested_tab ).addClass( "active" );

	} );

	$( '.reset-button' ).click( function () {
		preview = $( this ).parent().prev( "div" );
		uploadID = $( this ).siblings( 'input[type="text"]' );
		/*grab the specific input*/
		hiddenUpload = $( this ).siblings( 'input[type="hidden"]' );
		preview.html( "" );
		uploadID.val( "" );
		hiddenUpload.val( "" );
	} );

	$( '.upload-button' ).click( function () {
		uploadID = $( this ).siblings( 'input[type="text"]' );
		/*grab the specific input*/
		hiddenUpload = $( this ).siblings( 'input[type="hidden"]' );
		formfield = $( '.upload' ).attr( 'name' );
		preview = $( this ).parent().prev( "div" );
		tb_show( 'Media Upload', 'media-upload.php?type=image&amp;TB_iframe=true' );
		return false;
	} );

	window.send_to_editor = function ( html ) {
		img = $( "img", html );
		imgClass = $( img ).attr( "class" );
		classes = imgClass.split( " " );
		imgurl = $( img, html ).attr( 'src' );
		preview.html( '<img height="150" width="150" src="' + imgurl + '" />' );
		hiddenUpload.val( classes[2] );
		uploadID.val( imgurl );
		/*assign the value to the input*/
		tb_remove();
	};

	$(document).on('click', 'label.checkbox', function () {
		$( this ).toggleClass( "checked" );
	} );

	icon_trigger.change( function () {
		var val = $( this ).val();
		$( this ).next( ".trigger-icon-container" ).children( "i" ).attr( "class", "icon-" + val );
	} );

	$(document).on("click", 'label.subcheckbox', function () {
		$(this).toggleClass("checked");
		$( this ).parent().find( 'input:checkbox' ).attr( 'checked', function ( idx, oldAttr ) {
			return !oldAttr;
		} );
	} );

	radio.click( function () {
		$( this ).siblings( ".checked" ).removeClass( "checked" );
		$( this ).addClass( "checked" );
	} );

	$( "#post" ).submit( function () {
		checkboxes = $( 'input[type="checkbox"].checktoggle' );
		checkboxes.each( function () {
			if ( !$( this ).prop( "checked" ) ) {
				$( this ).prop( "checked", true ).val( "No" );
			}
		} );
	} );

	// Meta box open & close
	$( ".slidecontrol" ).change( function () {
		var val = $( this ).val();
		var id = $( this ).attr( "id" );

		// Sidebar switch
		if ( val == "Left Sidebar" ) {
			$( "#post_meta_left_sidebar" ).parents( ".meta_box" ).slideDown();
			$( "#post_meta_right_sidebar" ).parents( ".meta_box" ).slideUp();
		} else if ( val == "Right Sidebar" ) {
			$( "#post_meta_right_sidebar" ).parents( ".meta_box" ).slideDown();
			$( "#post_meta_left_sidebar" ).parents( ".meta_box" ).slideUp();
		} else if ( val == "Both Sidebars" ) {
			$( "#post_meta_left_sidebar" ).parents( ".meta_box" ).slideDown();
			$( "#post_meta_right_sidebar" ).parents( ".meta_box" ).slideDown();
		} else if ( val == "No Sidebars" ) {
			$( "#post_meta_left_sidebar" ).parents( ".meta_box" ).slideUp();
			$( "#post_meta_right_sidebar" ).parents( ".meta_box" ).slideUp();
		}

		// Slider switch
		else if ( val == "Layer Slider" ) {
			$( "#post_meta_flexslider_images_wrap" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_layerslider_id" ).parents( ".meta_box" ).slideDown();
		} else if ( val == "FlexSlider" ) {
			$( "#post_meta_layerslider_id" ).parents( ".meta_box" ).slideUp();
			$( "#post_meta_flexslider_images_wrap" ).children( ".meta_box" ).slideDown();
		} else if ( val == "None" ) {
			$( "#post_meta_flexslider_images_wrap" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_layerslider_id" ).parents( ".meta_box" ).slideUp();
		}

		// Thumbnail type switch
		else if ( val == "Featured Image" && id == "post_meta_thumbnail_type" ) {
			$( "#post_meta_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Image Slider" && id == "post_meta_thumbnail_type" ) {
			$( "#post_meta_thumbnail_slider_images" ).slideDown();
			$( "#post_meta_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Quote" && id == "post_meta_thumbnail_type" ) {
			$( "#post_meta_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_thumbnail_quote" ).children( ".meta_box" ).slideDown();
			$( "#post_meta_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Audio" && id == "post_meta_thumbnail_type" ) {
			$( "#post_meta_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_audio" ).children( ".meta_box" ).slideDown();
			$( "#post_meta_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Link" && id == "post_meta_thumbnail_type" ) {
			$( "#post_meta_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_link" ).children( ".meta_box" ).slideDown();
			$( "#post_meta_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Video" && id == "post_meta_thumbnail_type" ) {
			$( "#post_meta_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_thumbnail_video" ).children( ".meta_box" ).slideDown();
		}

		// Inside thumbnail type switch
		else if ( val == "Featured Image" && id == "post_meta_inside_thumbnail_type" ) {
			$( "#post_meta_inside_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_inside_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Image Slider" && id == "post_meta_inside_thumbnail_type" ) {
			$( "#post_meta_inside_thumbnail_slider_images" ).slideDown();
			$( "#post_meta_inside_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Quote" && id == "post_meta_inside_thumbnail_type" ) {
			$( "#post_meta_inside_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_inside_thumbnail_quote" ).children( ".meta_box" ).slideDown();
			$( "#post_meta_inside_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Audio" && id == "post_meta_inside_thumbnail_type" ) {
			$( "#post_meta_inside_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_inside_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_audio" ).children( ".meta_box" ).slideDown();
			$( "#post_meta_inside_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Link" && id == "post_meta_inside_thumbnail_type" ) {
			$( "#post_meta_inside_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_inside_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_link" ).children( ".meta_box" ).slideDown();
			$( "#post_meta_inside_thumbnail_video" ).children( ".meta_box" ).slideUp();
		} else if ( val == "Video" && id == "post_meta_inside_thumbnail_type" ) {
			$( "#post_meta_inside_thumbnail_slider_images" ).slideUp();
			$( "#post_meta_inside_thumbnail_quote" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_audio" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_link" ).children( ".meta_box" ).slideUp();
			$( "#post_meta_inside_thumbnail_video" ).children( ".meta_box" ).slideDown();
		}

		// Logo placement switch
		else if ( val == "Left" ) {
			$( "#" + page_data.theme_short_name + "_options_logo_left" ).parents( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_logo_right" ).parents( ".option" ).slideDown();
		} else if ( val == "Center" ) {
			$( "#" + page_data.theme_short_name + "_options_logo_left" ).parents( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_logo_right" ).parents( ".option" ).slideDown();
		} else if ( val == "Right" ) {
			$( "#" + page_data.theme_short_name + "_options_logo_left" ).parents( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_logo_right" ).parents( ".option" ).slideUp();
		}

		// Body Background Type Switch
		else if ( val == "Block Colour" && id == page_data.theme_short_name + "_options_body_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_body_background_pattern" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_body_background_colour" ).parents( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_body_custom_background" ).children( ".option" ).slideUp();
		} else if ( val == "Pattern" && id == page_data.theme_short_name + "_options_body_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_body_background_pattern" ).children( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_body_background_colour" ).parents( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_body_custom_background" ).children( ".option" ).slideUp();
		} else if ( val == "Custom Image" && id == page_data.theme_short_name + "_options_body_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_body_background_pattern" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_body_custom_background" ).children( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_body_background_colour" ).parents( ".option" ).slideUp();
		} else if ( val == "No Background" && id == page_data.theme_short_name + "_options_body_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_body_background_pattern" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_body_background_colour" ).parents( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_body_custom_background" ).children( ".option" ).slideUp();
		}

		// Pre Background Type Switch
		else if ( val == "Block Colour" && id == page_data.theme_short_name + "_options_pre_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_pre_background_pattern_wrap" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_pre_background_colour" ).parents( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_pre_custom_background_wrap" ).children( ".option" ).slideUp();
		} else if ( val == "Pattern" && id == page_data.theme_short_name + "_options_pre_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_pre_background_pattern_wrap" ).children( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_pre_background_colour" ).parents( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_pre_custom_background_wrap" ).children( ".option" ).slideUp();
		} else if ( val == "Custom Image" && id == page_data.theme_short_name + "_options_pre_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_pre_background_pattern_wrap" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_pre_custom_background_wrap" ).children( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_pre_background_colour" ).parents( ".option" ).slideUp();
		} else if ( val == "No Background" && id == page_data.theme_short_name + "_options_pre_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_pre_background_pattern_wrap" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_pre_background_colour" ).parents( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_pre_custom_background_wrap" ).children( ".option" ).slideUp();
		}

		// Footer Background Type Switch
		else if ( val == "Block Colour" && id == page_data.theme_short_name + "_options_footer_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_footer_background_pattern_wrap" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_footer_background_colour" ).parents( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_footer_custom_background_wrap" ).children( ".option" ).slideUp();
		} else if ( val == "Pattern" && id == page_data.theme_short_name + "_options_footer_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_footer_background_pattern_wrap" ).children( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_footer_background_colour" ).parents( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_footer_custom_background_wrap" ).children( ".option" ).slideUp();
		} else if ( val == "Custom Image" && id == page_data.theme_short_name + "_options_footer_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_footer_background_pattern_wrap" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_footer_custom_background_wrap" ).children( ".option" ).slideDown();
			$( "#" + page_data.theme_short_name + "_options_footer_background_colour" ).parents( ".option" ).slideUp();
		} else if ( val == "No Background" && id == page_data.theme_short_name + "_options_footer_background_type" ) {
			$( "#" + page_data.theme_short_name + "_options_footer_background_pattern_wrap" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_footer_custom_background_wrap" ).children( ".option" ).slideUp();
			$( "#" + page_data.theme_short_name + "_options_footer_background_colour" ).parents( ".option" ).slideUp();
		}

	} );

	$( ".input_spinner" ).spinner( {
		spin : function ( event, ui ) {
			spinner_spin( event, ui, $( this ), 'parseint' );
		},
		stop : function () {
			spinner_stop( $( this ), 'parseint' );
		}
	} ).blur( function ( event ) {
			spinner_blur( event, $( this ), 'parseint' );
		} );

	$( ".input_spinner.decimal" ).spinner( {
		step : 0.01,
		spin : function ( event, ui ) {
			spinner_spin( event, ui, $( this ), 'parsefloat' );
		},
		stop : function () {
			spinner_stop( $( this ), 'parsefloat' );
		}
	} ).blur( function ( event ) {
			spinner_blur( event, $( this ), 'parsefloat' );
		} );

	function spinner_spin( event, ui, _this, type ) {
		var value, min, max;
		if ( type == "parseint" ) {
			value = parseInt( ui.value, 10 );
			min = parseInt( _this.attr( "aria-custom-min" ), 10 );
			max = parseInt( _this.attr( "aria-custom-max" ), 10 );
		} else {
			value = parseFloat( ui.value );
			min = parseFloat( _this.attr( "aria-custom-min" ) );
			max = parseFloat( _this.attr( "aria-custom-max" ) );
		}

		if ( _this.val() > max ) {
			return _this.val( max );
		} else if ( _this.val() < min ) {
			return _this.val( min );
		}
	}

	function spinner_stop( _this, type ) {
		var val, min, max;
		if ( type == "parseint" ) {
			val = parseInt( _this.val(), 10 );
			min = parseInt( _this.attr( "aria-custom-min" ), 10 );
			max = parseInt( _this.attr( "aria-custom-max" ), 10 );
		} else {
			val = parseFloat( _this.val() );
			min = parseFloat( _this.attr( "aria-custom-min" ) );
			max = parseFloat( _this.attr( "aria-custom-max" ) );
		}

		if ( val > max ) {
			_this.val(function () {
				return max;
			} ).attr( 'aria-valuenow', function () {
					return max;
				} );
		} else if ( val < min ) {
			_this.val(function () {
				return min;
			} ).attr( 'aria-valuenow', function () {
					return min;
				} );
		}

		if ( _this.parents( ".option_input" ).hasClass( "typography" ) ) {
			_this.font_preview();
		}
	}

	function spinner_blur( event, _this, type ) {
		var val, min, max;
		if ( type == "parseint" ) {
			val = parseInt( _this.val(), 10 );
			min = parseInt( _this.attr( "aria-custom-min" ), 10 );
			max = parseInt( _this.attr( "aria-custom-max" ), 10 );
		} else {
			val = parseFloat( _this.val() );
			min = parseFloat( _this.attr( "aria-custom-min" ) );
			max = parseFloat( _this.attr( "aria-custom-max" ) );
		}

		if ( val > max ) {
			return _this.val(function () {
				return max;
			} ).attr( 'aria-valuenow', function () {
					return max;
				} );
		} else if ( val < min ) {
			return _this.val(function () {
				return min;
			} ).attr( 'aria-valuenow', function () {
					return min;
				} );
		}
	}

	$( ".typography-handle" ).change( function () {
		$( this ).font_preview();
	} );

	// Meta box tab switch
	$( ".meta_box_tabs li" ).click( function () {
		var active_tab = $( ".meta_box_tabs li.active" );
		var selected_tab = $( this );
		var active_panel = $( ".horizon_over_content .meta_panel.active" );
		var selected_panel = $( this ).attr( "rel" );

		if ( selected_panel == active_panel.attr( "id" ) ) {
			return false;
		}

		$( active_panel ).fadeOut( 'fast', function () {
			$( this ).removeClass( 'active' );
			$( active_tab ).removeClass( 'active' );
			$( "#" + selected_panel ).fadeIn( 'fast', function () {
				$( selected_tab ).addClass( 'active' );
				$( this ).addClass( 'active' );
			} );
		} );
	} );

	// Editor functions
	$( '.sub_item' ).css( 'display', 'block' );
	$( ".add-sub-item" ).click( function () {
		var tab_list = $( this ).parents( ".add_sub_item" ).siblings( "ul" );
		var template_tab = tab_list.find( ".template" ).clone( true );
		template_tab.attr( 'class', 'sub_item' );
		template_tab.find( 'input, textarea, select' ).attr( 'name', function () {
			return $( this ).attr( 'id' ) + '[]';
		} );
		tab_list.children( "#tab-number" ).val( function () {
			return parseInt( $( this ).val(), 10 ) + 1;
		} );
		tab_list.children( "#tab-number" ).attr( 'name', function () {
			return $( this ).attr( 'class' ) + '[]';
		} );
		tab_list.append( template_tab );
		tab_list.find( '.sub_item' ).slideDown();
	} );
	$( ".delete-sub-item" ).click( function () {
		var tab = $( this ).parent();
		var tab_count = $( tab ).siblings( "input" );
		$( tab ).slideUp( 500, function () {
			$( this ).remove();
			$( tab_count ).val( function () {
				return parseInt( $( this ).val(), 10 ) - 1;
			} );
		} );
	} );

} );