/**
 * @file
 * Text resize options display.
 */
(function ($) {
  'use strict';
  Drupal.behaviors.fontBehavior = {
    attach: function () {
      // Get text resize option.
      let font_size = (drupalSettings.bootstrap_for_cloud.font_size === null) ? 'Medium' : drupalSettings.bootstrap_for_cloud.font_size;
      // Get font family option.
      let font_family = (drupalSettings.bootstrap_for_cloud.font_family === null) ? 'Lucida Grande' : drupalSettings.bootstrap_for_cloud.font_family;
      // Get theme color option.
      let theme_color = (drupalSettings.bootstrap_for_cloud.theme_color === null) ? 'Blue' : drupalSettings.bootstrap_for_cloud.theme_color;

      $('li a[href="#edit-bootstrap-for-cloud"]').find('strong').siblings('span').html('Theme: ' + theme_color +'<br /> ' + 'Font family: ' + font_family +'<br /> ' + 'Font size: ' + font_size);

      $('#edit-theme-color').change(function() {
        let font_family = $(this).parents('#edit-bootstrap-for-cloud').find('#edit-font-family').children('option:selected').text();
        let font_size = $(this).parents('#edit-bootstrap-for-cloud').find('#edit-font-size').children('option:selected').text();
        let theme_color_value = $(this).children('option:selected').text();

        if (theme_color_value === '' || theme_color_value === null) {
          theme_color_value = 'Blue';
        }
        $('li a[href="#edit-bootstrap-for-cloud"]').find('strong').siblings('span').html('Theme: ' + theme_color_value +'<br /> ' + 'Font family: ' + font_family +'<br /> ' + 'Font size: ' + font_size);
      });

      $('#edit-font-size').change(function() {
        let theme_color = $(this).parents('#edit-bootstrap-for-cloud').find('#edit-theme-color').children('option:selected').text();
        let font_family = $(this).parents('#edit-bootstrap-for-cloud').find('#edit-font-family').children('option:selected').text();
        let font_size_value = $(this).children('option:selected').text();

        if (font_size_value === '' || font_size_value === null) {
          font_size_value = 'Medium';
        }
        $('li a[href="#edit-bootstrap-for-cloud"]').find('strong').siblings('span').html('Theme: ' + theme_color +'<br /> ' + 'Font family: ' + font_family + '<br /> ' + 'Font size: ' + font_size_value);
      });

      $('#edit-font-family').change(function() {
        let theme_color = $(this).parents('#edit-bootstrap-for-cloud').find('#edit-theme-color').children('option:selected').text();
        let font_size = $(this).parents('#edit-bootstrap-for-cloud').find('#edit-font-size').children('option:selected').text();
        let font_family_value = $(this).children('option:selected').text();

        if (font_family_value === '' || font_family_value === null) {
          font_family_value = 'Lucida Grande';
        }
        $('li a[href="#edit-bootstrap-for-cloud"]').find('strong').siblings('span').html('Theme: ' + theme_color +'<br /> ' + 'Font family: ' + font_family_value + '<br /> ' + 'Font size: ' + font_size);
      });

      // Change body font family.
      let body_font_family = $('body').css('font-family');
      let replace_body_font_family = ' ' + body_font_family.replace(/\"/g,'');
      let font_family_array = replace_body_font_family.split(',');

      if (font_family !== '') {
        // Get index of selected font family.
        let index = font_family_array.indexOf(' '+font_family);
        if (index !== '') {
          [font_family_array[0], font_family_array[index]] = [font_family_array[index], font_family_array[0]];
        }
      }
      // Get updated font family.
      let updated_font_family = font_family_array.toString();
      if (updated_font_family !== '') {
         $('body').css('font-family', updated_font_family);
      }
    }
  }

})(jQuery);
