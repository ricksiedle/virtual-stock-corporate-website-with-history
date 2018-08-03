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

		<?php echo do_shortcode( '[searchandfilter taxonomies="category,sector" headings="Category, Sector"]' ); ?>

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
			<?php

				$args = array(
					'post_type' => 'post',
				);
				$query_posts = new WP_Query( $args );

				if ( $query_posts->have_posts() ) : ?>

					

					<?php /* Start the Loop */ ?>

					<div class="grid">
						<div class="gutter-sizer"></div>
						<div class="grid-sizer"></div>
						<?php while ( $query_posts->have_posts() ) : $query_posts->the_post(); ?>

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

<script>
	// Isotope settings
	jQuery('.grid').isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
			columnWidth: '.grid-sizer',
			gutter: '.gutter-sizer'
		}
	});
</script>

<?php get_footer(); ?>

