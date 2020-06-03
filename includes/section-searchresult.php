<?php if( have_posts() ) : while( have_posts() ): the_post(); ?>


        <div class="card">

            <div class="card-body d-flex justify-content-center align-items-center">
                <?php if(has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>"/>
                <?php endif;?>

                <div  class="blog-content">
                    <h3><?php the_title();?></h3>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink();?>">Read more </a>
                </div>

            </div>
        </div>






<?php endwhile; else: ?>

    There are no results for your search query
<?php endif; ?>
