<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

global $post;

?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="container" id="content" tabindex="-1">
		<?php if(!wp_is_mobile()) { ?>
			<div class="row v-categories-menu">
				<?php 
					$categories = get_terms( array(
						'taxonomy' => 'category',
						'hide_empty' => true
					) );
					
					$separator = ' ';
					$all = 'All';
					//var_dump($categories); die();
					if ( ! empty( $categories ) ) {

						$output = '<a class="current-page" href="<?php echo home_url(); ?>/resources"' . '" alt="' . esc_attr( __( 'View all posts', 'textdomain' ) ) . '">' . esc_html( $all )  . '</a>' . $separator;
						
						foreach( $categories as $category ) {

							$is_this_page = $post->post_name == $category->slug ? 'current_page' : '';

							$output .= '<a class="' . $is_this_page . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'virtual' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						}
						echo trim( $output, $separator );
					}
				?>
			</div>
		<?php } else { ?>
			<div id="categories"><h4><?php _e( 'Filter posts by Category' ); ?></h4>
				<?php wp_dropdown_categories( 'show_option_none=Select category' ); ?>
				<script type="text/javascript">
					var dropdown = document.getElementById("cat");
					function onCatChange() {
						if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
							location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
						}
					}
					dropdown.onchange = onCatChange;
				</script>
			</div>
		<?php } ?>
		

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div class="grid">
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
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<script src="<?php echo get_stylesheet_directory_uri() . '/js/isotope.pkgd.js' ?>"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/js/packary-mode.pkgd.js' ?>"></script>

<script>
	jQuery('.grid').isotope({
		
		layoutMode: 'masonry',
		itemSelector: '.grid-item',
		masonry: {
			columnWidth: 50%,
			gutterWidth: 10
		}
	});
</script>

<?php get_footer(); ?>
