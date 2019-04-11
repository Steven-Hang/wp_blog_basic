<?php
/**
 * The template for displaying search results pages.
 *
 * 
 */
get_header(); ?>
	<section id="primary" class="content-area">
		<?php if ( have_posts() ) : ?>
			<header class="page-header" >
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<main id="main " class="site-main page-container" role="main">
				<div id="posts-wrapper">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
						get_template_part( 'content', 'search' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</div>
			<?php get_sidebar(); ?>
		</main>
		<?php the_posts_navigation(); ?>
	</section>
<?php
get_footer();
?> 
