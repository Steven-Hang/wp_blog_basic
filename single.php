<?php
	/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
		<main id="main" class="site-main page-container" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' !== get_comments_number() ) :
					comments_template();
					endif;
				?>
			<?php endwhile; ?> 
			<?php get_sidebar();?>      
		</main>
<?php 
get_footer(); 
?>





