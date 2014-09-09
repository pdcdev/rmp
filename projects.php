<?php
/*
    Template Name: Projects - Visual
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

            if ( $project_type == 'architecture') {
                $args = array(
                    'menu' => "projects_type",
                    'depth' => '1',
                    'container' => '',
                    'menu_class' => 'typenav',
                    'echo' => false
                );
                echo wp_nav_menu( $args );
            }

        ?>
    </div>
</nav>
<div class="post_header">

</div>

<section class="projects_section layout">
    <span class="tooltip_container"></span>
    <article class="grid_six">
        <ol class="project_list">
        <?php

            if ( $post->post_parent == '167') { $project_type = 'architecture'; }
            if ( $post->post_parent == '169') { $project_type = 'product'; }
            if ( $post->post_parent == '171') { $project_type = 'exhibition'; }

            // $temp = $the_query; 
            // $the_query = null; 
            // $the_query = new WP_Query(); 

            $args = array(
                'post_type' => 'projects',
                'paged' => $paged,
                'posts_per_page' => 66,
                'meta_key' => 'project_sort-by_year',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'meta_query' => array(
                    array(
                        'key'     => 'project_type',
                        'value'   => $project_type,
                        'compare' => 'LIKE'
                    )
                )
            );

            // add_filter( 'posts_orderby', 'filter_query' );
            $the_query = new WP_Query($args);
            // remove_filter( 'posts_orderby', 'filter_query' );

            // function filter_query( $query ) {
            //     $query .= ', wp_posts.title ASC';
            //     return $query;
            // }

            // $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if ( get_field('preview') ) :

        $attachment_id = get_field('preview');
        $size = "project_thumb";

        $image = wp_get_attachment_image_src( $attachment_id, $size );

        endif;

        $project_id = $project_id + 1;

        ?>
        <li class="fadein" data-id="<?php echo $project_id; ?>" data-tooltip="<?php the_title(); ?>" <?php

            ?>data-sort-term="<?php
            if ( get_field( "project_alpha_sort" ) ) {
                the_field( "project_alpha_sort" );
            } else {
                the_title();
            }
            ?>" data-sort-year="<?php the_field("project_sort-by_year"); ?>">
            <a href="<?php the_permalink(); ?>">
                <div class="item_preview">
                    <?php if( get_field("preview") ) : ?>
                        <img src="<?php echo $image[0]; ?>">
                    <?php else : ?>
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/grey.jpg">
                    <?php endif; ?>
                </div>
            </a>
        </li>

        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>

    <?php include_once('paginate.php'); ?>

</section>

<?php get_footer(); ?>