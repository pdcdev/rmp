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
    <div class="info">
        <h3><?php the_title(); ?> </h3>
        <p><?php the_field( 'date' ) ?></p>
    </div>
</div>
<section class="layout">
    <article class="project_body fadein">
        <div class="image">
            <?php if( get_field('preview') ) :
                $attachment_id = get_field('preview');
                $size = "square_thumb";

                $image = wp_get_attachment_image_src( $attachment_id, $size );
            ?>
            <img src="<?php echo $image[0]; ?>">
            <?php endif; ?>
        </div>
        <?php if( get_field( 'copy' ) ) : ?>
            <div class="description"><?php the_field( 'copy' ) ?></div>
        <?php endif; ?>
    </article>

    <?php if( get_field( 'gallery' ) ) : ?>
    <article class="grid_six">
        <div class="project_media_nav">
            <ol>
                <?php $images = get_field('gallery'); ?>
                <?php if( $images ): ?>
                    <?php foreach( $images as $image ):

                        $attachment_id = $image['id'];
                        $large_image = wp_get_attachment_image_src( $attachment_id, 'large' );
                        $thumbnail_image = wp_get_attachment_image_src( $attachment_id, 'project_thumb' );
                    ?>
                    <li>
                        <a class="fancybox" rel="images" href="<?php echo $large_image[0]; ?>" ><img src="<?php echo $thumbnail_image[0] ?>" alt="" /></a>
                    </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ol>
        </div>
    </article>
    <?php endif; ?>

    </section>

<?php get_footer(); ?>