<?php
/*
    Template Name: Grid Three Practice
*/
get_header(); ?>
<nav class="subnav practice_sub">
    <div>
        <?php
            $args = array(
                'menu' => 'practice_menu',
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
    <article class="grid_three">
        <ol>
        <?php if ( have_posts() ) : ?>
        <?php while( have_posts() ) : the_post(); ?>
        <?php if( get_field('preview') ) :

        $attachment_id = get_field('preview');
        $size = "small";

        $image = wp_get_attachment_image_src( $attachment_id, $size );

        ?>
        <?php endif; ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $image[0]; ?> ">
                    <!-- <p class="title"><?php the_title(); ?></p> -->
                    <?php if( get_field("date") ) : ?><p><?php the_field("date") ?></p><?php endif; ?>
                </a>
            </li>
        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
</section>

<?php get_footer(); ?>