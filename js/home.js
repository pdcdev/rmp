jQuery(document).ready(function($) {

    $(window).load(function() {
        $('.statement_slider').flexslider({
        animation: "fade",
        animationLoop: true,
        animationSpeed: 1000,
        controlNav: false,
        directionNav: false,
        });
    });

    var splash = $(".splash");

    splash.click(function(){
        $(".splash_slider, .splash_logo", this).animate({opacity: 0}, 1000,function(){
            splash.animate({opacity: 0}, 1000, function(){
                splash.hide();
            });
        });
    });
});