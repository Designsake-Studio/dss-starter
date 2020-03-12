
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
