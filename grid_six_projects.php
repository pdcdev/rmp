<?php
/*
    Template Name: Grid Six Projects
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
        <ul>
            <li>Visual</li>
            <li>Name</li>
            <li>Date</li>
        </ul>
        <?php
            $args = array(
                'menu' => 'project_categories',
                'depth' => '0',
                'container' => '',
                'menu_id' => 'project_categories',
                'echo' => false
            );
            echo wp_nav_menu( $args );
        ?>
    </div>
</nav>
<div class="post_header">

</div>
<section class="layout">
    <article class="grid_six">
        <ol>
        <?php
            if ( is_page('projects') ) {
                $args = array( 'post_type' => 'projects' );
            }
            if ( is_page('books') ) {
                $args = array( 'post_type' => 'books' );
            }
            if ( is_page('publications') ) {
                $args = array( 'post_type' => 'publications' );
            }
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if( get_field('preview') ) :

        $attachment_id = get_field('preview');
        $size = "project_thumb";
        $image = wp_get_attachment_image_src( $attachment_id, $size );
        
        ?>
        <li>
            <a href="<?php the_permalink(); ?>">
                <span class="tooltip"><?php the_title(); ?></span>
                <img src="<?php echo $image[0]; ?> ">
            </a>
        </li>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
</section>
<?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>

<?php get_footer(); ?>