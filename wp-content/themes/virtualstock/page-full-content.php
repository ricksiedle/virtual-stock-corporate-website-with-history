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

<div class="solutions-wrapper" style="background: url(<?php if( get_field('background_image') ): the_field('background_image'); endif; ?>) center center no-repeat; background-size: cover; min-height: 100vh;">
    <div class="solutions-boxes full-content">
        <div class="container">            
            <div class="full-content-boxes-wrapper">
                <h1 id="main-page-title"><?php the_field('header',false,false); ?></h1> 
                <div class="row">
                    <div class="col"> 
                        <a href="#first">
                            <div class="box-wrapper full-content-boxes">
                                <div class="inner-box-wrapper">
                                    <h2><?php the_field('left_box_title',false,false); ?></h2>
                                    <p><?php the_field('left_box_paragraph'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#second">
                            <div class="box-wrapper full-content-boxes">
                                <div class="inner-box-wrapper">  
                                    <h2><?php the_field('right_box_title',false,false); ?></h2>
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
                                    <h2><?php the_field('second_row_left_box_title',false,false); ?></h2>
                                    <p><?php the_field('second_row_left_box_paragraph'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#fourth">
                            <div class="box-wrapper full-content-boxes">
                                <div class="inner-box-wrapper">  
                                    <h2><?php the_field('second_row_right_box_title',false,false); ?></h2>
                                    <p><?php the_field('second_row_right_box_paragraph'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>        
                </div>
            </div>
        </div>
    </div>  
	<a class="ca3-scroll-down-arrow" data-ca3_iconfont="ETmodules" data-ca3_icon="">
        <svg class="ca3-scroll-down-link" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Chevron_thin_down" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" fill="#e64097" xml:space="preserve"><path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0c0.27,0.268,0.271,0.701,0,0.969l-7.908,7.83c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25L17.418,6.109z"/></svg>
    </a>    
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
                    <h2><?php the_sub_field('title',false,false); ?></h2>
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

<?php  if (is_page (array('retailers-3') ) ) : ?>
<section class="pricing-boxes">   
    <div class="card-deck">
        <div class="container">
            <h2><?php the_field('pricing_section_title',false,false); ?></h2>
            <div class="row">
                 <?php

                // check if the repeater field has rows of data
                if( have_rows('pricing_boxes') ):

               // loop through the rows of data
                while ( have_rows('pricing_boxes') ) : the_row(); ?> 
        
                <div class="mobile-box col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card <?php if(get_sub_field('package_name',false,false) == 'Essentials'): ?>essential card-essential<?php endif; ?>">
                        <?php if(get_sub_field('package_name',false,false) == 'Essentials'): ?>
                        <p class="most-popular">Most Popular</p>
                        <?php endif; ?>
                        <div class="card-header <?php if(get_sub_field('package_name',false,false) == 'Essentials'): ?>essential<?php endif; ?>">
                            <h2><?php the_sub_field('package_name',false,false); ?></h2>
                        </div>
    
                        <div class="card-body">
                            <div class="card-body-content">
                                <p><?php the_sub_field('price'); ?></p>
                                <div><?php the_sub_field('price_info',false,false); ?></div>
                            </div>
                        </div>
                        
<!--                        <div class="card-footer">-->
<!--                        </div>-->
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
<?php  endif; ?>

<script>
  AOS.init();
</script>

<script>
jQuery(document).ready(function($){
    $('[data-toggle="popover"]').popover();
});
</script>

<script>
var acc = document.getElementsByClassName("btn-accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<script>
var acc = document.getElementsByClassName("clickable-row-explore");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var explore_options = this.querySelectorAll(".explore-item");
      console.log(explore_options);
    if (explore_options[0].style.display === "block") {
      explore_options[0].style.display = "none";
    } else {
      explore_options[0].style.display = "block";
    }
  });
}
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