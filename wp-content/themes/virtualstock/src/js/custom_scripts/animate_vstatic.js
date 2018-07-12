

export default (function($) {
    let smart_slider_is_on_page = document.querySelector('.n2-ss-slider');
    
    if( smart_slider_is_on_page != null ) {
        n2ss.ready(/* slider id */ 2, function(slider, sliderElement) {
            jQuery(document).on('switch', function() {
                jQuery('.v-static').addClass('animate');
            });	
            setTimeout(function() {
                jQuery(document).trigger('switch')
            }, 1000);
        });
    }
})(jQuery);






    

