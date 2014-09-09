jQuery(document).ready(function($) {

    var preview_thumb = $(".item_preview");
    var thumbs_from_top = Math.round($(".projects_section").offset().top);

    function sortProjects(attribute, order, number) {

        var mylist = $('ol.project_list');

        var listitems = mylist.children("li").get();

        listitems.sort(function(a, b) {

            var compA = $(a).attr(attribute).toUpperCase();
            var compB = $(b).attr(attribute).toUpperCase();

            if(number) {
                compA = Number(compA);
                compB = Number(compB);
            }

           return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
        });

        if (order) {
            listitems.reverse();
        }

        $.each(listitems, function(idx, itm) {
            mylist.append(itm);
        });
    }

    sortProjects("data-sort-term", 0);

    function follow_mouse(elem) {

        var offset = Math.round(preview_thumb.height()/2);

        window.console.log(offset);
        $(document).on('mousemove', function(e){
            if ( e.pageY > thumbs_from_top ) {
                elem.css({ top: e.pageY - offset });
            }
        });
    }

    var project_list = $(".project_list");
    var ghost = $(".container_ghost");

    function resize_preview() {
        preview_thumb.css({ width: Math.round(ghost.width())+"px", left: Math.round(ghost.offset().left)+"px" });
    }

    function list_view(sortby) {
        
        var pool = [];

        $(".project_list li").each(function(){
            pool.push($(this).attr("data-"+sortby));
        });

        var uniquepool = pool.filter(function(elem, pos) {
            return pool.indexOf(elem) === pos;
        });

        $.each(uniquepool, function(index, value) {
            project_list.append("<div class=\"list_container\" data-"+sortby+"-title=\""+value+"\"></div>");
        });

        $(".list_container").each(function(){
            var group = $(this).attr("data-"+sortby+"-title");
            $("li[data-"+sortby+"='"+group+"']").appendTo($(this));
            $(this).before("<div class=\"list_title\">"+group+"</div>");
        });

        $(".list_container").each(function(){
            if ( $("li", this).length > 6 ) {
                $(this).addClass("columnize");
            }
        });
    }

    list_view("alpha");
    resize_preview();
    follow_mouse( preview_thumb, true );
    
    $(window).resize(function(){
        resize_preview();
    });

});