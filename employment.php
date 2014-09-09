<?php
/*
    Template Name: Employment Page
*/
get_header(); ?>
<nav class="subnav contact_sub">
    <div>
        <?php
            $args = array(
                'menu' => 'contact-menu',
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
<div class="project_header"></div>
    <section class="layout contact_layout">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <article>
        <div>
            <?php if( get_field('new_york_listings') ) : ?>
                <?php while( has_sub_field('new_york_listings') ): ?>

            <div class="position">
                <h4><?php the_sub_field("listing_title"); ?></h4>
                <?php the_sub_field("listing"); ?>
            </div>

            <?php endwhile; endif; ?>

        </div>
        <div>
            <?php if( get_field('los_angeles_listings') ) : ?>
            <?php while( has_sub_field('los_angeles_listings') ): ?>
            <div class="position">
                <h4><?php the_sub_field("listing_title"); ?></h4>
                <?php the_sub_field("listing"); ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
        <div>
            <h4>Apply</h4>
            <?php the_field("application_instructions"); ?>
        </div>
        </article>
    <?php endwhile; endif; ?>
    </section>
<?php get_footer(); ?>