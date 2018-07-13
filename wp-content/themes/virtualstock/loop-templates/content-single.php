<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php if( get_field('header_image') ): ?>
			<div class="header-inner" style="background-image:url('<?php the_field('header_image'); ?>')">

			</div>
		<?php endif; ?>
		

	</header><!-- .entry-header -->
	<div class="container">
		<div class="entry-content">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

			<?php the_content(); ?>

			<?php

			// check if the repeater field has rows of data
			if( have_rows('the_repeater') ):

				// loop through the rows of data
				while ( have_rows('the_repeater') ) : the_row();

					// display a sub field value
					the_sub_field('some_subfield');

				endwhile;

			else :

				// no rows found

			endif;

			?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->
	</div>
	

</article><!-- #post-## -->
