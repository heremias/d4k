/**
 * @file
 * Functions for supporting tertiary navigation.
 */
(function ($) {
  'use strict';
  Drupal.behaviors.menuBehavior = {
    attach: function () {
      $('li.dropdown').on('click', function() {
        var $el = $(this);
        if ($el.hasClass('open')) {
          var $a = $el.children('a.dropdown-toggle');
          if ($a.length && $a.attr('href')) {
            location.href = $a.attr('href');
          }
        }
      });

      $('.dropdown-submenu a.dropdown-submenu-toggle').on("click", function(e){
        $('.dropdown-submenu ul').removeAttr('style');
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
      // Clear Submenu Dropdowns on hidden event.
      $('#navbar').on('hidden.bs.dropdown', function () {
        $('.navbar-nav .dropdown-submenu ul.dropdown-menu').removeAttr('style');
      });
    }
  }
  
})(jQuery);