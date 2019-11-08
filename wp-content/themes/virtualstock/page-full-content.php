<?php

/**
 * Template Name: Full Content
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

get_header();

?>

<div class="solutions-wrapper" style="background: url(<?php if( get_field('background_image') ): the_field('background_image'); endif; ?>) center center no-repeat; background-size: cover; margin-top: 103px; height: calc(100vh - 103px);">
    <div class="solutions-boxes full-content">               
        <div class="container">
            <h1><?php the_field('header'); ?></h1> 
            <div class="row">
                <div class="col"> 
                    <a href="#first">
                        <div class="box-wrapper full-content-boxes">
                            <div class="inner-box-wrapper">
                                <h2><?php the_field('left_box_title'); ?></h2>
                                <p><?php the_field('left_box_paragraph'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#second">
                        <div class="box-wrapper full-content-boxes">
                            <div class="inner-box-wrapper">  
                                <h2><?php the_field('right_box_title'); ?></h2>
                                <p><?php the_field('right_box_paragraph'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>        
            </div>
            
            <div class="row">
                <div class="col"> 
                    <a href="#third">
                        <div class="box-wrapper full-content-boxes">
                            <div class="inner-box-wrapper">
                                <h2><?php the_field('second_row_left_box_title'); ?></h2>
                                <p><?php the_field('second_row_left_box_paragraph'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#fourth">
                        <div class="box-wrapper full-content-boxes">
                            <div class="inner-box-wrapper">  
                                <h2><?php the_field('second_row_right_box_title'); ?></h2>
                                <p><?php the_field('second_row_right_box_paragraph'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>        
            </div>
        </div>
    </div>  
</div>


<section class="stats-scrolling-slider">

<?php 

   v_stats_slider(); 
?>
    
</section>


<section class="retail-content">

<?php
    
    $ids = ['first', 'second', 'third', 'fourth'];
    $i = 0;

// check if the repeater field has rows of data
if( have_rows('animated_box_content') ):

 	// loop through the rows of data
    while ( have_rows('animated_box_content') ) : the_row(); ?>

    <div id="<?php echo $ids[$i]; ?>" class="retail-inner-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>
            </div>
            <div class="row">                
                <div class="col-sm-6">                    
                    <p><?php the_sub_field('paragraph'); ?></p>
                </div>
                <div class="<?php if (get_sub_field('animation_position') == 'left') { echo 'left-floated'; } else { echo 'right-floated'; } ?> col-sm-6">
                    <div class="animation-wrapper">
                        <div class="animation-inner-container">
                            <?php if( get_sub_field('animated_image') ): ?>
                            <img data-aos="<?php the_sub_field('animation_type') ?>" src="<?php the_sub_field('animated_image'); ?>" alt=""> 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php    $i++;  endwhile;

else :

    // no rows found

endif;

?>
    
</section>

<section class="stats-scrolling-banner">

    <?php 

    v_stats_counter(); 

    ?>
    
</section>

<!-- Pricing boxes -->

<section class="pricing-boxes">

   
    <div class="card-deck">
        <div class="container">
            <div class="row">
                 <?php

                // check if the repeater field has rows of data
                if( have_rows('pricing_boxes') ):

               // loop through the rows of data
                while ( have_rows('pricing_boxes') ) : the_row(); ?> 
        
                <div class="mobile-box col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <h2><?php the_sub_field('package_name'); ?></h2>
                            <p><?php the_sub_field('package_description'); ?></p>
                        </div>
    
                        <div class="card-body">
                            <div class="card-body-content">
                                <h2><?php the_sub_field('package_start'); ?></h2>
                                <h3><?php the_sub_field('custom_input'); ?></h3>
                                <p><?php the_sub_field('price'); ?></p>
                                <span><?php the_sub_field('price_info'); ?></span>
                                <a href="#"><?php the_sub_field('button_link_text'); ?></a>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            
                            <ul>
                                <?php
                            if( have_rows('package_footer_list') ):
                            while ( have_rows('package_footer_list') ) : the_row(); ?> 
                                <li><?php the_sub_field('package_footer_list_item'); ?></li>
                                <?php  $i++;  endwhile;
                            else :

                                // no rows found

                            endif;

                            ?>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                 <?php  $i++;  endwhile;

                else :

                    // no rows found

                endif;

                ?>
            </div>
        </div>
    </div>      
</section>

<script>
  AOS.init();
</script>

<script>
	if(jQuery('#counter-owl').length > 0) {
		jQuery('#counter-owl').owlCarousel({
			loop		: true,
			margin		: 10,
			dots		: false,
			<?php if(!wp_is_mobile()): ?>
			nav    		: true,
			<?php else: ?>
			nav    		: false,
			<?php endif; ?>
			smartSpeed 	: 2000,
			navText 	: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
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
	if(jQuery('#stats-slider-owl').length > 0) {
		jQuery('#stats-slider-owl').owlCarousel({
			loop		: true,
			margin		: 10,
			dots		: false,
			<?php if(!wp_is_mobile()): ?>
			nav    		: true,
			<?php else: ?>
			nav    		: false,
			<?php endif; ?>
			smartSpeed 	: 2000,
			navText 	: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
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

<?php

get_footer();