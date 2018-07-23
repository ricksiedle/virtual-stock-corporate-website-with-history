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

						<div class="site-footer-menu col-md-7">
							<div class="row">
								<div class="col-md-12 text-align-center">
									<!-- The WordPress Menu goes here -->
									<?php wp_nav_menu(
										array(
											'theme_location'  => 'footer#1',
											'container_id'    => 'footer-menu footer-menu-left',
											'menu_class'      => 'navbar-nav',
											'fallback_cb'     => '',
											'menu_id'         => 'footer-menu-1',
											'depth'           => 2, 
											'walker'          => new understrap_WP_Bootstrap_Navwalker(),
										)
									); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-align-center">
									<!-- The WordPress Menu goes here -->
									<?php wp_nav_menu(
										array(
											'theme_location'  => 'footer#2',
											'container_id'    => 'footer-menu footer-menu-right',
											'menu_class'      => 'navbar-nav',
											'fallback_cb'     => '',
											'menu_id'         => 'footer-menu-2',
											'depth'           => 1, 
											'walker'          => new understrap_WP_Bootstrap_Navwalker(),
										)
									); ?>
								</div>
							</div>
						</div>

						<div class="site-socials col-md-2">	
							<ul id="footer-socials" class="menu socials-menu">
								<li class="menu-item menu-item-type-custom menu-item-object-custom">
									<a href="https://en-gb.facebook.com/Virtualstock-355636264860704/" class="no_icon">
										<span><?php _e('Facebook', 'virtual'); ?></span>
									</a>
								</li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom">
									<a href="https://twitter.com/virtualstock?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="no_icon">
										<span><?php _e('Twitter', 'virtual'); ?></span>
									</a>
								</li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom">
									<a href="https://www.linkedin.com/company/virtualstock/" class="no_icon">
										<span><?php _e('LinkedIn', 'virtual'); ?></span>	
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

