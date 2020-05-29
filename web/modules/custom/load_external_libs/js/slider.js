(function($, Drupal){
    Drupal.behaviors.slidercustom = {
        attach: function(context, settings){
            $(".flexslider_module").flexslider({
                animation: "slide",
            });
        },
    };
}(jQuery, Drupal));