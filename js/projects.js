jQuery(document).ready(function($) {

    var tooltip_container = $('.tooltip_container');
    var project_list = $(".project_list");

    $(document).on('mousemove', function(e){
        tooltip_container.css({ top: e.pageY, left: e.pageX });
    });
    
    $('.project_list li').live('mouseenter', function() {
        tooltip_container.css("opacity","1").text($(this).data("tooltip"));
    });
    $(".grid_six, .grid_four").live('mouseleave', function(){
        tooltip_container.css("opacity","0").text("");
    });

    function sortProjects(parent, children, attribute, order) {

        var mylist = parent;

        var listitems = children; //mylist.children(children).get();

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

    function get_unique_groups(){
        var pool = [];

        $(".project_list li").each(function(){
            pool.push($(this).attr("data-sort-year"));
        });

        var uniquepool = pool.filter(function(elem, pos) {
            return pool.indexOf(elem) === pos;
        });

        return uniquepool.sort().reverse();
    }

    function reorder_projects(){

        var unique_years = get_unique_groups();

        $.each(unique_years, function(idx, val) {
            var this_year = $("li[data-sort-year='"+val+"']");

            sortProjects(project_list, this_year, "data-sort-term", 'asc');
        });
        
    }

    reorder_projects();
});