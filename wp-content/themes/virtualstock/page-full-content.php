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
                    <div class="card">
                        <div class="card-header">
                            <h2><?php the_sub_field('package_name',false,false); ?></h2>
                            <p><?php the_sub_field('package_description'); ?></p>
                        </div>
    
                        <div class="card-body">
                            <div class="card-body-content">
                                <h2><?php the_sub_field('package_start',false,false); ?></h2>
                                <h3><?php the_sub_field('custom_input',false,false); ?></h3>
                                <p><?php the_sub_field('price'); ?></p>
                                <span><?php the_sub_field('price_info',false,false); ?></span>
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
                                <li><?php the_sub_field('package_footer_list_item',false,false); ?></li>
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
    <?php 
        // check if the repeater field has rows of data
        if( have_rows('compare_editions') ):

        // loop through the rows of data
        while ( have_rows('compare_editions') ) : the_row(); 
    ?>
    <div class="container">
        <h2><?php the_sub_field('section_title',false,false); ?></h2>
        <div class="explore-wrapper no-top-border">
            <div class="clickable-row" id="fixed">                
                <div class="row">
                    <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                        <h3><?php the_sub_field('editions_main_title',false,false); ?></h3>            
                    </div>
                    <?php
                        // check if the repeater field has rows of data
                        if( have_rows('editions') ):

                        // loop through the rows of data
                        while ( have_rows('editions') ) : the_row(); 
                    ?>
                    <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">

                        <div class="edition-description">
                            <span class="edition-title">
                                <?php the_sub_field('edition_name',false,false); ?>
                            </span>
                            <span class="price">
                                <?php the_sub_field('edition_price',false,false); ?>
                            </span>
                            <span class="edition-timeline">
                                <?php the_sub_field('edition_durability',false,false); ?>
                            </span>
                        </div>
                    </div> 
                    <?php  endwhile;
                        else :
                        // no rows found
                        endif;
                    ?>
                </div>                
            </div>          
            <?php 
                // check if the repeater field has rows of data
                if( have_rows('edition_options') ):

                // loop through the rows of data
                while ( have_rows('edition_options') ) : the_row();
            ?>
                <div class="clickable-row-explore">
                    <div class="row">
                        <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered">
                            <h2><?php the_sub_field('edition_option_title',false,false); ?></h2>
                            <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="<?php the_sub_field('edition_option_tooltip_text',false,false); ?>" data-placement="right" data-trigger="hover" style="margin-top: 0;">
                            </span>
                        </div>

                        <?php
                            // check if the repeater field has rows of data
                            if( have_rows('edition_option_check_status') ):

                            // loop through the rows of data
                            while ( have_rows('edition_option_check_status') ) : the_row();
                        ?>
                        <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered clickable-row-explore-data">
                            <?php if (get_sub_field('choose_text_or_icon') == 'icon') : ?>
                            <span class="<?php if (get_sub_field('option_availability') == 'checked') { echo 'fa fa-check-circle'; } else { echo 'fa fa-times-circle-o'; } ?>"></span>

                            <?php else : ?>
                                <p><?php the_sub_field('custom_option_input',false,false); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php  endwhile;
                            else :
                            // no rows found
                            endif;
                        ?>
                    </div>
                    <?php
                    $title = get_sub_field('edition_option_title', false);
                    if( have_rows('explore_all_features') ):
                        while ( have_rows('explore_all_features') ) : the_row();
                            if( have_rows('features') ):
                                while ( have_rows('features') ) : the_row();
                                    $sub_row = get_row();
                                    if($sub_row[key($sub_row)] == $title):
                                        if( have_rows('explore_feature') ):
                                            while ( have_rows('explore_feature') ) : the_row(); ?>
                                                <div class="explore-options">
                                                    <div class="row">
                                                        <div class="col-xs-hidden col-sm-4 col-md-4 col-lg-4 col-xl-4 bordered explore-item">
                                                            <h2><?php the_sub_field('feature_option_title',false,false); ?></h2>
                                                            <span class="fa fa-dot-circle-o popoverOption popover" data-toggle="popover" data-content="<?php the_sub_field('feature_tooltip',false,false); ?>" data-placement="right" data-trigger="hover">
                                                            </span>
                                                        </div>

                                                        <?php
                                                        if( have_rows('feature_option_check_status') ):

                                                            // loop through the rows of data
                                                            while ( have_rows('feature_option_check_status') ) : the_row();
                                                                ?>
                                                                <div class="col-xs-hidden col-sm-2 col-md-2 col-lg-2 col-xl-2 bordered">
                                                                    <?php if (get_sub_field('choose_type_of_input') == 'icon') : ?>
                                                                        <span class="<?php if (get_sub_field('feature_availability') == 'checked') { echo 'fa fa-check-circle'; } else { echo 'fa fa-times-circle-o'; } ?>"></span>

                                                                    <?php else : ?>
                                                                        <p><?php the_sub_field('custom_text_input',false,false); ?></p>
                                                                    <?php endif; ?>
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
                                    endif;
                                endwhile;
                            endif;
                        endwhile;
                    endif;
                ?>
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

<section class="page-accordion">
    <?php

// check if the repeater field has rows of data
if( have_rows('faq_accordion') ):

 	// loop through the rows of data
    while ( have_rows('faq_accordion') ) : the_row(); ?>
    <div class="container">
        <h2><?php the_sub_field('accordion_section_title',false,false); ?></h2>
        <div class="accordion" id="accordion">
            <?php

            // check if the repeater field has rows of data
            if( have_rows('accordion_repeater') ):

            // loop through the rows of data
            while ( have_rows('accordion_repeater') ) : the_row(); ?>
              <div class="card">
                <button class="btn-accordion"><h2><?php the_sub_field('item_title',false,false); ?></h2></button>
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
    jQuery(document).ready(function() {
    var stickyTop = jQuery('#fixed').offset().top; 
    jQuery(window).scroll(function(event) {
        var windowTop = jQuery(window).scrollTop();
        if (stickyTop < windowTop && jQuery(".compare-editions").outerHeight() + jQuery(".compare-editions").offset().top - jQuery("#fixed").outerHeight() > windowTop) {
            event.preventDefault();
          jQuery('#fixed').css({"position":"fixed", "top":"103px", "z-index":"10000", "transition":"ease .5s"});
        } else {
          jQuery('#fixed').css({"position":"relative", "top":"0", "z-index":"6", "transition":"ease 1s"});
        }
    });
});
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