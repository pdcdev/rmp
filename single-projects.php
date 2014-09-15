<?php
/*
    Template Name: Projects Section
*/
get_header(); ?>
<nav class="subnav project_sub">
    <?php
        $args = array(
            'menu'      => 'projects',
            'depth'     => '1',
            'meta_key'  => 'project_date',
            'orderby'   => 'meta_value_num',
            'orderby'   => 'DESC',
            'echo'      => false
        );
        echo wp_nav_menu( $args );
    ?>
</nav>
<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

<div class="post_header">
    <div class="info">
        <h3><?php the_title(); ?></h3>
        <?php if( get_field("project_subtitle") ) : ?><p class="subtitle"><?php the_field("project_subtitle"); ?></p><?php endif; ?>
        <?php if( get_field( 'project_location' ) ) : ?>
            <p><?php the_field( 'project_location' ) ?></p>
        <?php endif; ?>
        <?php if( get_field( 'project_date' ) ) : ?>
            <p><?php the_field( 'project_date' ) ?></p>
        <?php endif; ?>
    </div>
</div>

<section class="layout projects_layout">
    <article class="project_body fadein">
        <div class="image">
            <?php if( get_field( 'preview' ) ) :
                $attachment_id = get_field( 'preview' );
                $size = "third";
                $thisimage = wp_get_attachment_image_src( $attachment_id, $size );
            ?>
            <img src="<?php echo $thisimage[0]; ?>">
            <?php endif; ?>
        </div>
        <?php if( get_field( 'project_description' ) ) : ?>
            <div class="description"><?php the_field( 'project_description' ) ?></div>
        <?php endif; ?>
    </article>

    <?php if( get_field( 'project_photography' ) ) : ?>
    <article class="grid_six fadein">
        <div class="project_media_nav">
            <ol>
                <?php $images = get_field('project_photography'); ?>
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

    <?php if( get_field( 'project_renderings' ) ) : ?>
    <article class="grid_six fadein">
        <div class="project_media_nav">
            <ol>
                <?php $images = get_field('project_renderings'); ?>
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

    <?php if( get_field( 'project_drawings' ) ) : ?>
    <article class="grid_six fadein">
        <div class="project_media_nav">
            <ol>
                <?php $images = get_field('project_drawings'); ?>
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

    <?php if( get_field( 'project_models' ) ) : ?>
    <article class="grid_six fadein">
        <div class="project_media_nav">
            <ol>
                <?php $images = get_field('project_models'); ?>
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

    <?php if( get_field( 'project_construction' ) ) : ?>
    <article class="grid_six fadein">
        <div class="project_media_nav">
            <ol>
                <?php $images = get_field('project_construction'); ?>
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

    <?php if( get_field('project_credits') ) : ?>
    <article class="project_credits grid_six fadein" data-section="credits">
        <h5>Credits</h5>
        <ul>
            <?php while( has_sub_field('project_credits') ): ?>
            <li><?php the_sub_field('credit_title'); ?>:<br /> <span><?php the_sub_field('accreditation'); ?></span>
            <?php endwhile; ?>
            </li>
        </ul>
    </article>
    <?php endif; ?>

    <!-- begin related -->
    <article class="project_related fadein" data-section="related">
        <h5>Related</h5>
        <ul class="related_list">
    <?php
        $this_post_id = get_the_ID();
        $args = array(
            'post_type' => 'people'
        );
        $people = new WP_Query( $args );

        while( $people->have_posts() ) : $people->the_post(); ?>
        <?php
            $related_title = get_the_title();
            $related_permalink = get_permalink();
            $related_image = get_field("preview");
            $related_position = get_field("position");
        ?>

        <?php if( get_field('related') ) : ?>
        <?php $posts = get_field('related'); ?>
            <?php if( $posts ): ?>
                <?php foreach( $posts as $post ): ?>
                <?php setup_postdata($post); ?>
                <?php if( get_the_id($post) == $this_post_id ) : ?>
                <li class="related_item" data-sort-term="<?php echo array_pop( explode(" ", $related_title)); ?>">
                    <a href="<?php echo $related_permalink; ?>">
                        <img src="<?php get_image($related_image, "thumb"); ?>" /> 
                        <p><?php echo $related_position; ?></p>
                        <p class="title"><?php echo $related_title ?></p>
                    </a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endwhile; ?>

    <?php wp_reset_query(); ?>

    <?php if( get_field('project_related') ) : ?>
    <?php $related_posts = get_field('project_related'); ?>
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

                    default:
                    $thumb_size = "project_thumb";
                }
            ?>
            <?php if($post_type_name != "Person") : ?>
                <?php if($post_type_name != "Award") : ?>
                <li class="related_item" data-sort-term="<?php if( get_field("project-alpha-sort") ) { the_field("project-alpha-sort"); } else { the_title(); }  ?>">
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
    <!-- end related -->
    <?php endif; ?>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>