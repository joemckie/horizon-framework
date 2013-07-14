<?php

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


add_action( 'widgets_init', 'horizon_register_twitter_feed_widget' );
function horizon_register_twitter_feed_widget() {
	register_widget( 'horizon_twitter_widget' );
}

class horizon_twitter_widget extends WP_Widget {
	function horizon_twitter_widget() {
		$widget_ops = array( 'classname' => 'twitter-feed', 'description' => __( 'Display the tweets of a given Twitter username.', 'lt-admin' ) );

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'twitter-feed' );

		$this->WP_Widget( 'twitter-feed', __( 'Twitter Feed', 'lt-admin' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $tweet;
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );
		$num = $instance['num'];
		$username = str_replace( "@", "", $instance['username'] );

		$req_array = array(
			'/_horizon/api/twitter/twitteroauth/OAuth.php',
			'/_horizon/api/twitter/twitteroauth/twitteroauth.php'
		);
		foreach ( $req_array as $req ) {
			$t = horizon_get_root_directory( $req );
			require( $t . $req );
		}

		$connection = new TwitterOAuth(
			'j34xFIWv7OOEJmdNIBmnoQ', // consumer key
			'HF484csEMoAxMjHA7Vl60QwrLIOCS24ntXDLypaB0', // consumer secret
			'1259167478-EnSlyFhBOt4LQK47VJ4UkUIIIBjtiKXC90JHVpY', // oauth access token
			'sD4RltXLPqkSg5zFVT6BqrGoV8b7F19Bx588o1hwO4' // oauth access secret
		);
		$tweets = $connection->get( 'statuses/user_timeline', array(
			'screen_name' => $username,
			'count'       => $num
		) );

		echo $before_widget;

		// Display the widget title
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		get_template_part( TEMPLATE_PATH . '/widgets/twitter/before-twitter-widget' );
		foreach ( $tweets as $tweet ) {
			get_template_part( TEMPLATE_PATH . '/widgets/twitter/tweet' );
		}
		get_template_part( TEMPLATE_PATH . '/widgets/twitter/after-twitter-widget' );

		echo $after_widget;

		return;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['num'] = strip_tags( $new_instance['num'] );

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => '', 'num' => '3', 'category' => 'All' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		$html = "";
		$html .= '<p>';
		$html .= '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title:', 'lt-admin' ) . '</label>';
		$html .= '<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $instance['title'] . '" type="text" style="width:100%;" />';
		$html .= '</p>';

		$html .= '<p>';
		$html .= '<label for="' . $this->get_field_id( 'username' ) . '">' . __( 'Twitter Username:', 'lt-admin' ) . '</label><br />';
		$html .= '<input type="text" name="' . $this->get_field_name( 'username' ) . '" id="' . $this->get_field_id( 'username' ) . '" value="' . $instance['username'] . '" />';
		$html .= '</p>';

		$html .= '<p>';
		$html .= '<label for="' . $this->get_field_id( 'num' ) . '">' . __( 'Twitter Count:', 'lt-admin' ) . '</label><br />';
		$html .= '<input type="text" name="' . $this->get_field_name( 'num' ) . '" id="' . $this->get_field_id( 'num' ) . '" value="' . $instance['num'] . '" />';
		$html .= '</p>';

		echo $html;

	}
}