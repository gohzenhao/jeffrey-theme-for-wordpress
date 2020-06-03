<?php get_header();?>

<section class="page-wrap">
<div class="container">

    <h1>Search Results for <?php echo get_search_query();?> </h1>
    <?php get_template_part('includes/section', 'searchresult'); ?>


    <?php

    global $wp_query;

    $big = 99999999999999;

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged="%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));

    ?>

</div>
</section>



<?php get_footer();?>
