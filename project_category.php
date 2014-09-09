<?php
/*
    Template Name: Projects - Category
*/
get_header(); ?>
<nav class="subnav projects_sub">
    <div>
        <?php
            $args = array(
                'menu' => 'projects',
                'depth' => '1',
                'container' => '',
                'echo' => false
            );
            echo wp_nav_menu( $args );
        ?>
        <?php
            if ( $post->post_parent == '167') { $page_project_type = 'architecture_submenu'; }
            if ( $post->post_parent == '169') { $page_project_type = 'products_submenu'; }
            if ( $post->post_parent == '171') { $page_project_type = 'exhibitions_submenu'; }
            $args = array(
                'menu' => 'architecture_submenu',
                'depth' => '1',
                'container' => '',
                'menu_class' => 'typenav',
                'echo' => false
            );
            
            echo wp_nav_menu( $args );

            $args = array(
                'menu' => 'projects_type',
                'depth' => '1',
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
    <span class="tooltip_container"></span>
    <article class="grid_six">
        <ol class="project_list">
        <?php

            if ( $post->post_parent == '167') { $project_type = 'architecture'; }
            if ( $post->post_parent == '169') { $project_type = 'product'; }
            if ( $post->post_parent == '171') { $project_type = 'exhibition'; }

            if ( is_page('Civic') ) { $project_category = 'Civic'; }
            if ( is_page('Commercial') ) { $project_category = 'Commercial'; }
            if ( is_page('Hospitality') ) { $project_category = 'Hospitality'; }
            if ( is_page('Institutional') ) { $project_category = 'Institutional'; }
            if ( is_page('Master Plans') ) { $project_category = 'Master Plans'; }
            if ( is_page('Performance') ) { $project_category = 'Performance'; }
            if ( is_page('Residential') ) { $project_category = 'Residential'; }

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
                    ),
                    array(
                            'key'     => 'architecture_category',
                            'value'   => $project_category,
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
        <li data-tooltip="<?php the_title(); ?>"<?php

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
            <a href="<?php the_permalink(); ?>"">
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