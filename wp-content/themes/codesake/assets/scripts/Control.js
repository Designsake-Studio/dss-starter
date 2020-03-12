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