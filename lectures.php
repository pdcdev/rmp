<?php
/*
    Template Name: Practice - Lectures
*/
get_header(); ?>
<nav class="subnav practice_sub">
    <div>
        <?php
            $args = array(
                'menu' => 'practice_menu',
                'depth' => '0',
                'container' => '',
                'echo' => false
            );
            echo wp_nav_menu( $args );
        ?>
    </div>
</nav>
<div class="post_header">

</div>
<section class="projects_section layout">
    <article class="list_year_awards">
        <div class="container_ghost">&nbsp;</div>
        <ol class="project_list fadein">
            
        <?php
            $args = array(
                'post_type' => 'lectures',
                'meta_key' => 'lecture_date',
                'orderby' => 'meta_value',
                'order' => 'DESC'
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <li data-year="<?php
            if ( get_field( "lecture_date" ) ) {

                preg_match_all('/(\d{4})/', get_field( "lecture_date" ), $matches);

                echo max(max($matches));
            }
            ?>" data-time="<?php echo strtotime( get_field( "lecture_date" ) ) * 1000 ; ?>">
                <p class="item_award_name"><?php the_title(); ?></p>
                <span p="item_title"><?php the_field("lecture_venue"); ?></p>
                <span p="item_title"><?php the_field("lecture_date"); ?></p>
        </li>

        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
</section>

<?php get_footer(); ?>