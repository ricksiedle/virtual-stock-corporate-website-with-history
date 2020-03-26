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

<div class="solutions-wrapper <?php  if (is_page (array('providers', 'suppliers') ) ) : ?>healthcare-wrapper<?php elseif(is_page (array('retailers-3') )): ?>retail-wrapper<?php endif; ?>" style="background: url(<?php if( get_field('background_image') ): the_field('background_image'); endif; ?>) center center no-repeat; background-size: cover; min-height: 100vh;">
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

<?php  if (is_page (array('providers', 'suppliers', 'retailers-3') ) ) : ?>
    <div class="entry-content">
        <?php if(get_the_content()) : ?>
            <div class="container text-align-center">
                <div class="entry-content-inside">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endif; ?>

        <div class="container text-align-center v-section <?php  if (is_page (array('providers', 'suppliers') ) ) : ?>v-healthcare-section<?php elseif(is_page (array('retailers-3') )): ?>v-retail-section<?php endif; ?>">


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
                                            <a href="<?php echo $v_box_hyperlink ?>">
                                                <button class="v-box-button">
                                                    <?php _e('Learn more', 'virtual') ?>
                                                </button>
                                            </a>
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
                                    <div id="partners-carousel" class="owl-carousel owl-theme">
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
<?php endif; ?>

<section class="stats-scrolling-slider">

<?php 

   v_stats_slider(); 
?>
    
</section>


<section class="retail-content <?php  if (is_page (array('providers', 'suppliers') ) ) : ?>healthcare<?php elseif(is_page (array('retailers-3') )): ?>retail<?php endif; ?>">
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