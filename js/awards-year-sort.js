jQuery(document).ready(function($) {

    var preview_thumb = $(".item_preview");
    var thumbs_from_top = Math.round($(".projects_section").offset().top);

    // function sortProjects(attribute, order, number) {

    //     var mylist = $('ol.project_list');

    //     var listitems = mylist.children("li").get();

    //     listitems.sort(function(a, b) {

    //         var compA = $(a).attr(attribute).toUpperCase();
    //         var compB = $(b).attr(attribute).toUpperCase();

    //         if(number) {
    //             compA = Number(compA);
    //             compB = Number(compB);
    //         }

    //        return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
    //     });

    //     if (order) {
    //         listitems.reverse();
    //     }

    //     $.each(listitems, function(idx, itm) {
    //         mylist.append(itm);
    //     });
    // }

    // sortProjects("data-sort-term", 0);

    function follow_mouse(elem, y, x) {

        var offset = Math.round(preview_thumb.height()/2);
        window.console.log(offset);
        $(document).on('mousemove', function(e){
            if( x && y ) {
                elem.css({ left: e.pageX, top: e.pageY + offset });
            } else if ( !x && y ) {
                if ( e.pageY > thumbs_from_top ) {
                    elem.css({ top: e.pageY - offset });
                }
            }
        });
        
    }

    var project_list = $(".project_list");
    var ghost = $(".container_ghost");

    function list_view(sortby) {
        
        var pool = [];

        preview_thumb.css({ width: Math.round(ghost.width())+"px", left: Math.round(ghost.offset().left)+"px" });

        $(".project_list li").each(function(){
            pool.push($(this).attr("data-"+sortby));
        });

        var uniquepool = pool.filter(function(elem, pos) {
            return pool.indexOf(elem) === pos;
        });

        uniquepool.sort().reverse();

        $.each(uniquepool, function(index, value) {
            project_list.append("<div class=\"list_container\" data-"+sortby+"-title=\""+value+"\"></div>");
        });

        $(".list_container").each(function(){
            var group = $(this).attr("data-"+sortby+"-title");
            $("li[data-"+sortby+"='"+group+"']").appendTo($(this));
            $(this).wrap("<div class=\"list_group\" data-sort-term=\""+group+"\"></div>").before("<div class=\"list_title\" data-sort-term=\""+group+"\">"+group+"</div>");
        });

        $(".list_container").each(function(){
            if ( $("li", this).length > 6 ) {
                $(this).addClass("columnize");
            } else {
                $(this).addClass("noncolumn");
            }
        });
        follow_mouse( preview_thumb, true );
    }

    list_view("year");

});