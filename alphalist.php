<?php
/*
    Template Name: Projects - Name
*/
get_header(); ?>
<nav class="subnav projects_sub">
    <div>
        <?php
            if ( $post->post_parent == '167') { $project_type = 'architecture'; }
            if ( $post->post_parent == '169') { $project_type = 'product'; }
            if ( $post->post_parent == '171') { $project_type = 'exhibition'; }

            $args = array(
                'menu' => 'projects',
                'depth' => '1',
                'container' => '',
                'echo' => false
            );
            echo wp_nav_menu( $args );

            $args = array(
                'menu' => $project_type . "_submenu",
                'depth' => '1',
                'container' => '',
                'menu_class' => 'typenav',
                'echo' => false
            );
            echo wp_nav_menu( $args );
        ?>
    </div>
</nav>
<div class="post_header">

</div>
<section class="projects_section layout fadein">
    <article class="list_alpha">
        <div class="container_ghost">&nbsp;</div>
        <ol class="project_list">
            
        <?php

            if ( $post->post_parent == '167') { $project_type = 'architecture'; }
            if ( $post->post_parent == '169') { $project_type = 'product'; }
            if ( $post->post_parent == '171') { $project_type = 'exhibition'; }

            $args = array(
                'post_type' => 'projects',
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                            'key'     => 'project_type',
                            'value'   => $project_type,
                            'compare' => 'LIKE'
                    )
                )
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if( get_field('preview') ) :

        $attachment_id = get_field('preview');
        $size = "project_thumb";

        $image = wp_get_attachment_image_src( $attachment_id, $size );
        
        endif;

        ?>
        <li data-alpha="<?php

            if ( get_field( "project_alpha_sort" ) ) {
                $title = get_field( "project_alpha_sort" ); echo $title[0];
            } else {
                $title = get_the_title(); echo $title[0];
            }

            ?>"
            data-sort-term="<?php

            if ( get_field( "project_alpha_sort" ) ) {
                the_field( "project_alpha_sort" );
            } else {
                the_title();
            }

            ?>"
            >
            <a href="<?php the_permalink(); ?>">
                <div class="item_preview">
                    <?php if( get_field("preview") ) : ?>
                        <img src="<?php echo $image[0]; ?>">
                    <?php else : ?>
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/grey.jpg">
                    <?php endif; ?>
                </div>
                <span class="item_title"><?php the_title(); ?></span>
            </a>
        </li>

        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
</section>

<?php get_footer(); ?>