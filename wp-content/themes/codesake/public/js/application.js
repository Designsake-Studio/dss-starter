var Animated = function($) {

  var _init = function() {
    $('.animation, .animation-visible').each(function() {
      var $element = $(this);
      $element.waypoint(function() {
        var delay = 0;
        if ($element.attr('data-delay')) delay = parseInt($element.attr('data-delay'), 0);
        if (!$element.hasClass('animated')) {
          setTimeout(function() {
              $element.addClass('animated ' + $element.attr('data-animation'));
          }, delay);
        }
        delay = 0;
      }, {
        offset: '80%'
      });
    });
  };

  var _showAnimated = function() {
    $('.animation, .animation-visible').each(function() {
      $(this).addClass('animated');
    });
  };

  return {
    init: _init,
    ShowAnimated: _showAnimated
  };

}(jQuery);

/* THROTTLE
/––––––––––––––––––––––––*/
// http://underscorejs.org/

/* Returns a function, that, when invoked, will only be triggered at most
 * once during a given window of time. Normally, the throttled function will
 * run as much as it can, without ever going more than once per wait
 * duration; but if you’d like to disable the execution on the leading edge,
 * pass {leading: false}. To disable execution on the trailing edge, ditto.
 */

// throttle is dependent upon _now
_now = Date.now || function() {
  return new Date().getTime();
};

_throttle = function(func, wait, options) {
  var context, args, result;
  var timeout = null;
  var previous = 0;
  if (!options) options = {};
  var later = function() {
    previous = options.leading === false ? 0 : _now();
    timeout = null;
    result = func.apply(context, args);
    if (!timeout) context = args = null;
  };
  return function() {
    var now = _now();
    if (!previous && options.leading === false) previous = now;
    var remaining = wait - (now - previous);
    context = this;
    args = arguments;
    if (remaining <= 0 || remaining > wait) {
      if (timeout) {
        clearTimeout(timeout);
        timeout = null;
      }
      previous = now;
      result = func.apply(context, args);
      if (!timeout) context = args = null;
    } else if (!timeout && options.trailing !== false) {
      timeout = setTimeout(later, remaining);
    }
    return result;
  };
};

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
