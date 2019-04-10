
<section id="post-<?php the_ID();?>">
        <h1 id="single-title" ><?php the_title();?></h1>
        <div class="content_img_area">
                <?php if(has_post_thumbnail()):?>
                    <img id="content_img" src="<?php the_post_thumbnail_url('largest');?>">
        <?php endif ?>
         </div>
         <div id="content" class="content-text"> 
         <?php the_content();?> 
         </div> 
         <!--nextpage-->
</section>