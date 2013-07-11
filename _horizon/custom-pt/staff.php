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

add_action( 'init', 'horizon_register_staff' );
function horizon_register_staff() {

	$labels = array(
		'name'               => __( 'Staff' ),
		'singular_name'      => __( 'Employee' ),
		'add_new'            => __( 'Add New', 'Add New Employee Name' ),
		'add_new_item'       => __( 'Add New Employee' ),
		'all_items'          => __( 'All Staff' ),
		'edit_item'          => __( 'Edit Employee' ),
		'new_item'           => __( 'New Employee' ),
		'search_items'       => __( 'Search Staff' ),
		'not_found'          => __( 'No staff found.' ),
		'not_found_in_trash' => __( 'No staff found in Trash.' ),
		'parent_item_colon'  => ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'rewrite'            => false,
	);

	register_post_type( 'staff', $args );

	register_taxonomy(
		"staff-category", array( "staff" ), array(
		"hierarchical"   => true,
		"label"          => "Staff Categories",
		"singular_label" => "Staff Category",
		"rewrite"        => true ) );
	register_taxonomy_for_object_type( 'staff-category', 'staff' );

	// Add custom columns
	add_filter( 'manage_edit-staff_columns', 'horizon_custom_staff_columns' );
	function horizon_custom_staff_columns( $columns ) {

		$columns = array(
			'cb'       => '<input type="checkbox" />',
			'title'    => __( 'Name' ),
			'category' => __( 'Category' ),
			'date'     => __( 'Date' )
		);

		return $columns;
	}

	// Add custom columns
	add_action( 'manage_staff_posts_custom_column', 'horizon_content_custom_staff_columns', 10, 2 );
	function horizon_content_custom_staff_columns( $column, $post_id ) {
		global $post;

		switch ( $column ) {

			case 'category' :
				$categories = get_the_terms( $post_id, 'staff-category' );
				if ( empty( $categories ) ) {
					echo __( 'Not categorised.' );
				} else {
					foreach ( $categories as $category ) {
						echo '<a href="' . get_bloginfo( 'url' ) . '/wp-admin/edit.php?staff-category=' . $category->slug . '&post_type=staff
">' . $category->name . '</a>';
					}
				}
				break;

			// Just break out of the switch statement for everything else
			default :
				break;
		}
	}

}

$staff_tabs = array(
	"Employee Info" => "employee-info"
);

$staff_meta_boxes = array(
	"employee-info" => array(
		"Role"    => array(
			"type"    => "input",
			"name"    => THEME_SHORT_NAME . "_options_staff_role",
			"title"   => __( "STAFF ROLE" ),
			"default" => "Employee",
		),
		"Email"   => array(
			"type"    => "input",
			"name"    => THEME_SHORT_NAME . "_options_staff_email",
			"no_hr"   => true,
			"title"   => __( "STAFF EMAIL" ),
			"default" => "",
		),
		"Phone"   => array(
			"type"    => "input",
			"name"    => THEME_SHORT_NAME . "_options_staff_phone",
			"no_hr"   => true,
			"title"   => __( "STAFF PHONE" ),
			"default" => "",
		),
		"Website" => array(
			"type"    => "input",
			"name"    => THEME_SHORT_NAME . "_options_staff_website",
			"no_hr"   => true,
			"title"   => __( "STAFF WEBSITE" ),
			"default" => "",
		),
		"Twitter" => array(
			"type"        => "input",
			"name"        => THEME_SHORT_NAME . "_options_staff_twitter",
			"no_hr"       => true,
			"title"       => __( "STAFF TWITTER HANDLE" ),
			"default"     => "",
			"description" => "Format - username, @username or http://www.twitter.com/username"
		),
	),
);

// Add page options with the add_meta_boxes hook
add_action( 'add_meta_boxes', 'horizon_add_staff_options' );
function horizon_add_staff_options() {
	add_meta_box( 'custom_meta_boxes', __( 'Staff Options' ), 'horizon_build_staff_options', 'staff', 'normal', 'high' );
}

// Let's build the custom page options!
function horizon_build_staff_options() {
	// Get the post details and also all of our custom boxes we'll need
	global $post, $staff_tabs, $staff_meta_boxes;

	echo "<div class='horizon_over_wrap'>";
	echo "<div class='horizon_over_content'>";

	echo '<div class="meta_box_tabs">';
	echo '<ul>';
	$i = 0;
	foreach ( $staff_tabs as $tab_name => $tab_id ) {
		$status = $i == 0 ? 'active' : '';
		echo '<li class="' . $status . '" rel="' . $tab_id . '">' . $tab_name . '</li>';
		$i++;
	}
	echo '</ul>';
	echo '</div>';

	// Loop through custom options to display them
	$i = 0;
	foreach ( $staff_meta_boxes as $tab => $elements ):

		$status = $i == 0 ? 'active' : '';
		echo '<div id="' . $tab . '" class="meta_panel ' . $status . '">';

		foreach ( $elements as $meta_box ):

			// Init the meta box name
			$meta_box['name'] = isset( $meta_box['name'] ) ? $meta_box['name'] : '';
			$meta_box['value'] = get_post_meta( $post->ID, $meta_box['name'], true );

			echo "<div class='meta_box'>";
			echo horizon_sort_meta_boxes( $meta_box );
			echo "</div>";

			echo "<div class='clear'></div>";

			if ( empty( $meta_box['no_hr'] ) ) {
				if ( $meta_box['type'] != 'opendiv' && $meta_box['type'] != 'closediv' ) {
					echo '<hr class="separator mt20">';
				}
			}

		endforeach;

		echo '</div>';

	endforeach;

	echo "</div>";
	echo "</div>";

}

function horizon_save_staff_options( $id ) {
	global $staff_meta_boxes;

	$tabs = $staff_meta_boxes;

	foreach ( $tabs as $meta_boxes ):

		foreach ( $meta_boxes as $meta_box ):

			if ( isset( $_POST[$meta_box['name']] ) ) {
				$new_meta = stripslashes( $_POST[$meta_box['name']] );
			} else {
				$new_meta = '';
			}

			$old_meta = get_post_meta( $id, $meta_box['name'], true );
			horizon_save_meta_data( $id, $new_meta, $old_meta, $meta_box['name'] );

		endforeach;

	endforeach;
}


?>