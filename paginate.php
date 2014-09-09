<?php
    $big = 999999999;
    $pagination = paginate_links( array(
        'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $the_query->max_num_pages,
        'prev_next' => false,
        'type'      => 'list',
        'show_all'  => true
    ) );

    if ($pagination) : ?>
    <nav class="pagination fadein">
    <?php echo $pagination; ?>
    </nav>
<?php endif; ?>