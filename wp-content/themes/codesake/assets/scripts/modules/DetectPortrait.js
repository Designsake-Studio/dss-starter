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