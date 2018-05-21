/**
 * 
 * Custom user-defined functions
 */

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
    
    /**
     * Smooth scrolling + focus accessibility and URL updating
     */
    // URL updates and the element focus is maintained
    // originally found via in Update 3 on http://www.learningjquery.com/2007/10/improved-animated-scrolling-script-for-same-page-links

    // filter handling for a /dir/ OR /indexordefault.page
    function filterPath(string) {
        return string
            .replace(/^\//, '')
            .replace(/(index|default).[a-zA-Z]{3,4}$/, '')
            .replace(/\/$/, '');
    }

    var locationPath = filterPath(location.pathname);
    
    $('a[href*="#"]').each(function () {
        var thisPath = filterPath(this.pathname) || locationPath;
        var hash = this.hash;
        if ($ ("#" + hash.replace(/#/, '')).length) {
            if (locationPath == thisPath && (location.hostname == this.hostname || !this.hostname) && this.hash.replace(/#/, '')) {
                var $target = $(hash), target = this.hash;
                if (target) {
                    $(this).click(function (event) {
                        event.preventDefault();
                        var scrollToPosition;

                        // if is home page
                        if ( $('body').hasClass('single') ) {
                            scrollToPosition = $(target).offset().top;
                        } else {
                            // if is desktop viewport
                            if ( $(window).width() > 1200 ) {
                                scrollToPosition = $(target).offset().top;
                            } 
                            // if is tablet viewport
                            else if ( $(window).width() > 768 ) {
                                scrollToPosition = $(target).offset().top;
                            } else {
                                scrollToPosition = $(target).offset().top;
                            }
                        }
                        
                        $('html, body').animate({scrollTop: scrollToPosition}, 1250, function () {
                            
                            $target.focus();
                            if ($target.is(":focus")){ //checking if the target was focused
                                return false;
                            }else{
                                $target.attr('tabindex','-1'); //Adding tabindex for elements not focusable
                                $target.focus(); //Setting focus
                            }
                            //location.hash = target; causes screen jump
                        });       
                    });
                }
            }
        }
    });
    
})( jQuery );