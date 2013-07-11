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
	 
	// Get all registered sidebars
	function horizon_get_all_sidebars(){
		$excluded_sidebars = array('Footer 1', 'Footer 2', 'Footer 3', 'Footer 4', 'Site Map 1', 'Site Map 2', 'Site Map 3');
		$sidebar_all = array();
		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
			if( !in_array( $sidebar['name'] , $excluded_sidebars ) ){
				$all_sidebars[] = __($sidebar['name']);
			}
		}
		return $all_sidebars;
	}
	
	// Get dynamic sidebar (for return in function)	
	function horizon_get_dynamic_sidebar($sidebar){
		$sidebar_contents = "";
		ob_start();
		dynamic_sidebar($sidebar);
		$sidebar_contents = ob_get_clean();
		return $sidebar_contents;
	}
	
	function horizon_load_template_part($template_name, $part_name=null) {
	    ob_start();
	    get_template_part($template_name, $part_name);
	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}
		
	// Build twitter link
	function horizon_build_twitter_link($user) {
		if(substr($user, 0, 1)=="@") :
			// Handle is formatted as '@username'
			$username_parts = explode('@', $user);
			$username = $username_parts[1];
		elseif(substr($user, 0, 7)=="http://") :
			// Handle is formatted as 'http://www.twitter.com/username'
			$username_parts = explode('/', $user);
			$username = $username_parts[3];
		else:
			// Handle is formatted as 'username'
			$username = $user;
		endif;
		return '<a href="http://www.twitter.com/'.$username.'">@'.$username.'</a>';
	}
	
	function horizon_format_soundcloud_link($track_url){

		$track = json_decode(horizon_get_file('http://api.soundcloud.com/resolve.json?url='.$track_url.'&client_id=a0535974761c794c9e5c1cce78aabce7'));
		$track_info = json_decode(horizon_get_file($track->location));
		
		return urlencode($track_info->uri);
	}
	
	// Get the ID from youtube and form a valid iframe with it
	function horizon_filter_id_youtube($src, $height, $title, $width) 
	{
		$id =  preg_replace("#[&\?].+$#", "", preg_replace("#http://(?:www\.)?youtu\.?be(?:\.com)?/(embed/|watch\?v=|\?v=|v/|e/|.+/|watch.*v=|)#i", "", $src));
		
		return '<iframe height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'" title="'.$title.'" width="'.$width.'"></iframe>';		
	}
	
	// Get the ID from vimeo and form a valid iframe with it
	function horizon_filter_id_vimeo($src, $height, $title, $width) 
	{
		$id = preg_match( '#.+?(\d+)$#', $src, $matches);
		return '<iframe height="'.$height.'" src="http://player.vimeo.com/video/'.$matches[1].'" title="'.$title.'" width="'.$width.'"></iframe>';		
	}
	
	// Format width
	function horizon_format_width($size, $area=NULL){
		if($area=="front-end"){
			switch ($size):
				case "1/1": $width= 'twelve'; break;
				case "1/2": $width= 'six'; break;
				case "1/3": $width= 'four'; break;
				case "1/4": $width= 'three'; break;
				case "1/6": $width= 'two'; break;
				case "2/3": $width= 'eight'; break;
				case "3/4": $width= 'nine'; break;
				case "5/6": $width= 'ten'; break;
				case "1/6 Width": $width= 'two'; break;
				case "1/4 Width": $width= 'three'; break;
				case "1/3 Width": $width= 'four'; break;
				case "1/2 Width": $width= 'six'; break;
				case "Full Width": $width= 'twelve'; break;
				default: $width= 'twelve'; break;
			endswitch;
		} else if($area=="data-size") {
			switch($size):
				case "1/4 Width": $width= '240'; break;
				case "1/3 Width": $width= '320'; break;
				case "1/2 Width": $width= '480'; break;
				case "Full Width": $width= '960'; break;
			endswitch;
		} else if($area=="int") {
			switch($size):
				case "1/1": $width= 1/1; break;
				case "1/2": $width= 1/2; break;
				case "1/3": $width= 1/3; break;
				case "1/4": $width= 1/4; break;
				case "1/6": $width= 1/6; break;
				case "2/3": $width= 2/3; break;
				case "3/4": $width= 3/4; break;
				case "5/6": $width= 5/6; break;
				case "1/6 Width": $width= 1/6; break;
				case "1/4 Width": $width= 1/4; break;
				case "1/3 Width": $width= 1/3; break;
				case "1/2 Width": $width= 1/2; break;
				case "Full Width": $width= 1/1; break;
			endswitch;
		} else {
			switch ($size):
				case "1/1": $width= 'size1-1'; break;
				case "1/2": $width= 'size1-2'; break;
				case "1/3": $width= 'size1-3'; break;
				case "1/4": $width= 'size1-4'; break;
				case "1/6": $width= 'size1-6'; break;
				case "2/3": $width= 'size2-3'; break;
				case "3/4": $width= 'size3-4'; break;
				case "5/6": $width= 'size5-6'; break;
				case "size1-1": $width= '1/1'; break;
				case "size1-2": $width= '1/2'; break;
				case "size1-3": $width= '1/3'; break;
				case "size1-4": $width= '1/4'; break;
				case "size1-6": $width= '1/6'; break;
				case "size2-3": $width= '2/3'; break;
				case "size3-4": $width= '3/4'; break;
				case "size1-6": $width= '5/6'; break;
				default: $width= 'size1-1'; break;
			endswitch;
		}
		return $width;
	}
	
	function horizon_num_col_row($size){
		switch($size):
			case "three": return 4; break;
			case "four": return 3; break;
			case "six": return 2; break;
			case "twelve": return 1; break;
		endswitch;
	}
	
	function horizon_font_awesome_icons(){
		$pattern = '/.icon-*?(?:[A-Za-z0-9_\-.]+):*?before/';
		$subject = file_get_contents( ROOT.'/_horizon/plugins/font-awesome/css/font-awesome.min.css');
		
		preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
		
		$icons = array();
		
		foreach($matches as $match){
		    $icons[] = $match[0];
		}
		
		array_shift($icons);
		asort($icons);
		
		for($i=0; $i<sizeof($icons); $i++){
			$icons[$i] = str_ireplace(".icon-", "", $icons[$i]);
			$icons[$i] = str_ireplace(":before", "", $icons[$i]);
		}
		
		return $icons;
	}
	
	// Build XML Tag (for use in page builder)
 	function horizon_xml_tag($tag_name, $tag_content){
		return '<'.$tag_name.'>'.$tag_content.'</'.$tag_name.'>';
	}
	
	// Get all taxonimies
	function horizon_get_taxonomy_list($taxonomy){		
		$taxonomies = array();
		$taxonomies['All'] = "All";
		foreach(get_terms($taxonomy) as $term){
			$taxonomies[$term->name] = $term->slug;
		}
		return $taxonomies;
	}
	
	// Get all posts in post type	 
	function horizon_get_post_list($post_type){		
		$post_slugs = array();
		$args = array('post_type' => $post_type);
		
		$post_list = get_posts($args);
		foreach($post_list as $single_post){
			$post_slugs[] = $single_post->post_name;
		}
		
		if(is_null($post_slugs)){$post_slugs = array("No posts found");}
		
		return $post_slugs;
	}
	 
	// Get remote file contents
	function horizon_get_file($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$tmp = curl_exec($ch);
		curl_close($ch);
		if ($tmp != false){
			return $tmp;
		}
	}
	
	// Format slug
	function horizon_create_slug($str) {
		$slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
		$slug = strtolower(trim($slug, '-'));
		$slug = preg_replace("/[\/_|+ -]+/", '-', $slug);
	
		return $slug;
	}
	
	// Get all google fonts
	function horizon_get_google_fonts($api="AIzaSyCLXgNjOCHlE_3fHng8HUMkTTXd7DVfuyE"){
		$all_fonts = json_decode(horizon_get_file("https://www.googleapis.com/webfonts/v1/webfonts?key=".$api));
		foreach ((array)$all_fonts as $fonts){
			if(gettype($fonts) !== "string") {
				foreach($fonts as $font){
					$google_fonts[] = $font;
				}
			}
		}
		return $google_fonts;
	}
	
	// Split image string into array
	function horizon_split_image_string($images_string){
		$all_images = explode(",",$images_string);
		for($i=0; $i<sizeof($all_images)-1; $i++){
			$images[] = $all_images[$i];
		}
		return $images;
	}

	// Replace <p>'s in get_the_content() and get_the_excerpt()
	function horizon_filter_content($content, $remove_readmore=false){
    	if($remove_readmore){
	    	$excerpt_more = apply_filters('horizon_excerpt_more', $excerpt_more);
	    	$content = str_replace($excerpt_more, '...', $content);
    	}
    	
    	$content = apply_filters('the_content', $content);
    	
    	$content = str_replace(']]>', ']]&gt;', $content);
    	
		return $content;
	}
	
	// Hex string to RGB (#000000 => rgb(0,0,0))
	function horizon_hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}	 
	
	// Output comments number
	function horizon_comments_number($singular, $plural) {
		global $post;
		if(get_comments_number() == 1) {
			return get_comments_number() . ' ' . $singular;
		} else {
			return get_comments_number() . ' ' . $plural;
		}
	}
	
	// Get image metadata (alt, caption etc)
	function horizon_get_image_meta($image_id, $image_size='full'){
		$image = get_post($image_id);
		$src = wp_get_attachment_image_src($image_id, $image_size);
		return array(
			'alt' => $image->post_title,
			'caption' => $image->post_excerpt,
			'description' => $image->post_content,
			'href' => get_permalink( $image->ID ),
			'src' => $src[0],
			'width' => $src[1],
			'height' => $src[2],
			'title' => $image->post_title
		);
	}
	
	// Format tags
	function horizon_format_tags($tags, $echo=true, $separator=", ", $link=true){
		$num = sizeof($tags);
		$tag_string = '';
		for($i=0; $i<$num; $i++){
			$comma = $i!==$num-1 ? $separator : "";
			if($link){
				$tag_string .= '<a class="tag" href="'.get_tag_link($tags[$i]).'">'.$tags[$i]->name.'</a>' . $comma;
			} else {
				$tag_string .= '<span class="tag">'.$tags[$i]->name.'</span>' . $comma;
			}
		} 
		
		if($echo){echo $tag_string;}
		else {return $tag_string;}
	}
	
?>