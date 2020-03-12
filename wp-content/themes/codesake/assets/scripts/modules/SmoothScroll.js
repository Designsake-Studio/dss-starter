// She Speaks in Code
// Author: galen.strasen

/**
 * Set up smooth scroll on anchor click
 *
 * @class      	SmoothScroll (name)
 * @return  	{constructor} init
 */

var SmoothScroll = function($) { // ----- static module

  var _init = function() {
    $('a[href*="#"]:not([href="#"]).scroll-to').on('click','', function( e ) {

      e.preventDefault();

      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

        if (target.length) {
          $('html,body').animate(
            { scrollTop: target.offset().top },
            { duration: 600, easing:'easeOutCubic'}
          );
          return false;
        }

      }

    });

    if(window.location.hash) {
        var hash = window.location.hash.substring(1), //Puts hash in variable, and removes the # character
            target = $('.hash-'+ hash);

        $(window).on("load", function(){

          if (target.length) {
            $('html,body').animate(
              { scrollTop: target.offset().top },
              { duration: 1000, easing:'easeOutCubic'}
            ).delay(300);
            return false;
          }

        });
      }

  };

  return {
    init: _init
  };

}(jQuery);