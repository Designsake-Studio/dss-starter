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

  });

})(jQuery, this);
