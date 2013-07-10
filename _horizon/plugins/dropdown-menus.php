<?php
/*
Plugin Name: Dropdown Menus
Plugin URI: http://interconnectit.com/?p=2190
Description: Outputs WordPress Menus as a dropdown. Use the widget or the function <code>dropdown_menu();</code> with the same arguments as <code>wp_nav_menu();</code>.
Author: Robert O'Rourke @ interconnect/it
Version: 0.5
Author URI: http://interconnectit.com
*/

/*
Changelog:

0.5:
	improved backwards compat with getElementsByClassName. Works back to IE 5.5. Thanks to Rob Nyman http://code.google.com/p/getelementsbyclassname/

0.4:
	added the use of the menu name as the blank item text
	fixed it for when the menu object wasn't present if called via theme_location
	changed white space to reflect coding guidelines

0.3:
	added an argument to alter the blanking text, empty to not have it all together, and an improved filter that passes $args
	changed widget class name

*/

// pretty useless without this
if ( ! function_exists( 'wp_nav_menu' ) )
	return false;


/**
 * Tack on the blank option for urls not in the menu
 */
add_filter( 'wp_nav_menu_items', 'dropdown_add_blank_item', 10, 2 );
function dropdown_add_blank_item( $items, $args ) {
	if ( isset( $args->walker ) && is_object( $args->walker ) && method_exists( $args->walker, 'is_dropdown' ) ) {
		if ( ( ! isset( $args->menu ) || empty( $args->menu ) ) && isset( $args->theme_location ) ) {
			$theme_locations = get_nav_menu_locations();
			$args->menu = wp_get_nav_menu_object( $theme_locations[ $args->theme_location ] );
		}
		$title = isset( $args->dropdown_title ) ? wptexturize( $args->dropdown_title ) : '&mdash; ' . $args->menu->name . ' &mdash;';
		if ( ! empty( $title ) )
			$items = '<option value="" class="blank">' . apply_filters( 'dropdown_blank_item_text', $title, $args ) . '</option>' . $items;
	}
	return $items;
}


/**
 * Remove empty options created in the sub levels output
 */
add_filter( 'wp_nav_menu_items', 'dropdown_remove_empty_items', 10, 2 );
function dropdown_remove_empty_items( $items, $args ) {
	if ( isset( $args->walker ) && is_object( $args->walker ) && method_exists( $args->walker, 'is_dropdown' ) )
		$items = str_replace( "<option></option>", "", $items );
	return $items;
}


/**
 * Script to make it go (no jquery! (for once))
 */
add_action( 'wp_footer', 'dropdown_javascript' );
function dropdown_javascript() {
	if ( is_admin() ) return; ?>
	<script>
		var getElementsByClassName=function(a,b,c){if(document.getElementsByClassName){getElementsByClassName=function(a,b,c){c=c||document;var d=c.getElementsByClassName(a),e=b?new RegExp("\\b"+b+"\\b","i"):null,f=[],g;for(var h=0,i=d.length;h<i;h+=1){g=d[h];if(!e||e.test(g.nodeName)){f.push(g)}}return f}}else if(document.evaluate){getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e="",f="http://www.w3.org/1999/xhtml",g=document.documentElement.namespaceURI===f?f:null,h=[],i,j;for(var k=0,l=d.length;k<l;k+=1){e+="[contains(concat(' ', @class, ' '), ' "+d[k]+" ')]"}try{i=document.evaluate(".//"+b+e,c,g,0,null)}catch(m){i=document.evaluate(".//"+b+e,c,null,0,null)}while(j=i.iterateNext()){h.push(j)}return h}}else{getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e=[],f=b==="*"&&c.all?c.all:c.getElementsByTagName(b),g,h=[],i;for(var j=0,k=d.length;j<k;j+=1){e.push(new RegExp("(^|\\s)"+d[j]+"(\\s|$)"))}for(var l=0,m=f.length;l<m;l+=1){g=f[l];i=false;for(var n=0,o=e.length;n<o;n+=1){i=e[n].test(g.className);if(!i){break}}if(i){h.push(g)}}return h}}return getElementsByClassName(a,b,c)},
			dropdowns = getElementsByClassName( 'dropdown-menu' );
		for ( i=0; i<dropdowns.length; i++ )
			dropdowns[i].onchange = function(){ if ( this.value != '' ) window.location.href = this.value; }
	</script>
	<?php
}


