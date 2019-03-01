<?php get_header(); ?>


    <div class="parallax">
        <div class="parallax-content">
                <?php if(has_post_thumbnail()):?>
                    <img src="<?php the_post_thumbnail_url('largest');?>">
        <?php endif ?>
            
         </div>
    </div>

<div class="main">
    <div class="content">
        <h1 id="single-title"><?php the_title();?></h1>
         <?php if (have_posts()) : while(have_posts()) : the_post();?>
         <div class="content-text"> <?php the_content();?> </div>   
    <?php endwhile; endif;?>
        <?php comments_template(); ?>
        <aside class="sidebar">
        fewfewfew
    </aside>
    </div> 
    
    
  
</div>




