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

add_action( 'init', 'horizon_register_shortcodes' );

// "shortcode text" => "shortcode_function"

/*
ALL SHORTCODES
$shortcodes = array	(
		"accordion" 	=> "accordion_shortcode",
		"acc_item"	 	=> "accordion_item_shortcode",
		"button" 		=> "button_shortcode",
		"code" 			=> "code_shortcode",
		"column" 		=> "column_shortcode",
		"divider" 		=> "divider_shortcode",
		"dropcap" 		=> "dropcap_shortcode",
		"frame" 		=> "frame_shortcode",
		"highlight" 	=> "highlight_shortcode",
		"list" 			=> "list_shortcode",
		"message" 		=> "message_shortcode",
		"price_table"	=> "price_table_shortcode",
		"social"		=> "social_shortcode",
		"space" 		=> "space_shortcode",
		"staff"	 		=> "staff_shortcode",
		"tabs"			=> "tabs_shortcode",
		"tab_item"	 	=> "tab_item_shortcode",
		"testimonial"	=> "testimonial_shortcode",
		"toggle" 		=> "toggle_shortcode",
		"toggle_item"	=> "toggle_item_shortcode",
		"quote" 		=> "quote_shortcode",
		"vimeo" 		=> "vimeo_shortcode",
		"youtube" 		=> "youtube_shortcode",
);
*/

function horizon_register_shortcodes() {
	global $shortcodes, $shortcode_atts;
	foreach ( $shortcodes as $shortcode => $function ) {
		add_shortcode( $shortcode, $function );
	}
}

// Accordion Shortcode
// USAGE: [accordion][acc_item title="ACCORDION TITLE"]ACCORDION TEXT[/acc_item][/accordion]

function horizon_accordion_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/accordion/accordion' );

	return $template;
}

// Accordion Item Shortcode
// USAGE: [accordion][acc_item title="ACCORDION TITLE"]ACCORDION TEXT[/acc_item][/accordion]

function horizon_accordion_item_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/accordion/accordion-item' );

	return $template;
}

// Button Shortcode
// USAGE: [button background="#BG_HEX_CODE" color="#COLOR_HEX_CODE" size="small | medium | large" href="http://insert.link.here/" target="LINK TYPE" hover_bg="#HOVER_BG_HEX" hover_color="#HOVER_COLOR_HEX"]INSERT LINK TEXT[/button]

function horizon_button_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/button/button' );

	return $template;
}

// Column Shortcode
// USAGE: [column col="COL WIDTH" offset="OFFSET WIDTH" last="true | false"]INSERT COLUMN TEXT[/column]

function horizon_column_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/column/column' );

	return $template;
}

// Code shortcode
// USAGE: [code]ENTER CODE HERE[/code]

function horizon_code_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;

	// Fix activating shortcodes
	$content = str_replace( '[', '&#91;', $content );
	// Fix activating html
	$content = str_replace( '<', '&#60;', $content );
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/code/code' );

	return $template;
}

// Divider Shortcode
// USAGE: [divider scroll_text="SCROLL TO TOP TEXT"]

function horizon_divider_shortcode( $atts ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/divider/divider' );

	return $template;
}

// Dropcap Shortcode
// USAGE: [dropcap background="#BG_HEX_CODE" color="#color_HEX_CODE" type="circle"]INSERT DROPCAP TEXT[/dropcap]

function horizon_dropcap_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/dropcap/dropcap' );

	return $template;
}

// Frame/Lightbox Shortcode
// USAGE: [frame align="LEFT | CENTER | RIGHT" caption="IMAGE CAPTION" height="150" lightbox="on" group="GROUP NAME" rounded="rounded" src="IMAGE LINK" video_thumbnail="VIDEO THUMBNAIL IMAGE" width="150"]
function horizon_frame_shortcode( $atts ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/frame/frame' );

	return $template;
}

// Highlight Shortcode
// USAGE: [highlight background="#BACKGROUND_HEX" color="#COLOR_HEX]HIGHLIGHTED TEXT[/highlight]

function horizon_highlight_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/highlight/highlight' );

	return $template;
}

// List Shortcode
// USAGE: [list style="check1"]<ul><li>LIST</li></ul>[/list]

function horizon_list_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/list/list' );

	return $template;
}

// Message Box Shortcode
// USAGE: [message rounded="true" title="TITLE" type="alert | info | success | warning"]MESSAGE CONTENT[/message]

function horizon_message_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/message/message' );

	return $template;
}

// Price Table Shortcode
// USAGE: [price_table category="PRICE TABLE CATEGORY SLUG" num="3"]

