<?php
/*
    Template Name: News
*/
get_header(); ?>
<nav class="subnav fadein practice_sub">
    <div>
    </div>
</nav>
<div class="post_header">

</div>
<section class="projects_section layout">
    <article class="grid_three">
        <ol class="project_list">
        <?php
            $args = array(
                'post_type' => array('press_release','publication','video','books'),
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => 33,
                'meta_query' => array(
                    array(
                            'key'     => 'highlighted',
                            'value'   => true,
                            'compare' => 'LIKE'
                    )
                )
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if( get_field('preview') ) :

        $attachment_id = get_field('preview');
        $size = "thumb";

        $image = wp_get_attachment_image_src( $attachment_id, $size );
        endif;

        $post_type = get_post_type();
        $obj = get_post_type_object( $post_type );
        $the_singular_name = $obj->labels->singular_name
        ?>
            <li class="fadein">
                <a <?php if( $the_singular_name == "Video" ) { echo "href='" . get_field('video_id') . "' target='_blank'" ; } else { echo "href='" . get_permalink() . "'"; } ?>>
                    <img src="<?php echo $image[0]; ?> ">
                    <div>
                    <p><?php  echo $the_singular_name ?></p>
                    <p class="title"><?php the_title(); ?></p>
                    <?php if( get_field("project_subtitle") ) : ?>
                    <p class="subtitle"><?php the_field("project_subtitle"); ?></p><?php endif; ?>
                    <?php if( get_the_date() ) : ?><p>
                    <?php
                        if($the_singular_name == "Publication") {
                            echo get_the_date('F, Y'); 
                        } else {
                            the_date('F d, Y');
                        } 
                    ?></p><?php endif; ?>
                    </div>
                </a>
            </li>
        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
    
    <?php include_once('paginate.php'); ?>
    
</section>
<?php get_footer(); ?>