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

function horizon_write_custom_styles() {
	global $handle;

	$custom_styles = SERVER_PATH . '/custom-styles.css';
	$handle = fopen( $custom_styles, 'w' );

	if ( !$handle ) {
		return false;
	}

	horizon_get_custom_style_content();

	fclose( $handle );
}

function horizon_concat_stylecss() {
	global $import_styles;

	$concat_styles = $import_styles;
	array_shift( $concat_styles );
	$style = SERVER_PATH . '/style.css';
	$header = file_get_contents( SERVER_PATH . '/_theme/css/header.css' );
	$handle = fopen( $style, 'w' );

	foreach ( $concat_styles as $path ) {
		$contents .= file_get_contents( SERVER_PATH . '/' . $path ) . "\r\n";
	}

	$contents = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $contents );
	$write = fwrite( $handle, $header . "\r\n\r\n" . $contents );

	fclose( $handle );
}

function horizon_build_selector( $selector, $args ) {
	if ( empty( $args ) ) {
		return;
	}
	horizon_write_css( $selector . '{' . $args . '}' );
}

function horizon_build_google_font_string( $args ) {
	global $google_fonts_array;

	$web_font_string = "http://fonts.googleapis.com/css?family=";

	foreach ( $args as $font => $variants ) {
		if ( array_key_exists( $font, $google_fonts_array ) ) {
			$font = str_replace( " ", "+", $font );
			$web_font_string .= $font;

			$num = sizeof( $variants );
			for ( $i = 0; $i < $num; $i++ ) {
				$separator = array();
				if ( $variants[$i] == "regular" && $num > 1 ) {
					$variants[$i] = "400";
				} else {
					if ( $variants[$i] == "regular" && $num == 1 ) {
						$num = 0;
						$variants[$i] = "";
					}
				}
				switch ( true ) {
					case ( $i == 0 && $num == 1 ):
						$separator['before'] = ":";
						$separator['after'] = "|";
						break;
					case ( $i == 0 && $num > 1 ):
						$separator['before'] = ":";
						$separator['after'] = ",";
						break;
					case ( $num > 1 && $i < $num ):
						$separator['after'] = ",";
						break;
					default:
						$separator['after'] = "|";
						break;
				}
				$web_font_string .= $separator['before'] . $variants[$i] . $separator['after'];
			}
		}
	}

	if ( $web_font_string == "http://fonts.googleapis.com/css?family=" ) {
		$web_font_string = "";
	}

	horizon_save_option( 'google_web_font_string', get_option( 'google_web_font_string' ), $web_font_string );
}

function horizon_style_attribute( $attr, $val, $important = false ) {
	if ( $val == "transparent" ) {
		return $attr . ': transparent;';
	}
	if ( $important ) {
		return $attr . ': ' . $val . ' !important;';
	}

	return $attr . ': ' . $val . ';';
}

function horizon_write_css( $css ) {
	global $handle;
	fwrite( $handle, $css . "\r\n" );
}

function horizon_get_custom_style_content() {
	global $handle, $elements_array;

	$web_font_array = array();

	foreach ( $elements_array as $panel => $args ) {
		foreach ( $args['elements'] as $element ) {

			if ( $element['disable_style_save'] != true ) {
				switch ( $element['type'] ) {

					// Save colours
					case "colourpicker":
						$temp_att = '';
						if ( !empty( $element['attr'] ) && !empty( $element['selector'] ) ) {
							foreach ( $element['attr'] as $attr ):
								$element['important'] = isset( $element['important'] ) ? true : false;
								$temp_att .= horizon_style_attribute( $attr, get_option( $element['name'], $element['default'] ), $element['important'] );
							endforeach;
							horizon_build_selector( $element['selector'], $temp_att );
						}
						break;

					// Save typography
					case "typography":
						$temp_att = '';
						if ( !empty( $element['attr'] ) && !empty( $element['selector'] ) ) {
							foreach ( $element['attr'] as $attr_name => $attr ):
								$saved_value = get_option( $element['name'] . '_' . $attr_name, $element['defaults'][$attr_name] );
								$saved_value = $saved_value == "regular" ? "400" : $saved_value;
								if ( $attr_name == "weight" ) {
									switch ( $saved_value ) {
										case "italic":
											$temp_att .= horizon_style_attribute( 'font-style', 'italic' );
											$temp_att .= horizon_style_attribute( 'font-weight', '400' );
											break;
										case "300italic":
											$temp_att .= horizon_style_attribute( 'font-style', 'italic' );
											$temp_att .= horizon_style_attribute( 'font-weight', '300' );
											break;
										case "400italic":
											$temp_att .= horizon_style_attribute( 'font-style', 'italic' );
											$temp_att .= horizon_style_attribute( 'font-weight', '400' );
											break;
										case "500italic":
											$temp_att .= horizon_style_attribute( 'font-style', 'italic' );
											$temp_att .= horizon_style_attribute( 'font-weight', '500' );
											break;
										case "700italic":
											$temp_att .= horizon_style_attribute( 'font-style', 'italic' );
											$temp_att .= horizon_style_attribute( 'font-weight', '700' );
											break;
										case "900italic":
											$temp_att .= horizon_style_attribute( 'font-style', 'italic' );
											$temp_att .= horizon_style_attribute( 'font-weight', '900' );
											break;
										default:
											$temp_att .= horizon_style_attribute( $attr, $saved_value );
											break;
									}
								} else {
									if ( $attr_name == "size" ) {
										$saved_size = get_option( $element['name'] . '_size', $element['defaults']['size'] );
										$saved_size_type = get_option( $element['name'] . '_size_type', $element['defaults']['size_type'] );
										$temp_att .= horizon_style_attribute( $attr, $saved_size . $saved_size_type );
									} else {
										if ( $attr_name == "font" ) {
											$temp_att .= horizon_style_attribute( $attr, '"' . $saved_value . '", sans-serif;' );
										} else {
											$temp_att .= horizon_style_attribute( $attr, $saved_value );
										}
									}
								}
							endforeach;

							$saved_font = get_option( $element['name'] . '_font', $element['defaults']['font'] );
							$saved_variant = get_option( $element['name'] . '_weight', $element['defaults']['weight'] );

							if ( !$web_font_array[$saved_font] ) {
								$web_font_array[$saved_font] = array();
							}
							if ( !in_array( $saved_variant, $web_font_array[$saved_font] ) ) {
								$web_font_array[$saved_font][] = $saved_variant;
							}
							horizon_build_selector( $element['selector'], $temp_att );
						}
						break;

					// Link format
					case "link":
						$temp_att = '';
						if ( !empty( $element['attr'] ) && !empty( $element['selector'] ) ) {
							$element['important'] = isset( $element['important'] ) ? true : false;
							foreach ( $element['attr'] as $attr_name => $attr ):
								$temp_att .= horizon_style_attribute( $attr, get_option( $element['name'] . '_' . $attr_name, $element['defaults'][$attr_name] ), $element['important'] );
							endforeach;
							horizon_build_selector( $element['selector'], $temp_att );
						}
						break;

					default:
						break;
				}
			}
		}
	}

	horizon_build_google_font_string( $web_font_array );
	if ( defined( 'DEV_MODE' ) && DEV_MODE !== true ) {
		horizon_concat_stylecss();
	}
	horizon_custom_theme_styles();

}
