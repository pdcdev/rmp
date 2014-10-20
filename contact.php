<?php
/*
    Template Name: Contact Page
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
        <article>
        <div>
            <h4>New York</h4>
            <div>
                <?php the_field("ny_contact_info"); ?>
            </div>
            <h4>Press Inquires</h4>
            <div>
                <?php the_field("ny_press_inquires"); ?>
            </div>
            <h4>Business Inquires</h4>
            <div>
                <?php the_field("ny_business_inquiries"); ?>
            </div>
        </div>
        <div>
            <h4>Los Angeles</h4>
            <div>
                <?php the_field("la_contact_info"); ?>
            </div>
            <h4>Press Inquires</h4>
            <div>
                <?php the_field("la_press_inquires"); ?>
            </div>
            <h4>Business Inquires</h4>
            <div>
                <?php the_field("la_business_inquiries"); ?>
            </div>
        </div>
        <div>
            <h4>Richard Meier Model Museum</h4>
            <div>
                <?php the_field("model_museum_info"); ?>
            </div>
            <h4>Student Requests</h4>
            <div>
                <?php the_field("student_requests"); ?>
            </div>
            <h4>Site Credits</h4>
            <p>
                <a href="http://piscatello.com" target="_blank">Piscatello Design Centre</a><br />
                <a href="http://vignelli.com" target="_blank">Vignelli Associates</a>
            </p>
        </div>
        </article>
    </section>
<?php get_footer(); ?>