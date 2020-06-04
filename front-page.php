<?php get_header();?>

<section class="page-wrap">

    <div class="container">
        <div class="frontpage-jumbotron">
            <div class="frontpage-searchbar">
                <h1><?php the_title();?></h1>
                <?php get_search_form();?>
            </div>
        </div>

        <div class="row m-0 pt-4">

            <div class="col-lg-6 men-frontpage">
                <a href="<?php echo get_category_link(25);?>">
                    <h1>Men</h1>
                </a>
            </div>

            <div class="col-lg-6 women-frontpage">
                <a href="<?php echo get_category_link(23);?>">
                    <h1>Women</h1>
                </a>
            </div>
        </div>
        <?php

  $taxonomy     = 'product_cat';
  $orderby      = 'name';
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no
  $title        = '';
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
 $all_categories = get_categories( $args );
 foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;
        echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                echo  '<br/><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
            }
        }
    }
}
?>
        <?php get_template_part('includes/section', 'content'); ?>



    </div>
</section>



<?php get_footer();?>
