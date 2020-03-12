
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
