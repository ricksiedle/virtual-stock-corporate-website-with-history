

export default (function($) {


    let smart_slider_is_on_page = document.querySelector('.n2-ss-slider');
    console.log('blh');
    if( smart_slider_is_on_page != null ) {

        let slider_id = $('.n2-ss-slider').attr('id');

        let smart_slider_id = slider_id.substring(slider_id.length - 1, slider_id.length);

        n2ss.ready(/* slider id */ smart_slider_id, function(slider, sliderElement) {
            jQuery(document).on('switch', function() {
                jQuery('.v-static').addClass('animate');
            });	
            setTimeout(function() {
                jQuery(document).trigger('switch')
            }, 1000);
        });
    }
})(jQuery);






    

