jQuery(document).ready(function($) {

    $(window).load(function() {
        $(document).bind('touchmove', false);
        $('.statement_slider').flexslider({
            animation: "fade",
            animationLoop: true,
            animationSpeed: 1000,
            controlNav: false,
            directionNav: false,
            slideshowSpeed: 9000
        });
    });

    var splash = $(".splash");

    splash.click(function(){
        $(document).unbind('touchmove', false);
        $(".splash_slider, .splash_logo", this).animate({opacity: 0}, 1000,function(){
            splash.animate({opacity: 0}, 1000, function(){
                splash.hide();
            });
        });
    });

});