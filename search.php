<?php get_header(); ?>
<nav class="subnav practice_sub">
    <div>
    </div>
</nav>
<div class="post_header">
    <div class="search_field">
        <?php get_search_form(); ?>
        <p class="num_results">
        <?php
            $num_results = $wp_query->found_posts;
            if ($num_results == 1) {
                echo $wp_query->found_posts . " result found";
            } else {
                echo $wp_query->found_posts . " results found";
            }
         ?>
         </p>
    </div>
</div>
<section class="projects_section layout">
    <article class="search">
        <ol>
        <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();

            $post_type = get_post_type();
            $obj = get_post_type_object( $post_type );

        ?>
        <a href="<?php the_permalink(); ?>">
            <li class="fadein">
                <div class="result_image">
                    <?php if( get_field('preview') ) : ?>
                        <img src="<?php get_image(get_field('preview'), "thumbnail"); ?> ">
                    <?php else : ?>
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/grey_box.jpg">
                    <?php endif; ?>
                </div>
                <div class="result_info">
                    <p class="result_type"><?php echo $obj->labels->singular_name ?></p>
                    <p class="result_title title"><?php the_title(); ?></p>
                </div>
            </li>
        </a>
        <?php endwhile; else: ?>
            <div class="entry"><h2><?php _e('Sorry, no posts matched your Search criteria.'); ?></h2></div>
        <?php endif; ?>
        </ol>
    </article>
</section>
<?php get_footer(); ?>