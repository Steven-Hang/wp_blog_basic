<h1><?php single_cat_title();?></h1>
    <?php if (have_posts()) : while(have_posts()) : the_post();?>
         <?php the_title();?>
         <?php the_excerpt();?>
         <a href="<?php the_permalink();?>">read more</a>
    <?php endwhile; endif;?>