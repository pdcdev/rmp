<?php get_header(); ?>
<nav class="subnav practice_sub">
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
                'menu' => $page_project_type,
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
<section class="projects_section layout">
    <article class="list_alpha">
        <div class="container_ghost">&nbsp;</div>
        <ol class="project_list">
            
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

        <li data-year="<?php the_field( "award_date" ); ?>">
            <?php if ( get_field( 'award_text' ) ): ?>
            <a href="<?php the_permalink(); ?>">
                <span class="item_title"><?php the_title(); ?></span>
            </a>
            <?php else : ?>
                <span class="item_title"><?php the_title(); ?></span>
            <?php endif; ?>
        </li>

        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
</section>

<?php get_footer(); ?>