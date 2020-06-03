<?php if( have_posts() ) : while( have_posts() ): the_post(); ?>


<p><?php echo get_the_date(); ?></p>

<?php the_content(); ?>
<?php
$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name');
?>

-- <?php echo $fname; ?> <?php echo $lname;?>

<?php

$tags = get_the_tags();
foreach($tags as $tag): ?>

    <a href="<?php echo get_tag_link($tag->term_id);?>" class="badge badge-success">
        <?php echo $tag->name;?>
    </a>

<?php endforeach; ?>



<?php endwhile; else: endif; ?>