function horizon_price_table_shortcode( $atts ) {
	extract( shortcode_atts( array(
		"category" => "",
		"num"      => 3,
	), $atts ) );

	$width = 'column1-' . $num;

	// Standardise text inputs
	$num = (int) preg_replace( '/[^0-9,]|,[0-9]*$/', '', $num ); //num_posts must be an int

	$args = array(
		'meta_key'       => THEME_SHORT_NAME . '_options_price_table_order',
		'orderby'        => 'meta_value',
		'order'          => 'ASC',
		'post_type'      => 'price-table',
		'posts_per_page' => $num,
	);
	if ( !empty( $category ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'price-table-category',
				'field'    => 'slug',
				'terms'    => $category,
			)
		);
	}
	$price_tables = new WP_Query( $args );

	$html = '';
	$html .= '<div class="shortcode-price-table">';
	if ( $price_tables->have_posts() ):
		while ( $price_tables->have_posts() ):
			$price_tables->the_post();

			$data = array(
				'featured'    => '_options_price_table_featured',
				'price'       => '_options_price_table_price',
				'suffix'      => '_options_price_table_suffix',
				'button_link' => '_options_price_table_button_link',
				'button_text' => '_options_price_table_button_text',
			); // Get data from the custom metas
			foreach ( $data as $var => $meta ):
				$$var = get_post_meta( get_the_ID(), THEME_SHORT_NAME . $meta, true );
			endforeach;
			$best_price = $featured == 'Yes' ? 'best-price' : '';

			$html .= '<div class="price-table ' . $width . ' columns ' . $best_price . '">';
			$html .= '<div class="price-table-price">';
			$html .= '<span class="package-price">' . $price . '</span>';
			$html .= '<span class="suffix">' . $suffix . '</span>';
			$html .= '</div>';
			$html .= '<div class="price-table-title">';
			$html .= get_the_title();
			$html .= '</div>';
			$html .= get_the_content();
			$html .= '<a class="button red" href="' . $button_link . '">' . $button_text . '</a>';
			$html .= '</div>';

			$i++;
		endwhile;
		$html .= '<div class="clear"></div>'; else:
		$html .= '<div>No testimonials matched your search!<br />Did you enter the right slug?</div>';
	endif;
	$html .= '</div>';
	wp_reset_query();

	return $html;
}

// Quote Shortcode
// USAGE: [quote align="left | center | right"]INSERT QUOTE TEXT[/quote]

function horizon_quote_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/blockquote/blockquote' );

	return $template;
}

// Social Shortcode
// USAGE: [social media="facebook | twitter (etc)"]LINK TO SOCIAL MEDIA[/social]

function horizon_social_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/social-media/social-media' );

	return $template;
}

// Space Shortcode
// USAGE: [space height="int(HEIGHT)"]

function horizon_space_shortcode( $atts ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/space/space' );

	return $template;
}

// Staff Shortcode
// USAGE: [staff num="4" category="CATEGORY SLUG"][/staff]

function horizon_staff_shortcode( $atts, $content = NULL ) {
	extract( shortcode_atts( array(
		"category" => "",
		"num"      => 4,
	), $atts ) );

	switch ( $num % 12 ):
		case "2":
			$width = 'six';
			break;
		case "3":
			$width = 'four';
			break;
		case "4":
			$width = 'three';
			break;
		case "6":
			$width = 'two';
			break;
	endswitch;

	$args = array(
		'post_type'      => 'staff',
		'posts_per_page' => $num,
	);
	if ( !empty( $category ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'staff-category',
				'field'    => 'slug',
				'terms'    => $category,
			)
		);
	}
	$price_tables = new WP_Query( $args );

	$html = '';
	$html .= '<div class="shortcode-staff">';
	if ( $price_tables->have_posts() ):
		while ( $price_tables->have_posts() ):
			$price_tables->the_post();

			$data = array(
				'role'    => '_options_staff_role',
				'email'   => '_options_staff_email',
				'phone'   => '_options_staff_phone',
				'website' => '_options_staff_website',
				'twitter' => '_options_staff_twitter',
			); // Get data from the custom metas
			foreach ( $data as $var => $meta ):
				$$var = get_post_meta( get_the_ID(), THEME_SHORT_NAME . $meta, true );
			endforeach;

			$html .= '<div class="' . $width . ' columns">';
			$html .= '<div class="staff-member">';
			$html .= '<div class="staff-title">';
			$html .= get_the_title();
			$html .= '<span class="role">' . $role . '</span>';
			$html .= '</div>';
			$html .= '<div class="staff-image">';
			$html .= get_the_post_thumbnail( get_the_ID(), 'large' );
			$html .= '</div>';
			$html .= '<div class="staff-description">';
			$html .= get_the_content();
			$html .= '</div>';
			if ( !empty( $email ) || !empty( $phone ) || !empty( $website ) || !empty( $twitter ) ) {
				$html .= '<div class="staff-contact">';
				if ( $email !== "" ) {
					$html .= '<p class="email">E: <a href="mailto:' . $email . '">' . $email . '</a></p>';
				}
				if ( $phone !== "" ) {
					$html .= '<p class="phone">P: ' . $phone . '</p>';
				}
				if ( $website !== "" ) {
					$html .= '<p class="website">W: <a href="' . $website . '" target="_blank">' . $website . '</a></p>';
				}
				if ( $twitter !== "" ) {
					$html .= '<p class="twitter">T: ' . horizon_build_twitter_link( $twitter ) . '</p>';
				}
				$html .= '</div>';
			}
			$html .= '</div>';
			$html .= '</div>';
		endwhile;
		$html .= '<div class="clear"></div>'; else:
		$html .= '<div>No staff matched your search!<br />Did you enter the right slug?</div>';
	endif;
	$html .= '</div>';
	wp_reset_query();

	return $html;
}

