<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">
					<div class="row">
						<div class="site-info col-md-3">
							<?php _e('© 2018 by Virtualstock') ?>
						</div><!-- .site-info -->

						<div class="site-footer-menu col-md-6">
							<div class="row">
								<div class="col-md-6">
									<!-- The WordPress Menu goes here -->
									<?php wp_nav_menu(
										array(
											'theme_location'  => 'footer#1',
											'container_id'    => 'footer-menu footer-menu-left',
											'menu_class'      => 'navbar-nav',
											'fallback_cb'     => '',
											'menu_id'         => 'footer-menu-1',
											'walker'          => new understrap_WP_Bootstrap_Navwalker(),
										)
									); ?>
								</div>
								<div class="col-md-6">
									<!-- The WordPress Menu goes here -->
									<?php wp_nav_menu(
										array(
											'theme_location'  => 'footer#2',
											'container_id'    => 'footer-menu footer-menu-right',
											'menu_class'      => 'navbar-nav',
											'fallback_cb'     => '',
											'menu_id'         => 'footer-menu-2',
											'walker'          => new understrap_WP_Bootstrap_Navwalker(),
										)
									); ?>
								</div>
							</div>
						</div>

						<div class="site-socials col-md-3">	
						<ul id="footer-socials" class="menu socials-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom">
								<a href="https://twitter.com/uix">
									<span>Twitter</span>
								</a>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom">
								<a href="https://facebook.com/uix">
									<span>Facebook</span>
								</a>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom">
								<a href="https://plus.google.com/uix">
									<span>Google</span>	
								</a>
							</li>
						</ul>
						</div>
					</div>
				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

