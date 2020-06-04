<?php get_header();?>

<section class="page-wrap">


    <div class="row">
        <div class="col-lg-3">
            <?php if(is_active_sidebar('product-categories') ):?>
                <?php dynamic_sidebar('product-categories');?>
            <?php endif;?>
        </div>

        <div class="col-lg-6">
                <?php if(is_active_sidebar('product-filters') ):?>
                    <?php dynamic_sidebar('product-filters');?>
                <?php endif;?>
                <?php woocommerce_content();?>
        </div>

        <div class="col-lg-3">
            <?php if(is_active_sidebar('cart-sidebar') ):?>
                <?php dynamic_sidebar('cart-sidebar');?>
            <?php endif;?>
        </div>
    </div>


</section>



<?php get_footer();?>
