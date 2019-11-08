
<?php

if ( ! function_exists( 'v_stats_slider' ) ) :
    function v_stats_slider() {
    ?>
		<?php if(get_field('stats_background_image')) : ?>
			<div class="container-fluid v-wrapper v-wrapper-counter v-full-width parallax-window" data-parallax="scroll" data-image-src="<?php echo get_field('stats_background_image'); ?>" ;>
				<div class="container">
					<div id="stats-slider-owl" class="owl-carousel owl-theme">

					<?php if(get_field('stats_slider')) :

							while ( have_rows('stats_slider') ) : the_row(); 
						
									//vars
									$stats_slider_figure = get_sub_field('the_stats_slider_figure');
								?>

								<div class="v-counter-wrapper text-align-center">	
                                    <img class="stats-slider-img" src="<?php echo $stats_slider_figure; ?>">
                                </div>
								<?php 
							endwhile;
						
						endif; ?>
						
					</div><!-- .row -->
				</div><!-- .container -->
			</div>
			
		<?php endif; ?>
<?php
    }
endif;
?>
