/**
 * @file
 * Provides an event handler for hidden elements in dropdown menus.
 * Do not need this file anymore.  This is solved using CSS.
 */

(function ($) {

  $('.table-responsive').on('show.bs.dropdown', function () {
    $('.table-responsive').css('overflow', 'inherit');
  });

  $('.table-responsive').on('hide.bs.dropdown', function () {
    $('.table-responsive').css('overflow', 'auto');
  });

})(jQuery);

