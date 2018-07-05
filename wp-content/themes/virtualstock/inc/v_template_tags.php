
<?php

if ( ! function_exists( 'v_stats_counter' ) ) :
    function v_stats_counter() {
    ?>
        <!-- NOT FINISHED - just FRONTEND just wait to see -->
			<div class="container-fluid v-wrapper v-wrapper-counter v-full-width" style="background-image:url(' http://virtual.local/wp-content/uploads/2018/06/slide_1.png ')";>
				<div class="container">
					<div class="row">
						<div class="v-counter-wrapper col-md-3 text-align-center">	
							<span class="counter v-counter">20</span> <span class="v-counter-unit">M</span>
							<div class="v-counter-label">
								SKUs
							</div>
						</div>

						<div class="v-counter-wrapper col-md-3 text-align-center">	
							<span class="counter v-counter">4</span> <span class="v-counter-unit">M</span>
							<div class="v-counter-label">
								Hourly stock update
							</div>
						</div>

						<div class="v-counter-wrapper col-md-3 text-align-center">	
							<span class="counter v-counter">10</span> <span class="v-counter-unit">K</span>
							<div class="v-counter-label">
								Supplier connections
							</div>
						</div>

						<div class="v-counter-wrapper col-md-3 text-align-center">	
							<span class="counter v-counter">10</span> <span class="v-counter-unit">M+</span>
							<div class="v-counter-label">
								Orders processed per year
							</div>
		 				</div>
					</div><!-- .row -->
				</div><!-- .container -->
            </div>
<?php
    }
endif;

if ( ! function_exists( 'v_partners' ) ) :
    function v_partners() {
    ?>
<div class="container-fluid v-wrapper v-wrapper-ret-sup v-full-width" style="background-image:url('<?php echo get_field('p_bg_image'); ?>')">
	<div class="v-wrapper-ret-sup-heading">
		<h2 class="text-align-center"><?php echo get_field('p_heading'); ?></h2>
	</div>
	<div class="container">
		<div class="row">
			<?php while ( have_rows('partner') ) : the_row(); ?>
				<div class="v-ret-sup-wrapper col-md-3 text-align-center">
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
    }
endif;