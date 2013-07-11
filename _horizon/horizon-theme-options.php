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
			
	function horizon_theme_options() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		} else {
			echo horizon_build_theme_options_panel();
		}
	}
				
	function horizon_save_theme_options($values){

		global $elements_array;
		$_SESSION['options'] = NULL;
	
		foreach(json_decode($values, true) as $row=>$key):
			if(strpos($key['name'], "[]")){
				$parsed_values[$key['name']][] = $key;
			} else {
				$parsed_values[$key['name']] = $key;
			}
		endforeach;
				
		$return_data = array("success" => "-1", "message" => "Failed - please check your error logs for more info.");
		$all_options = '';
		
		foreach ($elements_array as $panels=>$panel) :
			foreach($panel['elements'] as $element=>$args):
			
				if($args['type'] !== "typography" && $args['type'] !== "colourpicker" && $args['type'] !== "link"){
					$all_options .= str_replace(THEME_SHORT_NAME. '_options_', '', $args['name']) . ',';
				}
			
				// FILE UPLOAD
				if($args['type'] == "upload") {
					$parts = explode("-", $parsed_values[$args['name']]['value']);
					$parsed_values[$args['name']]['value'] = $parts[2];
					
					if(!horizon_save_option($args['name'], get_option($args['name']), stripslashes($parsed_values[$args['name']]['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					}
				
				// CHECK TOGGLE
				} else if($args['type'] == "checktoggle"){
					if($parsed_values[$args['name']]['value']==''){
						$parsed_values[$args['name']]['value'] = "No";
					}
					if(!horizon_save_option($args['name'], get_option($args['name']), stripslashes($parsed_values[$args['name']]['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					}
				// TYPOGRAPHY
				} else if($args['type'] == "typography") {
					$submitted_font = str_replace("-", " ", stripslashes($parsed_values[$args['name'].'_font']['value']));
					
					if(!horizon_save_option($args['name'].'_colour', get_option($args['name'].'_colour'), stripslashes($parsed_values[$args['name'].'_colour']['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					} 
					
					else if(!horizon_save_option($args['name'].'_font', get_option($args['name'].'_font'), $submitted_font )){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					} 
					
					else if(!horizon_save_option($args['name'].'_size', get_option($args['name'].'_size'), stripslashes($parsed_values[$args['name'].'_size']['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					} 
					
					else if(!horizon_save_option($args['name'].'_size_type', get_option($args['name'].'_size_type'), stripslashes($parsed_values[$args['name'].'_size_type']['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					} 
					
					else if(!horizon_save_option($args['name'].'_weight', get_option($args['name'].'_weight'), stripslashes($parsed_values[$args['name'].'_weight']['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					} 
					
					else if(!horizon_save_option($args['name'].'_transform', get_option($args['name'].'_transform'), stripslashes($parsed_values[$args['name'].'_transform']['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					}
					
					else if(!horizon_save_option($args['name'].'_decoration', get_option($args['name'].'_decoration'), stripslashes($parsed_values[$args['name'].'_decoration']['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					}
					
				// CUSTOM SIDEBARS
				} else if($args['type'] == "add_sidebar"){
					$sidebar_string = '';
					for($i=0; $i<sizeof($parsed_values[$args['name'].'[]']); $i++){
						$sidebar_string .= $parsed_values[$args['name'].'[]'][$i]['value'].',';
					}
					if(!horizon_save_option($args['name'], get_option($args['name']), $sidebar_string)){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					}
				} else {
					if(!horizon_save_option($args['name'], get_option($args['name']), stripslashes($parsed_values[$args['name']]['value']))){
						return($return_data = array("success" => "-1", "message" => "Failed!"));
					}
				}
			endforeach;
		endforeach;
		
		if(!horizon_save_option('horizon_all_options', get_option('horizon_all_options'), $all_options)) {
			return ($return_data = array("success" => "-1", "message" => "Failed!"));
		};
		
		horizon_write_custom_styles ();
		
		$return_data['success'] = "0";
		$return_data['message'] = "Your options were saved successfully.";
		
		return $return_data;
							
	}
	
	function horizon_save_option($name, $old_value, $new_value){
		
		if(!isset($new_value) && !empty($old_value)){
			if(!delete_option($name)){
				return false;
			}
		}else if($old_value != $new_value){
			if(!update_option($name, $new_value)){
				return false;
			}
		}
		
		return true;
		
	}
	
	function horizon_display_theme_options_menu($sidebars) {
		
		$html = '';					
		foreach($sidebars as $sidebar=>$args):
			extract($args);

			$active = $args['default'] ? "active" : "" ;
			
			$html .= '<li class="menu-icon '.$menu_icon.' '.$active.' ">';
				$html .= '<div class="menu-image"></div>';
				$html .= '<div class="wp-menu-name"><a class="parent" href="#">'.$sidebar.'</a></div>';
				$html .= '<ul class="'.$active.'">';
					foreach ($args['menus'] as $menu=>$menu_args):
						$sub_active = $menu_args['default'] ? "active" : "";
						$html .= '<li><a class="panel_link '.$sub_active.'" rel="'.$menu_args['id'].'" href="#">'.$menu.'</a></li>';
					endforeach;
				$html .= '</ul>';
			$html .= '</li>';
			
		endforeach;
		
		return $html;
		
	}
	
	function horizon_display_theme_options_elements($panels) {
	
		$html = '';
	
		foreach ($panels as $panel=>$args):
			extract($args);

			$active = $args['default'] ? "active" : "" ;
						
			$html .= '<div class="panel '.$active.'" id="'.$id.'">';
				$html .= '<h2>'.$panel.'</h2>';
				foreach ($elements as $element):
					if($element['type'] == "typography" || $element['type'] == "text"){
						foreach($element['defaults'] as $default => $value) {
							$element[$default.'_value'] = get_option($element['name'].'_'.$default, $value);
						}
					} else {
						$element['value'] = get_option($element['name'], $element['default']);
					}

					$html .= horizon_sort_options($element);
					if (empty($element['no_hr'])){
						if( $element['type'] != 'open' && $element['type'] != 'close'){
							$html .= '<hr class="separator mt20">';
						}
					}
				endforeach;
			$html .= '</div>';
		endforeach;
		
		return $html;
	}
	
	/*function build_variant_types($google_fonts, $basic_fonts, $custom_fonts){
	
		$html = '';
		$html .= '<div class="typography-variants">';
			foreach($custom_fonts as $font_family => $variants) {
				$html .= '<select rel="'.str_replace(" ", "-",$font_family).'">';
					foreach($variants as $variant){
						$selected = $variant == "regular" ? "selected" : "";
						$html .= '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
					}
				$html .= '</select>';
			}
			foreach($basic_fonts as $font_family => $variants) {
				$html .= '<select rel="'.str_replace(" ", "-",$font_family).'">';
					foreach($variants as $variant){
						$selected = $variant == "regular" ? "selected" : "";
						$html .= '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
					}
				$html .= '</select>';
			}
			foreach($google_fonts as $font){
				$html .= '<select rel="'.str_replace(" ", "-",$font->family).'">';
					foreach($font->variants as $variant){
						$selected = $variant == "regular" ? "selected" : "";
			;			$html .= '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
					}
				$html .= '</select>';
			}
		$html .= '</div>';
	
		return $html;
	}*/
	
	function horizon_build_theme_options_panel() {
		global $menu_array, $elements_array, $sidebar_array, $google_fonts, $basic_fonts, $custom_fonts;

		$html = '';
		$html .= '<div id="theme-options" class="postbox">';
			//$html .= build_variant_types($google_fonts, $basic_fonts, $custom_fonts);
        	$html .= '<div class="overlay">';
	            $html .= '<div id="message_box">';
                	$html .= '<span><img src="'.ROOT.'/_horizon/images/ajax/bar.gif" /></span>';
                $html .= '</div>';
            $html .= '</div>';
        	$html .= '<h3><span>'.THEME_NAME.' - Version '.THEME_VERSION.'</span></h3>';
            $html .= '<div class="save-panel top">';
				$html .= '<noscript><h4 style="color:red; display:inline-block; margin:0.8em">This panel relies on JavaScript to function. Please activate it in your browser settings!</h4></noscript>';
            	$html .= '<input class="button button-primary button-large right horizon-theme-options-submit" name="theme-option-submit" type="submit" value="Save All Changes" />';
                $html .= '<div class="clear"></div>';
            $html .= '</div>';
            $html .= '<div id="horizon-theme-options-sidebar">';
            	$html .= horizon_display_theme_options_menu($sidebar_array);
            $html .= '</div>';
            $html .= '<div id="horizon-theme-options-main-panel">';
            	$html .= '<form enctype="multipart/form-data" method="post" name="theme-options" id="horizon-theme-options-form">';
					$html .= '<input type="hidden" name="security" value="'.wp_create_nonce(plugin_basename(__DIR__)).'">';
                    $html .= horizon_display_theme_options_elements($elements_array);
                $html .= '</form>';
            $html .= '</div>';            
            $html .= '<div class="save-panel bottom">';
            	//$html .= '<input class="button button-large left horizon-theme-options-reset" type="submit" value="Restore Defaults" />';
            	$html .= '<input class="button button-primary button-large right horizon-theme-options-submit" name="theme-option-submit" type="submit" value="Save All Changes" />';
                $html .= '<div class="clear"></div>';
            $html .= '</div>';
		$html .= '</div>';
		
		return $html;
        
	} 
	
	/* ===============================
		Sorting & Building the different options
	================================*/
	
	// Display Select Dropdown
	function horizon_display_option_select($args){
		extract($args);	
			        
		if(!empty($open_value)){
			$val = get_option(THEME_SHORT_NAME.'_options_'.$find_value);
			$status = in_array($val,$open_value) || $default_open == true ? ' open' : ' closed';
		} else { $status = ''; }
		
		$slidecontrol = $slidecontrol ? 'slidecontrol' : '';
		
		$html .= '<div class="option '.$status.'">';
	        $html .= '<div class="option_title">';
	        	$html .= '<label for="'.$name.'">'.__($title).'</label>';
	        $html .= '</div>';
	        $html .= '<div class="option_input">';
	        	$html .= '<select class="pretty-select '.$name.' '.$slidecontrol.'" id="'.$name.'" name="'.$name.'" title="'.__($title).'">';
	            	foreach ($options as $option):
	            		$selected = $option == esc_html($value) ? "selected" : "";
	              	 	$html .= '<option value="'.$option.'" '.$selected.'>'.__($option).'</option>';
	                endforeach;
	            $html .= '</select>';
	        $html .= '</div>';
	 
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
			}
		$html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	// Display Radio Image
	function horizon_display_option_radio_image($args){
		extract($args);
		
		if(!empty($open_value)){
			$val = get_option(THEME_SHORT_NAME.'_options_'.$find_value);
			$status = in_array($val,$open_value) || (!$val && $default_open == true) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$thumb_width = $image_width ? ' width="'.$image_width.'"' : '';
		$thumb_height = $image_height ? ' height="'.$image_height.'"' : '';
		
		$html .= '<div class="option'. $status .'">';
	        $html .= '<div class="option_title">';
	        	$html .= '<label for="'.$name.'">'.__($title).'</label>';
	        $html .= '</div>';
	        $html .= '<div class="option_input">';
	        	foreach ($options as $option_value => $option_image):
	        		$selected = $option_value == esc_html($value) ? "checked" : "";
	        		$html .= '<label class="radio '.$selected.'" for="'.$name.'-'.horizon_create_slug($option_value).'"><img'. $thumb_height . $thumb_width .' src="'.$option_image.'" /></label>';
	          	 	$html .= '<input type="radio" id="'.$name.'-'.horizon_create_slug($option_value).'" name="'.$name.'" value="'.$option_value.'" '.$selected.' />';
	            endforeach;
	        $html .= '</div>';
	 
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
			}
		$html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	// Display Textarea
	function horizon_display_option_textarea($args){
		extract($args);

		$html .= '<div class="option">';
	        $html .= '<div class="option_title">';
	        	$html .= '<label for="'.$name.'">'.__($title).'</label>';
	        $html .= '</div>';
	        $html .= '<div class="option_input">';
		        $html .= '<textarea class="'.$name.'" id="'.$name.'" name="'.$name.'">';
		        	$html .= $value='' ? esc_html($default) : esc_html($value);
		        $html .= '</textarea>';
	        $html .= '</div>';
	        
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
			}
		$html .= '</div>';
		$html .= '<div class="clear"></div>';

		return $html;
	}
	
	function horizon_display_option_input($args){
		extract($args);
		
		if($spinner){
			$spinner_class = "input_spinner";
			if($decimal) {$spinner_class .= " decimal";}
			$max = 'aria-custom-max="'.$max_value.'"';
			$min = 'aria-custom-min="'.$min_value.'"';
		}
		
		$html .= '<div class="option">';
	        $html .= '<div class="option_title">';
	        	$html .= '<label for="'.$name.'">'.__($title).'</label>';
	        $html .= '</div>';
	        $html .= '<div class="option_input">';
		        $html .= '<input class="'.$name.' '.$spinner_class.'" id="'.$name.'" name="'.$name.'" type="text" value="';
		        	$html .= $value='' ? esc_html($default) : esc_html($value);
		        $html .= '" '.$max.' '.$min.' />';
	        $html .= '</div>';
	        
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
			}
		$html .= '</div>';
		$html .= '<div class="clear"></div>';	
		
		return $html;
	}
	
	// Display Checkbox
	function horizon_display_option_checktoggle($args){
		extract($args);

		if($value == ''){$checked = $default == $selected_value ? 'checked' : '';} 
		else {$checked = $value == $selected_value ? 'checked' : '';}

		$html .= '<div class="option">';
	    	$html .= '<div class="option_title">';
	        	$html .= __($title);
	        $html .= '</div>';
	        $html .= '<div class="option_input">';
				$html .= '<label for="'.$name.'" class="checkbox '.$checked.'" rel="'.$name.'"></label>';
	        	$html .= '<input '.$checked.' class="checktoggle '.$name.'" id="'.$name.'" name="'.$name.'" type="checkbox" value="'.$selected_value.'"  />';
	        $html .= '</div>';
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
	        }
	    $html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	// Display File Upload
	function horizon_display_option_file_upload($args){
		extract($args);
		
		if(!empty($open_value)){
			$val = get_option(THEME_SHORT_NAME.'_options_'.$find_value);
			$status = in_array($val,$open_value) || (!$val && $default_open == true) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$html .= '<div class="option' . $status . '">';
	    	$html .= '<div class="option_title">';
	        	$html .= '<label for="'.$name.'">'.__($title).'</label>';
	        $html .= '</div>';
	        $html .= '<div class="upload_preview">';
				$src = '';
				if(!empty($value)) {
					$src = wp_get_attachment_image_src($value, 'full');
					$src = empty($src) ? '' : $src[0];
					$src_preview = wp_get_attachment_image_src($value, 'thumbnail');
					$html .= '<img src="'.$src_preview[0].'" />';
				}
	        $html .= '</div>';
	        $html .= '<div class="option_input">';
	        	$html .= '<input class="upload" type="text" value="'.$src.'" />'; 
	            $html .= '<input class="button thickbox upload-button" type="button" value="Upload"  />';
	            $html .= '<input class="button reset-button" type="button" value="Delete" />';
	            $html .= '<input type="hidden" name="'.$name.'" value="horizon-file-'.$value.'"  />';
	        $html .= '</div>';
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
	        }
	    $html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	function horizon_display_option_colourpicker($args) {
		extract($args);
		
		if(!empty($open_value)){
			$val = get_option(THEME_SHORT_NAME.'_options_'.$find_value);
			$status = in_array($val,$open_value) || (!$val && $default_open == true) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$checked = $value == "transparent" ? "checked" : "";
		$value = $value == "transparent" ? "" : $value;
		
		$html .= '<div class="option'. $status .'">';
	    	$html .= '<div class="option_title">';
	        	$html .= __($title);
	        $html .= '</div>';
	        $html .= '<div class="option_input">';
	       		$html .= '<input class="'.$name.' colourpicker" id="'.$name.'" name="'.$name.'" type="text" value="'.$value.'" data-colorpickerId="'.$value.'"  />';
	       		$html .= '<input '.$checked.' class="'.$name.'" id="'.$name.'_transparent" name="'.$name.'" type="checkbox" value="transparent"  />';
	       		$html .= '<label for="'.$name.'_transparent">Transparent</label>';
	        $html .= '</div>';
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
	        }
	    $html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	function horizon_display_option_typography($args) {
		global $loaded_fonts, $google_fonts_array, $google_fonts, $basic_fonts, $custom_fonts, $size_types, $weight_types, $transform_types, $decoration_types; extract($args);
		
		$handle = $preview === NULL ? "typography-handle" : "";
		
		$fonts = $google_fonts;		
		$html .= '<div class="option">';
	    	$html .= '<div class="option_title">';
	        	$html .= __($title);
	        	if($description){$html .= $description;}
	        $html .= '</div>';
	        $html .= '<div class="option_input typography">';
	        	$html .= '<style class="preview-css">';
	        		if(!in_array($font_value, $loaded_fonts)){
	        			if(array_key_exists($font_value, $google_fonts_array)){
			        		$html .= horizon_get_file('http://fonts.googleapis.com/css?family='.str_replace(" ", "+", $font_value).':300,400,700,700italic,900,900italic');
			        		$loaded_fonts[] = $font_value;
	        			}
	        		}
	        	$html .= '</style>';
	        	
	        	if(array_key_exists("size", $attr)) {
		        	// Font Size
		        	$html .= '<input class="input_spinner font_size '.$handle.'" name="'.$name.'_size" rel="size" type="text" value="'.$size_value.'" aria-custom-max="75" aria-custom-min="1" />';
		        	
		        	// Font Size Type (EM/PX/PT)
		        	$html .= '<select class="'.$handle.' pretty-select font_size_type" name="'.$name.'_size_type" rel="size_type">';
		        		$html .= '<optgroup label="Size Type">';
			        		foreach($size_types as $size_type){
				        		$selected = $size_type == $size_type_value ? "selected" : "";
			        			$html .= '<option '.$selected.'>'.$size_type.'</option>';
			        		}
			        	$html .= '</optgroup>';
		        	$html .= '</select>';
	        	}
	        	
	        	if(array_key_exists("font", $attr)){
		        	$html .= '<select class="'.$handle.' pretty-select font" name="'.$name.'_font" rel="font">';
		        		if(!is_null($custom_fonts)){
			        		$html .= '<optgroup label="Custom Fonts">';
			        			foreach($custom_fonts as $custom_font => $variants){
			        				$selected = $custom_font == $font_value ? "selected" : "";
			        				$html .= '<option '.$selected.'>'.$custom_font.'</option>';
			        			}
			        		$html .= '</optgroup>';
		        		}
		        		$html .= '<optgroup label="Basic Fonts">';
		        			foreach($basic_fonts as $basic_font => $variants){
		        				$selected = $basic_font == $font_value ? "selected" : "";
		        				$html .= '<option '.$selected.'>'.$basic_font.'</option>';
		        			}
		        		$html .= '</optgroup>';
		        		$html .= '<optgroup label="Google Web Fonts">';
			        		foreach($fonts as $font) {
			        			$selected = $font->family == $font_value ? "selected" : "";
				        		$html .= '<option '.$selected.'>'.$font->family.'</option>';
			        		}
			        	$html .= '</optgroup>';
		        	$html .= '</select>';
	        	}
	        	
	        	if(array_key_exists("weight", $attr)) {
		        	// Weight Type (300/400/500/700/900 | italic)
		        	$html .= '<select class="'.$handle.' pretty-select weight" name="'.$name.'_weight" rel="weight">';
		        		$html .= '<optgroup label="Font Weight">';
			        		foreach($weight_types as $weight_type => $readable){
				        		$selected = $weight_type == $weight_value ? "selected" : "";
			        			$html .= '<option value="'.$weight_type.'" '.$selected.'>'.$readable.'</option>';
			        		}
			        	$html .= '</optgroup>';
		        	$html .= '</select>';
	        	}
	        	
	        	if(array_key_exists("colour", $attr)){
		        	// Colour
		        	$html .= '<input class="'.$handle.' colourpicker '.$name.'" id="'.$name.'" name="'.$name.'_colour" type="text" rel="colour" value="'.$colour_value.'"  />';
	        	}
	        	
	        	if(array_key_exists("transform", $attr)){
		        	// Text Transform
		        	$html .= '<select class="'.$handle.' pretty-select transform" name="'.$name.'_transform">';
		        		$html .= '<optgroup label="Text Transform">';
			        		foreach($transform_types as $transform_type){
				        		$selected = $transform_type == $transform_value ? "selected" : "";
			        			$html .= '<option value="'.$transform_type.'" '.$selected.'>'.$transform_type.'</option>';
			        		}
			        	$html .= '</optgroup>';
		        	$html .= '</select>';
	        	}

	        	if(array_key_exists("decoration", $attr)){
		        	// Text Transform
		        	$html .= '<select class="'.$handle.' pretty-select decoration" name="'.$name.'_decoration">';
		        		$html .= '<optgroup label="Text Decoration">';
			        		foreach($decoration_types as $decoration_type){
				        		$selected = $decoration_type == $decoration_value ? "selected" : "";
			        			$html .= '<option value="'.$decoration_type.'" '.$selected.'>'.$decoration_type.'</option>';
			        		}
			        	$html .= '</optgroup>';
		        	$html .= '</select>';
	        	}

	        	if($preview === NULL){
				    $html .= '<div class="clear"></div>';
			    	$html .= '<div class="font-preview" style="'.horizon_font_preview_styling($args).'">';
			    		$html .= 'Sphinx of black quartz, judge my vow.';
			    	$html .= '</div>';
	        	}
	        	
	        $html .= '</div>';
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
	        }
	    $html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
		
	function horizon_display_option_add_sidebar($args) {
		extract($args);
		
		$html .= '<div class="option">';
	        $html .= '<div class="option_input add_sub_item">';        
	        	$html .= '<input class="add-sub-item button" type="button" value="Add Sidebar" />';
	        $html .= '</div>';
	        
	        $html .= '<div class="clear"></div>';
	        
			$html .= '<ul class="tab_list">';
				$html .= '<li class="template">
							<a class="delete-sub-item"></a>
							<div class="tab_box">
								<div class="tab_title">
									<label>SIDEBAR TITLE</label>
								</div>
								<div class="tab_input">
									<input id="'.$name.'" name="'.$name.'" type="text">
								</div>
							</div>
						</li>';
				$saved_sidebars = explode(",",get_option($name));
				for($i=0; $i<sizeof($saved_sidebars)-1; $i++){
					$html .= '<li class="sub_item">
						<a class="delete-sub-item"></a>
						<div class="tab_box">
							<div class="tab_title">
								<label>SIDEBAR TITLE</label>
							</div>
							<div class="tab_input">
								<input id="'.$name.'" name="'.$name.'[]" type="text" value="'.$saved_sidebars[$i].'">
							</div>
						</div>
					</li>';	
				}
				
			$html .= '</ul>';
			
	        if(isset($description)){
	        	$html .= '<div class="option_description">'.__($description).'</div>';
	        }
	    $html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	function horizon_sort_options($option) {
		switch($option['type']):
			case "select": return horizon_display_option_select($option); break;
			case "input": return horizon_display_option_input($option);	break;
			case "textarea": return horizon_display_option_textarea($option); break;
			case "checktoggle": return horizon_display_option_checktoggle($option);	break;
			case "upload": return horizon_display_option_file_upload($option); break;
			case "colourpicker": return horizon_display_option_colourpicker($option); break;
			case "typography": return horizon_display_option_typography($option); break;
			case "text": return display_option_text($option); break;
			case "add_sidebar": return horizon_display_option_add_sidebar($option); break;
			case "radio-image": return horizon_display_option_radio_image($option); break;
			case "open": return horizon_display_div_open($option); break;
			case "close": return horizon_display_div_close($option); break;
		endswitch;
		
		return $output;
	}
	
	function horizon_font_preview_styling($args){
		foreach($args['defaults'] as $default => $value) {
			$args[$default.'_value'] = get_option($args['name'].'_'.$default, $value);
		}	
		extract($args);
		
		
		
		$style = '';
		$style .= 'color:'.$colour_value.';';
		$style .= 'font-family:'.$font_value.';';
		$style .= 'font-size:' . $size_value . $size_type_value . ';';
		$style .= 'text-transform:' . $transform_value . ';';
		
		$style .= strpos($weight_value, "italic") !== false ? "font-style:italic;" : "font-style:normal;";
		switch($weight_value){
			case "300": 		$style .= 'font-weight:300;'; 	 break;
			case "500": 		$style .= 'font-weight:500;'; 	 break;
			case "500italic": 	$style .= 'font-weight:500;'; 	 break;
			case "700":			$style .= 'font-weight:700;'; 	 break;
			case "700italic":	$style .= 'font-weight:700;'; 	 break;
			case "900": 		$style .= 'font-weight:900;'; 	 break;
			case "900italic": 	$style .= 'font-weight:900;';	 break;
			default: 			$style .= 'font-weight:normal;'; break;			
		}
		
		return $style;
		
	}
	
	$loaded_fonts = array();
	$google_fonts = horizon_get_google_fonts();
	foreach((array)$google_fonts as $google_font){
		$google_fonts_array[$google_font->family] = $google_font;
	}
	$basic_fonts = array(
		'Arial' => array("regular", "700", "italic", "700italic"),
		'Arial Black' => array("black"),
		'Comic Sans MS' => array("regular", "700"),
		'Courier New' => array("regular", "700", "italic", "700italic"),
		'Georgia' => array("regular", "700", "italic", "700italic"),
		'Impact' => array("regular"),
		'Palatino Linotype' => array("regular", "700", "italic", "700italic"),
		'Lucida Console' => array("regular", "700"),
		'Lucida Sans Unicode' => array("regular", "700"),
		'Times New Roman' => array("regular", "700", "italic", "700italic"),
		'Tahoma' => array("regular", "700"),
		'Trebuchet MS' => array("regular", "700", "italic", "700italic"),
		'Verdana' => array("regular", "700", "italic", "700italic"),
	);
	$weight_types = array(
		"300" => "Light",
		"300italic" => "Light Italic",
		"regular" => "Regular",
		"italic" => "Italic",
		"700" => "Bold",
		"700italic" => "Bold Italic",
		"900" => "Extra Bold",
		"900italic" => "Extra Bold Italic"
	);
	$size_types = array("px", "em", "pt");
	$decoration_types = array("none","underline");
	$transform_types = array("none","uppercase");
	
?>