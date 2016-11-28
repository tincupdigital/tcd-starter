/**
 * mobile-menu.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */

(function($){
  // add click function to toggle class
  $('.menu-toggle').click(function() {
    $('.site').toggleClass('pushed');
  });

  // remove class if click outside menu
  $(document).mouseup(function(e) {
    var menuArea = $('.mobile-nav-area');
    var menuButton = $('.menu-toggle');

    // check if menu area is targeted
    if ( ( !menuArea.is(e.target) && menuArea.has(e.target).length === 0 ) && !menuButton.is(e.target) ) {
      $('.site').removeClass('pushed');
    }
  });
}(jQuery));