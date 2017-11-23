/* global peakScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function( $ ) {
	var masthead, menuToggle, siteNavContain, siteNavigation;

	function initMainNavigation( container ) {

            // Add button that toggles dropdown menu child items
            var dropdownButton = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
                .append( $( '<i />', { 'class': 'fa fa-angle-down', 'aria-hidden': 'true' }) )
                .append( $( '<span />', { 'class': 'screen-reader-text', text: peakScreenReaderText.expand }) );
               
            container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownButton );

            // Set the active submenu dropdown toggle button initial state.
            container.find( '.current-menu-ancestor > button' )
                //.addClass( 'toggled' )
                .attr( 'aria-expanded', 'false' )
                .find( '.screen-reader-text' )
                .text( peakScreenReaderText.expand );
		// Set the active submenu initial state.
//		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled' );
                
                /**
                 * Control dropdown arrow direction
                 */
                function flipArrow() {
                    console.log('toggleArrow fired');
                    var toggleArrow = $( '.dropdown-toggle' ).find( '.fa' );
                    // if mobile device
                    if ( $(window).width() < 768 ) {
                        if ( toggleArrow.hasClass( 'fa-angle-down') ) {
                            toggleArrow.removeClass( 'fa-angle-down' ).addClass( 'fa-angle-up' );
                        } else {
                            toggleArrow.removeClass( 'fa-angle-up' ).addClass( 'fa-angle-down' );
                        }
                    }
                }
                
                
                function toggleDropdown() {
                    var dropdown = $( '.dropdown-toggle' ),
                        screenReaderSpan = dropdown.find( '.screen-reader-text' );
                        
                    
                    dropdown.next( '.children, .sub-menu' ).toggleClass( 'toggled' );
                    
                    flipArrow();
                    
                    dropdown.attr( 'aria-expanded', dropdown.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

                    screenReaderSpan.text( screenReaderSpan.text() === peakScreenReaderText.expand ? peakScreenReaderText.collapse : peakScreenReaderText.expand );
                }

                /**
                 * Control toggle when dropdown button is fired
                 */
		container.find( '.dropdown-toggle' ).click( function( e ) {
                    
                    var _this = $( this ),
                        screenReaderSpan = _this.find( '.screen-reader-text' ),
                        toggleArrow = _this.find( '.fa' );
                        
                    e.stopPropagation();
                    e.preventDefault();
                    
                    _this.toggleClass( 'toggled' );
                    _this.next( '.children, .sub-menu' ).toggleClass( 'toggled' );

                    flipArrow();

                    _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

                    screenReaderSpan.text( screenReaderSpan.text() === peakScreenReaderText.expand ? peakScreenReaderText.collapse : peakScreenReaderText.expand );
		});
                
                /**
                 * Control sub-menu toggle when a-tag is clicked
                 */
                container.find( '.menu-item-has-children > a').click( function( e ) {
                    e.preventDefault();
                    toggleDropdown();
                });
	}

	initMainNavigation( $( '.main-navigation' ) );

	masthead       = $( '#masthead' );
	menuToggle     = masthead.find( '.menu-toggle' );
	siteNavContain = masthead.find( '.main-navigation' );
	siteNavigation = masthead.find( '.main-navigation > div > ul' );

	// Enable menuToggle.
	(function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial value for the attribute.
		menuToggle.attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.peak', function() {
			siteNavContain.toggleClass( 'toggled' );

			$( this ).attr( 'aria-expanded', siteNavContain.hasClass( 'toggled' ) );
		});
	})();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	(function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( 'none' === $( '.menu-toggle' ).css( 'display' ) ) {

				$( document.body ).on( 'touchstart.peak', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				});

				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
					.on( 'touchstart.peak', function( e ) {
						var el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );
						}
					});

			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.peak' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.peak', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.peak blur.peak', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		});
	})();
})( jQuery );
