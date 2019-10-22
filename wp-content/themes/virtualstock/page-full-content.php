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

<div class="solutions-wrapper" style="background: url(<?php if( get_field('background_image') ): the_field('background_image'); endif; ?>) center center no-repeat; background-size: cover; min-height: 100vh; height: 100vh;">
    <div class="solutions-boxes full-content">               
        <div class="container">
            <h1><?php the_field('header'); ?></h1> 
            <div class="row">
                <div class="col"> 
                    <a href="<?php echo esc_url( get_field('left_box_url') ); ?>">
                        <div class="box-wrapper full-content-boxes">
                            <div class="inner-box-wrapper">
                                <h2><?php the_field('left_box_title'); ?></h2>
                                <p><?php the_field('left_box_paragraph'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo esc_url( get_field('right_box_url') ); ?>">
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
                    <a href="<?php echo esc_url( get_field('second_row_left_box_url') ); ?>">
                        <div class="box-wrapper full-content-boxes">
                            <div class="inner-box-wrapper">
                                <h2><?php the_field('second_row_left_box_title'); ?></h2>
                                <p><?php the_field('second_row_left_box_paragraph'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo esc_url( get_field('second_row_right_box_url') ); ?>">
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

<section class="retail-content">
    <div class="retail-inner-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Expand your Range</h2>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                </div>
                <div class="col-sm-6">
                    <img src="http://localhost/VirtualStock/wp-content/uploads/2018/07/The-Edge-Platform-2018-Dark.png" alt="">  
                </div>
            </div>
        </div>
    </div>
    <div class="retail-inner-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="http://localhost/VirtualStock/wp-content/uploads/2018/07/The-Edge-Platform-2018-Dark.png" alt="">  
                </div>
                <div class="col-sm-6">
                    <h2>Manage your Orders</h2>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                </div>
            </div>
        </div>
    </div>
    <div class="retail-inner-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Stay Safe</h2>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                </div>
                <div class="col-sm-6">
                    <img src="http://localhost/VirtualStock/wp-content/uploads/2018/07/The-Edge-Platform-2018-Dark.png" alt="">  
                </div>
            </div>
        </div>
    </div>
    <div class="retail-inner-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="http://localhost/VirtualStock/wp-content/uploads/2018/07/The-Edge-Platform-2018-Dark.png" alt="">  
                </div>
                <div class="col-sm-6">
                    <h2>Find new Products & Suppliers</h2>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                    <p>Lorem ipsum dolor sit amet, cu patrioque rationibus vim, solum ullum erant eum eu. Ei quo labore appellantur, vidit democritum honestatis nam et. An quo postea tacimates, labitur accusata ea pro. Te pri veri deserunt. Est et dicunt nominati</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();