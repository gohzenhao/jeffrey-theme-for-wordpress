<?php

/*
Template Name:  Contact us
*/

?>

<?php get_header();?>
<section class="page-wrap">
<div class="container">

    <h1><?php the_title();?></h1>

    <div class="row">
        <div class="col-lg-6">
            Left  Col
        </div>

        <div class="col-lg-6">
            Right Col
        </div>
    </div>
    <?php get_template_part('includes/section', 'content'); ?>

</div>
</section>



<?php get_footer();?>
