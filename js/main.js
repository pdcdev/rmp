jQuery(document).ready(function($) {

    var square = $(".square");
    var fade_in = $(".fadein");

    function size_square(){
        square.each(function(){
            $(this).css( "height", Math.round( $(this).width() ) + "px");
        });
    }
    function fadein() {
        fade_in.each(function(){
            $(this).animate({ opacity :"1"}, 400);
        });
    }

    size_square();

    $(window).resize(function(){
        size_square();
    }).load(function(){
        fadein();
    });

});