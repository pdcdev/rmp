<?php get_header(); ?>
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
    </div>
</nav>
<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

<div class="post_header">
    <div class="info">
        <h3><?php the_title(); ?><?php if(get_field( 'designation' )) { echo ", " . get_field( 'designation' ); } ?></h3>
        <p><?php the_field( 'position' ) ?></p>
    </div>
</div>
<section class="layout fadein">
    <article class="project_body">
        <div class="image">
            <?php if( get_field('biography_image') ) {
                $attachment_id = get_field('biography_image');
            } elseif ( get_field('preview') ) {
                $attachment_id = get_field('preview');
            } ?>
            <img src="<?php get_image( $attachment_id, "square_thumb" ); ?>">
        </div>
        <?php if( get_field( 'biography' ) ) : ?>
            <div class="description"><?php the_field( 'biography' ) ?></div>
        <?php endif; ?>
    </article>

    <?php if( have_rows('affiliations') ) : ?>
    <article class="people_affiliated fadein">
        <h5>Afilliations</h5>
        <ul>
            <?php while ( have_rows('affiliations') ) : the_row(); ?>
            <li class="related_item">
                <p class="title"><?php the_sub_field("affiliation"); ?></p>
                <p><?php the_sub_field("affiliation_designation"); ?></p>
            </li>
            <?php endwhile; ?>
        </ul>
    </article>
    <?php endif; ?>

    <?php if( get_field('related') ) : ?>
    <?php $posts = get_field('related'); ?>
    <article class="project_related fadein">
        <?php if( $posts ): ?>
        <h5>Related</h5>
        <ul>
            <?php foreach( $posts as $post ): ?>
            <?php setup_postdata($post); ?>
            <li class="related_item">
            <?php
                $attachment_id = get_field("preview");
                $size = "project_thumb";
                $thisimage = wp_get_attachment_image_src( $attachment_id, $size );

                $post_type = get_post_type();
                $obj = get_post_type_object( $post_type );
            ?>
                <?php if($obj->labels->singular_name != "Award") : ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $thisimage[0]; ?>" /> 
                    <p><?php echo $obj->labels->singular_name ?></p>
                    <p class="title"><?php the_title(); ?></p>
                </a>
                <?php else: // if award ?>
                    <p><?php echo $obj->labels->singular_name ?></p>
                    <img src="<?php echo $thisimage[0]; ?>" /> 
                    <p class="title"><?php the_title(); ?></p>
                    <p><?php the_field("awarded_by"); ?></p>
                    <p><?php the_field("awarded_to"); ?></p>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </article>
    <?php endif; ?>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>