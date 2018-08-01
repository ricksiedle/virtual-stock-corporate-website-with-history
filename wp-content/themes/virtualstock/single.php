<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div id="content" tabindex="-1">

		<div>

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>
				<div class="container">
					<h2><?php _e('Related posts', 'virtual') ?></h2>
					<div class="grid">
						<?php
							//for use in the loop, list 5 post titles related to first tag on current post
							$tags = wp_get_post_tags($post->ID);
							if ($tags) {
							
							$first_tag = $tags[0]->term_id;
							$args=array(
								'tag__in' => array($first_tag),
								'post__not_in' => array($post->ID),
								'posts_per_page'=>2
							);

							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="grid-item">
								<?php 
									if( get_the_post_thumbnail( $post->ID, 'full' ) ) {
								?>		
								
									<a class="v-img-expose" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>') "></a>

								<?php

									}
									else {
								?>
										<a class="v-img-expose" style="background-image: url('<?php get_bloginfo( "stylesheet_directory" ) . '/images/thumbnail-default.jpg'; ?>') "></a>
								<?php
									}
								?>
								<div class="header-title-wrapper">
									<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
									'</a></h2>' ); ?>
								</div>

								<a class="read_more_hyperlink" href="<?php the_permalink(); ?>"><button> <?php _e('Read More', 'virtual'); ?> </button></a>

								<div class="category_name_wrapper">
									<a href="<?php echo get_category_link( get_the_category( $id )[0]->cat_ID ); ?>"><?php echo get_the_category( $id )[0]->name; ?></a>
								</div>
							</div>
							
						<?php
								endwhile;
							}
								wp_reset_query();
							}
						?>
					</div>
				</div><!-- .container -->

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
