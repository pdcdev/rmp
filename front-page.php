<?php get_header();
/*
    Template Name: Splash
*/
?>
<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

<section class="home">
    <div class="statement_slider">
    <ul class="slides fadein">    
        <?php if( get_field('home_statements') ) : while( has_sub_field('home_statements') ): ?>
            <li class="slide">
                <article>
                    <p><?php the_sub_field('home_statement'); ?></p>
                    <span><?php the_sub_field('home_caption'); ?></span>
                </article>
            </li>
        <?php endwhile; endif; ?>
    </ul>
</section>
<?php
    $cookieValue = $_COOKIE['visited_recently'];
    if($cookieValue == true ) :
?>
<div class="splash">
    <div class="splash_slider">
        <ul class="slides">
            <?php $images = get_field('gallery'); if( $images ): ?>
                <?php foreach( $images as $image ): ?>
                <li class="slide">
                    <?php
                        $this_image = wp_get_attachment_image_src( $image['id'], "full" );
                    ?>
                    <div class="slide_bg" style="background-image:url('<?php echo $this_image[0]; ?>');">
                    </div>
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="splash_logo"></div>
</div>

<?php endif; ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>