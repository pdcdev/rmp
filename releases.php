<?php
/*
    Template Name: Practice - Press - Releases
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
                'post_type' => 'press_release',
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li class="fadein">
                <a href="<?php the_permalink(); ?>">
                    <?php if( get_field('preview') ) : ?><img src="<?php get_image(get_field('preview'), "thumb"); ?> "><?php endif; ?>
                    <div>
                        <p class="title"><?php the_title(); ?></p>
                        <?php if( get_field("project_subtitle") ) : ?><p class="subtitle"><?php the_field("project_subtitle"); ?></p><?php endif; ?>
                        <?php if( get_the_date() ) : ?><p><?php the_date('F d, Y'); ?></p><?php endif; ?>
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