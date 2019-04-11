
 <article id="post-<?php the_ID();?>" <?php post_class(); ?>>
        <header>
            <h1 class="article-title"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h1>
        </header>
        <div class="article-meta">
        <span class="author"><i class="fas fa-user-circle"></i> <?php the_author(); ?></span>
        <span class="date-published"><time datetime="<?php the_time('l, F jS, Y') ?>" class="published-time" ><?php the_date( ' F d Y'); ?></time></span>
        </div>
                <?php if(has_post_thumbnail()):?>
                <div class="article_img_cap">
                <a href="<?php the_permalink();?>"><img  id="article_img" src="<?php the_post_thumbnail_url('smallest');?>"></a>
                </div>
                <?php endif ?>
                <div class="comment-counter"> 
                    <span class="comment-section" id="comment-number"><?php echo get_comments_number();?></span> 
                    <span class="comment-section" id="comment-icon"><i class="fas fa-comment"></i> </span>  
                </div>
                <section class="article_content">
                    <?php the_excerpt();?> 
                </section> 
    </article>
