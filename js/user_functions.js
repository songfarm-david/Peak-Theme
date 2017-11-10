

( function($) {
   /**
     * Apply class to header on scroll
     */
    $(window).scroll(function(){
        if ( $(window).scrollTop() >= 60) {
           $('.site-header').addClass('header-sticky');
        }
        else {
           $('.site-header').removeClass('header-sticky');
        }
    }); 
    
})( jQuery );