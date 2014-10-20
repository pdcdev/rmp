jQuery(document).ready(function($) {
    $('.splash_slider').flexslider({
        animation: "fade",
        animationLoop: true,
        itemWidth: '100%',
        controlNav: false,
        directionNav: false,
        useCSS: true,
        slideshowSpeed: 8000,
        start: function() {
            $(".slides").show();
        }
    });
});