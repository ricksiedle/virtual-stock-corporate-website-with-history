<?php

get_header();

?>
<div class="wrapper">
    <div class="container">
        <div class="row section-purpose">
            <div class="section-purpose-content col-md-6">
                <div class="section-purpose-content-inside">
                    <h2> <?php _e('Our <span style="color:#E64097">purpose</span>', 'virtual') ?></h2>
                    <p> <?php _e('We provide the platform to connect, the power to control, the edge to compete and a better experience for your colleagues and customers.', 'virtual') ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="//virtualStock.local/wp-content/uploads/2018/07/section_purpose.png" />
            </div>
        </div>

        <div class="row section-people v-full-width">
                
            <div class="container">
                <h2 class="text-align-center"> <?php _e('Our <span style="color:#E64097">people</span>', 'virtual') ?></h2>
                <div class="row">
                <?php
                if ($team_object_arr = get_field('team')):

                    foreach ($team_object_arr as $i => $post): setup_postdata( $post );
                        
                        if ( 'founders' == get_field('group') ):
                ?>
                            <div class="col-sx-6 col-md-4">
                                <div class="section-people-content-holder upper <?php echo ( ($i == 0) ? 'first' : ($i == 2 ? 'last' : '') ); ?>">
                                    <img src="<?php the_post_thumbnail_url('team-thumbnail'); ?>" alt="">
                                    <h3 class="text-align-center"> <?php the_title(); ?> </h3>
                                    <h4 class="text-align-center"> <?php the_field('team_position'); ?> </h4> 
                                </div>
                            </div>
                <?php
                        endif;
                    endforeach; wp_reset_postdata();
                ?>
                </div>

                <div class="row">
                <?php 
                    foreach ($team_object_arr as $j => $post): setup_postdata( $post );

                        if ( 'managers' == get_field('group') ):
                ?>
                            <div class="col-sx-6 col-md-3">
                                <div class="section-people-content-holder lower">
                                    <img src="<?php the_post_thumbnail_url('team-thumbnail'); ?>" alt="">
                                    <h3 class="text-align-center"> <?php the_title(); ?> </h3>
                                    <h4 class="text-align-center"> <?php the_field('team_position'); ?> </h4> 
                                </div>
                            </div>
                <?php
                        endif;
                    endforeach; wp_reset_postdata();
                ?>
                </div>
                <?php
                    endif;
                ?>
            </div>
        </div>

        <div class="row section-partners v-full-width">
            <div class="section-partners-content col-md-6">
                <div class="section-partners-content-inside">
                    <h2> <?php _e('Our <span style="color:#E64097">Partners</span>', 'virtual') ?></h2>
                    <p> <?php _e('We’ve developed partnerships with world-renowned businesses and industry leaders who, like us, are dedicated to addressing today’s challenges in new and different ways.', 'virtual') ?></p>
                </div>
            </div>
            <div class="col-md-6 image-holder">
                <img src="<?php echo home_url(); ?>/wp-content/uploads/2018/07/section_purpose.png" />
            </div>
        </div>

        <div class="row section-investors v-full-width">
            <div class="col-md-6 image-holder">
                <img src="<?php echo home_url(); ?>/wp-content/uploads/2018/07/section_purpose.png" />
            </div>
            <div class="section-investors-content col-md-6">
                <div class="section-investors-content-inside">
                    <h2> <?php _e('Our <span style="color:#E64097">Investors</span>', 'virtual') ?></h2>
                    <p> <?php _e('Stephen Chandler', 'virtual') ?> </p>
                    <p> <?php _e('Managing Partner at Notion Capital:', 'virtual') ?> </p>
                    <p> <?php _e('“Digital supply chain is a hot topic, and for good reason. Virtualstock delivers an agile supply chain technology platform that allows its clients to quickly adapt to the challenges of digitisation without turning to traditional systems integration, thereby reducing cost and risk while accelerating benefits. Virtualstock has already demonstrated this in two important sectors and has accumulated an impressive portfolio of clients. They are now superbly placed to scale rapidly, and we believe that they will become another UK technology success story.”', 'virtual') ?></p>
                </div>
            </div>
        </div>

        <div class="row section-contact v-full-width">
            <div class="col-md-7 text-align-center">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5913.035932674735!2d-0.973429797835869!3d51.455854771644425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4880b4de64a44765!2sVirtualstock!5e0!3m2!1sen!2smk!4v1531130351239" 
                    width="600" 
                    height="450" 
                    frameborder="0" 
                    style="border:0; max-width: 100%" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="col-md-5">
                <h2> <?php _e('Our <span style="color:#E64097">Location</span>', 'virtual') ?></h2>

                <h3> Headquarters: </h3>
                <p> Reading, UK, One Valpy, 20 Valpy Street, Reading, </p>
                <p> United Kingdom, RG1 1AR </p>
                <p> +44(0)1183150950 </p>

                <h3> Satellite Locations: </h3>
                <p> Lviv, Ukraine </p>
                <p> Skopje, Macedonia </p>
                <p> Rzeszow, Poland </p>
                <p> Cape Town, South Africa </p>


                <p> <?php _e('', 'virtual') ?></p>    
            </div>
        </div>
    </div>
</div>

<script>
jQuery('document').ready(function() {
    var partnersContent = jQuery('.section-partners-content-inside');
    var partnersImage = jQuery('.section-partners .image-holder')
    jQuery(window).resize(function() {
        // partnersImage.height();
        partnersContent.height(partnersImage.height());
    })
});
</script>




<?php

get_footer();