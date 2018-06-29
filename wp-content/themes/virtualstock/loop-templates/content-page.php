<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<div id="carousel" class="carousel slide" data-ride="carousel">

			<?php 

			$images = get_field('images_header_carousel');
			$size = 'full';

			if( $images ): ?>
				<!-- Carousel slides -->
				<div class="carousel-inner">
					<?php foreach( $images as $key=>$image ): ?>
						<div class="carousel-item <?php if($key == 0): echo ' active'; endif;?>">
							<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<!-- carousel controls -->
			<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only"><?php _e('Previous', 'virtual') ?></span>
			</a>
			<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only"><?php _e('Next', 'virtual') ?></span>
			</a>
			
			<!-- Static content in the carousel area -->
			<div class="container v-static">
				<div class="v-carousel-wrapper">
					<h1 class="v-carousel-heading">
						Connect <span>Control</span> Compete
					</h1>
					<div class="v-carousel-content">
						<?php _e( 'Discover the power of your agility with the ultimate supply chain solution', 'virtual' ) ?>
					</div>
				</div>
				<?php if( is_front_page() ) : ?>
					<div class="owl-carousel owl-theme v-owl-carousel">
						<div class="item"><img src="http://virtual.local/wp-content/uploads/2018/06/tesco.png" height="30" alt=""/></div>
						<div class="item"><img src="http://virtual.local/wp-content/uploads/2018/06/screwfix.png" height="30" alt=""/></div>
						<div class="item"><img src="http://virtual.local/wp-content/uploads/2018/06/nhs.png" height="30" alt=""/></div>
						<div class="item"><img src="http://virtual.local/wp-content/uploads/2018/06/john_lewis.png" height="30" alt=""/></div>
						<div class="item"><img src="http://virtual.local/wp-content/uploads/2018/06/dixons.png" height="30" alt=""/></div>
						<div class="item"><img src="http://virtual.local/wp-content/uploads/2018/06/argos.png" height="30" alt=""/></div>
					</div>
				<?php endif; ?>
			</div> <!-- end .container -->
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
		
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>
		
		<?php

		// check if the repeater field has rows of data
		if( have_rows('page_sections') ):

			// loop through the rows of data
			while ( have_rows('page_sections') ) : the_row(); $section_type = get_sub_field('section_type');

			$v_section_title = get_sub_field('section_title');

		?>
				
			<div class="container text-align-center">
				<h2 class="v-section-heading">
					HOW CAN WE HELP <span>YOU</span>?		
				</h2>
				<div class="row">	
		<?php
			
				if ( $section_type == 'v-box-section' ): 

					while ( have_rows('section_with_boxes') ) : the_row(); 
				
						$v_box_background_image = get_sub_field('background_image');
						$v_box_icon_image = get_sub_field('icon_image');
						$v_box_title = get_sub_field('title');
						$v_box_hyperlink = get_sub_field('button_hyperlink');


					?>
							<style>
								.v-box-<?php echo $v_box_title ?>:before {
									background-image:url(<?php echo $v_box_background_image; ?>);
								}
							</style>

							<div class="v-box-wrapper col-md-4 text-align-center">
								<div class="v-box v-box-<?php echo $v_box_title ?> v-col-md-12">
									<div class="v-box-icon">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									</div>
									<h3 class="v-box-caption">
										<span> <?php echo $v_box_title; ?> </span>
									</h3>
									<button class="v-box-button">
										<a href="<?php echo $v_box_hyperlink ?>"> <?php _e('Learn more', 'virtual') ?> </a>
									</button>
								</div>
							</div>

						<?php 
						endwhile;

					endif;
			
				?>
				
				<?php 
					endwhile;

				else :

					// no rows found

				endif;

				?>

		
				</div><!-- end row -->
			</div><!-- end container -->

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php if( is_front_page() ) : ?>
	<script>
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
	</script>
<?php endif; ?>
