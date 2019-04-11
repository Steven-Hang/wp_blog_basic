<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
	<header class="page-header">
			<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );

					if ( is_author() && '' !== get_the_author_meta( 'description' ) ) {
						echo '<div class="taxonomy-description">' . get_the_author_meta( 'description' ) . '</div><!-- .taxonomy-description -->';
					} else {
						the_archive_description( '<div class="taxonomy-description">', '</div><!-- .taxonomy-description -->' );
					}
				?>
			</header>
<?php if ( have_posts() ) : ?>
	<main id="main" class="site-main page-container" role="main">       
		<section class="article-area  article-area-posts">	
		
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
	<?php get_sidebar(); ?>
	
</main>
<?php get_footer(); ?>

