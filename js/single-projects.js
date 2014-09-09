jQuery(document).ready(function($) {

    var gallery_click_zone = $(".slides li");
    var x_center = Math.round($(window).width()/2);
    var mouse_x = 0;
 
    $(window).resize(function(){
        x_center = Math.round($(window).width()/2);
    });
    $(document).on( "mousemove", function( event ) {
        mouse_x = event.pageX;
    });
    $(".content_nav li").click(function(){
        $.scrollTo($("article[data-section='"+$(this).attr("data-type")+"']"), 2000, {easing: 'easeOutExpo'});
    });

    var galleries = $(".project_galleries");

    function count_characters() {
        var char_limit = 1500;
        num_chars = $(".description p").text().length;
        if ( num_chars > char_limit ) {
            $(".description").addClass("columned");
        } else {
            $(".description").addClass("uncolumned");
        }
    }
    $(".fancybox").fancybox({
        closeBtn: true,
        padding: 0,
        autoSize: true,
        fitToView: true,
        maxWidth: 1010,
        maxHeight: 760,
        transitionIn: 'elastic',
        transitionOut: 'elastic',
        titlePosition : 'inside',
        arrows : true,
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(255, 255, 255, 1)'
                }
            }
        },
        tpl: {
            closeBtn: '<a class="close_btn"><i class="icon-close"></i></a>',
            next: '<a class="next_btn"><i class="icon-next"></i></a>',
            prev: '<a class="prev_btn"><i class="icon-prev"></i></a>'
        }
    });

    $(window).load(function() {
        count_characters();
    });

});