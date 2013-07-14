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

add_action( 'widgets_init', 'horizon_register_recent_portfolio_widget' );
function horizon_register_recent_portfolio_widget() {
	register_widget( 'horizon_recent_portfolio_widget' );
}

class horizon_recent_portfolio_widget extends WP_Widget {
	function horizon_recent_portfolio_widget() {
		$widget_ops = array( 'classname' => 'recent-portfolio-items', 'description' => __( 'Displays the most recent portfolio items ', 'lt-admin' ) );

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'recent-portfolio-items' );

		$this->WP_Widget( 'recent-portfolio-items', __( 'Recent Portfolio Items', 'lt-admin' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );
		$num = $instance['num'];
		$category = $instance['category'];

		echo $before_widget;

		// Display the widget title
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$args = array(
			'post_type'      => 'portfolio',
			'posts_per_page' => $num,
		);
		if ( $category != "All" ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio-category',
					'field'    => 'slug',
					'terms'    => $category,
				)
			);
		}

		$portfolio = new WP_Query( $args );

		get_template_part( TEMPLATE_PATH . '/widgets/recent-portfolio/before-widget-portfolio' );

		if ( $portfolio->have_posts() ):
			while ( $portfolio->have_posts() ):
				$portfolio->the_post();
				get_template_part( TEMPLATE_PATH . '/widgets/recent-portfolio/widget-portfolio-item' );
			endwhile; else:
			get_template_part( TEMPLATE_PATH . '/widgets/recent-portfolio/failed-search' );
		endif;
		wp_reset_postdata();

		get_template_part( TEMPLATE_PATH . '/widgets/recent-portfolio/after-widget-portfolio' );

		echo $after_widget;

		return;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num'] = strip_tags( $new_instance['num'] );
		$instance['category'] = $new_instance['category'];

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => '', 'num' => '9', 'category' => 'All' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		$html = "";
		$html .= '<p>';
		$html .= '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title:', 'lt-admin' ) . '</label>';
		$html .= '<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" value="' . $instance['title'] . '" style="width:100%;" type="text" />';
		$html .= '</p>';

		$html .= '<p>';
		$html .= '<label for="' . $this->get_field_id( 'num' ) . '">' . __( 'Portfolio Count:', 'lt-admin' ) . '</label>';
		$html .= '<input id="' . $this->get_field_id( 'num' ) . '" name="' . $this->get_field_name( 'num' ) . '" value="' . $instance['num'] . '" style="width:100%;" type="text" />';
		$html .= '</p>';

		$html .= '<p>';
		$html .= '<label for="' . $this->get_field_id( 'category' ) . '">' . __( 'Portfolio Category:', 'lt-admin' ) . '</label>';
		$html .= '<select name="' . $this->get_field_name( 'category' ) . '" id="' . $this->get_field_id( 'category' ) . '" class="widefat">';
		$options = horizon_get_taxonomy_list( 'portfolio-category' );
		foreach ( $options as $option ) {
			$html .= '<option value="' . $option . '" id="' . $option . '"';
			$html .= $instance['category'] == $option ? ' selected' : '';
			$html .= '>';
			$html .= $option;
			$html .= '</option>';
		}
		$html .= '</select>';
		$html .= '</p>';

		echo $html;

	}
}