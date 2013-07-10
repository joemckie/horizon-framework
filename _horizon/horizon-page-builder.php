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
	
	function horizon_return_array_attributes($xml_element){
		foreach($xml_element->children() as $attribute_name=>$attribute_value){
			$attributes[$attribute_name] = $attribute_value;
		}
		return $attributes;
	}
	
	function horizon_item_size($item_size, $item_row_size = '0', $additional_class='', $additional_row_class='', $html_row_tag = 'div', $html_col_tag = 'div'){
		if( empty($item_row_size) ){ 
			echo '<' . $html_row_tag .' class="row">';
		}
		
		$additional_class = $additional_class ? ' ' . $additional_class : '';
		
		$horizon_row_class = horizon_format_width($item_size, 'front-end') . ' columns' . $additional_class;
		$horizon_item_size = horizon_format_width($item_size, 'int');
		
		$item_row_size = $item_row_size + $horizon_item_size;
		
		if($item_row_size > 1){
			$item_row_size = $horizon_item_size;
			echo '<div class="clear"></div>';
			echo '</div>';
			echo '<' . $html_row_tag . ' class="row'. $additional_row_class. '">';
		}
		
		echo '<' . $html_col_tag . ' class="' . $horizon_row_class . '">';
		
		return $item_row_size;
	}
	
	function horizon_sub_item_size($no_end, $item_size, $sub_item_row_size = '0', $additional_class='', $additional_row_class='', $html_row_tag = 'div', $html_col_tag = 'div'){

		if( empty($sub_item_row_size) ){ 
			echo '<' . $html_row_tag .' class="row">';
		}
		
		$additional_class = $additional_class ? ' ' . $additional_class : '';
		
		$horizon_row_class = horizon_format_width($item_size, 'front-end') . ' columns' . $additional_class;
		$horizon_item_size = horizon_format_width($item_size, 'int');
		
		$sub_item_row_size = $sub_item_row_size + $horizon_item_size;

		if($sub_item_row_size > 1){
			$sub_item_row_size = $horizon_item_size;
			if(!$no_end) {
				echo '<div class="clear"></div>';
				echo '</div>';
			}
			echo '<' . $html_row_tag . ' class="row'. $additional_row_class. '">';
		}
		
		echo '<' . $html_col_tag . ' class="' . $horizon_row_class . '">';
		
		return $sub_item_row_size;
	}
	
	// Front-end functions
	function horizon_accordion_output($accordion) {
		global $attributes, $children;
		$attributes = horizon_return_array_attributes($accordion);
		$children = $accordion->children();

		return get_template_part( TEMPLATE_PATH.'/page-builder/accordion/accordion' );
	}
	
	function horizon_blog_output($blog)
	{
		global $blog_atts, $meta, $blog_query;
		$blog_atts = horizon_return_array_attributes($blog);
		
		// Standardise text inputs
		$num = (int)preg_replace('/[^0-9,]|,[0-9]*$/','', $blog_atts['num']); //num_posts must be an int
		
		$args = array('posts_per_page' => $num);
		if((string)$blog_atts['enable_pagination'] == "No"){$args['nopaging'] = true;} 
		else {$args['paged'] = get_query_var('paged');}
		if($blog->category!="All"){$args['category_name'] = (string)$blog_atts['category'];}
				
		$blog_query = new WP_Query( $args );
		
		if( $blog_query->have_posts() ){
					
			$i=1;			
			do_action( 'horizon_before_blog' );
			
			while($blog_query->have_posts()) {
				$blog_query->the_post();
				
				switch($blog_atts['blog_size']){
					case "1/4 Width": $meta['width'] = 4; break;
					case "1/3 Width": $meta['width'] = 3; break;
					case "1/2 Width": $meta['width'] = 2; break;
					case "Full Width": $meta['width'] = 1; break;
					default: $meta['width'] = 0;
				}
				$meta['alpha'] = $i==1 ? "alpha" : "";
				$meta['omega'] = $i==$meta['width'] ? "omega" : "";
				$meta['size'] = horizon_format_width($blog_atts['blog_size'], 'front-end');
				$meta['blog_meta'] = horizon_get_post_meta('blog_meta');
				
				get_template_part( TEMPLATE_PATH.'/blog/section/'.BLOG_STYLE.'/blog-item' );
				
				$i = $i==$meta['width'] ? 1 : $i+1;
				
			}

			do_action( 'horizon_after_blog' );
			
		}
			
		return wp_reset_postdata();
	}
			
	function horizon_call_to_action_output($call_to_action){
		global $attributes;
		$attributes = horizon_return_array_attributes($call_to_action);

		return get_template_part( TEMPLATE_PATH.'/page-builder/call-to-action/call-to-action' );
	}
	
	function horizon_column_output($column){
		global $attributes;
		$attributes = horizon_return_array_attributes($column);

		return get_template_part( TEMPLATE_PATH.'/page-builder/column/column' );
	}
	
	function horizon_column_service_output($column){
		global $attributes;
		$attributes = horizon_return_array_attributes($column);

		return get_template_part( TEMPLATE_PATH.'/page-builder/column-service/column' );
	}
	
	function horizon_contact_form_output($contact_form){
		global $attributes;
		$attributes = horizon_return_array_attributes($contact_form);

		return get_template_part( TEMPLATE_PATH.'/page-builder/contact-form/contact-form' );
	}
	
	function horizon_content_output($content){
		global $attributes;
		$attributes = horizon_return_array_attributes($content);

		return get_template_part( TEMPLATE_PATH.'/page-builder/content/content' );
	}
	
	function horizon_divider_output($divider){
		global $attributes;
		$attributes = horizon_return_array_attributes($divider);

		return get_template_part( TEMPLATE_PATH.'/page-builder/divider/divider' );
	}
	
	function horizon_full_width_banner_output($full_width_banner){
		global $attributes;
		$attributes = horizon_return_array_attributes($full_width_banner);

		return get_template_part( TEMPLATE_PATH.'/page-builder/full-width-banner/full-width-banner' );
	}
	
	function horizon_gallery_output($gallery)
	{
		global $gallery_atts, $meta, $gallery_query;
		$gallery_atts = horizon_return_array_attributes($gallery);
		
		$args = array(
			'post_type' => 'gallery',
			'name' => (string)$gallery_atts['gallery_name']
		);
		
		$gallery_query = new WP_Query( $args );
		
		if($gallery_query->have_posts()){
			
			$i=1;
			do_action( 'horizon_before_gallery' );
			
			while($gallery_query->have_posts()){
				$gallery_query->the_post();
				
				switch($gallery_atts['gallery_size']){
					case "1/4 Width": $meta['width'] = 4; break;
					case "1/3 Width": $meta['width'] = 3; break;
					case "1/2 Width": $meta['width'] = 2; break;
					case "Full Width": $meta['width'] = 1; break;
					default: $meta['width'] = 0; break;
				}
				$meta['size'] = horizon_format_width($gallery_atts['gallery_size'], 'front-end');
				$meta['gallery_meta'] = horizon_get_post_meta('gallery_meta');
				$meta['gallery_images'] = horizon_split_image_string($meta['gallery_meta']['gallery_images']);
				
				foreach($meta['gallery_images'] as $image){
					$image_query = new WP_Query(array('post_type' => 'attachment', 'p' => (int)$image));
					$meta['src'] = wp_get_attachment_image_src($image, $meta['size'].'-columns');
					while($image_query->have_posts()) {
						$image_query->the_post();
						$i=1;
						$meta['alpha'] = $i==1 ? "alpha" : "";
						$meta['omega'] = $i==$meta['width'] ? "omega" : "";
						get_template_part( TEMPLATE_PATH.'/gallery/'.GALLERY_STYLE.'/gallery-item' );
						
						$i = $i==$meta['width'] ? 1 : $i+1;
					}
					wp_reset_postdata();
				}
			}
			
			do_action( 'horizon_after_gallery' );
			
		}
		
		wp_reset_postdata();
		
		return;
	}
	
	function horizon_message_output($message){
		global $attributes;
		$attributes = horizon_return_array_attributes($message);

		return get_template_part( TEMPLATE_PATH.'/page-builder/message/message' );
	}
	
	function horizon_price_table_output($price_table)
	{
		extract(horizon_return_array_attributes($price_table));
		// Standardise text inputs
		$num = (int)preg_replace('/[^0-9,]|,[0-9]*$/','',$num); //num_posts must be an int
		$width = 'column1-'.$num;
			
		$args = array(
			'meta_key' => THEME_SHORT_NAME. '_options_price_table_order',
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'post_type' => 'price-table',
			'posts_per_page' => $num,
		);
		if($price_table->category !== "All"){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'price-table-category',
					'field' => 'slug',
					'terms' => (string)$category,
				)
			);
		}
		
		$price_tables = new WP_Query( $args );
		
		$html = '';
		$html .= '<div class="shortcode-price-table '.horizon_format_width($size, 'front-end').' columns">';
			if( $price_tables->have_posts() ):
				while( $price_tables->have_posts() ):
					$price_tables->the_post();
					
					$data = array(
						'featured' => '_options_price_table_featured',
						'price' => '_options_price_table_price',
						'suffix' => '_options_price_table_suffix',
						'button_link' => '_options_price_table_button_link',
						'button_text' => '_options_price_table_button_text',					
					); // Get data from the custom metas
					foreach($data as $var=>$meta):
						$$var = get_post_meta( get_the_ID(), THEME_SHORT_NAME. $meta, true);
					endforeach;
					$best_price = $featured=='Yes' ? 'best-price' : '';
									
					$html .= '<div class="price-table '.$width.'  columns '.$best_price.'">';
					$html .= '<div class="price-table-price">';
					$html .= '<span class="package-price">'.$price.'</span>';
					$html .= '<span class="suffix">'.$suffix.'</span>';
					$html .= '</div>';
					$html .= '<div class="price-table-title">';
					$html .= get_the_title();
					$html .= '</div>';
					$html .= get_the_content();
					$html .= '<p><a class="button red" href="'.$button_link.'">'.$button_text.'</a></p>';
					$html .= '</div>';
					
					$i++;
				endwhile;
				$html .= '<div class="clear"></div>';
			else:
				$html .= '<div>No testimonials matched your search!<br />Did you enter the right slug?</div>';
			endif;
		$html .= '</div>';
		wp_reset_postdata();
		
		return $html;
	}
	
	function horizon_portfolio_output($portfolio)
	{
		global $portfolio_atts, $meta, $portfolio_query;
		$portfolio_atts = horizon_return_array_attributes($portfolio);

		// Standardise text inputs
		$portfolio_atts['num'] = (int)preg_replace('/[^0-9,]|,[0-9]*$/','', $portfolio_atts['num']); //num_posts must be an int
		
		$args = array('post_type' => 'portfolio', 'posts_per_page' => $portfolio_atts['num']);
		if($portfolio_atts['enable_pagination'] == "No"){$args['nopaging'] = true;} 
		else {$args['paged'] = get_query_var('page');}
		if($portfolio->category != "All"){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio-category',
					'field' => 'slug',
					'terms' => (string)$portfolio_atts['category'],
				)
			);
		}
		
		$portfolio_query = new WP_Query($args);
		
		if($portfolio_query->have_posts()){
			
			$i=1;
			do_action( 'horizon_before_portfolio' );
			
			while($portfolio_query->have_posts()){
				$portfolio_query->the_post();
				
				switch($portfolio_atts['portfolio_size']){
					case "1/4 Width": $meta['width'] = 4; break;
					case "1/3 Width": $meta['width'] = 3; break;
					case "1/2 Width": $meta['width'] = 2; break;
					case "Full Width": $meta['width'] = 1; break;
					default: $meta['width'] = 0; break;
				}
				$meta['alpha'] = $i==1 ? "alpha " : "";
				$meta['omega'] = $i==$meta['width'] ? " omega " : "";
				$meta['size'] = horizon_format_width($portfolio_atts['portfolio_size'], 'front-end');
				$meta['portfolio_meta'] = horizon_get_post_meta('portfolio_meta');
				
				get_template_part( TEMPLATE_PATH.'/portfolio/section/'.PORTFOLIO_STYLE.'/portfolio-item' );
				
				$i = $i==$meta['width'] ? 1 : $i+1;
			}
			
			do_action( 'horizon_after_portfolio' );
			
		}
		
		wp_reset_postdata();
		
		return;
	}
	
	function horizon_post_slider_output($post_slider)
	{
		global $post_slider_atts, $meta, $post_slider_query, $flexslider_args;
		$post_slider_atts = horizon_return_array_attributes($post_slider);
		
		// Standardise text inputs
		$num = (int)preg_replace('/[^0-9,]|,[0-9]*$/','', $post_slider_atts['num']); //num_posts must be an int
		$args = array('posts_per_page' => $num);
		if($post_slider->category!="All"){$args['category_name'] = (string)$post_slider_atts['category'];}
				
		$post_slider_query = new WP_Query( $args );
		
		if( $post_slider_query->have_posts() ){
					
			do_action( 'horizon_before_post_slider' );
			
			while($post_slider_query->have_posts()) {
				$post_slider_query->the_post();
				
				$meta['post_slider_meta'] = horizon_get_post_meta('post_slider_meta');
				$slides[] = horizon_load_template_part( TEMPLATE_PATH.'/post-slider/post-item' );
			}
			
			if($post_slider_atts['type'] = "Flex Slider") {
				$flexslider_args = array(
					"animation" => $post_slider_atts['animation'],
					"area" => "post-slider",
					"slides" => $slides,
					"style" => 'style="width:'.$post_slider_atts['width'].'px"'
				);
				do_action( 'horizon_slider_flexslider', $flexslider_args );
			}
			
			do_action( 'horizon_after_post_slider' );
			
		}
						
		return wp_reset_postdata();
	}
	
	function horizon_section_start_output($section_start){
		global $attributes;

		$attributes = horizon_return_array_attributes($section_start);

		return get_template_part( TEMPLATE_PATH.'/page-builder/section/section-start' );
	}
	
	function horizon_section_end_output($section_end){
		global $attributes;

		return get_template_part( TEMPLATE_PATH.'/page-builder/section/section-end' );
	}
	
	function horizon_sidebar_output($sidebar){
		extract(horizon_return_array_attributes($sidebar));
		$html = '';
		$html .= '<div class="page-builder-sidebar '.format_width($size, 'front-end').' columns">';
			if($title) {$html .= '<div class="sidebar-title">'.$title.'</div>';}
			$html .= horizon_get_dynamic_sidebar($sidebar_name);
		$html .= '</div>';
		
		return $html;
	}
	
	function horizon_staff_output($staff)
	{
		extract(horizon_return_array_attributes($staff));
		// Standardise text inputs
		$num = (int)preg_replace('/[^0-9,]|,[0-9]*$/','',$num); //num_posts must be an int
		$width = 'column1-'.$num;
			
		$args = array(
			'post_type' => 'staff',
			'posts_per_page' => $num,
		);
		if(!empty($staff->category)){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'staff-category',
					'field' => 'slug',
					'terms' => (string)$category,
				)
			);
		}
		
		$employees = new WP_Query( $args );
		
		$html = '';
		$html .= '<div class="shortcode-staff '.format_width($size, 'front-end').' columns">';
			if( $employees->have_posts() ):
				while( $employees->have_posts() ):
					$employees->the_post();
					
					$data = array(
						'role' => '_options_staff_role',
						'email' => '_options_staff_email',
						'phone' => '_options_staff_phone',
						'website' => '_options_staff_website',
						'twitter' => '_options_staff_twitter',
					); // Get data from the custom metas
					foreach($data as $var=>$meta):
						$$var = get_post_meta( get_the_ID(), THEME_SHORT_NAME. $meta, true);
					endforeach;
					$best_price = $featured=='Yes' ? 'best-price' : '';
									
					$html .= '<div class="'.$width.' columns">';
					$html .= '<div class="staff-member">';
					$html .= '<div class="staff-title">';
					$html .= get_the_title();
					$html .= '<span class="role">'.$role.'</span>';
					$html .= '</div>';
					$html .= '<div class="staff-image">';
					$html .= get_the_post_thumbnail(get_the_ID(),'large');
					$html .= '</div>';
					$html .= '<div class="staff-description">';
					$html .= get_the_content();
					$html .= '</div>';
					if(!empty($email) || !empty($phone) || !empty($website) || !empty($twitter)){
						$html .= '<div class="staff-contact">';
						if($email!==""){	$html .= '<p class="email">E: <a href="mailto:'.$email.'">'.$email.'</a></p>';} 
						if($phone!==""){ $html .= '<p class="phone">P: '.$phone.'</p>';}
						if($website!==""){ $html .= '<p class="website">W: <a href="'.$website.'" target="_blank">'.$website.'</a></p>';}				
						if($twitter!==""){$html .= '<p class="twitter">T: '.horizon_build_twitter_link($twitter).'</p>';}
						$html .= '</div>';
					}
					$html .= '</div>';
					$html .= '</div>';
				endwhile;
				$html .= '<div class="clear"></div>';
			else:
				$html .= '<div>No staff matched your search!<br />Did you enter the right slug?</div>';
			endif;
		$html .= '</div>';
		wp_reset_postdata();
		
		return $html;
	}
	
	function horizon_tabs_output($tabs) {
		global $attributes, $children;
		$attributes = horizon_return_array_attributes($tabs);
		$children = $tabs->tab_item;

		return get_template_part( TEMPLATE_PATH.'/page-builder/tabs/tabs' );
	}
	
	function horizon_tab_item_output($tab_item){
		extract(horizon_return_array_attributes($tab_item));
		
		global $all_tabs;
		
		$all_tabs[] = array("title" => $title, "content" => do_shortcode($content));
		
		return $html;
	}
	
	
	function horizon_testimonials_output($testimonial)
	{
		global $testimonial_atts, $testimonial_query;
		$testimonial_atts = horizon_return_array_attributes($testimonial);
		
		// Standardise text inputs
		$testimonial_atts['num'] = (int)preg_replace('/[^0-9,]|,[0-9]*$/','', $testimonial_atts['num']); //num_posts must be an int
	
		$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => $testimonial_atts['num'],
		);
		if($testimonial_atts['category'] != 'All'){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'testimonial-category',
					'field' => 'slug',
					'terms' => (string)$testimonial_atts['category'],
				)
			);
		}
		
		$layout_style = (string)$testimonial_atts['layout_style'];

		$testimonial_query = new WP_Query( $args );
		if($testimonial_query->found_posts<2){$testimonial_atts['type']='static';} else {$testimonial_atts['type'] = "flow";} // Remove slide feature if less than 2 posts found
		if( $testimonial_query->have_posts() ):
		
			get_template_part( TEMPLATE_PATH.'/page-builder/testimonial/before-testimonials' );

			while( $testimonial_query->have_posts() ):
				$testimonial_query->the_post();
				
				get_template_part( TEMPLATE_PATH.'/page-builder/testimonial/testimonial-item' );
			endwhile;
			
			get_template_part( TEMPLATE_PATH.'/page-builder/testimonial/after-testimonials' );
			
		endif;
		return wp_reset_postdata();
	}
	
	function horizon_toggle_output($toggle) {
		global $attributes, $children;
		$attributes = horizon_return_array_attributes($toggle);
		$children = $toggle->toggle_item;

		return get_template_part( TEMPLATE_PATH.'/page-builder/toggle/toggle' );
	}	
	
	// Backend functions
	function horizon_build_saved_element($saved_element, $element_type) {
		global $page_meta_boxes;
		
		$clone_meta_boxes = $page_meta_boxes;
		
		if(!is_null(horizon_return_array_attributes($saved_element))) extract(horizon_return_array_attributes($saved_element));
		$html .= '<div class="column '.horizon_format_width($saved_element->size, 'back-end').'" rel="'.$saved_element->getName().'">';
			$html .= '<div class="page-builder-element">';
				$html .= '<div class="size-changer"><span class="larger"></span><span class="smaller"></span></div>';
				$html .= '<span class="type">'.$saved_element->getName().'</span>';
				$html .= '<div class="edit"><span class="element_edit"></span><span class="element_delete"></span></div>';
				$html .= '<input type="hidden" id="page-builder-size" value="'.horizon_format_width($saved_element->size, 'back-end').'" name="page-builder-size[]">';
				$html .= '<input type="hidden" id="page-builder-type" value="'.$saved_element->getName().'" name="page-builder-type[]">';
			$html .= '</div>';
			$html .= '<div class="page-builder-options">';
				foreach($clone_meta_boxes['page-builder']['Page Builder']['elements'][$element_type] as $element=>$args){
					$args['pretty_select'] = false;
					$args['name'] = $args['name'].'[]';
					$args['value']=$saved_element->$element;
					
					$html .= horizon_sort_meta_boxes($args);
					if($element == "acc_item" || $element == "tab_item" || $element == "toggle_item"){
						switch($element_type){
							case "Accordion": $html .= horizon_build_sub_items($saved_element, $element_type, 'acc_item'); break;
							case "Tabs": $html .= horizon_build_sub_items($saved_element, $element_type, 'tab_item'); break;
							case "Toggle": $html .= horizon_build_sub_items($saved_element, $element_type, 'toggle_item'); break;
							default: break;
						}
					}
					if (!$args['no_hr']){
						if( $args['type'] != 'open' && $args['type'] != 'close'){
							$html .= '<hr class="separator mt20">';
						}
					}
				}
				$html .= '<div class="clear"></div>';
			$html .= '</div>';
		$html .= '</div>';
	
		return $html;
	}
	
	function horizon_build_sub_items($element, $element_type, $sub_type){
		global $page_meta_boxes;
		$meta_box = $page_meta_boxes;
	
		$html .= '<div class="add_sub_item">';
			$html .= '<div class="meta_box">';
				$html .= '<div class="meta_title"><a class="button add-sub-item">ADD ITEM</a></div>';
			$html .= '</div>';
		$html .= '</div>';
		$html .= '<ul class="tab_list">';
			$html .= '<input type="hidden" class="'.$meta_box['page-builder']['Page Builder']['elements'][$element_type][$sub_type]['sub_item_count']['name'].'" id="tab-number" name="'.$meta_box['page-builder']['Page Builder']['elements'][$element_type][$sub_type]['sub_item_count']['name'].'[]" value="'.$element->$sub_type->count().'" />';
			$html .= '<li class="template">';
				$html .= '<a class="delete-sub-item"></a>';
				foreach($page_meta_boxes['page-builder']['Page Builder']['elements'][$element_type][$sub_type] as $sub_item){
					if($sub_item['type'] !== 'count') {
						$html .= horizon_sort_meta_boxes($sub_item, 'sub_item');
					}
				}
			$html .= '</li>';
			foreach($element->$sub_type as $sub_type_args){
				$html .= '<li class="sub_item">';
					$html .= '<a class="delete-sub-item"></a>';
					foreach($sub_type_args as $tag=>$content){
						echo($content->ul);
						$meta_box['page-builder']['Page Builder']['elements'][$element_type][$sub_type][$tag]['value'] = $content;
						$meta_box['page-builder']['Page Builder']['elements'][$element_type][$sub_type][$tag]['name'] = $page_meta_boxes['page-builder']['Page Builder']['elements'][$element_type][$sub_type][$tag]['name'] . '[]';
						$html .= horizon_sort_meta_boxes($meta_box['page-builder']['Page Builder']['elements'][$element_type][$sub_type][$tag], 'sub_item');
					}
				$html .= '</li>';
			}
		$html .= '</ul>';
		$html .= '<div class="clear"></div>';									
		return $html;
	}
	
	function horizon_page_builder_output($xml, $area){
		global $additional_class, $additional_row_class, $node, $in_section, $no_end;
		if($area=="front-end"){
			foreach($xml as $node){
				$node_name = (string)$node->getName();
				$additional_class = apply_filters( 'additional_class', $additional_class );
				$additional_row_class = apply_filters( 'additional_row_class', $additional_row_class );
				if(!$in_section && $node_name !== "Section-End"){
					$row_size = horizon_item_size($node->size, $row_size, $additional_class, $additional_row_class);
				} else {
					$sub_row_size = horizon_sub_item_size($no_end, $node->size, $sub_row_size, $additional_class, $additional_row_class);
				}
				if($no_end) {$no_end = false;}
				switch($node_name):
					case "Accordion": $output .= horizon_accordion_output($node); break;
					case "Blog": $output .= horizon_blog_output($node); break;
					case "Call-To-Action": $output .= horizon_call_to_action_output($node); break;
					case "Column": $output .= horizon_column_output($node); break;
					case "Column-Service": $output .= horizon_column_service_output($node); break;
					case "Contact-Form": $output .= horizon_contact_form_output($node); break;
					case "Content": $output .= horizon_content_output($node); break;
					case "Divider": $output .= horizon_divider_output($node); break;
					case "Full-Width-Banner": $output .= horizon_full_width_banner_output($node); break;
					case "Gallery": $output .= horizon_gallery_output($node); break;
					case "Message-Box": $output .= horizon_message_output($node); break;
					case "Portfolio": $output .= horizon_portfolio_output($node); break;
					case "Page-Content": $output .= horizon_content_output($node); break;
					case "Price-Table": $output .= horizon_price_table_output($node); break;
					case "Post-Slider": $output .= horizon_post_slider_output($node); break;
					case "Section-Start": $output .= horizon_section_start_output($node); break;
					case "Section-End": $output .= horizon_section_end_output($node); break;
					case "Sidebar": $output .= horizon_sidebar_output($node); break;
					case "Staff": $output .= horizon_staff_output($node); break;
					case "Tabs": $output .= horizon_tabs_output($node); break;
					case "Testimonial": $output .= horizon_testimonials_output($node); break;
					case "Toggle": $output .= horizon_toggle_output($node); break;
					default: break;
				endswitch;
				if($node_name !== "Section-Start"){
					if($node_name == "Section-End") {
						echo '</div></div></div>';
					} else {
						echo '</div>';
					}
				}
			}
		} else {
			foreach($xml as $node){
				$output .= horizon_build_saved_element($node, $node->getName());
			}
		}
		return $output;
	}
	
?>