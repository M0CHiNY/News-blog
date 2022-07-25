(function ($, Drupal) {
  // I want some code to run on page load, so I use Drupal.behaviors
  Drupal.behaviors.burger_menu = {
    attach: function (context, settings) {
      $(".mobile-menu__btn").click(
        function () {
          $(".primary-nav").addClass("btn-active");
        }
      );
      $("#td-icon-").click(
        function () {
          $(".primary-nav").removeClass("btn-active");
        }
      );
    }
  };
}(jQuery, Drupal));
