<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

global $post;

?>


<div class="wrapper" id="archive-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row v-categories-menu">
			<?php 
				$categories = get_terms( array(
					'taxonomy' => 'category',
					'hide_empty' => true
				) );
				
				$separator = ' ';
				$all = 'All';


				function get_cat_slug($cat_id) {
					$cat_id = (int) $cat_id;
					$category = get_category($cat_id);
					return $category->slug;
				}

				$this_category = get_the_category();

				$this_category_slug = get_cat_slug($this_category[0]->cat_ID);
				
				if ( ! empty( $categories ) ) {
					 

					$output = '<a href="/resources"' . '" alt="' . esc_attr( __( 'View all posts', 'textdomain' ) ) . '">' . esc_html( $all )  . '</a>' . $separator;
					
					foreach( $categories as $category ) {
						$is_this_page = $this_category_slug == $category->slug ? 'current-page' : '';

						$output .= '<a class="' . $is_this_page . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'virtual' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo trim( $output, $separator );
				}
			?>
		</div>

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<div class="grid">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'loop-templates/content', get_post_format() );
							?>

						<?php endwhile; ?>
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<script src="<?php echo get_stylesheet_directory_uri() . '/js/isotope.pkgd.js' ?>"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/js/packary-mode.pkgd.js' ?>"></script>

<script>
	var $container = jQuery('.grid');
	$container.isotope({
		resizeable: false,
		layoutMode: 'masonry',
		itemSelector: '.grid-item',
		masonry: {
			columnWidth: $container.width() / 5,
			gutterWidth: 10
		}
	});
	$(window).smartresize(function(){
		$container.isotope({
		// update columnWidth to a percentage of container width
			masonry: {
				columnWidth: $container.width() / 1,
			}
		});
	});
</script>

<?php get_footer(); ?>
