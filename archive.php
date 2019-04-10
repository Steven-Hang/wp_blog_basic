<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<main id="main" class="site-main page-container" role="main">       
		<section class="article-area  article-area-posts">	
			<header class="page-header">
			<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );

					if ( is_author() && '' !== get_the_author_meta( 'description' ) ) {
						echo '<div class="taxonomy-description">' . get_the_author_meta( 'description' ) . '</div><!-- .taxonomy-description -->';
					} else {
						the_archive_description( '<div class="taxonomy-description">', '</div><!-- .taxonomy-description -->' );
					}
				?>
			</header><!-- .page-header -->
		<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					get_template_part( 'content', get_post_format() );
				?>
			<?php endwhile; ?>
		</section>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	
		<div class="lnf-area"><h4>Scroll for more content</h4> &nbsp<div class="lds-ring"><div></div></div> 
    </div>
	<?php get_sidebar(); ?>
	
</main>
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