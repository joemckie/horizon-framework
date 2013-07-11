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

	get_header();
?>

<?php while(have_posts()): the_post();
	$sidebar = get_post_meta( $post->ID, 'post_meta_sidebar_type' ,true ); 
	$left_sidebar = get_post_meta( $post->ID, 'post_meta_left_sidebar', true );
	$right_sidebar = get_post_meta( $post->ID, 'post_meta_right_sidebar', true );
?>

    <div class="horizon_page_title">
       	<?php 
           	$horizon_show_page_title = get_post_meta( $post->ID, 'post_meta_display_title', true );
          	if ($horizon_show_page_title == "Yes"){
           		echo "<h1 class='mb0'>".get_the_title()."</h1>"; 
          	} else {
	          	echo "<h1 class='mb0'>".get_option( THEME_SHORT_NAME .'_options_default_post_title' )."</h1>";
          	}
		$horizon_page_caption = get_post_meta( $post->ID, 'post_meta_post_caption', true );
        if ($horizon_page_caption != "" ) echo"<span class='caption'>$horizon_page_caption</span>"; ?>
    </div>
   	<div class="container">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="content">
                          
            <div class="row">
                <?php get_template_part( 'sidebar', 'left' ); ?>
                <?php 
                    if($sidebar=="Left Sidebar"){$status = "omega"; $content_width = "two-thirds";}
                    elseif($sidebar=="Right Sidebar"){$status = "alpha"; $content_width = "two-thirds";}
                    elseif($sidebar=="Both Sidebars"){$status = ""; $content_width = "six";}
                    else {$status = "alpha omega"; $content_width = "twelve";}
                ?>
                <div class="<?php echo $content_width;?> columns <?php echo $status;?>">
                    <div class="horizon_page_item">
						<?php 
						
							$all_gallery_items = get_post_meta( $post->ID, 'post_meta_gallery_images', true );
							var_dump($all_gallery_items);
						

											
                        ?>
                    </div>
                </div>
                <?php get_template_part ( 'sidebar', 'right' ); ?>
            </div>
        </div>
    
        <?php endwhile; ?>
                
    </div><!-- end container -->

<?php get_footer(); ?>