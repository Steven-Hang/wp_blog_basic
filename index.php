<?php 
/**
 * 
 *
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<div id="page" class="hfeed site">
<!-- Featured Post -->
<?php
  $args = array(
        'posts_per_page' => 1,
        'meta_key' => 'meta-checkbox',
        'meta_value' => 'yes'
    );
    $featured = new WP_Query($args);
 
if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>
<section class="featured-article-area">
   <?php if (has_post_thumbnail()) : ?>
   <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail(); ?>
    </a>
   <div class="featured-text-content-area">
         <div class="featured-text">
         <h1 id="featured_heading"><?php the_title(); ?></h1>
         <?php the_excerpt();?></div>
   </div>
</section> <!-- End featured Section -->

<?php
endif;
endwhile; else:
endif;
?>
<main class="page-container ">
   <section class="article-area  article-area-posts">
      <?php while ( have_posts() ) : the_post(); ?>
         <?php get_template_part( 'content', get_post_format() ); ?>
               <?php endwhile; ?>
      </section>

      <?php get_sidebar(); ?>
      <div class="lnf-area"><h4>Scroll for more content</h4> &nbsp<div class="lds-ring"><div></div></div> 
    </div>

</main>
</div>
<?php get_footer(); ?>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var count = 2;
        var total = <?php echo $wp_query->max_num_pages; ?>;
        
        $(window).scroll(function () {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                if (count > total) {
                    return false;
                } else {
                    loadArticle(count);
                }
                count++;
            }
        });

        function loadArticle(pageNumber) {
         $('.lnf-area').delay('1000').show();
            $.ajax({
                url: "<?php echo admin_url(); ?>admin-ajax.php",
                type: 'post',
                data: "action=infinite_scroll&page_no=" + pageNumber + '&loop_file=loop',
                
                success : function (response) {
                    $('.lnf-area').show();
                  function show_more_articles(){
                      
                    $(".article-area-posts").append(response);
                  };
                   window.setTimeout( show_more_articles, 2000 ); // 3 seconds
                   $('.lnf-area').fadeOut();
                }
            });
            return false;
        }
    });
</script>