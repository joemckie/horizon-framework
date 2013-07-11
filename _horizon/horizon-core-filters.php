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

	add_filter('horizon_decode_xml_string', 'horizon_decode_xml_string');
	function horizon_decode_xml_string($string){
		$decoded_string = str_replace("&lt;", "<", $string);
		return $decoded_string = str_replace("&gt;", ">", $decoded_string);	
	}
	
	add_filter('horizon_encode_xml_string', 'horizon_encode_xml_string');
	function horizon_encode_xml_string($string){
		$encoded_string = str_replace("<", "&lt;", $string);
		$encoded_string = str_replace(">", "&gt;", $encoded_string);
		return $encoded_string = str_replace("&", "&amp;", $encoded_string);
	}

	add_filter('pre_get_posts','horizon_filter_search_posts');
	function horizon_filter_search_posts($query) {
	    if ($query->is_search) {
	        $query->set('post_type',array('post', 'portfolio'));
	    }
	return $query;
	}

	// Make bold the search term on search pages
	add_filter( 'horizon_search_bold_text', 'horizon_focus_search_keyword', 0 );
	add_filter( 'horizon_search_bold_text', 'wpautop', 1 );
	add_filter( 'horizon_search_bold_text', 'horizon_search_bold_text' );
	function horizon_search_bold_text($content) {
		$excerpt_more = apply_filters('horizon_excerpt_more', $excerpt_more);
		
		$new_content = $content;
		$new_content = str_replace($excerpt_more, '', $new_content);
		return $content = str_replace(get_search_query(), '<strong>'.get_search_query().'</strong>', $new_content);
	}
	
	// Highlight the search term on search pages
	add_filter( 'horizon_search_highlight_text', 'horizon_focus_search_keyword', 0 );
	add_filter( 'horizon_search_highlight_text', 'wpautop', 1 );
	add_filter( 'horizon_search_highlight_text', 'horizon_search_highlight_text' );
	add_filter( 'horizon_focus_search_keyword', 'horizon_focus_search_keyword' );
	function horizon_search_highlight_text($content) {
		$excerpt_more = apply_filters('horizon_excerpt_more', $excerpt_more);
		$position = stripos($content, get_search_query());
		$length = strlen(get_search_query());
		
		$content = str_replace($excerpt_more, '', $content);
		$highlight = '[highlight]'.substr($content, $position, $length).'[/highlight]';
		
		return $content = do_shortcode(str_ireplace(get_search_query(), $highlight, $content));
	}
	
	function horizon_focus_search_keyword($content){
		$position = stripos($content, get_search_query());
		$excerpt_more = apply_filters('horizon_excerpt_more', $excerpt_more);
		$content = str_replace($excerpt_more, '', $content);
		
		$new_position = $position-20 < 0 ? 0 : $position-20;
		$ellipsis = $position-20 < 0 ? '' : '...';
		
		$focused_content = substr($content, $new_position);
		
		return $ellipsis . $focused_content . $excerpt_more;
	}
	
	add_filter( 'horizon_twitter_mention_link', 'horizon_twitter_mention_link', 10, 2 );
	function horizon_twitter_mention_link($text, $mention) {
		return str_ireplace("@".$mention->screen_name, '<a target="_blank" href="http://www.twitter.com/'.$mention->screen_name.'">@'.$mention->screen_name.'</a>', $text);
	}

	add_filter( 'horizon_twitter_url_link', 'horizon_twitter_url_link', 10, 2 );
	function horizon_twitter_url_link($text, $url) {
		return str_replace($url->url, '<a target="_blank" href="'.$url->url.'">'.$url->url.'</a>', $text);
	}

	add_filter( 'horizon_time_since_date', 'horizon_time_since_date' );
	function horizon_time_since_date($date) {
		$now = time();
		$date_str = strtotime($date);
		$time_passed = $now-$date_str;
		
		$tokens = array (
	        31536000 => 'year',
	        2592000 => 'month',
	        604800 => 'week',
	        86400 => 'day',
	        3600 => 'hour',
	        60 => 'minute',
	        1 => 'second'
	    );

	    foreach ($tokens as $unit => $text) {
	        if ($time_passed < $unit) continue;
	        $numberOfUnits = floor($time_passed / $unit);
	        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'') . ' ago';
	    }
	}

	add_filter( 'horizon_trim_text', 'horizon_trim_text', 10, 4 );
	function horizon_trim_text($content, $length, $strip_shortcodes=false, $strip_tags=false) {
		if($strip_shortcodes) {$content = strip_shortcodes($content);}
		if($strip_tags) {$content = strip_tags($content);}
		if(strlen($content) >= $length)
			$ellipsis = "...";
		return substr($content, 0, $length) . $ellipsis;
	}

	add_filter('excerpt_more', 'horizon_new_excerpt_more');
	add_filter('horizon_excerpt_more', 'horizon_new_excerpt_more');
	function horizon_new_excerpt_more($more) {
		global $post;
		$read_more_contents = '';
		ob_start();
		get_template_part( TEMPLATE_PATH.'/meta/read-more' );
		$read_more_contents = ob_get_clean();
		return $read_more_contents;
	}
	 
	add_filter( 'wp_trim_excerpt', 'horizon_custom_excerpt_more' );
	function horizon_custom_excerpt_more( $excerpt ) {
		$excerpt_more = apply_filters('horizon_excerpt_more', $excerpt);
		return str_replace( '[...]', $excerpt_more, $excerpt );
	}
	
	add_filter( 'excerpt_length', 'horizon_custom_excerpt_length', 999 );
	function horizon_custom_excerpt_length( $length ) {
		return get_option(THEME_SHORT_NAME. '_options_excerpt_length', 55);
	}
	
?>