/**
 * Overrides the walker argument and container argument then calls wp_nav_menu
 */
function dropdown_menu( $args ) {
	// enforce these arguments so it actually works
	$args[ 'walker' ] = new DropDown_Nav_Menu();
	$args[ 'items_wrap' ] = '<select id="%1$s" class="%2$s dropdown-menu">%3$s</select>';

	// custom args for controlling indentation of sub menu items
	$args[ 'indent_string' ] = isset( $args[ 'indent_string' ] ) ? $args[ 'indent_string' ] : '&ndash;&nbsp;';
	$args[ 'indent_after' ] =  isset( $args[ 'indent_after' ] ) ? $args[ 'indent_after' ] : '';

	wp_nav_menu( $args );
}


class DropDown_Nav_Menu extends Walker_Nav_Menu {

	// easy way to check it's this walker we're using to mod the output
	function is_dropdown() {
		return true;
	}

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth ) {
		$output .= "</option>";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl( &$output, $depth ) {
		$output .= "<option>";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'menu-item-depth-' . $depth;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_unique( array_filter( $classes ) ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		// select current item
		$selected = in_array( 'current-menu-item', $classes ) ? ' selected="selected"' : '';

		$output .= $indent . '<option' . $class_names .' value="'. $item->url .'"'. $selected .'>';

		// push sub-menu items in as we can't nest optgroups
		$indent_string = str_repeat( apply_filters( 'dropdown_menus_indent_string', $args->indent_string, $item, $depth, $args ), ( $depth ) ? $depth : 0 );
		$indent_string .= !empty( $indent_string ) ? apply_filters( 'dropdown_menus_indent_after', $args->indent_after, $item, $depth, $args ) : '';

		$item_output = $args->before . $indent_string;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_dropdown_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth ) {
		$output .= apply_filters( 'walker_nav_menu_dropdown_end_el', "</option>\n", $item, $depth);
	}
}

/**
 * Navigation DropDown Menu widget class
 */
class DropDown_Menu_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'dropdown-menu-widget', 'description' => __( 'Use this widget to add one of your custom menus as a dropdown.', 'gdl_back_office') );
		parent::__construct( 'dropdown_menu', __('Dropdown Menu', 'gdl_back_office'), $widget_ops );
	}

	function widget( $args, $instance ) {
		// Get menu
		$nav_menu = wp_get_nav_menu_object( $instance[ 'nav_menu' ] );

		if ( ! $nav_menu )
			return;

		$instance[ 'title' ] = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

		echo $args[ 'before_widget' ];

		if ( ! empty( $instance[ 'title' ] ) )
			echo $args[ 'before_title' ] . $instance[ 'title' ] . $args[ 'after_title' ];

		dropdown_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu ) );

		echo $args[ 'after_widget' ];
	}

	function update( $new_instance, $old_instance ) {
		$instance[ 'title' ] = strip_tags( stripslashes( $new_instance[ 'title' ] ) );
		$instance[ 'nav_menu' ] = (int) $new_instance[ 'nav_menu' ];
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$nav_menu = isset( $instance[ 'nav_menu' ] ) ? $instance[ 'nav_menu' ] : '';

		// Get menus
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		// If no menus exists, direct the user to go and create some.
		if ( ! $menus ) {
			echo '<p>'. sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), admin_url( 'nav-menus.php' ) ) .'</p>';
			return;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'gdl_back_office' ) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:', 'gdl_back_office' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
		<?php
			foreach ( $menus as $menu ) {
				$selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
				echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
			}
		?>
			</select>
		</p>
		<?php
	}

	function init() {
		register_widget( __CLASS__ );
	}
}

// add widget
// add_action( 'widgets_init', array( 'DropDown_Menu_Widget', 'init' ) );

?>
