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
            <li class="affiliation_item">
                <p class="title"><?php the_sub_field("affiliation"); ?></p>
                <p><?php the_sub_field("affiliation_designation"); ?></p>
            </li>
            <?php endwhile; ?>
        </ul>
    </article>
    <?php endif; ?>

    <?php if( get_field('related') ) : ?>
    <article class="project_related fadein" data-section="related">
        <h5>Related</h5>
        <ul class="related_list">
    <?php $related_posts = get_field('related'); ?>
        <?php if( $related_posts ): ?>
        
            <?php foreach( $related_posts as $related_post ): ?>
            <?php $post = $related_post; setup_postdata($post); ?>
            
            <?php
                $post_type = get_post_type();
                $obj = get_post_type_object( $post_type );
                $post_type_name = $obj->labels->singular_name;

                switch($post_type_name) {
                    case "Project":
                    $thumb_size = "project_thumb";
                    break;

                    case "Press Release":
                    $thumb_size = "project_thumb";
                    break;

                    case "Publication":
                    $thumb_size = "thumb";
                    break;
                    
                    case "Book":
                    $thumb_size = "thumb";
                    break;

                    default:
                    $thumb_size = "project_thumb";
                }
            ?>
            <?php if($post_type_name != "Person") : ?>
                <?php if($post_type_name != "Award") : ?>
                <li class="related_item" data-sort-term="<?php if( get_field("project_alpha_sort") ) { echo sanitize_string(get_field("project_alpha_sort")); } else { echo sanitize_string(get_the_title()); }  ?>">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php get_image(get_field("preview"), $thumb_size); ?>" /> 
                        <p><?php echo $post_type_name; ?></p>
                        <p class="title"><?php the_title(); ?></p>
                    </a>
                </li>
                <?php else: // if award ?>
                <li class="related_item" data-sort-term="<?php the_title(); ?>">
                    <p><?php echo $post_type_name ?></p>
                    <p class="title"><?php the_title(); ?></p>
                    <p><?php the_field("awarded_by"); ?></p>
                    <p><?php the_field("awarded_to"); ?></p>
                </li>
                <?php endif; endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </article>
    <?php endif; ?>
    <!-- end related -->

</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>