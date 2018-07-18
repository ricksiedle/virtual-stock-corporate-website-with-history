<?php

get_header();

?>
<div class="wrapper">
    <div class="container">

    <!-- OUR PURPOSE SECTION -->
    <?php if( have_rows('our_purpose_section') ): ?>

        <?php while( have_rows('our_purpose_section') ): the_row();

            // vars
            $our_purpose_heading = get_sub_field('our_purpose_heading');
            $our_purpose_image = get_sub_field('our_purpose_section_image');
            $our_purpose_content = get_sub_field('our_purpose_section_content');

        ?>

            <div class="row section-purpose">
                <div class="section-purpose-content col-md-6">
                    <div class="section-purpose-content-inside">
                        <h2> <?php echo $our_purpose_heading ?></h2>
                        <p> <?php echo $our_purpose_content ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo $our_purpose_image; ?>" />
                </div>
            </div>
        
        <?php endwhile; ?>

    <?php endif; ?>

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

        <!-- OUR PARTNERS SECTION -->

        <?php if( have_rows('our_partners_section') ): ?>

            <?php while( have_rows('our_partners_section') ): the_row(); 

                // vars
                $our_partners_heading = get_sub_field('our_partners_heading');
                $our_partners_bg_image = get_sub_field('our_partners_section_background_image');
                $our_partners_content = get_sub_field('our_partners_section_content');

                ?>

                <div class="row section-partners v-full-width">
                    <div class="section-partners-content col-md-6">
                        <div class="section-partners-content-inside">
                            <h2> <?php echo $our_partners_heading; ?></h2>
                            <p> <?php echo $our_partners_content; ?></p>

                            <?php if( have_rows('our_partners_section_images') ): ?>
                                
                                <div class="images-partners owl-carousel owl-theme">
                                    <?php while( have_rows('our_partners_section_images') ): the_row();
                                        // vars
                                        $partner_logo_image = get_sub_field('partner_logo_image');
                                    ?>
                                        <div class="item"><img src="<?php echo $partner_logo_image; ?>" height="`30" alt=""/></div>
                                    <?php endwhile; ?>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6 image-holder" style="background-image: url('<?php echo $our_partners_bg_image ?>')">
                    </div>
                </div>

            <?php endwhile; ?>

        <?php endif; ?>

        <!-- OUR INVESTORS SECTION -->

        <?php if( have_rows('our_investors_section') ): ?>

            <?php while( have_rows('our_investors_section') ): the_row(); 

                // vars
                $our_investors_heading = get_sub_field('our_investors_heading');
                $our_investors_bg_image = get_sub_field('our_investors_section_background_image');
                $our_investors_content = get_sub_field('our_investors_section_content');

                ?>

                <div class="row section-investors v-full-width">
                    <div class="col-md-6 image-holder" style="background-image: url('<?php echo $our_investors_bg_image ?>')" >
                    </div>
                    <div class="section-investors-content col-md-6">
                        <div class="section-investors-content-inside">
                            <h2> <?php echo $our_investors_heading; ?></h2>
                            <p> <?php echo $our_investors_content; ?></p>

                            <?php if( have_rows('our_investors_section_images') ): ?>
                                
                                <div class="images-partners owl-carousel owl-theme">
                                    <?php while( have_rows('our_investors_section_images') ): the_row();
                                        // vars
                                        $investor_logo_image = get_sub_field('investor_logo_image');
                                    ?>
                                        <div class="item"><img src="<?php echo $investor_logo_image; ?>" height="`30" alt=""/></div>
                                    <?php endwhile; ?>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

        <?php endif; ?>

        <!-- CONTACT INFO SECTION -->

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

                    <?php if( have_rows('contact_section') ): ?> 

                        <?php while( have_rows('contact_section') ): the_row(); ?>

                            <?php echo get_sub_field('contact_info'); ?>

                        <?php endwhile; ?>

                    <?php endif; ?>


                <p> <?php _e('', 'virtual') ?></p>    
            </div>
        </div>

    </div><!-- end .container -->
</div><!-- end .wrapper -->

<script>
	if(jQuery('.images-partners').length > 0) {
		jQuery('.images-partners').owlCarousel({
			loop		: false,
			margin		: 10,
			dots		: true,
			smartSpeed 	: 900,
			responsive	: {
					0	: { items:1 },
					768	: { items:1 },
					1200: { items:4 }
			}
		})
	}
</script>


<?php

get_footer();