
<?php

if ( ! function_exists( 'v_stats_counter' ) ) :
    function v_stats_counter() {
    ?>
		<!-- NOT FINISHED - just FRONTEND just wait to see -->
			<div class="container-fluid v-wrapper v-wrapper-counter v-full-width parallax-window" data-parallax="scroll" data-image-src="<?php echo home_url(); ?>/wp-content/uploads/2018/06/slide_1.png" ;>
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
