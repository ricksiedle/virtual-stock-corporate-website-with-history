
<?php

if ( ! function_exists( 'v_stats_counter' ) ) :
    function v_stats_counter() {
    ?>
		<!-- NOT FINISHED - just FRONTEND just wait to see -->
		<?php if(get_field('counter_background_image')) : ?>
			<div class="container-fluid v-wrapper v-wrapper-counter v-full-width parallax-window" data-parallax="scroll" data-image-src="<?php echo get_field('counter_background_image'); ?>" ;>
				<div class="container">
					<div id="counter-owl" class="owl-carousel owl-theme">

					<?php if(get_field('stats_counter')) :

							while ( have_rows('stats_counter') ) : the_row(); 
						
									//vars
									$v_statistic_figure = get_sub_field('the_statistic_figure');
									$v_unit = get_sub_field('the_unit');
									$v_stock = get_sub_field('the_stock');
								?>

								<div class="v-counter-wrapper text-align-center">	
									<span class="counter v-counter"><?php echo $v_statistic_figure; ?></span> <span class="v-counter-unit"><?php echo $v_unit; ?></span>
									<div class="v-counter-label">
										<?php echo $v_stock; ?>
									</div>
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
