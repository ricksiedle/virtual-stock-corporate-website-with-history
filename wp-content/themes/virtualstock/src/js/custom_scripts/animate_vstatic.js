

export default (function($) {

    // Every Smart slider has a class n2-ss-slider, 
    // so traverse the Dom with this class.
    let smart_slider_is_on_page = document.querySelector('.n2-ss-slider');

    if( smart_slider_is_on_page != null ) {

        let slider_id = $('.n2-ss-slider').attr('id');

        // Last character of the id attribute is the ID of the Smart slider,
        // find it in the graphic editor of Smart slider plugin
        let smart_slider_id = slider_id.substring(slider_id.length - 1, slider_id.length);

        /**
         * On ready callback
         * 
         * @param slider
         * @param sliderElement
         */
        n2ss.ready(/* slider id */ smart_slider_id, function(slider, sliderElement) {
            jQuery(document).on('switch', function() {
                // Make animation leveraging css transitions.
                jQuery('.v-static').addClass('animate');
            });	
            setTimeout(function() {
                jQuery(document).trigger('switch')
            }, 1000);
        });
    }
})(jQuery);






    

