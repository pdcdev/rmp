<?php
/*
    Template Name: Icons
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
    </div>
</nav>
<div class="post_header">

</div>
<section class="layout">
    <span class="tooltip_container"></span>
    <article class="grid_four">
        <ol class="project_list">
        <?php
            $args = array(
                'post_type' => 'projects',
                'paged' => $paged,
                'posts_per_page' => 32,
                'meta_key' => 'project_sort-by_year',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'meta_query' => array(
                    array(
                            'key'     => 'project_icon',
                            'value'   => true,
                            'compare' => '='
                        )
                    )
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if( get_field('preview') ) :

        $attachment_id = get_field('preview');
        $size = "square_thumb";

        $image = wp_get_attachment_image_src( $attachment_id, $size );

        ?>
        <li class="fadein" data-tooltip="<?php the_title(); ?>">
            <a href="<?php the_permalink(); ?>">
                <!-- <span class="tooltip"><?php the_title(); ?></span> -->
                <?php if( get_field("preview") ) : ?>
                    <img src="<?php echo $image[0]; ?>">
                <?php else : ?>
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/grey.jpg">
                <?php endif; ?>
            </a>
        </li>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>

    <?php include_once('paginate.php'); ?>

</section>

<?php get_footer(); ?>