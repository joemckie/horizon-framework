<?php
global $post_meta, $options, $meta, $blog_atts;
do_action( 'horizon_before_content' );
?>

	<div
		class="<?php echo $post_meta['content_meta']['width']; ?> columns <?php echo $post_meta['content_meta']['padding']; ?>">

		<div class="horizon_page_item">
			<?php

			if ( have_posts() ) {

				$i = 1;
				$blog_atts['layout_method'] = "jQuery Masonry";
				do_action( 'horizon_before_blog' );

				while ( have_posts() ) {
					the_post();

					switch ( $options['default_blog_size'] ) {
						case "1/4 Width":
							$meta['width'] = 4;
							break;
						case "1/3 Width":
							$meta['width'] = 3;
							break;
						case "1/2 Width":
							$meta['width'] = 2;
							break;
						case "Full Width":
							$meta['width'] = 1;
							break;
						default:
							$meta['width'] = 0;
					}
					$meta['alpha'] = $i == 1 ? "alpha" : "";
					$meta['omega'] = $i == $meta['width'] ? "omega" : "";
					$meta['size'] = horizon_format_width( $options['default_blog_size'], 'front-end' );
					$meta['blog_meta'] = horizon_get_post_meta( 'blog_meta' );

					get_template_part( TEMPLATE_PATH . '/blog/section/' . BLOG_STYLE . '/blog-item' );

					$i = $i == $meta['width'] ? 1 : $i + 1;

				}

				do_action( 'horizon_after_blog' );

			}

			wp_reset_postdata();


			?>
		</div>
	</div>

<?php do_action( 'horizon_after_content' ); ?>