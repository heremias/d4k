(function ($, Drupal) {
  $('.close').on('click', function (e) {
    $(this).parent('.alert').remove();
  });
}(jQuery, Drupal));
