<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                wp_title( '-', true, 'right');
                bloginfo( 'name' );
            ?>
        </title>
        <?php wp_head(); ?>
        
    </head>
    <?php if( is_singular( 'projects' ) ) : ?>
        <body class="projects">
    <?php elseif( is_singular( 'people' ) || is_singular( 'release' ) || is_singular( 'publications' ) || is_singular( 'videos' ) || is_singular( 'books' )) : ?>
        <body class="practice">
     <?php elseif( is_front_page() ) : ?>
        <body class="frontpage">   
    <?php else : ?>
        <body>
    <?php endif; ?>

        <div class="header_container">
            <header>
                <h1><a href="<?php echo get_site_url(); ?>">Richard Meier &amp; Partners Architects <span>LLP</span></a></h1>
                <nav <?php if( is_front_page() ) { echo "class='home_nav_state'"; } if( is_search() ) { echo "class='search_results'"; } ?> >
                <?php
                    $args = array(
                        'menu' => 'main',
                        'depth' => '1',
                        'echo' => false
                    );
                    
                    echo wp_nav_menu( $args );
                    
                ?>
                </nav>
            </header>
        </div>