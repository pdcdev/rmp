<?php
/*
    Template Name: Coming Soon
*/
get_header(); ?>
<div class="comingsoon">
    <h1>Richard Meier &amp; Partners Architects <span>LLP</span></h1>
    <p>We will be back soon.</p>
</div>
<script>

    jQuery("header").css("display","none");

    var from_top = Math.round((jQuery(window).height() - jQuery(".comingsoon").height())/2);
    jQuery(".comingsoon").css("margin-top",from_top-30+"px");

</script>
<?php get_footer(); ?>