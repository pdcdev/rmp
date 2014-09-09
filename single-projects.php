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

    <?php
        $this_post_id = get_the_ID();
        $related_people_posts = [];
        $args = array(
            'post_type' => 'people',
            'orderby' => 'title',
            'order' => 'ASC'
        );
        //query where THIS post ID exists in Person's related field
        $people = new WP_Query( $args );

        foreach( $people as $person ) { // works
            $related_posts = get_field('related');
            foreach( $related_posts as $related_post ) {
                if ( get_the_ID() == $this_post_id ) {
                    $related_people_posts[] = $related_post;
                }
            }
        }
    ?>
    <?php $posts = array_merge( get_field('project_related'), $related_people_posts ); ?>
    <?php if( get_field('project_related') ) : ?>
    <article class="project_related fadein" data-section="related">
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
                    <p><?php echo $obj->labels->singular_name; ?></p>
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