<?php
/*
    Template Name: Practice - Partners & Staff
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
        <?php
            $args = array(
                'menu' => 'staff_submenu',
                'depth' => '0',
                'container' => '',
                'menu_class' => 'typenav',
                'echo' => false
            );
            if( is_page('New York') || is_page('Los Angeles')) { echo wp_nav_menu( $args ); }
        ?>
    </div>
</nav>
<div class="post_header">

</div>
<div class="project_header"></div>
    <section class="layout people_layout">

        <?php
            
            if ( is_page("Partners") ) {
                $meta_queries = array(
                    array(
                            'key'     => 'section',
                            'value'   => 'partner',
                            'compare' => 'LIKE'
                    )
                );
            } elseif ( is_page("New York") ) {
                $meta_queries = array(
                    array(
                            'key'     => 'section',
                            'value'   => 'staff',
                            'compare' => 'LIKE'
                    ),
                    array(
                            'key'     => 'people_office',
                            'value'   => 'new york',
                            'compare' => 'LIKE'
                    )
                );
            } elseif ( is_page("Los Angeles") ) {
                $meta_queries = array(
                    array(
                            'key'     => 'section',
                            'value'   => 'staff',
                            'compare' => 'LIKE'
                    ),
                    array(
                            'key'     => 'people_office',
                            'value'   => 'los angeles',
                            'compare' => 'LIKE'
                    )
                );
            }

            $args = array(
                'post_type' => 'people',
                'meta_query' => $meta_queries
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <article class="grid_four">
            <ol>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li class="fadein">
            <?php if( get_field('preview') ) : ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php get_image( get_field('preview'), "thumb" ); ?> ">
                    <span class="people_title"><?php the_title(); ?>, <?php the_field("position"); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php endwhile; ?>
        </ol>
        </article>
<?php endif; ?>

    </section>
<?php get_footer(); ?>