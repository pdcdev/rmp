jQuery(document).ready(function($) {

    var preview_thumb = $(".item_preview");
    // var thumbs_from_top = Math.round($(".project_list").offset().top);

    function sortProjects(parent, children, attribute, order) {

        var mylist = parent;

        var listitems = mylist.children(children).get();

        listitems.sort(function(a, b) {

            var compA = $(a).attr(attribute).toUpperCase();
            var compB = $(b).attr(attribute).toUpperCase();

           return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
        });

        if (order === "desc") {
            listitems.reverse();
        }

        $.each(listitems, function(idx, itm) {
            mylist.append(itm);
        });
    }

    function follow_mouse(elem) {

        var thumb_offset = Math.round(preview_thumb.height()/2);

        var min = project_list.offset().top + thumb_offset;
        var max = project_list.offset().top + project_list.height() - thumb_offset;

        window.console.log(min, max);

        $(document).on('mousemove', function(e){
            if ( e.pageY > min && e.pageY < max ) {
                elem.css({ top: e.pageY - thumb_offset });
            } else if ( e.pageY < min ) {
                elem.css({ top: project_list.offset().top });
            } else if ( e.pageY < max ) {
                elem.css({ top: project_list.offset().top + project_list.height() });
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

            $(this).wrap("<div class=\"list_group\" data-sort-term=\""+group+"\"></div>").before("<div class=\"list_title\" data-sort-term=\""+group+"\">"+group+"</div>");
        });

        $(".list_container").each(function(){
            if ( $("li", this).length > 6 ) {
                $(this).addClass("columnize");
            } else {
                $(this).addClass("noncolumn");
            }
        });
    }

    list_view("alpha");
    resize_preview();
    follow_mouse( preview_thumb, true );
    
    sortProjects($('ol.project_list'), '.list_group' ,"data-sort-term", "asc");
    $('.list_container').each(function(){
        sortProjects($(this), 'li' ,"data-sort-term", "asc");
    });

    $(window).resize(function(){
        resize_preview();
    });

});