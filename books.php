<?php
/*
    Template Name: Practice - Books
*/
get_header(); ?>
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
    </div>
</nav>
<div class="post_header">

</div>
<section class="layout">
    <article class="grid_three">
        <ol>
        <?php
            $args = array(
                'post_type' => 'books',
                'meta_key' => 'date_published',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php if ( have_posts() ) : ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php if( get_field('preview') ) :
        
        $attachment_id = get_field('preview');
        $size = "third";
        
        $image = wp_get_attachment_image_src( $attachment_id, $size );
        
        ?>
        <?php endif; ?>
            <li class="fadein">
                <a href="<?php the_permalink(); ?>">
                    <img <?php if( get_field('thumbnail_outline') == true ) { echo "class=\"outline\";";} ?> src="<?php echo $image[0]; ?> ">
                    <div>
                        <p class="title"><?php the_title(); ?></p>
                        <?php if( get_field("date") ) : ?><p><?php the_field("date") ?></p><?php endif; ?>
                    </div>
                </a>
            </li>
        <?php endwhile; ?>
        <?php endif; ?>
        </ol>
    </article>
</section>

<?php get_footer(); ?>