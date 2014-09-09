<?php
/*
    Template Name: Practice - Awards
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
                'post_type' => 'awards',
                'orderby' => 'title',
                'order' => 'ASC'
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <li data-year="<?php
            if ( get_field( "date" ) ) {

                preg_match_all('/(\d{4})/', get_field( "date" ), $matches);

                echo $matches[0][0];
            }
            ?>">
            <p class="item_award_name"><?php the_title(); ?></p>
            <?php if( get_field('awarded_by') ) : the_field('awarded_by'); endif; ?>
            <?php if( get_field('awarded_to') ) : $posts = get_field('awarded_to'); ?>
            <?php if( $posts ): foreach( $posts as $post ): setup_postdata($post); ?>
                <p class="item_related"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            <?php endforeach; endif; endif; ?>
        </li>

        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
</section>

<?php get_footer(); ?>