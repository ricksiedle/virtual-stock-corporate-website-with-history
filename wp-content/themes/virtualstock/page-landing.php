<?php

/**
 * Template Name: Landing
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

get_header();

?>

<div class="solutions-wrapper" style="background: url(<?php if( get_field('background_image') ): the_field('background_image'); endif; ?>) center center no-repeat; background-size: cover; min-height: 100vh; height: 100vh;">
    <div class="solutions-boxes">
        <h1><?php the_field('header'); ?></h1>        
        <div class="container">
            <div class="row">
                <div class="col"> 
                    <a href="<?php echo esc_url( get_field('left_box_url') ); ?>">
                        <div class="box-wrapper">
                            <div class="inner-box-wrapper">
                                <?php if( get_field('left_box_image') ): ?><img src="<?php the_field('left_box_image'); ?>" alt=""> 
                                <?php endif; ?>
                                <h2><?php the_field('left_box_title'); ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo esc_url( get_field('right_box_url') ); ?>">
                        <div class="box-wrapper">
                            <div class="inner-box-wrapper">
                                <?php if( get_field('right_box_image') ): ?><img src="<?php the_field('right_box_image'); ?>" alt=""> 
                                <?php endif; ?>   
                                <h2><?php the_field('right_box_title'); ?></h2>
                            </div>
                        </div>
                    </a>
                </div>        
            </div>
        </div>
    </div>  
</div>

<?php

get_footer();