<?php get_header(); ?>

<div id="slider">

   <div class="slides">
      <!-- First slide --> 
      <div class="slider">
         <div class="images"> 
         <img src="<?php bloginfo('template_url'); ?>/images/0267530001512848036.png"/>
         </div>
      </div>
      <!-- Second slide -->
      <div class="slider">
         <div class="images"> 
         <img src="<?php bloginfo('template_url'); ?>/images/0267530001512848036.jpeg"/>
         </div>
      </div>
      <!-- Third slide --> 
      <div class="slider">
         <div class="images"> 
         <img src="<?php bloginfo('template_url'); ?>/images/933.jpg"/>
         </div>
      </div>
      <!-- Fourth slide --> 
      <div class="slider">
         <div class="images"> 
         <img src="<?php bloginfo('template_url'); ?>/images/820185.jpg"/>
         </div>
      </div>
   </div>
</div>
<div class="box"></div>

</div>
<!-- Featured Post -->
<div class="feature" style="height: 45em; background: pink">
   <span id=feature-title>Featured Story: Cont. </span>
</div>
<!-- The flexible grid (content) -->


<div class="row">
  
<div class="main">   
         <?php if (have_posts()) : while(have_posts()) : the_post();?>

         <div class="card">
            <div class="container">
               <div class="main">
                  <hr><br>
                  <a href="<?php the_permalink();?>"><h1><?php the_title();?></h1></a><br><br>
                      <?php if(has_post_thumbnail()):?>
                      <img src="<?php the_post_thumbnail_url('smallest');?>">
                      <?php endif ?>
               </div>
               <div class="side">
                  <?php the_date( 'd-m-Y', 'Posted: '); ?>
                  <?php the_excerpt();?>
               </div>
               </div>
            </div>
            <?php endwhile; endif;?>
         <?php echo paginate_links(); ?>
      </div>
   
  
</div>

<?php get_footer(); ?>