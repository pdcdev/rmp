<?php get_header(); ?>
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
    <div class="info">
        <h3><?php the_title(); ?> </h3>
        <p><?php the_field( 'date' ) ?></p>
    </div>
</div>
<section class="layout">
    <article class="project_body fadein">
        <a href="<?php the_field("video_id"); ?>">
        <div class="image">
            <?php if( get_field('preview') ) :
                $attachment_id = get_field('preview');
                $size = "small";

                $image = wp_get_attachment_image_src( $attachment_id, $size );
            ?>
            <img src="<?php echo $image[0]; ?>">
            <?php endif; ?>
        </div>
        <?php if( get_field( 'date_copy' ) ) : ?>
            <div class="description"><?php the_field( 'date_copy' ) ?></div>
        <?php endif; ?>
        </a>
    </article>
</section>

<?php get_footer(); ?>