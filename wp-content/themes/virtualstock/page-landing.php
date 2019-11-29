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

<div class="solutions-wrapper margin-bottom-universal" style="background: url(<?php if( get_field('background_image') ): the_field('background_image'); endif; ?>) center center no-repeat; background-size: cover; margin-top: 103px; height: calc(100vh - 103px);">
    <video muted autoplay loop>
        <?php if( get_field('video') ): ?>                        
            <source src="<?php the_field('video'); ?>">
        <?php endif; ?>
    </video>
    <div class="solutions-boxes">
        <h1><?php the_field('header',false,false); ?></h1>        
        <div class="container">
            <div class="row">
                <div class="mobile-box col"> 
                    <a href="<?php echo esc_url( get_field('left_box_url') ); ?>">
                        <div class="box-wrapper">
                            <div class="inner-box-wrapper">
                                <?php if( get_field('left_box_image') ): ?><img src="<?php the_field('left_box_image'); ?>" alt=""> 
                                <?php endif; ?>
                                <h2><?php the_field('left_box_title',false,false); ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mobile-box col">
                    <a href="<?php echo esc_url( get_field('right_box_url') ); ?>">
                        <div class="box-wrapper">
                            <div class="inner-box-wrapper">
                                <?php if( get_field('right_box_image') ): ?><img src="<?php the_field('right_box_image'); ?>" alt=""> 
                                <?php endif; ?>   
                                <h2><?php the_field('right_box_title',false,false); ?></h2>
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