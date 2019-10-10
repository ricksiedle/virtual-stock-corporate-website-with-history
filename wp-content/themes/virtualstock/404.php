<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper text-align-center" id="error-404-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'understrap' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location.',
							'understrap' ); ?></p>

							<a href="<?php echo home_url(); ?>"><button id="homepage"> <?php _e('Back to homepage', 'virtual') ?> </button></a>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<? php get_footer(); ?>
