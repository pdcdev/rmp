<?php get_header(); ?>

<section class="home">
    index
    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="statement_slider">
    <ul class="slides">
        <?php if( get_field('home_statements') ) : while( has_sub_field('home_statements') ): ?>
            <li class="slide">
                <article>
                    <p><?php the_sub_field('home_statement'); ?></p>
                    <span><?php the_sub_field('home_caption'); ?></span>
                </article>
            </li>
        <?php endwhile; endif; ?>
    </ul>
    </div>
    <?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>