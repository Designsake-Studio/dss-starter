/**
 * @name Animated
 * @private
 * @param {object} jQuery
 * @returns {object} Animated.init
 * * @returns {object} Animated.ShowAnimated
*/


var Animated = function($) { // ----- static module
  // private var(s)


  // private method(s)
  var _init = function() {

    // TODO: Make this fuction work with passed in selector

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

    console.log("animated init");
  };

  // Show All Animated Items
  var _showAnimated = function() {

    $('.animation, .animation-visible').each(function() {
      $(this).addClass('animated');
    });

  };

  // output/public
  return {
    init: _init,
    ShowAnimated: _showAnimated
  };

}(jQuery);

// She Speaks in Code
// Author: galen.strasen
// Dependent Upon
// - jQuery

var DetectPortrait = function(element) { // ----- static module

  var _init = function() {


    $(window).on('resize orientationchange load', function(){

      var width  = $(this).width(),
          height = $(this).height();

      if(height > width) { var portraitMode = true; }

      if(portraitMode == true) {
        $('body').addClass('portrait-mode');
      }

      else {
        if($('body').hasClass('portrait-mode')) {
          $('body').removeClass('portrait-mode');
        }
      }

    });

  };
  // output/public
  return {
      init: _init
  };
}(jQuery);
// She Speaks in Code
// Author: galen.strasen


var Lightbox = function(element) { // ----- static module

    var _init = function() {

      $('.js-popup-img').magnificPopup({
        type:'image',
        mainClass: 'lightbox',
        gallery:{
          enabled:true
        }
      });

      $('.js-popup-video').magnificPopup({
        type: 'iframe',
        mainClass: 'lightbox',
        fixedContentPos: true,
        preloader: false
      });

      // TESTIMONIAL TRIGGER
      $('.js-post-type').magnificPopup({
        delegate: 'a.js-trigger',
        type: 'ajax',
        fixedBgPos: true,
        mainClass: 'lightbox',
        gallery: {
          enabled: true
        }
      });

      $('.js-o-trigger, .js-o-trigger > a').magnificPopup({
        type: 'inline',
        mainClass: 'lightbox',
        fixedContentPos: true
      });

    };

    // output/public
    return {
        init: _init
    };
}(jQuery);

// She Speaks in Code
// Author: galen.strasen

// Dependent Upon
// - jQuery
// - Util
// - Constants
// Module(s) (static)
// - Control
//
//

var MobileDetect = function($) { // ----- static module
  // private var(s)
  var ismobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));

  // private method(s)
  var _detect = function() {

    if(ismobile == true){
      $('body').addClass('mobile');
    } else {
      $('body').addClass('no-touch');
    }

  };

  // output/public
  return {
    detect: _detect
  };

}(jQuery);

/**
 * Throttle
 *
 * @class      Throttle (name)
 * @param      {Function}  $
 * @return     {Constructor} init
 */

var OnScroll = function($) { // ----- static module
    // private var(s)
    var throttleTimeOut = 50; //milliseconds before triggering function again

    // private method(s)
    var _init = function() {
      // Window Scroll functions
      $(window).on('scroll', _throttle(function(){
        $('body').addClass('scrolled');
        if ( $(window).scrollTop() < 1) {
          $('body').removeClass('scrolled');
        }
      }, throttleTimeOut));

      $(window).on('load', function(){
        if ( $(window).scrollTop() > 1) {
          $('body').addClass('scrolled');
        } else {
          $('body').removeClass('scrolled');
        }
      });

      // Window Resize Functions
      $(window).on('resize', _throttle(function(){
          /* do your normal resize stuff here, but it'll be
           * more-reasonably controlled, so as to not peg
           * the host machine's processor */
      }, throttleTimeOut));


       $('#page-top').waypoint(function(direction) {
        $('body').toggleClass('scrolled');
      });

      $('#page-bottom').waypoint(function(direction) {
        if(direction === 'down') {
          $('body').addClass('scrolled-bottom');
        }
      }, {
        offset: '80%'
      });

      $('#page-bottom').waypoint(function(direction) {
        if(direction === 'up') {
          $('body').removeClass('scrolled-bottom');
        }
      }, {
        offset: '80%'
      });
    };


    // output/public
    return {
        init: _init
    };
}(jQuery);

// She Speaks in Code
// Author: galen.strasen

/**
 * Adds a preloader across the site
 * @class      Preloader (name)
 * @return     {Constructor} Preloader.init()
 */

var Preloader = function($) { // ----- static module

  var _init = function() {

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

  };

  return {
      init: _init
  };

}(jQuery);
// She Speaks in Code
// Author: galen.strasen

var SlickSlider = function(element) { // ----- static module

  var _init = function() {

    $('.js-slider').slick({
      dots: false,
      arrows: false,
      autoplay: true,
      fade: true
    });

  };

  return {
      init: _init
  };

}(jQuery);
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

// WAYPOINTS STICKY NAV (requires extra js: http://imakewebthings.com/waypoints/shortcuts/sticky-elements/)
var StickyNav = function($) { // ----- static module


    // private method(s)
    var _init = function() {



      if($('#on-page-nav').length) {
        var sticky = new Waypoint.Sticky({
          element: $('#on-page-nav')[0],
          stuckClass: 'stick-nav'
        });


      }

    };


    // output/public
    return {
        init: _init
    };
}(jQuery);

// Credit goes to [Underscore.js](http://underscorejs.org/)

/**
 * Returns a function, that, when invoked, will only be triggered at most
 * once during a given window of time. Normally, the throttled function will
 * run as much as it can, without ever going more than once per wait
 * duration; but if you’d like to disable the execution on the leading edge,
 * pass {leading: false}. To disable execution on the trailing edge, ditto.
 */

// throttle's dependent upon _now
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

/**
 * This function is called at Document.ready()
 * @link https://github.com/documentationjs/documentation/blob/master/docs/GETTING_STARTED.md
 * @name Control
 * @private
 * @param {object} jQuery
 * @returns {object} Control + methods
 * @example Control.init();
*/


var Control = function($) {

  var _init = function() {

    // Animated.init();
    // DetectPortrait.init();
    // Lightbox.init();
    // MobileDetect.init();
    Preloader.init();
    // StickyNav.init();
    // SlickSlider.init();
    // Throttle.init();
    // SmoothScroll.init();

  };

  return {
      init: _init
  };

}(jQuery);



/**
 * This function fires off Control.init();
*/
jQuery(document).ready(function() {

    Control.init();

    /**
     * Grab Instagram feed
     * @link http://instafeedjs.com/
    */
    if($('#instafeed').length) {
    var userFeed = new Instafeed({
      get: 'user',
      userId: '34970505',
      target: 'insta-target',
      limit: 8,
      accessToken: '34970505.1677ed0.6ed1f38f15cb4c09896281ba992040a5',
      resolution: 'low_resolution',
      template: '<a href="{{link}}" target="_blank"><div class="ig-background" style="background-image: url({{image}});"><div class="ig-caption"><span class="likes"><i class="fa fa-heart fa-fw"></i> {{likes}}</span></div></div></a>'
    });

    userFeed.run();

  }
});