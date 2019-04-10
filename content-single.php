
<article id="post-<?php the_ID();?>">
     <header>
         <h1 id="single_header_title" ><?php the_title();?></h1>
                <p>by <?php the_author(); ?></p> 
        <div class="share-social-area"> 
        <ul>
          <li><i class="fab fa-facebook"></i></li>
          <li><i class="fab fa-twitter"></i></li>
          <li><i class="far fa-comment"></i></li> 
        <ul>     
        </div>
      </header>

      <figure class="content-img-area">
           <?php if(has_post_thumbnail()):?>
                    <img id="content_img" src="<?php the_post_thumbnail_url('smallest');?>">
                    <figcaption><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption> 
           <?php endif ?>
      </figure>
        
        
         <section id="content" class="content-text"> 
         <?php the_content();?> 
        </section> 

         <!--nextpage-->
        <?php previous_post_link();?>

        <?php next_post_link(); ?>  
</article>
</div>
