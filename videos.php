<?php
/*
    Template Name: Practice - Press - Videos
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
                'menu' => 'press_submenu',
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
    <article class="grid_three">
        <ol class="project_list">
        <?php
            $args = array(
                'post_type' => 'video',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => 33,
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if( get_field('preview') ) :

        $attachment_id = get_field('preview');
        $size = "small";

        $image = wp_get_attachment_image_src( $attachment_id, $size );

        ?>
            <li class="fadein">
                <a href="<?php the_field("video_id"); ?>" target="_blank">
                    <img src="<?php echo $image[0]; ?> ">
                    <div>
                        <p class="title"><?php the_title(); ?></p>
                        <?php if( get_field("project_subtitle") ) : ?><p class="subtitle"><?php the_field("project_subtitle"); ?></p><?php endif; ?>
                        <?php if( get_the_date() ) : ?><p><?php the_date('F d, Y'); ?></p><?php endif; ?>
                    </div>
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