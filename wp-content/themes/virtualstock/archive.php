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

		<?php echo do_shortcode( '[searchandfilter taxonomies="category,sector" headings="Category, Sector"]' ); ?>

		

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<div class="grid">
						<div class="gutter-sizer"></div>
						<div class="grid-sizer"></div>
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
