/*!
 * All sorts javascript/jQuery functions
 *
 * @author      Designsake Studio
 * @version     1.0.0
 *
 */


/*==================================================================================
  Functions
==================================================================================*/

(function ($, root, undefined) {
  $(function () {
    'use strict';

    /* Preloader
    /––––––––––––––––––––––––*/
    $(window).on('load', function(){
      setTimeout(function() {
        $('.js-sitewrap').animate({
          opacity: 1
        }, 300);
        $('.js-preloader').fadeOut(300, function() {
          Animated.init();
        });
      }, 300);
    });

    /* Smooth Scroll
    /––––––––––––––––––––––––*/

    // to anchor
    $('a[href*="#"]:not([href="#"]).scroll-to').on('click','', function(e) {
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

    // scrolls to anchor on new page if there is hash in URL
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


  });

})(jQuery, this);
