<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

global $post;

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<div id="carousel" class="carousel slide" data-ride="carousel">

			<?php 
				$slider_id = get_field('slider_id');
				echo do_shortcode('[smartslider3 slider=' . $slider_id . ']');
			?>
			
			<!-- Static content in the carousel area -->
			<div class="container v-static">
				<?php if(get_field('has_header')): ?>
					<div class="v-carousel-wrapper">
						<h1 class="v-carousel-heading">
							<?php if(get_field('header_text_heading')) :
								echo get_field('header_text_heading');
							endif; ?>
						</h1>
						<div class="v-carousel-content">
							<?php if(get_field('header_text_content')) :
								echo get_field('header_text_content');
							endif; ?>
						</div>
					</div>

					<a href="https://go.virtualstock.co.uk"><button id="carousel-btn" class="moduled-btn pink-btn carousel-btn"><?php _e( 'Ready to meet', 'virtual' ) ?></button></a>
				<?php endif; ?>

				<?php if( is_front_page() ) : ?>
					<div class="owl-carousel owl-theme v-owl-carousel">
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/06/tesco.png" height="30" alt=""/></div>
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/06/john_lewis.png" height="30" alt=""/></div>
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/06/argos.png" height="30" alt=""/></div>
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/06/dixons.png" height="30" alt=""/></div>
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/07/logo-28.png" height="30" alt=""/></div>
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/07/logo-22.png" height="30" alt=""/></div>
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/06/screwfix.png" height="30" alt=""/></div>
						<div class="item"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/07/logo-21.png" height="30" alt=""/></div>
					</div>
				<?php endif; ?>
			</div> <!-- end .container -->
		</div>

		<div class="under-header-wrapper container">
			
			<?php if(get_field('has_under_header_logo') && get_field('under_header_logo')) : ?>
				<div class="under-header-logo">
					<img src="<?php echo get_field('under_header_logo') ?>" alt="">
				</div>
			<?php endif; ?>

			<?php if(get_field('has_under_header_section')) :

				while ( have_rows('under_header_section') ) : the_row(); 
				
				$v_under_header_title = get_sub_field('under_header_section_title');
				$v_under_header_left = get_sub_field('left_content_area');
				$v_under_header_right = get_sub_field('right_content_area');


			?>
				<div class="under-header-section">
					<h3 class="text-align-center"> <?php echo $v_under_header_title; ?> </h3>
					<p class="text-align-center"> <?php _e( 'The Edge4Health is a partnership between NHS SBS and Virtualstock' ); ?> </p>
					<div class="row under-header-section-content">
						<div class="col-sm-12 text-align-center">
							<?php echo $v_under_header_left; ?>
						</div>
					</div>
					<div class="row">
						<p class="under-header-section-footer text-align-center">
							<?php _e('Our platform is both GS1 & PEPPOL certified, </br>	
							giving you peace of mind');  ?>
						</p>
						<div class="button_wrapper">
							<a href="https://market.edge4health.co.uk/" class="no_icon" target="_blank">
								<button class="under_header_btn blue-btn text-align-center">
									<?php _e('Take me to The Edge4Health'); ?> 
								</button>
							</a>
						</div>
						
					</div>
				</div>
			<?php 
				endwhile;
			
			endif; ?>

		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if(get_the_content()) : ?>
			<div class="container text-align-center">
				<div class="entry-content-inside">
					<?php the_content(); ?>
				</div>
			</div>

		<?php endif; ?>

		<div class="container text-align-center v-section">
		
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>
		
		<?php
		//counter initializer
		//for positioning elements between sections
			$i = 0;


			// check if the repeater field has rows of data
			if( have_rows('page_sections') ):

				// loop through the rows of data
					do { 
						
					the_row(); $section_type = get_sub_field('section_type');

					//...increase the sections counter
					$i++;

					// Show the stats counter on the retail page
					if($i == 3 && ( get_page_by_path('retail')->post_name == $post->post_name) ) : v_stats_counter(); endif;
					

						// Check if the section has heading
						$v_section_heading = get_sub_field('section_heading');

						if($v_section_heading) :
							
							$margin40 = (get_page_by_path('suppliers') || get_page_by_path('providers')) ? "margined-top40" : "";
			
			?>

							
							<h2 class="v-section-heading margined-heading <?php echo $margin40; ?> text-align-center">
								<?php echo $v_section_heading; ?>		
							</h2>
							

			<?php

						endif;

						//Start check the type of the sections, dude

						// SECTION WITH BOXES
						if ( $section_type == 'v-box-section' ):

			?>
					
						<div class="row">
			<?php

							while ( have_rows('section_with_boxes') ) : the_row(); 

								$v_box_background_image = get_sub_field('background_image');
								$v_box_icon_image = get_sub_field('icon_image');
								$v_box_title = get_sub_field('title');
								$v_box_hyperlink = get_sub_field('button_hyperlink');
								$v_box_size = get_sub_field('v_box_type');

								//Purge the v_box_title variable, for css usage
								$v_box_title_hashed = hash('sha256', $v_box_title);

			?>
								<style type="text/css">
									.v-box-<?php echo $v_box_title_hashed ?>:before {
										background-image:url( <?php echo $v_box_background_image; ?> );
									}
								</style>

			<?php 

								if($v_box_size == 'small'){
									//small box takes third of the real estate
									 $v_box_size_col = 'col-lg-4 col-md-8 col-md-offset-2';
								} elseif($v_box_size == 'medium') {
									//meium box takes half of the real estate
									$v_box_size_col = 'col-lg-6 col-md-8 col-md-offset-2';
								} elseif($v_box_size == 'large') {
									//large box takes two-thirds of the real estate
									$v_box_size_col = 'col-lg-8 col-md-8 col-md-offset-2';
								} elseif($v_box_size == 'full') {
									//full box takes whole row
									$v_box_size_col = 'col-md-12';
								} else {
									$v_box_size_col = '';
								}

			?>

								<div class="v-box-wrapper <?php echo $v_box_size_col ?> text-align-center">
									<div class="v-box v-box-<?php echo $v_box_title_hashed; ?> v-col-md-12">
										<div class="v-box-icon" style="background-image:url('<?php echo $v_box_icon_image; ?>');">
											<!-- no content within this div -->
										</div>
										<h3 class="v-box-caption">
											<span> <?php echo $v_box_title; ?> </span>
										</h3>
										<?php if(get_sub_field('has_button') == true) { ?>
											<button class="v-box-button">
												<a href="<?php echo $v_box_hyperlink ?>"> <?php _e('Learn more', 'virtual') ?> </a>
											</button>
										<?php } ?>
										<?php if(get_sub_field('has_text_overlay') == true) { ?>
											<div class="v-box-txt">
												<?php echo  get_sub_field('overlay_text') ?>
											</div>
										<?php } ?>
									</div>
									
								</div>

			<?php

							endwhile;

			?>
						</div><!-- end row -->

			<?php

						

						// SECTION WITH LARGE LOGO
						elseif ( $section_type == 'v-large-logo' ):

								while ( have_rows('section_with_large_logo') ) : the_row(); 
						
									$v_large_logo_image = get_sub_field('large_logo_image');
									$v_large_logo_image_content = get_sub_field('large_logo_content');

			?>
									<div class="row">				
										<div class="v-large-logo col-md-6">
											<img src="<?php echo $v_large_logo_image ?>" />
										</div>
										<div class="div col-md-6 v-large-logo-content text-align-left">
											<?php echo $v_large_logo_image_content ?>
										</div>
									</div>

			<?php 

								endwhile;



								// SECTION WITH TESTIMONIALS
								elseif ( $section_type == 'v-testimonials' ):

									while ( have_rows('section_with_testimonials') ) : the_row(); 

										$testimonials_tag = get_sub_field('testimonials_tag');
										$tag = get_tag( $testimonials_tag );
										
										$args = array(
											'post_type' => 'testimonials',
											'tag' => $tag->name,
										);
										// The Query -- testimonials tagged with the custom tag
										$testimonials_query = new WP_Query( $args );

										//check the format of the image icon
										$img_icon = get_field('testimonial_icon');
										$img_icon_width = $img_icon['width'];
										$img_icon_height = $img_icon['height'];

										$img_icon_class = ($img_icon_width > $img_icon_height) ? 'img-landscape' : 'img-portrait';
											

										// The Loop
										if ( $testimonials_query->have_posts() ) {
											echo '<div class="v-testimonials owl-carousel owl-theme">';
											while ( $testimonials_query->have_posts() ) {  $testimonials_query->the_post();
												echo '<div class="v-testimonial">';
													echo '<div class="image_wrapper"><img class="'. $img_icon_class . '" src="' . get_field('testimonial_icon') . '"></div>';
													echo '<div class="v_testimonial_content">';
														the_content();
													echo '</div>';
													echo '<div class="v_testimonial_profession">' . get_field('profession') . '</div>';
												echo '</div>';
											}
											echo '</div>';
											/* Restore original Post Data */
											wp_reset_postdata();
										}

									endwhile;

									// PARTNERS AND SUPPLIERS
									elseif ( $section_type == 'v-partners' ):

										while ( have_rows('section_with_partner_logos') ) : the_row(); 
			?>
											<div class="container-fluid v-wrapper v-partners v-wrapper-ret-sup v-full-width parallax-window" data-parallax="scroll" data-image-src="<?php echo get_sub_field('p_bg_image'); ?>" >
												<div class="v-wrapper-ret-sup-heading">
													<h2 class="text-align-center"><?php echo get_sub_field('p_heading'); ?></h2>
												</div>
												<div class="container">
													<div id="partners-carousel" class="row owl-carousel owl-theme">
														<?php while ( have_rows('partner') ) : the_row(); ?>
															<div class="v-ret-sup-wrapper text-align-center">
																<img class="v-img" src="<?php echo get_sub_field('logo_image'); ?>"/>
																<div>
																<?php echo get_sub_field('under_logo_text'); ?>
																</div>
															</div>
														<?php endwhile; ?>
													</div>
												</div>
											</div>

			<?php							
										endwhile;

									// PLAIN TEXT SECTION
									elseif ( $section_type == 'v-plain' ):

											while ( have_rows('section_with_plain_text') ) : the_row(); 
										?>
							
											<div class="v-plain v-full-width" style="background-color:<?php echo get_sub_field('bg_color'); ?>">
												<div class="container">
													<?php echo get_sub_field('v_content'); ?>
												</div>
											</div>
			<?php								
											endwhile;
			

						endif;
							
					} while ( have_rows('page_sections') ); //have_rows page_sections	

				endif; //have_rows page_sections 

			?>
		</div><!-- end container -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php if(is_front_page()) { ?>

	<script>
	if(jQuery('.owl-carousel').length > 0) {
		jQuery('.owl-carousel').owlCarousel({
			loop		: true,
			margin		: 10,
			dots		: false,
			nav    		: true,
			smartSpeed 	: 900,
			navText 	: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			responsive	: {
					0	: { items:1 },
					768	: { items:3 },
					1200: { items:5 }
			}
		})
	}
	
</script>

<?php } ?>

<script>
	if(jQuery('.v-testimonials').length > 0) {
		jQuery('.v-testimonials').owlCarousel({
			loop		: true,
			margin		: 10,
			dots		: true,
			smartSpeed 	: 900,
			responsive	: {
					0	: { items:1 },
					768	: { items:1 },
					1200: { items:1 }
			}
		})
	}
	
</script>

<script>
	if(jQuery('#partners-carousel').length > 0) {
		jQuery('#partners-carousel').owlCarousel({
			loop		: true,
			margin		: 10,
			dots		: false,
			smartSpeed 	: 800,
			autoplay   	: true,
			autoplayTimeout: 5000,
			autoplayHoverPause:true,
			responsive	: {
					0	: { items:1 },
					768	: { items:2 },
					1200	: { items:4 }
			}
		})
	}
	
</script>

<script>
	if(jQuery('#counter-owl').length > 0) {
		jQuery('#counter-owl').owlCarousel({
			loop		: true,
			margin		: 10,
			dots		: true,
			smartSpeed 	: 2000,
			autoplay   	: true,
			autoplayTimeout: 6000,
			autoplayHoverPause:true,
			responsive	: {
					0	: { items:1 },
					768	: { items:2 },
					1200: { items:4 }
			}
		})
	}
</script>


<script>
	jQuery(document).ready(function($) {
		if(jQuery('.counter').length > 0) {
			
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		}
	});
</script>
