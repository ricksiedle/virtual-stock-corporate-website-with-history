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
            <div class="full-content-boxes-wrapper">
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
                            <h2><?php get_sub_field('package_name'); ?></h2>
                            <p><?php the_sub_field('package_description'); ?></p>
                        </div>
    
                        <div class="card-body">
                            <div class="card-body-content">
                                <h2><?php the_sub_field('package_start'); ?></h2>
                                <h3><?php the_sub_field('custom_input'); ?></h3>
                                <p><?php the_sub_field('price'); ?></p>
                                <span><?php the_sub_field('price_info'); ?></span>
                                <?php 
                                    $link = get_sub_field('button_link_text');
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                
                                if( $link ): ?>
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
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

<section class="compare-editions">
    <div class="container">
        <h2>Compare editions and top features.</h2>
        <div class="explore-wrapper">
            <div class="clickable-row" id="scroll-fixed">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                                     
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <div class="edition-description">
                            <span class="edition-title">
                                Essentials
                            </span>
                            <span class="price">
                                £ 20
                            </span>
                            <span class="edition-timeline">
                                /user/month*
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <div class="edition-description">
                            <span class="edition-title">
                                Essentials
                            </span>
                            <span class="price">
                                £ 20
                            </span>
                            <span class="edition-timeline">
                                /user/month*
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <div class="edition-description">
                            <span class="edition-title">
                                Essentials
                            </span>
                            <span class="price">
                                £ 20
                            </span>
                            <span class="edition-timeline">
                                /user/month*
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <div class="edition-description">
                            <span class="edition-title">
                                Essentials
                            </span>
                            <span class="price">
                                £ 20
                            </span>
                            <span class="edition-timeline">
                                /user/month*
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="explore">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Lead management</h2>   
                        <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="wrong estimation" data-placement="right" data-trigger="hover">
                        </span>  
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                   <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                </div>
            </div>
            <div class="explore">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Lead management</h2>   
                        <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="Bla bla" data-placement="right" data-trigger="hover">
                        </span>  
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                   <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                </div>
            </div>
            <div class="explore">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Lead management</h2>   
                        <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen" data-placement="right" data-trigger="hover">
                        </span>  
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                   <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                </div>
            </div>
              
        </div>
    </div>
</section>

<section class="explore-features">
    <div class="container">
        <h2>Explore all features.</h2>
        <div class="explore-wrapper">
            <div class="clickable-row">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Find and manage leads better.</h2>                
                    </div>
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">

                    </div>
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">

                    </div>

                </div>
            </div>
            <div class="explore">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Lead management</h2>   
                        <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." data-placement="right" data-trigger="hover">
                        </span>  
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                   <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                </div>
            </div>
            <div class="clickable-row">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Find and manage leads better.</h2>                
                    </div>
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">

                    </div>
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">

                    </div>

                </div>
            </div>
            <div class="explore">
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Lead management</h2>   
                        <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="And here's some amazing content. It's very engaging. Right?dfdfff pizda li ti mater mi go eba denot sve da ti iznaebem u dupe" data-placement="right" data-trigger="hover">
                        </span>                   
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                   <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h2>Lead management</h2>   
                        <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="And here's some amazing content. It's very engaging. Right?dfdfff pizda li ti mater mi go eba denot sve da ti iznaebem u dupe" data-placement="right" data-trigger="hover">
                        </span>                   
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                   <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                        <span class="fa fa-times-circle-o"></span>
                    </div>
                </div>
            </div>     
        </div>
    </div>
</section>


<section class="page-accordion">
    <?php

// check if the repeater field has rows of data
if( have_rows('faq_accordion') ):

 	// loop through the rows of data
    while ( have_rows('faq_accordion') ) : the_row(); ?>
    <div class="container">
        <h2><?php the_sub_field('accordion_section_title'); ?></h2>
        <div class="accordion" id="accordion">
            <?php

            // check if the repeater field has rows of data
            if( have_rows('accordion_repeater') ):

            // loop through the rows of data
            while ( have_rows('accordion_repeater') ) : the_row(); ?>
              <div class="card">
                <button class="btn-accordion"><h2><?php the_sub_field('item_title'); ?></h2></button>
                <div class="panel">
                  <?php the_sub_field('item_description'); ?>
                </div>
              </div>
                <?php  endwhile;

            else :
                // no rows found
                endif;
            ?>
        </div>
    </div>
    <?php  endwhile;

        else :

            // no rows found

        endif;

    ?>
</section>




<!--
<script>
    var elementPosition = jQuery('#scroll-fixed').offset();

    jQuery(window).scroll(function(){
        if(jQuery(window).scrollTop() > elementPosition.top){
              jQuery('#scroll-fixed').css('position','fixed').css('top','103px');
        } else {
            jQuery('#scroll-fixed').css('position','relative');
        }    
    });
</script>
-->

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
var acc = document.getElementsByClassName("clickable-row");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var explore = this.nextElementSibling;
    if (explore.style.display === "block") {
      explore.style.display = "none";
    } else {
      explore.style.display = "block";
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