// Tab Shortcode
// USAGE: [tabs][tab_item title="TAB TITLE"]TAB TEXT[/tab_item][/tabs]

function horizon_tabs_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts, $all_tabs;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;
	$all_tabs = array();

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/tabs/tabs' );

	return $template;
}

// Tab Item Shortcode
// USAGE: [tabs][tab_item title="TAB TITLE"]TAB TEXT[/tab_item][/tabs]

function horizon_tab_item_shortcode( $atts, $content = NULL ) {
	extract( shortcode_atts( array(
		"title" => "",
	), $atts ) );

	global $all_tabs;

	$all_tabs[] = array( "title" => $title, "content" => do_shortcode( $content ) );

}

// Testimonial Shortcode
// USAGE: [testimonial category="TESTIMONIAL CATEGORY SLUG" type="static | slide"]INSERT STATIC TESTIMONIAL CATEGORY[/testimonial]

function horizon_testimonial_shortcode( $atts, $content = NULL ) {
	global $content, $author, $type;
	extract( shortcode_atts( array(
		"author"    => "",
		"category"  => "",
		"num_posts" => 5,
		"type"      => "slider",
	), $atts ) );

	// Standardise text inputs
	$type = strtolower( $type );
	$num_posts = (int) preg_replace( '/[^0-9,]|,[0-9]*$/', '', $num_posts ); //num_posts must be an int

	// Display on-the-fly testimonial
	if ( $content != NULL ) {
		$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/testimonial/static' );

		return $template;
	}

	// Else display post testimonial
	$args = array(
		'post_type'      => 'testimonial',
		'posts_per_page' => $num_posts,
	);
	if ( !empty( $category ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'testimonial-category',
				'field'    => 'slug',
				'terms'    => $category,
			)
		);
	}
	$testimonials = new WP_Query( $args );

	if ( $type == "slider" ) {
		$type = "flow";
	}
	if ( $testimonials->found_posts < 2 ) {
		$type = '';
	} // Remove slide feature if less than 2 posts found

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/testimonial/before-testimonial' );
	if ( $testimonials->have_posts() ):
		while ( $testimonials->have_posts() ):
			$testimonials->the_post();
			$template .= horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/testimonial/testimonial-item' );
		endwhile; else:
		$template .= horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/testimonial/no-testimonials' );
	endif;
	$template .= horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/testimonial/after-testimonial' );
	wp_reset_query();

	return $template;
}

// Toggle Shortcode
// USAGE: [toggle][toggle_item active="true" title="TOGGLE TITLE"]TOGGLE TEXT[/toggle_item][/toggle]

function horizon_toggle_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/toggle/toggle' );

	return $template;
}

// Toggle Item Shortcode
// USAGE: [toggle][toggle_item active="true" title="TOGGLE TITLE"]TOGGLE TEXT[/toggle_item][/toggle]

function horizon_toggle_item_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/toggle/toggle-item' );

	return $template;
}

// Vimeo Shortcode
// USAGE: [vimeo height="100" title="VIDEO TITLE" width="100"]YOUR VIDEO URL[/vimeo]

function horizon_vimeo_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/vimeo/vimeo' );

	return $template;
}

// YouTube Shortcode
// USAGE: [youtube height="100" title="VIDEO TITLE" width="100"]YOUR VIDEO URL[/youtube]

function horizon_youtube_shortcode( $atts, $content = NULL ) {
	global $shortcode_atts;
	$shortcode_atts['atts'] = $atts;
	$shortcode_atts['content'] = $content;

	$template = horizon_load_template_part( TEMPLATE_PATH . '/shortcodes/youtube/youtube' );

	return $template;
}

add_action( 'init', 'horizon_toolbar_shortcodes' );
function horizon_toolbar_shortcodes() {
	if ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) {
		add_filter( 'mce_buttons_3', 'register_mce_buttons' );
		add_filter( 'mce_external_plugins', 'register_external_plugins' );
	}
}

// Get rid of them pesky <p> and <br />'s ruining our layouts...
function horizon_fix_p_br( $content ) {
	global $shortcode_tags;
	$sc_back = $shortcode_tags;
	remove_all_shortcodes();
	horizon_register_shortcodes();
	$content = do_shortcode( $content );
	$shortcode_tags = $sc_back;

	return $content;
}

add_filter( 'the_content', 'horizon_fix_p_br', 0 );