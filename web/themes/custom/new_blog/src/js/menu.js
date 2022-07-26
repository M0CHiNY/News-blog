(function ($, Drupal) {
  // I want some code to run on page load, so I use Drupal.behaviors
  Drupal.behaviors.burger_menu = {
    attach: function (context, settings) {

      let $button = $('<div class="close-button"></div>').click(function () {

        $(".primary-nav").removeClass("btn-active");
      })

      $('.header-nav .block-menu', context).once('burger_menu').append($button);
      $(".mobile-menu__btn").click(
        function () {
          $(".primary-nav").addClass("btn-active");
        }
      );
    }
  };
}(jQuery, Drupal));
