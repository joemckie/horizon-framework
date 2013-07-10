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
	
	function horizon_sort_meta_boxes($meta_box, $type=NULL){
		// Add default values in case they're missing
		$meta_box['default'] = isset($meta_box['default']) ? $meta_box['default'] : '' ;
		$meta_box['meta_body'] = isset($meta_box['meta_body']) ? $meta_box['meta_body'] : '' ;
		
		if($type == "sub_item"){
			switch($meta_box['type']):
				case "textarea" : return horizon_display_sub_textarea($meta_box); break;
				case "input" : return horizon_display_sub_input($meta_box); break;
				case "select" : return horizon_display_sub_select($meta_box); break;
				case "checktoggle" : return horizon_display_sub_checktoggle($meta_box); break;
			endswitch;
		} else {
			switch($meta_box['type']):
				case "textarea" : return horizon_display_meta_textarea($meta_box); break;
				case "select" : return horizon_display_meta_select($meta_box); break;
				case "icon-font-awesome" : return horizon_display_meta_icon_select($meta_box); break;
				case "input" : return horizon_display_meta_input($meta_box); break;
				case "open" : return horizon_display_div_open($meta_box); break;
				case "close" : return horizon_display_div_close($meta_box); break;
				case "description" : return horizon_display_description($meta_box); break;
				case "mediagallery" : return horizon_display_media_gallery($meta_box); break;
				case "checktoggle" : return horizon_display_checktoggle($meta_box); break;
				case "radio-image": return horizon_display_meta_radio_image($meta_box); break;
				case "colourpicker": return horizon_display_meta_colourpicker($meta_box); break;
			endswitch;
		}
	}

	function horizon_init_nonce() {
		wp_nonce_field(horizon_get_root_directory(), 'horizon_nonce' );
	}
	
	function horizon_display_meta_colourpicker($args) {
		extract($args);
		
		$value = (empty($value))? $default: $value;
		
		if(!empty($open_value)){
			$val = get_option(THEME_SHORT_NAME.'_options_'.$find_value);
			$status = in_array($val,$open_value) || (!$val && $default_open == true) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$value = $value == "transparent" ? "" : $value;
		$checked = $value == "" ? "checked" : "";
		
		$html .= '<div class="meta_box'. $status .'">';
	    	$html .= '<div class="meta_title">';
	        	$html .= __($title);
	        $html .= '</div>';
	        $html .= '<div class="meta_input">';
	       		$html .= '<input class="'.$name.' colourpicker" id="'.$name.'" name="'.$name.'" type="text" value="'.$value.'" data-colorpickerId="'.$value.'"  />';
	        $html .= '</div>';
	        if(isset($description)){
	        	$html .= '<div class="meta_description">'.__($description).'</div>';
	        }
	    $html .= '</div>';
        $html .= '<div class="clear"></div>';
		
		return $html;
	}

	function horizon_display_meta_select($a){
		global $post; extract($a);
		
		$value = (empty($value))? $default: $value;

		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			if($val == "") {$val = $default_open_value;}
			$status = in_array($val,$open_value) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$slidecontrol = $slidecontrol ? 'slidecontrol' : '';
		
		if($pretty_select !== false) {
			$pretty_select = "pretty-select";
		}
        
        $html = '';
        $html .= '<div class="meta_box'. $status .'">';
        	$html .= '<div class="meta_title">';
                $html .= '<label for="'.$name.'">'.__($title).'</label>';
            $html .= '</div>';
            $html .= '<div class="meta_input">';
                $html .= '<select class="'.$pretty_select.' '.$name.' '.$slidecontrol.'" id="'.$name.'" name="'.$name.'" title="'.__($title).'">';
                    foreach ($options as $option):
                    	$selected = $option==esc_html($value) ? 'selected' : '';
                        $html .= '<option value="'.$option.'" '.$selected.'>'.__($option).'</option>';
                    endforeach;
                $html .= '</select>';
            $html .= '</div>';
     
            if(isset($description)){
                $html .= '<div class="meta_description">'.__($description).'</div>';
            }
        $html .= '</div>';
		$html .= '<div class="clear"></div>';
		
		return $html;	
 
 	}
	
	function horizon_display_meta_icon_select($a){
		global $post; extract($a);
		
		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			$status = in_array($val,$open_value) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$slidecontrol = $slidecontrol ? 'slidecontrol' : '';
		
		if($pretty_select !== false) {
			$pretty_select = "pretty-select";
		}
		
		$options = horizon_font_awesome_icons();
		
		$value = (empty($value))? $options[0]: $value;
        
        $html = '';
        $html .= '<div class="meta_box'. $status .'">';
        	$html .= '<div class="meta_title">';
                $html .= '<label for="'.$name.'">'.__($title).'</label>';
            $html .= '</div>';
            $html .= '<div class="meta_input">';
                $html .= '<select class="trigger-icon '.$pretty_select.' '.$name.' '.$slidecontrol.'" id="'.$name.'" name="'.$name.'" title="'.__($title).'">';
                    foreach ($options as $option):
                    	$selected = $option==esc_html($value) ? 'selected' : '';
                        $html .= '<option value="'.$option.'" '.$selected.'>'.__($option).'</option>';
                    endforeach;
                $html .= '</select>';
                $html .= '<div class="trigger-icon-container">';
                	$html .= '<i class="icon-'.$value.'"></i>';
                $html .= '</div>';
            $html .= '</div>';
     
            if(isset($description)){
                $html .= '<div class="meta_description">'.__($description).'</div>';
            }
        $html .= '</div>';
		$html .= '<div class="clear"></div>';
		
		return $html;	
 
 	}
	
	// Display Radio Image
	function horizon_display_meta_radio_image($args){
		extract($args);	
			        
		$value = (empty($value))? $default: $value;

		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			$status = in_array($val,$open_value) ? 'open' : 'closed';
		} else { $status = ''; }
		
		$slidecontrol = $slidecontrol ? 'slidecontrol' : '';
			        
        $html .= '<div class="meta_title">';
        	$html .= '<label for="'.$name.'">'.__($title).'</label>';
        $html .= '</div>';
        $html .= '<div class="meta_input">';
        	foreach ($options as $option_value => $option_image):
        		$selected = $option_value == esc_html($value) ? "checked" : "";
        		$html .= '<label class="radio '.$selected.'" for="'.$name.'-'.horizon_create_slug($option_value).'"><img src="'.$option_image.'" /></label>';
          	 	$html .= '<input class="'.$slidecontrol.'" type="radio" id="'.$name.'-'.horizon_create_slug($option_value).'" name="'.$name.'" value="'.$option_value.'" '.$selected.' />';
            endforeach;
        $html .= '</div>';
 
        if(isset($description)){
        	$html .= '<div class="meta_description">'.__($description).'</div>';
		}
        $html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	function horizon_display_meta_textarea($a){
		global $post; extract($a);
				
		$value = $value=='' ? esc_html($default) : esc_html($value);
		
		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			$status = in_array($val,$open_value) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$html = '';
        
        $html .= '<div class="meta_box'. $status.'">';      
            $html .= '<div class="meta_title">';
                $html .= '<label for="'.$name.'">'.__($title).'</label>';
            $html .= '</div>';
            $html .= '<div class="meta_input textarea">';
                $html .= '<textarea class="'.$name.'" id="'.$name.'" name="'.$name.'">'.$value.'</textarea>';
            $html .= '</div>';
            
            if(isset($description)){
                $html .= '<div class="meta_description">'.__($description).'</div>';
            }
        $html .= '</div>';
		$html .= '<div class="clear"></div>';	
		
		return $html;
	}
	
	function horizon_display_meta_input($a){
		global $post; extract($a);
		
		$value = $value=='' ? esc_html($default) : esc_html($value);
		
		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			$status = in_array($val,$open_value) ? ' open' : ' closed';
		} else { $status = ''; }
		
		if($spinner){
			$spinner_class = "input_spinner";
			$max = 'aria-custom-max="'.$max_value.'"';
			$min = 'aria-custom-min="'.$min_value.'"';
		}		
		
		$html = '';
		$html .= '<div class="meta_box'. $status.'">';       
            $html .= '<div class="meta_title">';
                $html .= '<label for="'.$name.'">'.__($title).'</label>';
            $html .= '</div>';
            $html .= '<div class="meta_input">';
                $html .= '<input class="'.$name.' '.$spinner_class.'" '.$max.' '.$min.' id="'.$name.'" name="'.$name.'" value="'.$value.'" type="text" />';
            $html .= '</div>';
            
            if(isset($description)){
                $html .= '<div class="meta_description">'.__($description).'</div>';
            }
        $html .= '</div>';
		$html .= '<div class="clear"></div>';	
		
		return $html;	
	}
	
	function horizon_display_div_open($a){
		extract($a); 

        return '<div id="'.$id.'" class="'.$id.' '.$status.'">';
	}
		
	function horizon_display_div_close($a){return '</div>';}
	
	function horizon_display_description($a){
		extract($a);
		
		$html = '';
		$html .= '<div class="meta_box">';
			$html .= '<div class="meta_title">';
				$html .= __($title);
			$html .= '</div>';
			$html .= '<div class="meta_input">';
				$html .= $value;
			$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="clear"></div>';
		
		return $html;
	}

	function horizon_display_checktoggle($a){
		global $post; extract($a);
		
		if($value == ''){
			$checked = $default == $selected_value ? 'checked' : '';
		} else {
			$checked = $value == $selected_value ? 'checked' : '';
		}
		
		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			$status = in_array($val,$open_value) ? ' open' : ' closed';
		} else { $status = ''; }
		
		$html = '';
		$html .= '<div class="meta_box' . $status . '">';
			$html .= '<div class="meta_title">';
                $html .= __($title);
			$html .= '</div>';
			$html .= '<div class="meta_input">';
				$html .= '<label class="onoff checkbox '.$checked.'" for="'.$name.'" rel="'.$name.'"></label>';
                $html .= '<input class="'.$name.' checktoggle" id="'.$name.'" name="'.$name.'" value="'.$selected_value.'" type="checkbox" '.$checked.' />';
			$html .= '</div>';
            if(isset($description)){
                $html .= '<div class="meta_description">'.__($description).'</div>';
            }
		$html .= '</div>';
		$html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	function horizon_display_media_gallery($a){
		global $post; extract($a);
		
		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			$status = in_array($val,$open_value) ? 'open' : 'closed';
		} else { $status = ''; }
		
		$query_images_args = array(
		    'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
		);
		
		$query_images = new WP_Query( $query_images_args );
		$image_full = array();
		$image_thumbs = array();
		foreach ( $query_images->posts as $image) {
		    $image_thumbs[] = wp_get_attachment_image_src( $image->ID );
		    $image_id[] = $image->ID;
		}

		$saved_single_image = explode(", ", $value);
		for($i=0; $i<sizeof($saved_single_image); $i++){
			$saved_images[] = $saved_single_image[$i];
		}
		
		$html = '';
		$html .= '<div class="meta_box '.$status.'" id="'.$name.'">';
			$html .= '<div class="meta_title">';
                $html .= __($title);
			$html .= '</div>';
			$html .= '<div class="meta_input media_gallery">';
				for($i=0; $i<$query_images->found_posts; $i++){
					$checked = in_array($image_id[$i], $saved_images) ? "checked" : "";
					$html .= '<label class="checkbox '.$checked.'" for="'.$name.'['.$i.']" style="background: url('.$image_thumbs[$i][0].') center center no-repeat;"></label>';
                	$html .= '<input class="'.$name.'" id="'.$name.'['.$i.']" name="'.$name.'['.$i.']" value="'.$image_id[$i].'" type="checkbox" '.$checked.' />';
                }
			$html .= '</div>';
			$html .= '<div class="clear"></div>';
		$html .= '</div>';
		
		wp_reset_postdata();
		
		return $html;
	}
	
	function horizon_display_sub_input($a){
		extract($a);
		
		$value = $value=='' ? esc_html($default) : esc_html($value);
		
		if(!empty($open_value)){
			$val = get_post_meta($post->ID, 'post_meta_'. $find_value, true);
			$status = in_array($val,$open_value) ? 'open' : 'closed';
		} else { $status = ''; }
		
		$html = '';
		$html .= '<div class="tab_box '.$status.'">';       
            $html .= '<div class="tab_title">';
                $html .= '<label for="'.$name.'">'.__($title).'</label>';
            $html .= '</div>';
            $html .= '<div class="tab_input">';
                $html .= '<input class="'.$name.'" id="'.$name.'" name="'.$name.'" value="'.$value.'" type="text" />';
            $html .= '</div>';
            
        $html .= '</div>';
		$html .= '<div class="clear"></div>';	
		
		return $html;	
	}
	
	function horizon_display_sub_textarea($a){
		extract($a);
		
		$value = $value=='' ? esc_html($default) : esc_html($value);
		
		$html = '';
        
        $html .= '<div class="tab_box">';      
            $html .= '<div class="tab_title">';
                $html .= '<label for="'.$name.'">'.__($title).'</label>';
            $html .= '</div>';
            $html .= '<div class="tab_input">';
                $html .= '<textarea class="'.$name.'" id="'.$name.'" name="'.$name.'">'.$value.'</textarea>';
            $html .= '</div>';
        $html .= '</div>';
		$html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	function horizon_display_sub_select($a){
		extract($a);
		
		$value = (empty($value))? $default: $value;

        $html = '';
        $html .= '<div class="tab_box">';
        	$html .= '<div class="tab_title">';
                $html .= '<label for="'.$name.'">'.__($title).'</label>';
            $html .= '</div>';
            $html .= '<div class="tab_input">';
                $html .= '<select class="'.$name.'" id="'.$name.'" name="'.$name.'" title="'.__($title).'">';
                    foreach ($options as $option):
                    	$selected = $option==esc_html($value) ? 'selected' : '';
                        $html .= '<option value="'.$option.'" '.$selected.'>'.__($option).'</option>';
                    endforeach;
                $html .= '</select>';
            $html .= '</div>';
     
        $html .= '</div>';
		$html .= '<div class="clear"></div>';
		
		return $html;	
 
	}

	function horizon_display_sub_checktoggle($a){
		extract($a);
		
		if($value == ''){
			$checked = $default == $selected_value ? 'checked' : '';
		} else {
			$checked = $value == $selected_value ? 'checked' : '';
		}
		
		$html = '';
		$html .= '<div class="tab_box">';
			$html .= '<div class="tab_title">';
                $html .= __($title);
			$html .= '</div>';
			$html .= '<div class="tab_input">';
				$html .= '<label class="onoff subcheckbox '.$checked.'" rel="'.$name.'"></label>';
                $html .= '<input class="'.$name.' checktoggle" id="'.$name.'" name="'.$name.'" value="'.$selected_value.'" type="checkbox" '.$checked.' />';
			$html .= '</div>';
            if(isset($description)){
                $html .= '<div class="tab_description">'.__($description).'</div>';
            }
		$html .= '</div>';
		$html .= '<div class="clear"></div>';
		
		return $html;
	}
	
	// Determine which save function to run depending on the post type
	add_action( 'save_post', 'horizon_save_metas' );
	function horizon_save_metas ($id) {
		switch($_POST['post_type']):
		
			case "gallery": 
				if(!current_user_can( 'edit_post', $id )) return;
				horizon_save_gallery_options($id);
				break;
			case "page": 
				if(!current_user_can( 'edit_page', $id )) return;
				horizon_save_page_options($id);
				break;
			case "portfolio": 
				if(!current_user_can( 'edit_post', $id )) return;
				horizon_save_portfolio_options($id);
				break;
			case "post": 
				if(!current_user_can( 'edit_post', $id )) return;
				horizon_save_post_options($id);
				break;
			case "price-table": 
				if(!current_user_can( 'edit_post', $id )) return;
				horizon_save_price_table_options($id);
				break;
			case "staff": 
				if(!current_user_can( 'edit_post', $id )) return;
				horizon_save_staff_options($id);
				break;
			
		endswitch;
	}
	
	/* Save the meta box's post metadata. */
	function horizon_save_meta_data( $post_id, $new_meta, $old_meta, $name ) {
				
		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
			return;
		if(defined("DOING_AJAX") && DOING_AJAX)
			return;
			
		if($new_meta == $old_meta) {
			add_post_meta( $post_id, $name, $new_meta, true );
			
		} elseif(!$new_meta) {
			delete_post_meta ( $post_id, $name, $old_meta );
			
		} elseif($new_meta != $old_meta) {
			update_post_meta ( $post_id, $name, $new_meta, $old_meta );
			
		}
	}

?>